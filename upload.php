<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="https://glitch.com/favicon.ico" />
    <title>Outfit Creator</title>
    <link rel="stylesheet" href="/style.css" />
    <script src="https://kit.fontawesome.com/86af3d0397.js" crossorigin="anonymous"></script> <!-- fontawesome -->
  </head>
  
<!------------ Top Navigation ------------->   
<header>
  <div class="topnav">
    <div class="left">
      <a href="#"><img src="https://cdn.glitch.global/4ac967db-08b7-4f2f-9f47-431c462bd179/logo2.png?v=1697079907040" alt="Logo" width="200px">             </a>
    </div>
    <div class="center">
          <h1>
        Outfit Creator
      </h1>
          </div>
                <div class="right">
        <a href="#" id="loginButton"></a>
      </div>

  </div>
<style>
 .custom-button {
  display: block;
  text-align: center;
  cursor: pointer;
  width: 200px;
  margin: 0 auto;
  background-color: #3498db;
  color: #ffffff;
  padding: 10px;
  font-size: 14px;
  border: 2px solid #2980b9;
  border-radius: 10px;
}

.custom-button:hover {
  background-color: #2980b9;
}

.custom-button input[type="file"] {
  display: none;
}

.container {
  display: flex;
  width: 800px;
  margin: 0 auto;
}

.image-container { 
  display: flex;
  align-items: center;
  text-align: center;
  width: 600px; /* Adjust the width to your preference */
  height: 600px;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  border: 2px solid #cccccc;
  margin-left: 150px; /* Shift it 100 pixels to the right */
  float: left; /* Added float property */
}

.sidebar {
  width: 200px;
  height: 100%;
  background-color: #f0f0f0;
  float: right;
  padding-left: 100px;
  padding: 10px;
}

.tag {
  position: absolute;
  background-color: white;
  color: #000000;
  padding: 12px;
  border-radius: 10px;
  border: 2px solid gray;
  font-size: 14px;
  cursor: move;
  display: flex;
  justify-content: space-between;
}

.tag .tag-text {
  flex-grow: 1;
  min-width: 50px;

}

.tag .tag-text[contenteditable="true"] {
  background: transparent;
  border: none;
  color: #000000;

}

.sidebar-item {
  margin-bottom: 10px;
}

.add-item-button {
  display: block;
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}

.upload-button {
  display: block;
  background-color: #3498db;
  color: white;
  border: none;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
}   
  </style>
<!------------ Side Navigation -------------> 
    <div class="sidenavcontent">
      <div class="sidenav">
          <a href="index.html" class="nav-link">
            <div class="nav-box">
                <span>Home</span>
            </div></a>
          <a href="explore.html" class="nav-link">
            <div class="nav-box">
                <span>Explore</span>
            </div></a>
                  <a href="upload.html" class="nav-link">
            <div class="nav-box">
                <span>Create Outfit</span>
            </div></a>
                  <a href="profile.html" class="nav-link">
            <div class="nav-box">
                <span>Your Profile</span>
            </div></a>
        
        <div class="bottom-link">  
          <a href="about.html">About Us</a>
          <a href="tos.html">Terms of Service</a>
          
          <div class ="center">
             <p>Copyright PROJECT STYL</p>
          </div>
        </div>        
      </div>
    </div>
     
  </header>
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
