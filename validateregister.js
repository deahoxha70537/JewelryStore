document.addEventListener("DOMContentLoaded", 
    function(ngjarja) {
  
     const BtnSubmit = document.getElementById('signup');
     

     const validate = (ngjarja) => { 
    ngjarja.preventDefault();
     const username = document.getElementById('username'); 
    const email = document.getElementById('email'); 
    const password = document.getElementById('password');
     const confirmpass = document.getElementById('confirmpass'); 
    if (username.value === "") {
     alert("Please enter your Username."); 
    username.focus();
     return false;
     }
     if (email.value === "") {
     alert("Please enter your Email."); 
    email.focus();
     return false;
     }
     if (password.value === "") {
     alert("Please enter your Password"); 
     password.focus();
     return false;
     }
     if (!emailValid(confirmpass.value)) {
        alert("Please confirm your Password."); 
        confirmpass.focus();
        return false;
        }
        return true; 
        }
        const emailValid = (email) => {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\
       .])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
        }
        BtnSubmit.addEventListener('click', validate);
        });