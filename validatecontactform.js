document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const message = document.getElementById('message').value.trim();

        let errors = [];

        if (name === "") {
            errors.push("Name cannot be empty.");
        } else if (name.length < 2) {
            errors.push("Name must be at least 2 characters long.");
        }

        if (email === "") {
            errors.push("Email cannot be empty.");
        } else if (!/\S+@\S+\.\S+/.test(email)) {
            errors.push("Invalid email format.");
        }

        if (phone !== "" && !/^\+?[0-9]{7,15}$/.test(phone)) {
            errors.push("Phone number must be between 7 to 15 digits and can optionally include a '+' at the start.");
        }

        if (message === "") {
            errors.push("Message cannot be empty.");
        } else if (message.length < 10) {
            errors.push("Message must be at least 10 characters long.");
        }
        
        if (errors.length > 0) {
            alert(errors.join("\n")); 
        } else {
            alert("Form submitted successfully!");
            window.location.href = "Home.html"; 
        }
    });
});