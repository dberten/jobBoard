<?php
  session_start();
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:3000/Advertisement/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  $data = json_decode($response, true);
  function get_info_ad() {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:3000/Advertisement/',
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
    return $response;
  }
  function get_info_user() {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:3000/People/' + $_SESSION['id'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/job_cards.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <header>
    <nav class="navigation centered">
      <div class="logo">
        <a href="#" title="logo"><img src="img/***.png" title="logo"></a>
      </div>
      <div class="menu">
        <ul>
        <li><a href="Job_Board.php">Lancer la recherche</a></li>
        <li><a href="logout.php"> Deconnexion</a></li>
        </ul>
      </div>
      <div class="menuLite">
        <ul>
          <li><a href="Job_Board.php"><i class="fas fa-search"></i></a></li>
          <li><a href="logout.php"><i class="fab fa-invision"></i></a></li>
          <li><a href="#"><i class="far fa-plus-square"></i></a></li>
        </ul>
      </div>
      <div class="account">
        <i class="fas fa-user-alt"></i><a href="My_Account.php">Mon compte</a>
      </div>
      <div class="accountLite">
        <a href="My_Account.php"><i class="fas fa-user-alt"></i></a>
      </div>
    </nav>
  </header>
  <div id= "div2" class= "div2">
  </div>
  <div id= "div3" class= "div3">
  </div>
  <table id= "jobsearch_nav">
    <tbody id= "searchContent">
      <tr>
        <td></td>
      </tr>
    </tbody>
  </table>
  <table id="resultsBody">
    <tbody id="resultsBodyContent">
      <tr>
        <td id= "resultsCol">
          <?php
            $idTab = array();
            foreach ($data as $field) {
              array_push($idTab, $field['id']);
              echo '<div class= "slider_container">
              <div class= "slider_item">
                <table class="jobCard_mainContent">
                  <tbody>
                    <tr>
                      <td>
                        <div>
                          <H2 class= "job_Title">'. $field['JobTitle']. '</H2>
                        </div>
                        <div>
                          <span class= "companyName">'. $field['Society']. '</span></br>
                          <span class= "companyLocation">'. $field['City']. '</span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="learn_More_Button">
                  <tbody>
                    <tr>
                      <td>
                        <div>
                          <button id= "learnMoreButton" class="button_styled_' . $field['id'] . '">Details</button>
                          <button id= "applyButton" class="applyButton_styled_' . $field['id'] . '">Candidater</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="jobCard_sideContent">
                  <tbody>
                    <tr>
                      <td>
                        <div>
                          <H2 class= "remuneration">'. $field['remuneration']. '€'. '</H2>
                        </div>
                        <div>
                          <span class= "short_Description">'. $field['Description']. '</span></br>
                        </div>
                      </td>
                    </tr>
                  </tbody>  
                </table>
              </div>
            </div>';
            }
          ?>
        </td>
        <td width= 10rem></td>
        <td id= "sidebar"></td>
      </tr>
    </tbody>
</body>
<script type="text/javascript">
  var tabId = <?php echo json_encode($idTab);?>;
  var user = JSON.parse(<?php echo json_encode(get_info_user()) ?>);
  var learnMore = document.getElementById("div2");
  var apply = document.getElementById("div3");
  var obj = JSON.parse(<?php echo json_encode(get_info_ad()) ?>);
  for (let i = 0; i < obj.length; i++) {
    $(".applyButton_styled_" + tabId[i]).click(function () {
      console.log(tabId[i]);
      $(".div3").toggle();
      apply.innerHTML = "<table class='applicationCard'>" +
      "<tr>" +
        "<td class='totheright'>" +
          "<button id='applycloseButton' class='applycloseButton_" + tabId[i] + "'>X</button>" +
        "</td>" +
      "</tr>" +
      "<tr>" +
        "<td class= 'tdApplication1'>" +
          "<form method='post' action='../php/jobApplication.php?idAd=" + tabId[i] + "'>" +
            "<fieldset><legend>Application</legend>" +
              "<div>" +
                  "<label for='name'>Nom:</label><br>" +
                  "<input type='text' name='name' id='name' value='" + user.Lastname + "' required>" +
              "</div>" +
              "<div>" +
                  "<label for='firstname'>Prénom:</label><br>" +
                  "<input type='text' name='firstname' id='firstname' value='" + user.Surname + "' required>" +
              "</div>" +
              "<div>" +
                  "<label for='mail'>e-mail:</label><br>" +
                  "<input type='email' name='mail' id='mail' value='" + user.mail + "' required>" +
              "</div>" +
              "<div>" +
                "<label for='msg'>Message:</label><br>" +
                "<textarea name='msg' id='msg' required>" + "</textarea>" +
            "</div>" +
            "<div>" +
                "<input type='submit' class='submitButton' value='Candidater'>" +
            "</div>" +
            "</fieldset>" +
          "</form>" +
        "</td>" +
      "</tr>" +
    "</table>";
    })
    $(".button_styled_" + tabId[i]).click(function () {
      $(".div2").toggle();
      learnMore.innerHTML = "<table class='learnMoreInfos'>" +
      "<tr>" +
        "<td class='totheright'>" +
          "<button id='learnMoreCloseButton' class='learnMoreCloseButton_" + tabId[i] + "'>X</button>" +
        "</td>" +
      "</tr>" +
      "<tr>" +
        "<td class= 'tdlearnM1'>" +
          "<H2 class= 'job_Title'>" + obj[i].JobTitle + "</H2>" +
          "<span class= 'companyName'>" + obj[i].Society + "</span></br>" +
          "<span class= 'companyLocation'>" + obj[i].City + "</span>" +
        "</td>" +
      "</tr>" +
      "<tr>" +
        "<td class='tdlearnM2'>" +
          "<H2 class= 'contractType'>Type de contrat</H2>"  +
        "</td>" +
      "</tr>" +
      "<tr>" +
        "<td class= 'tdlearnM3'>" +
          "<span class= 'companyDescription'>" + obj[i].Description + "</span></br>" +
          "<span class= 'JobDescription'>" + obj[i].Missions + "</span>" +
        "</td>" +
      "</tr>" +
      "<tr>" +
        "<td class='applyButtonBox'>" +
          "<button id='applyButton2' class='applyButton_styled2_" + tabId[i] + "' type='button'>Apply</button>" +
        "</td>" +
      "</tr>" +
    "</table>";
    })
    $("#applyButton2_" + tabId[i]).click(function () {
      $(".div3").toggle();
    })
    $(".learnMoreCloseButton_" + tabId[i]).click(function () {
      $(".div2").hide();
    })
    $(".applycloseButton_" + tabId[i]).click(function () {
      $(".div3").hide();
    })
  }
</script>
</html>