function validateLoginForm() {

    document.getElementById('usernameError').textContent = '';
    document.getElementById('passwordError').textContent = '';

 
    const username = document.forms['loginForm']['username'].value;
    const password = document.forms['loginForm']['password'].value;

    let valid = true;

 
    if (username === "") {
        document.getElementById('usernameError').textContent = "Username is required.";
        valid = false;
    }

 
    if (password === "") {
        document.getElementById('passwordError').textContent = "Password is required.";
        valid = false;
    } else if (password.length < 6) {
        document.getElementById('passwordError').textContent = "Password must be at least 6 characters.";
        valid = false;
    }

   
    if (valid) {
       
        window.location.href = "Home.html"; 
    }

    return false;
}
