<?php
include 'etest.php';
require_once 'dbh.inc.php';
?>

<style>
  body {
    font-family: 'Open Sans', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .gallery-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }

  .gallery-container a {
    border-radius: 25px;
    border: 2px solid #73AD21;
    flex: 0 0 48%;
    margin-bottom: 20px;
    text-decoration: none;
    display: flex;
    flex-direction: row;
    border: 1px solid #ddd;
    transition: transform 0.3s ease-in-out;
    overflow: hidden;
  }

  .gallery-container a:hover {
    transform: scale(1.05);
  }

  .gallery-container a div {
    width: 60%;
    height: 500px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #99ccff;
  }

  .gallery-container a .item-descriptions {
    width: 40%;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    overflow: auto;
    color: #333;
    background-color: #99ccff;
  }

  .gallery-container a h3 {
    font-size: 1.8em;
    margin-top: 0;
    margin-bottom: 10px;
    color: #007BFF;
  }

  .gallery-container a p {
    margin: 5px 0;
    font-size: 1em;
    line-height: 1.4;
  }
</style>

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

                  echo "</section>";

                  // Display user's uploads
                  echo "<h3>Your Uploads:</h3>";



                  $sqlUploads = "SELECT * FROM gallery WHERE usersName = ? ORDER BY orderGallery DESC";
                  $stmt = mysqli_prepare($conn, $sqlUploads);
                  mysqli_stmt_bind_param($stmt, "s", $uid);
                  mysqli_stmt_execute($stmt);
                  $resultUploads = mysqli_stmt_get_result($stmt);

                  if ($resultUploads) {
                      echo "<div class='gallery-container'>";
                      while ($rowUploads = mysqli_fetch_assoc($resultUploads)) {
    // Display each image upload
    echo '<a href="#">
            <div style="background-image: url(imgs/'.$rowUploads["imgFullNameGallery"].');"></div>
            <div class="item-descriptions">
                <h3>'.$rowUploads["imageTitle"].'</h3>';

    // Display each description if not empty or null for each item
    $items = ["hat", "shirt", "sweater", "jacket", "pants", "shorts", "gloves", "shoes", "socks", "accessory"];
    foreach ($items as $item) {
        if (!empty($rowUploads[$item . "DESC"]) && $rowUploads[$item . "DESC"] !== null) {
            echo '<p><strong>' . ucfirst($item) . ':</strong> ' . $rowUploads[$item . "DESC"] . '</p>';
        }
    }

    echo '</div>
            </a>';
                        
}
                      echo "</div>";
                                      echo "</div></div>";
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

      <?php
        include 'footerv2.php';
      ?>
    </div>
  </div>
</body>
