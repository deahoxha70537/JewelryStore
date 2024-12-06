document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (username === "") {
        alert("Username cannot be empty.");
        return;
    }
    if (!/^[a-zA-Z0-9_]{3,16}$/.test(username)) {
        alert("Username must be 3-16 characters long and can only contain letters, numbers, and underscores.");
        return;
    }
    if (email === "") {
        alert("Email cannot be empty.");
        return;
    }
    if (!/\S+@\S+\.\S+/.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }
    if (password === "") {
        alert("Password cannot be empty.");
        return;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return;
    }
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }

    alert("Registration successful!");
    window.location.href = "Home.html";
});