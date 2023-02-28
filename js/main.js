// Get the cart button element
var cartButton = document.getElementById('cart-button');

// Add a click event listener to the cart button
cartButton.addEventListener('click', function() {
  // Perform the action when the button is clicked
  console.log('Add to cart button clicked!');
});

// Get the profile button element
var profileButton = document.getElementById('profile-button');

// Add a click event listener to the profile button
profileButton.addEventListener('click', function() {
  // Perform the action when the button is clicked
  console.log('Profile button clicked!');
});

// Get the logout button element
var logoutButton = document.getElementById('logout-button');

// Add a click event listener to the logout button
logoutButton.addEventListener('click', function() {
  // Perform the action when the button is clicked
  console.log('Logout button clicked!');
});

// Get the contact form element
var contactForm = document.getElementById('contact-form');

// Add a submit event listener to the contact form
contactForm.addEventListener('submit', function(event) {
  // Prevent the form from submitting
  event.preventDefault();

  // Perform the action when the form is submitted
  console.log('Contact form submitted!');
});

// Get the add to cart buttons
var addToCartButtons = document.querySelectorAll('.add-to-cart');

// Loop through each add to cart button and add a click event listener
addToCartButtons.forEach(function(addToCartButton) {
  addToCartButton.addEventListener('click', function() {
    // Perform the action when the button is clicked
    console.log('Add to cart button clicked!');
  });
});
