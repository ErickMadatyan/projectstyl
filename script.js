// Script for upload.html stuff
const imageUpload = document.querySelector("#image_upload");
const buttonLabel = document.querySelector("label[for='image_upload']");
const imageContainer = document.querySelector("#imageContainer");
const sidebarItems = document.getElementById("sidebar-items");
const addItemButton = document.getElementById("addItemButton");
const uploadButton = document.getElementById("uploadButton");
let itemCount = 1;

imageUpload.addEventListener("change", function () {
  const selectedFile = this.files[0];
  if (selectedFile) {
    const url = URL.createObjectURL(selectedFile);
    imageContainer.style.backgroundImage = `url(${url})`;
  }
});

addItemButton.addEventListener("click", function (e) {
    // Create a new dropdown select element
    const clothingDropdown = document.createElement("select");
    clothingDropdown.innerHTML = `
        <option value="" disabled selected>Select Item</option>
        <option value="Hat">Hat</option>
        <option value="Shirt">Shirt</option>
        <option value="Sweater">Sweater</option>
        <option value="Jacket">Jacket</option>
        <option value="Pants">Pants</option>
        <option value="Shorts">Shorts</option>
        <option value="Gloves">Gloves</option>
        <option value="Shoes">Shoes</option>
        <option value="Socks">Socks</option>
        <option value="Accessory">Accessory</option>
    `;
  
    // Create a new item div
    const newItemDiv = document.createElement("div");
    newItemDiv.className = "sidebar-item";
    newItemDiv.innerHTML = `
        ${clothingDropdown.outerHTML}
        <input type="text" class="description-input" placeholder="Link ${itemCount}">
        <button class="remove-item-button" onclick="removeItem(this)">X</button>
    `;
    sidebarItems.appendChild(newItemDiv);
    itemCount++;
  
    // Associate the selected item with the newItemDiv
    newItemDiv.addEventListener("change", function () {
        newItemDiv.selectedItem = newItemDiv.querySelector("select").value;
        updateFloatingTag(newItemDiv);
    });
  
  
    // Event listener for updating the floating tag with the selected item from the dropdown
    clothingDropdown.addEventListener("change", function () {
        const selectedClothing = clothingDropdown.value;
        // Associate the selected item with the corresponding newItemDiv
        newItemDiv.selectedItem = selectedClothing;
        updateFloatingTag(newItemDiv);
    });
  




    // Create a new floating description tag
    const tag = document.createElement("div");
    tag.className = "tag";
    tag.style.left = `${imageContainer.clientWidth / 2}px`; // Adjust as needed
    tag.style.top = `${imageContainer.clientHeight / 2}px`; // Adjust as needed

    tag.innerHTML = `
        <span>Item:</span>
        <span class="tag-text"></span>
    `;
    imageContainer.appendChild(tag);

    // Attach the tag to the newItemDiv for reference
    newItemDiv.tag = tag;

    // Add event listeners for dragging the tag
    let isDragging = false;
    let offsetX, offsetY;

    tag.addEventListener("mousedown", function (e) {
        isDragging = true;
        offsetX = e.clientX - tag.getBoundingClientRect().left;
        offsetY = e.clientY - tag.getBoundingClientRect().top;
    });

    document.addEventListener("mousemove", function (e) {
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

    document.addEventListener("mouseup", function () {
        isDragging = false;
    });
})

  // Function to update the floating tag based on the selected item in the newItemDiv
function updateFloatingTag(itemDiv) {
    const tag = itemDiv.tag;
    if (tag) {
        const selectedItem = itemDiv.selectedItem;
        tag.querySelector('.tag-text').textContent = selectedItem;
    }
}

// Modified removeItem function to remove both sidebar item and its associated floating tag
function removeItem(removeButton) {
    const item = removeButton.parentElement;
    const tag = item.tag;

    // Remove the corresponding floating tag
    if (tag) {
        tag.parentElement.removeChild(tag);
    }

    // Remove the sidebar item
    sidebarItems.removeChild(item);
}


function removeFloatingDescription(itemName) {
    const floatingDescriptions = document.querySelectorAll('.tag');
    for (const tag of floatingDescriptions) {
        const tagText = tag.querySelector('.tag-text').textContent;
        if (tagText === itemName) {
            tag.parentElement.removeChild(tag);
        }
    }
}


uploadButton.addEventListener("click", function () {
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

