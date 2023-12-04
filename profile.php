<?php
  include 'header.php';
  require_once 'dbh.inc.php';
?>
<!------------ CONTENT ------------->
  <body>  
  <div class="content-wrap">
    <div class="column-left">
<section class="profile-info">
    <h2>Welcome to Your Profile</h2>

    <?php
// Check if the user is logged in
if (isset($_SESSION['userid'])) {
    $userId = $_SESSION['userid'];

    // Fetch user details from the database
    $sql = "SELECT usersName, last_login, login_count FROM users WHERE usersId = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $userName = $row['usersName'];
        $lastLogin = $row['last_login'];
        $loginCount = $row['login_count'];

        // Display user information
        echo "<section class='profile-info'>";
        echo "<h2>Welcome to Your Profile, $userName!</h2>";
        echo "<p>Last Login: $lastLogin</p>";
        echo "<p>Login Count: $loginCount</p>";
        echo "</section>";
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
