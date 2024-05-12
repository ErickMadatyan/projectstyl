<?php
include 'header.php';
?>

<div class="explore-container">
    <div class="explore-section">
        <h2>Highest Voted</h2>
        <div class="post-list">
            <?php
            // Fetch posts sorted by highest votes
            $sqlHighestVotes = "SELECT * FROM gallery ORDER BY votes DESC LIMIT 5"; // Change the limit as needed
            $resultHighestVotes = mysqli_query($conn, $sqlHighestVotes);
            if (mysqli_num_rows($resultHighestVotes) > 0) {
                while ($row = mysqli_fetch_assoc($resultHighestVotes)) {
                    // Display each post
                    echo '<div class="post-item">';
                    echo '<h3>' . $row['imageTitle'] . '</h3>';
                    echo '<p>Votes: ' . $row['votes'] . '</p>';
                    // Display additional details or thumbnails if needed
                    echo '</div>';
                }
            } else {
                echo '<p>No posts found.</p>';
            }
            ?>
        </div>
    </div>
    <div class="explore-section">
        <h2>New Posts</h2>
        <div class="post-list">
            <?php
            // Fetch new posts sorted by date
            $sqlNewPosts = "SELECT * FROM gallery ORDER BY uploadDate DESC LIMIT 5"; // Change the limit as needed
            $resultNewPosts = mysqli_query($conn, $sqlNewPosts);
            if (mysqli_num_rows($resultNewPosts) > 0) {
                while ($row = mysqli_fetch_assoc($resultNewPosts)) {
                    // Display each post
                    echo '<div class="post-item">';
                    echo '<h3>' . $row['imageTitle'] . '</h3>';
                    echo '<p>Uploaded on: ' . $row['uploadDate'] . '</p>';
                    // Display additional details or thumbnails if needed
                    echo '</div>';
                }
            } else {
                echo '<p>No posts found.</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
