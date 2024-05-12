<?php
include 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- Style sheet -->
 <style>
      .greeting {
    text-align: center;
    font-size: 1.5em; /* Adjust the font size as needed */
    color: #007BFF; /* Adjust the color as needed */
    padding-left: 200px;
  }
      .gallery-heading {
    text-align: center;
    margin-bottom: 20px; /* You can adjust this margin as needed */
    font-siz
  }
      .gallery-heading h2 {
    font-size: 2.5em; /* Adjust the font size as needed */
    font-family: 'Your_Nice_Font', sans-serif; /* Replace 'Your_Nice_Font' with the desired font */
    color: #007BFF; /* Adjust the color as needed */
  }
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
      flex: 0 0 32%;
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

    .gallery-container a .gallery-image {
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

<div class="content-wrap">
    <div class="column-left">
        <section class="gallery-links">
            <div class="wrapper">
                <div class="gallery-heading">
                    <h2>Explore</h2>
                </div>
                <div class="gallery-container">
                    <!-- Display highest voted posts -->
                    <div class="highest-voted">
                        <h3>Highest Voted</h3>
                        <?php
                        include_once 'dbh.inc.php';
                        $highest_voted_sql = "SELECT * FROM gallery ORDER BY votes DESC LIMIT 5"; // Assuming you want to display top 5 highest voted posts
                        $highest_voted_result = mysqli_query($conn, $highest_voted_sql);
                        if (mysqli_num_rows($highest_voted_result) > 0) {
                            while ($row = mysqli_fetch_assoc($highest_voted_result)) {
                                // Display highest voted posts using HTML structure similar to index.php
                            }
                        } else {
                            echo "<p>No highest voted posts found.</p>";
                        }
                        ?>
                    </div>

                    <!-- Display newest posts -->
                    <div class="newest-posts">
                        <h3>Newest Posts</h3>
                        <?php
                        $newest_posts_sql = "SELECT * FROM gallery ORDER BY idGallery DESC LIMIT 5"; // Assuming you want to display top 5 newest posts
                        $newest_posts_result = mysqli_query($conn, $newest_posts_sql);
                        if (mysqli_num_rows($newest_posts_result) > 0) {
                            while ($row = mysqli_fetch_assoc($newest_posts_result)) {
                                // Display newest posts using HTML structure similar to index.php
                            }
                        } else {
                            echo "<p>No newest posts found.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
include 'footer.php';
?>
