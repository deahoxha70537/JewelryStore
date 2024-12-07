document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const confirmpass = document.getElementById('confirmpass').value.trim();

        let errors = [];

        if (username === "") {
            errors.push("Username cannot be empty.");
        } else if (username.length < 3) {
            errors.push("Username must be at least 3 characters long.");
        }

        if (email === "") {
            errors.push("Email cannot be empty.");
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            errors.push("Invalid email format.");
        }

        if (password === "") {
            errors.push("Password cannot be empty.");
        } else if (password.length < 6) {
            errors.push("Password must be at least 6 characters long.");
        }

        if (confirmpass === "") {
            errors.push("Confirm Password cannot be empty.");
        } else if (confirmpass !== password) {
            errors.push("Passwords do not match.");
        }

        if (errors.length > 0) {
            alert(errors.join("\n"));
        } else {
            alert("Form submitted successfully!");
            window.location.href = "Home.html"; 
        }
    });
});