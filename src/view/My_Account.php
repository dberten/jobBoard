<?php
  session_start();
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost:3000/People/" . $_SESSION['id'],
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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>My Account</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/job_cards.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
  <header>
    <nav class="navigation center">
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
        </ul>
      </div>
    </nav>
  </header>
  <div class= "div1"></div>
  <div class= "myPage">
    <form>
      <table id= "myPageContent" class="centered">
          <tbody>
              <tr>
                <td colspan="2">
                  <h2 id="title_info" class="title" style="text-align: center;">Mes coordonnées</h2>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="lname_label" class="title">Nom</h4>
                </td>
                <td>
                  <input type="text" name="user_lname" class="MyContentForm" id='lastname' value=<?php echo $data['Lastname'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="fname_label" class="title">Prénom</h4>
                </td>
                <td>
                  <input type="text" name="user_fname" class="MyContentForm" id='surname' value=<?php echo $data['Surname'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="mail_label" class="title">Mail</h4>
                </td>
                <td>
                  <input type="email" name="user_mail" class="MyContentForm" id='mail' value=<?php echo $data['mail'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="city_label" class="title">Ville</h4>
                </td>
                <td>
                  <input type="text" name="user_city" class="MyContentForm" id='city' value=<?php echo empty($data['City']) ? "*" : $data['City'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="region_label" class="title">Région</h4>
                </td>
                <td>
                  <input type="text" name="user_region" class="MyContentForm" id='region' value=<?php echo empty($data['Region']) ? "*" : $data['Region'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="job_label" class="title">Poste actuel</h4>
                </td>
                <td>
                  <input type="text" name="user_job" class="MyContentForm" id ='jobTitle' value=<?php echo empty($data['JobTitle']) ? "*" : $data['JobTitle'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="qualifications_label" class="title">Dîplomes</h4>
                </td>
                <td>
                  <input type="text" name="user_qualifications" class="MyContentForm" id='education' value=<?php echo empty($data['Education']) ? "*" : $data['Education'];?> required>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="xp_label" class="title">Expériences professionnelles</h4>
                </td>
                <td>
                  <input type="text" name="user_xp" class="MyContentForm" id='workexperience' value=<?php echo empty($data['WorkExperience']) ? "*" : $data['WorkExperience'];?> required>
                </td>
              </tr>
              <tr>
              <tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td>
                  <h4 id="password_label" class="title">Mot de passe</h4>
                </td>
                <td>
                  <input type="password" name="user_password" class="MyContentForm" id='password' required>
                </td>
              </tr>
                <td colspan="2">
                    <hr>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="submit" class="submitButton" value="Modifier mes informations" style="text-align: center;">
                </td>
              </tr>
          </tbody>
      </table>
      <script type="text/javascript">
        $('form').submit(function(e) {
            var lastname = $("#lastname").val();
            var surname = $("#surname").val();
            var mail = $("#mail").val();
            var city= $("#city").val();
            var region = $("#region").val();
            var jobTitle = $("#jobTitle").val();
            var education = $("#education").val();
            var workexperience = $("#workexperience").val();
            var pass = $("#password").val();
            e.preventDefault()
                $.ajax({
                    url: "../php/update_account.php",
                    data: $('form').serialize(),
                    type: "POST",
                    data: {
                        surname: surname,
                        lastname: lastname,
                        city: city,
                        region: region,
                        jobTitle: jobTitle,
                        mail: mail,
                        workexperience: workexperience,
                        education: education,
                        password: pass
                    },
                    success: function(response) {
                        location.href = "../view/Job_Board.php"
                    },
                    error: function(response) {
                        alert("The request failed.")
                    }
                })
        })
        </script>
    </form>
  </div>
</body>
</html>