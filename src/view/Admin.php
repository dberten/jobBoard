<?php 
  function getUsers() {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:3000/People',
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
    return json_decode($response, true);
  }
  function getAd() {
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
    return json_decode($response, true);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/job_cards.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body style="background: rgb(220, 220, 220);">
  <header>
    <nav class="navigation centered">
      <div class="logo">
        <a href="#" title="logo"><img src="img/***.png" title="logo"></a>
      </div>
      <a href="#" class= "active" >PAGE ADMIN</a>
    </nav>
  </header>
  <div class= "div1"></div>
  <div class= "myAdmin">
      <table id= "myPageAdmin" class="centered">
        <thead>
          <tr>
            <th colspan="11">Users table</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>id</th>
            <th>surname</th>
            <th>lastname</th>
            <th>city</th>
            <th>region</th>
            <th>job_title</th>
            <th>mail</th>
            <th>work_experience</th>
            <th>education</th>
            <th>Action</th>
          </tr>
            <?php
              $idTabUser = array();
              foreach (getUsers() as $user) {
                array_push($idTabUser, $user['id']);
              echo '
              <tr>
              <form class="myAdmin">
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['id']. '">
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['Surname']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['Lastname']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['City']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['Region']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['JobTitle']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['mail']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['WorkExperience']. '" required>
                </td>
                <td colspan="1">
                  <input type="text" name="user_xp" class="MyContentForm" value="'. $user['Education']. '" required>
                </td>
                <td colspan="1">
                  <input type="submit" id="modifyUser_"' . $user['id'] . ' class="submitButton" value="Modify" style="text-align: center;"></input>
                  <input type="submit" id="deleteUser_"' . $user['id'] . ' class="deleteButton" value="Delete" style="text-align: center;"></input>
                </td>
              </form>
              </tr>';
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
            <th>surname</th>
            <th>lastname</th>
            <th>city</th>
            <th>region</th>
            <th>job_title</th>
            <th>mail</th>
            <th>work_experience</th>
            <th>education</th>
            <th>password</th>
            <th>Action</th>
          </tr>
          <tr>
            <form class="myAdmin" id="createUser">
              <td colspan="1">
              <input id='surname' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='lastname' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='city' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='region' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='JobTitle' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='mail' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='workexperience' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='education' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='password' type="password" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input type="submit" class="createButton" value="Create" style="text-align: center;"></input>
            </td>
          </form>
        </tr>
      </tfoot>
    </table>
  </div><br />
  <div class= "myAdmin">
      <table id= "myPageAdmin" class="centered">
        <thead>
          <tr>
            <th colspan="9">Advertisement</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>id</th>
            <th>date</th>
            <th>Job Title</th>
            <th>Society</th>
            <th>City</th>
            <th>Post Code</th>
            <th>Description</th>
            <th>Missions</th>
            <th>Remuneration</th>
            <th>Action</th>
          </tr>
          <?php
            foreach (getAd() as $ad) {
              echo '
          <tr>
            <form class= "adminForm">
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['id']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['Date']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['JobTitle']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['Society']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['City']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['PostCode']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['Description']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['Missions']. '">
            </td>
            <td colspan="1">
              <input type="text" name="user_xp" class="MyContentForm" value="'. $ad['remuneration']. '">
            </td>
            <td colspan="1">
              <input type="submit" class="submitButton" value="Modify" style="text-align: center;"></input>
              <input type="submit" class="deleteButton" value="Delete" style="text-align: center;"></input>
            </td>
            </form>
          </tr>';
            }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Job Title</th>
            <th>Society</th>
            <th>City</th>
            <th>Post Code</th>
            <th>Description</th>
            <th>Missions</th>
            <th>Remuneration</th>
            <th>Action</th>
          </tr>
          <tr>
            <form class= "adminForm" id="createAd">
            <td colspan="1">
              <input id='jobtitle' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='Society' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='City' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='postcode' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='description' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='missions' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input id='remuneration' type="text" name="user_xp" class="MyContentForm" value="" required>
            </td>
            <td colspan="1">
              <input type="submit" class="createButton" value="Create" style="text-align: center;"></input>
            </td>
            </form>
            </tr>
          </tfoot>
      </table>
  </div>
</body>
<script type="text/javascript">
  $('#createUser').submit(function(e) {
    var surname = $('#surname').val();
    var lastname = $('#lastname').val();
    var city = $('#city').val();
    var region = $('#region').val();
    var mail = $('#mail').val();
    var JobTitle = $('#JobTitle').val();
    var workexperience = $('#workexperience').val();
    var education = $('#education').val();
    var password = $('#password').val();
    e.preventDefault()
    $.ajax({
        url: "../php/createUserAdmin.php",
        data: $('#createUser').serialize(),
        type: 'POST',
        data: {
          surname: surname,
          lastname: lastname,
          city: city,
          region: region,
          JobTitle: JobTitle,
          mail: mail,
          workexperience: workexperience,
          education: education,
          password: password
      },
      success: function(response) {
        alert("User created successfully.");
      },
      error: function(response) {
          alert("The request failed.")
      }
    });
  });
  $('#createAd').submit(function(e) {
    var JobTitle = $('#jobtitle').val();
    var Society = $('#Society').val();
    var city = $('#City').val();
    var postcode = $('#postcode').val();
    var description = $('#description').val();
    var missions = $('#missions').val();
    var remuneration = $('#remuneration').val();
    e.preventDefault()
    $.ajax ({
      url: "../php/createAdAdmin.php",
      data: $('#createAd').serialize(),
      type: 'POST',
      data: {
        JobTitle: JobTitle,
        Society: Society,
        city: city,
        postcode: postcode,
        description: description,
        missions: missions,
        remuneration: remuneration
      },
      success: function(response) {
          alert("advertisement created successfully.");
      },
      error: function(response) {
          alert("advertisement created successfully.");
      }
    });
  });
</script>
</html>