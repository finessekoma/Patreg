// Get references to the user selection buttons
const adminBtn = document.getElementById('adminBtn');
const customerBtn = document.getElementById('customerBtn');

// Add click event listeners to the buttons
adminBtn.addEventListener('click', function() {
  // Make an AJAX request to the admin login PHP file
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'sign_up.php');
  xhr.send();
  
  // Handle the response from the PHP file
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
      // Redirect the user to the admin page or show success message
    } else {
      console.log('Request failed. Status code: ' + xhr.status);
      // Show error message to the user
    }
  };
});

customerBtn.addEventListener('click', function() {
  // Make an AJAX request to the customer login PHP file
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'customer-login.php');
  xhr.send();
  
  // Handle the response from the PHP file
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
      // Redirect the user to the customer page or show success message
    } else {
      console.log('Request failed. Status code: ' + xhr.status);
      // Show error message to the user
    }
  };
});
