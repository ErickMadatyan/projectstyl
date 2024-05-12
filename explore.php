<?php
include 'header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- Style sheet -->
<style>
  /* Your CSS styles for the explore page here */
  .gallery-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }

  .gallery-container .highest-voted,
  .gallery-container .newest-posts {
    width: 48%; /* Adjust the width as needed */
    margin-bottom: 20px;
  }

  .gallery-container a {
    border-radius: 25px;
    border: 2px solid #73AD21;
    flex: 0 0 100%;
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
    width: 100%;
    height: 200px; /* Adjust the height as needed */
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
    font-size: 1.5em; /* Adjust the font size as needed */
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
                echo '<a href="items.php?galleryid='.$row["idGallery"].'">';
                echo '<div class="gallery-image" style="background-image: url(imgs/'.$row["imgFullNameGallery"].');"></div>
                      <div class="item-descriptions">
                        <h3>'.$row["imageTitle"].'</h3>';
                // Check and display each item description
                $items = ["hat", "shirt", "sweater", "jacket", "pants", "shorts", "gloves", "shoes", "socks", "accessory"];
                foreach ($items as $item) {
                  if (!empty($row[$item . "DESC"])) {
                    echo '<p><strong>' . ucfirst($item) . ':</strong> '.$row[$item . "DESC"].'</p>';
                  }
                }
                echo '</div></a>';
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
                echo '<a href="items.php?galleryid='.$row["idGallery"].'">';
                echo '<div class="gallery-image" style="background-image: url(imgs/'.$row["imgFullNameGallery"].');"></div>
                      <div class="item-descriptions">
                        <h3>'.$row["imageTitle"].'</h3>';
                // Check and display each item description
                foreach ($items as $item) {
                  if (!empty($row[$item . "DESC"])) {
                    echo '<p><strong>' . ucfirst($item) . ':</strong> '.$row[$item . "DESC"].'</p>';
                  }
                }
                echo '</div></a>';
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

