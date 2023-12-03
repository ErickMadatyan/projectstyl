<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->
  <body>  
  <div class="content-wrap">
    <div class="column-left">
      //last login
<section class="profile-info">
    <h2>Welcome to Your Profile</h2>

    <?php
    // Check if the user is logged in
    if (isset($_SESSION['userid'])) {
        $userId = $_SESSION['userid'];

        // Fetch the last login timestamp from the database
        $sql = "SELECT last_login FROM users WHERE usersId = $userId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $lastLogin = $row['last_login'];

            echo "<p>Last Login: $lastLogin</p>";
        } else {
            echo "<p>Error fetching last login information.</p>";
        }
    } else {
        // Redirect the user to the login page if not logged in
        header("Location: login.php");
        exit();
    }
    ?>

</section>
      //end of last login
    </div>  
  </div>  

<?php
  include 'footer.php';
?>
