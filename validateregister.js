document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const usernameInput = document.querySelector('.username');
    const emailInput = document.querySelector('.email');
    const passwordInput = document.querySelector('.password');
    const confirmPasswordInput = document.querySelector('.confirmpass');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const username = usernameInput.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const confirmPassword = confirmPasswordInput.value.trim();

        let errors = [];

        if (username === "") {
            errors.push("Username is required.");
        } else if (username.length < 3) {
            errors.push("Username must be at least 3 characters long.");
        }

        if (email === "") {
            errors.push("Email is required.");
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            errors.push("Invalid email format.");
        }

        if (password === "") {
            errors.push("Password is required.");
        } else if (password.length < 6) {
            errors.push("Password must be at least 6 characters long.");
        }

        if (confirmPassword !== password) {
            errors.push("Passwords do not match.");
        }

        if (errors.length > 0) {
            alert(errors.join("\n"));
        } else {
            alert("Registration successful!");
            window.location.href = "Home.html";
        }
    });
});