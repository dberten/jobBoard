<?php
    session_start();
    if (isset($_POST['lastname']) && isset($_POST['surname']) && isset($_POST['city']) && isset($_POST['region']) && isset($_POST['JobTitle']) && isset($_POST['mail']) && isset($_POST['workexperience']) && isset($_POST['education']) && isset($_POST['password'])) {
        $lastname = $_POST['lastname'];
        $surname = $_POST['surname'];
        $city = $_POST['city'];
        $region = $_POST['region'];
        $job = $_POST['JobTitle'];
        $mail = $_POST['mail'];
        $workexperience = $_POST['workexperience'];
        $education = $_POST['education'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if (mysqli_real_escape_string($_SESSION['db'], $lastname) || mysqli_real_escape_string($_SESSION['db'], $surname) ||
         mysqli_real_escape_string($_SESSION['db'], $city) || mysqli_real_escape_string($_SESSION['db'], $region) || mysqli_real_escape_string($_SESSION['db'], $job) ||
         mysqli_real_escape_string($_SESSION['db'], $mail) || mysqli_real_escape_string($_SESSION['db'], $workexperience) || mysqli_real_escape_string($_SESSION['db'], $education) ||
         mysqli_real_escape_string($_SESSION['db'], $password)) {
          echo "error";
          exit();
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost:3000/People',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
              "Surname": "' . $surname . '",
              "Lastname": "' . $lastname . '",
              "City": "' . $city . '",
              "Region": "' . $region . '",
              "JobTitle": "' . $job . '",
              "mail": "' . $mail . '",
              "WorkExperience": "' . $workexperience . '",
              "Education": "' . $education . '",
              "password": "' . $hash . '",
              "admin": 0
          }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
          $response = curl_exec($curl);
          curl_close($curl);
          $data = json_decode($response, true);
    }
?>