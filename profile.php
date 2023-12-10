<?php
include 'header.php';
require_once 'dbh.inc.php';
?>

<!------------ CONTENT ------------->
<body>
  <div class="content-wrap">
    <div class="column-left">
      <section class="profile-info">
        <?php
          // Check if the user is logged in
          if (isset($_SESSION['userid'])) {
              $userId = $_SESSION['userid'];

              // Fetch user details from the database
              $sql = "SELECT usersName, last_login, login_count, usersUid FROM users WHERE usersId = $userId";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                  $row = mysqli_fetch_assoc($result);
                  $userName = $row['usersName'];
                  $lastLogin = $row['last_login'];
                  $loginCount = $row['login_count'];
                  $uid = $row['usersUid'];
                  // Display user information
                  echo "<section class='profile-info'>";
                  echo "<h2>Welcome to Your Profile, $userName!</h2>";
                  echo "<p>Last Login: $lastLogin</p>";
                  echo "<p>Login Count: $loginCount</p>";

                  // Add a link to download the confidential file
                  echo "<p><a href='company_confidential_file.txt' download>Download Company Confidential File</a></p>";

                  echo "</section>";

                  // Display user's uploads
                  echo "<h3>Your Uploads:</h3>";
                  $sqlUploads = "SELECT * FROM gallery WHERE usersName = $uid ORDER BY orderGallery DESC";
                  $resultUploads = mysqli_query($conn, $sqlUploads);

                  if ($resultUploads) {
                      echo "<div class='gallery-container'>";
                      while ($rowUploads = mysqli_fetch_assoc($resultUploads)) {
                          // Display each image upload
                          echo '<a href="#">
                                  <div style="background-image: url(imgs/'.$rowUploads["imgFullNameGallery"].');"></div>
                                  <div class="item-descriptions">
                                      <h3>'.$rowUploads["imageTitle"].'</h3>
                                      <p>'.$rowUploads["hatDESC"].'</p>
                                      <p>'.$rowUploads["shirtDESC"].'</p>
                                      <p>'.$rowUploads["sweaterDESC"].'</p>
                                      <p>'.$rowUploads["jacketDESC"].'</p>
                                      <p>'.$rowUploads["pantsDESC"].'</p>
                                      <p>'.$rowUploads["shortsDESC"].'</p>
                                      <p>'.$rowUploads["glovesDESC"].'</p>
                                      <p>'.$rowUploads["shoesDESC"].'</p>
                                      <p>'.$rowUploads["socksDESC"].'</p>
                                      <p>'.$rowUploads["accessoryDESC"].'</p>
                                  </div>
                                </a>';
                      }
                      echo "</div>";
                  } else {
                      echo "<p>Error fetching user uploads: " . mysqli_error($conn) . "</p>";
                  }
              } else {
                  echo "<p>Error fetching user information: " . mysqli_error($conn) . "</p>";
              }
          } else {
              // Redirect the user to the login page if not logged in
              header("Location: login.php");
              exit();
          }
        ?>
      </section>
    </div>
  </div>

  <?php
    include 'footer.php';
  ?>
</body>
