const email = document.getElementById('email');
const password = document.getElementById('password');

const emailError = document.getElementById('error-email');
const passwordError = document.getElementById('error-password');

const loginForm = document.getElementById('login-form');
const loginBtn = document.getElementById('login-btn');

function validateForm(){
    let validEmail = isEmailValid(email, emailError);
    let validPassword = isPasswordRe(password,passwordError);

    if(!validEmail && !validPassword){
        return false;
    }
    else if(!validEmail){
        return false;
    }
    else if(!validPassword){
        return false;
    }
    else{
        return true;
        console.log("hello");
    }
}

loginBtn.addEventListener('click', function(e){
    // e.preventDefault();
    if(validateForm()){
        loginForm.submit();
    }
});