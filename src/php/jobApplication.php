<?php 
    session_start();
    if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['msg'])) {
        $lastname = $_POST['name'];
        $surname = $_POST['firstname'];
        $mail = $_POST['mail'];
        $msg = $_POST['msg'];
        $idAd = $_GET['idAd'];
        $idPeople = $_SESSION['id'];
        $date = date("Y-m-d");
        var_dump($date . " " . $idAd . " " . $idPeople . " " . $mail . " " . $msg);
        if (mysqli_real_escape_string($_SESSION['db'], $lastname) || mysqli_real_escape_string($_SESSION['db'], $surname) ||
         mysqli_real_escape_string($_SESSION['db'], $msg) || mysqli_real_escape_string($_SESSION['db'], $mail)) {
          echo "error";
          exit();
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3000/JobApplication/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "date": "'. $date .'",
            "idAd": '. $idAd .',
            "idPeople": '. $idPeople .',
            "mails": "'. $mail .'",
            "msg": "'. $msg .'"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Cookie: connect.sid=s%3AT2-MeIOG27X-a30x8gvDoxofnp7_2x0S.htua8THOsvshk3ys5Eizlgh21AH8Gb%2FMtINscEyJkSg'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        header('Location: ../view/Job_Board.php');
    }
?>
