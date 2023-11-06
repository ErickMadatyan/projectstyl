<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->  


 <!-------- insert background -------->

<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image_upload" class="custom-button">
        <input type="file" name="image_upload" id="image_upload" style="display: none;" accept="image/*">
        Select an image
    </label>
    <input type="submit" value="Upload Image" style="display: none;">
</form>

    <div class="container">
      <div class="image-container" id="imageContainer"></div>
      <div class="sidebar" id="sidebar">
        <h3>Sidebar</h3>
        <div id="sidebar-items">
          <!-- Items and links will be dynamically added here -->
        </div>
        <button class="add-item-button" id="addItemButton">Add Item</button>
        <button class="upload-button" id="uploadButton">Upload Data</button>
      </div>
    </div>


      <footer class="footer">    
      <div>
        <h4>Questions? Email us!</h4>
      </div>
        <div class="contact-info">
          <div>
            <a href="project.styl.inc@gmail.com"><i class="fa-solid fa-envelope"></i></a><a href="project.styl.inc@gmail.com">project.styl.inc@gmail.com</a><a href="project.styl.inc@gmail.com"><i class="fa-solid fa-envelope"></i></a>
          </div>
        </div>
    </footer>
</body>
  <script src="script.js">// Script for upload.html stuff
   const imageUpload = document.querySelector("#image_upload");
    const buttonLabel = document.querySelector("label[for='image_upload']");
    const imageContainer = document.querySelector("#imageContainer");
    const sidebarItems = document.getElementById("sidebar-items");
    const addItemButton = document.getElementById("addItemButton");
    const uploadButton = document.getElementById("uploadButton");
    let itemCount = 1;
    
        function removeItem(removeButton) {
      const item = removeButton.parentElement;
      const itemName = item.querySelector('input[type="text"]').value;
      removeFloatingDescription(itemName);
      sidebarItems.removeChild(item);
    }

    // Function to remove the floating description
    function removeFloatingDescription(itemName) {
      const floatingDescriptions = document.querySelectorAll('.tag');
      for (const tag of floatingDescriptions) {
        const tagText = tag.querySelector('.tag-text').textContent;
        if (tagText === itemName) {
          tag.parentElement.removeChild(tag);
        }
      }
    }


        addItemButton.addEventListener("click", function (e) {
      const newItemDiv = document.createElement("div");
      newItemDiv.className = "sidebar-item";
      newItemDiv.innerHTML = `
        <input type="text" placeholder="Item ${itemCount}">
        <input type="text" placeholder="Link ${itemCount}">
        <button class="remove-item-button" onclick="removeItem(this)">X</button>
      `;
      sidebarItems.appendChild(newItemDiv);
      itemCount++;
    });

    imageUpload.addEventListener("change", function () {
      const selectedFile = this.files[0];
      if (selectedFile) {
        const url = URL.createObjectURL(selectedFile);
        imageContainer.style.backgroundImage = `url(${url})`;
      }
    });

    addItemButton.addEventListener("click", function (e) {
      const itemName = e.target.parentElement.querySelector('input[type="text"]').value;
      const tag = document.createElement("div");
      tag.className = "tag";
      tag.style.left = `${e.clientX - imageContainer.getBoundingClientRect().left}px`;
      tag.style.top = `${e.clientY - imageContainer.getBoundingClientRect().top}px`;

      tag.innerHTML = `
        <span>Description:</span>
        <span class="tag-text" contenteditable="true">${itemName}</span>
      `;
      imageContainer.appendChild(tag);

            let isDragging = false;
            let offsetX, offsetY;

            tag.addEventListener("mousedown", function(e) {
                isDragging = true;
                offsetX = e.clientX - tag.getBoundingClientRect().left;
                offsetY = e.clientY - tag.getBoundingClientRect().top;
            });

            document.addEventListener("mousemove", function(e) {
                if (isDragging) {
                    const imageRect = imageContainer.getBoundingClientRect();
                    let left = e.clientX - imageRect.left - offsetX;
                    let top = e.clientY - imageRect.top - offsetY;

                    // Ensure the tag stays within the image container
                    left = Math.min(imageRect.width - tag.offsetWidth, Math.max(0, left));
                    top = Math.min(imageRect.height - tag.offsetHeight, Math.max(0, top));

                    tag.style.left = left + "px";
                    tag.style.top = top + "px";
                }
            });

            document.addEventListener("mouseup", function() {
                isDragging = false;
            });
        
    });

    function removeTag(deleteButton) {
        const tag = deleteButton.parentElement;
        tag.parentElement.removeChild(tag);
    }

    uploadButton.addEventListener("click", function() {
        // Handle data upload here
        // You can access the item names, links, and other information from the sidebar
    });
// End of script for upload.html stuff</script>
</html>
