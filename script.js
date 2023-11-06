// Script for upload.html stuff
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
// End of script for upload.html stuff











// Login Popup starts here


// So far all it does is pop up and then close. No error messages display and it doesn't seem to point to anywhere so it doesn't really do anything.

// Get references to the login button, login modal, and close button
const loginButton = document.getElementById('loginButton');
const loginModal = document.getElementById('loginModal');
const closeButton = document.getElementById('closeButton');
const loginSubmitButton = document.getElementById('loginSubmit');

// Initialize a variable to track the login state
let isLoggedIn = false;

// Open the login form when the login button is clicked
function showLoginPopup() {
    loginModal.classList.add('active');
}

// Add a function to hide the login popup
function hideLoginPopup() {
    loginModal.classList.remove('active');
}
// Open the login form when the login button is clicked
loginButton.addEventListener('click', function(e) {
    e.preventDefault();
    showLoginPopup(); // Show the login popup    
});

// Close the login form when the close button is clicked
closeButton.addEventListener('click', function() {
    hideLoginPopup(); // Hide the login popup
});

// Close the login form when clicking outside the modal
window.addEventListener('click', function(event) {
  if (event.target === loginModal) {
    hideLoginPopup(); // Hide the login popup
    }
});







// Search Button


// Get references to the search input and search button
const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');

// Add an event listener to the search button
searchButton.addEventListener('click', function() {
    // Get the search query from the input field
    const query = searchInput.value;

    // Perform the search or redirect to the search results page
    // Example: window.location.href = '/search-results?query=' + query;
    console.log('Performing search for query: ' + query);
});

