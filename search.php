<?php
include 'header.php';
?>

<div class="content-wrap">
    <div class="column-left">
    <section class="gallery-links">
      <div class="wrapper">
        <div class="gallery-heading">
          <h2>Search Results</h2>
        </div>
        <div class="gallery-container">
          <?php
          include_once 'dbh.inc.php';
          if(isset($_GET["query"])) {
            $search_query = mysqli_real_escape_string($conn, $_GET["query"]);
            $sql = "SELECT * FROM gallery WHERE imageTitle LIKE '%$search_query%' OR hatDESC LIKE '%$search_query%' OR shirtDESC LIKE '%$search_query%' OR ..."; // Add conditions for other description fields
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
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

                echo '</div>
                      </a>';
              }
            } else {
              echo "No results found.";
            }
          } else {
            echo "No search query provided.";
          }
          ?>
        </div>
      </div>
    </div>
    </div>
    </section>
</div>

<?php
include 'footer.php';
?>
