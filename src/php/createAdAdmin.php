<?php 
    session_start();
    if (isset($_POST['JobTitle']) && isset($_POST['Society']) && isset($_POST['city']) && isset($_POST['postcode']) && isset($_POST['description']) && isset($_POST['missions']) && isset($_POST['remuneration'])) {
        $date = date("Y-m-d");
        $JobTitle = $_POST['JobTitle'];
        $Society = $_POST['Society'];
        $city = $_POST['city'];
        $postcode = $_POST['postcode'];
        $description = $_POST['description'];
        $missions = $_POST['missions'];
        $remuneration = $_POST['remuneration'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:3000/Advertisement',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "Date": "'. $date . '",
            "JobTitle": "'. $JobTitle . '",
            "Society": "'. $Society . '",
            "City": "'. $city . '",
            "PostCode": '. $postcode . ',
            "Description": "'. $description . '",
            "Missions": "'. $missions . '",
            "remuneration": '. $remuneration . '
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
    }
?>