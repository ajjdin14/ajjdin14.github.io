document.addEventListener('DOMContentLoaded', function() {
  const signupForm = document.getElementById('signup-form');
  const messageContainer = document.getElementById('message');

  // Event listener for the signup form submission
  signupForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Get the form data
    const formData = new FormData(signupForm);
    const username = formData.get('username');
    const password = formData.get('password');

    // Create an HTTP request to send the signup data
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'signup.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = xhr.responseText;
        messageContainer.textContent = response;
        signupForm.reset();
      }
    };
    xhr.send(`username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`);
  });
});
