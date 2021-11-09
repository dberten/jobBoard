<?php 
    session_start();
    function check_admin($id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3000/People/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: connect.sid=s%3AT2-MeIOG27X-a30x8gvDoxofnp7_2x0S.htua8THOsvshk3ys5Eizlgh21AH8Gb%2FMtINscEyJkSg'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['admin'] == 1)
            return true;
        return false;
    }
    $host = "localhost";
    $username = 'admin';
    $password = "123";
    $database = "jobBoard";
    $conn = new mysqli($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return;
    }
    $_SESSION['db'] = $conn;
    function clean_str($conn, $str) {
        return mysqli_real_escape_string($conn, $str);
    }
    if (isset($_POST['mail']) && isset($_POST['password'])) {
        $mail = $_POST['mail'];
        $pass = $_POST['password'];
        $data = $conn->query("SELECT * FROM People WHERE mail='" . clean_str($conn, $mail) . "'");
        if ($row = mysqli_fetch_array($data) ) {
            if (password_verify($pass, $row['password'])) {
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['id'] = $row['id'];
                if (check_admin($row['id']))
                    echo 'admin';
            }
            else
                echo 'error';
        }
        else
            echo "error";
        exit();
    }
?>