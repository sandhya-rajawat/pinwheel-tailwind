    <?php
    include './function.php';
    $con = db_connect();

    function save_social_link($type, $url, $con)
    {

        $check_stmt = $con->prepare("SELECT id FROM socials WHERE type = ?");
        $check_stmt->bind_param("s", $type);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $update_stmt = $con->prepare("UPDATE socials SET url = ? WHERE type = ?");
            $update_stmt->bind_param("ss", $url, $type);
            $update_stmt->execute();
            $update_stmt->close();
        } else {
            $insert_stmt = $con->prepare("INSERT INTO socials (type, url) VALUES (?, ?)");
            $insert_stmt->bind_param("ss", $type, $url);
            $insert_stmt->execute();
            $insert_stmt->close();
        }

        $check_stmt->close();
    }


// social_link validation..................


function validate_social_url($type,$url)
{
    $patterns=[
        'facebook'  => '/^https?:\/\/(www\.)?facebook\.com\/[A-Za-z0-9\.]+\/?$/',
        'instagram' => '/^https?:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_\.]+\/?$/',
        'twitter'   => '/^https?:\/\/(www\.)?twitter\.com\/[A-Za-z0-9_]+\/?$/',
        'linkedin'  => '/^https?:\/\/(www\.)?linkedin\.com\/(in|company)\/[A-Za-z0-9_-]+\/?$/',
    ];
    if(isset($patterns[$type])){
        return preg_match($patterns[$type], $url);
    }

    return false;
    }


    $errors = [];
    $saved_links = [];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $urls = [
            'facebook'  => trim($_POST['facebook']),
            'instagram' => trim($_POST['instagram']),
            'twitter'   => trim($_POST['twitter']),
            'linkedin'  => trim($_POST['linkedin']),
        ];
    
        foreach ($urls as $type => $url) {
           
            if (!empty($url) && !validate_social_url($type, $url)) {
                $errors[$type] = ucfirst($type) . " URL is invalid.";
            }
        }
    
        if (empty($errors) && $con) {
            foreach ($urls as $type => $url) {
                save_social_link($type, $url, $con);
            }
    
            $con->close();
            session_flash('success', 'Social links saved successfully!');
            redirect('social-icon.php');
        } elseif (!$con) {
            $errors['database'] = "Database connection failed.";
        }
    }
    
    // Fetch saved links (for pre-filling form)
    $con = db_connect(); // reconnect if closed
    if ($con) {
        $result = $con->query("SELECT * FROM socials");
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $saved_links[$row['type']] = $row['url'];
            }
        }
        $con->close();
    }
    
    $view_blade = "./social-icon.blade.php";
    include './layouts/default.php';