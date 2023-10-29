<?php
  include 'header.php';
?>
<!------------ CONTENT ------------->  
  <body>
  <div class="content-wrap">
    <div class="column-left">

    </div>  
  </div>    
    <footer class="footer">
    </footer>
  </body>
  
  
  
  
 <!- insert background ->

  
  

<!DOCTYPE html>
<html>
<head>
<style>
    .custom-button {
        display: block;
        text-align: center;
        cursor: pointer;
        width: 1000px;
        height: 50px;
        margin: 0 auto;
        background-color: #3498db;
        color: #fff;
        padding: 20px;
        font-size: 18px;
        border: 2px solid #2980b9;
        border-radius: 10px;
    }

    .custom-button:hover {
        background-color: #2980b9;
    }

    .custom-button input[type="file"] {
        display: none;
    }

    .image-container {
        text-align: center;
        margin: 0 auto;
        width: 1000px;
        height: 700px;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }

    .tag {
        position: absolute;
        background-color: #ff5733;
        color: #fff;
        padding: 12px;
        border-radius: 10px;
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
        color: #000;
    }
</style>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image_upload" class="custom-button">
        <input type="file" name="image_upload" id="image_upload" style="display: none;" accept="image/*">
        Select an image
    </label>
    <input type="submit" value="Upload Image" style="display: none;">
</form>

<div class="image-container" id="imageContainer"></div>

<script>
    const imageUpload = document.querySelector("#image_upload");
    const buttonLabel = document.querySelector("label[for='image_upload']");
    const imageContainer = document.querySelector("#imageContainer");

    imageUpload.addEventListener("change", function() {
        const selectedFile = this.files[0];
        if (selectedFile) {
            const url = URL.createObjectURL(selectedFile);
            imageContainer.style.backgroundImage = `url(${url})`;
        }
    });

    let isDragging = false;
    let activeTag = null;

    imageContainer.addEventListener("dblclick", function(e) {
        if (e.target === imageContainer) {
            const tag = document.createElement("div");
            tag.className = "tag";
            tag.style.left = `${e.clientX - imageContainer.getBoundingClientRect().left}px`;
            tag.style.top = `${e.clientY - imageContainer.getBoundingClientRect().top}px`;

            tag.innerHTML = `
                <span class="tag-text" contenteditable="true"></span>
                <span class="delete-button" onclick="removeTag(this)">X</span>
            `;
            imageContainer.appendChild(tag);
        }
    });

    imageContainer.addEventListener("mousedown", function(e) {
        if (e.target.classList.contains("tag")) {
            isDragging = true;
            activeTag = e.target;
        }
    });

    imageContainer.addEventListener("mousemove", function(e) {
        if (isDragging && activeTag) {
            const imageRect = imageContainer.getBoundingClientRect();
            activeTag.style.left = `${e.clientX - imageRect.left}px`;
            activeTag.style.top = `${e.clientY - imageRect.top}px`;
        }
    });

    imageContainer.addEventListener("mouseup", function() {
        isDragging = false;
        activeTag = null;
    });

    imageContainer.addEventListener("dblclick", function(e) {
        if (e.target.classList.contains("tag-text")) {
            e.target.contentEditable = "true";
            e.target.focus();
        }
    });

    imageContainer.addEventListener("blur", function(e) {
        if (e.target.classList.contains("tag-text")) {
            e.target.contentEditable = "false";
        }
    });

    function removeTag(deleteButton) {
        const tag = deleteButton.parentElement;
        tag.parentElement.removeChild(tag);
    }
</script>
</body>
</html>




  
</html>
