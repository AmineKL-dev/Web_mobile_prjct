document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username === "admin" && password === "password123") {
        alert("Login successful!");
        window.location.href = "dashboard.html"; // Redirect after login
    } else {
        alert("Invalid username or password!");
    }
});
