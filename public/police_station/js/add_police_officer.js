const id = document.getElementById('id');
const psname = document.getElementById('name');
const ps = document.getElementById('ps');
const address = document.getElementById('address');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const pass = document.getElementById('pass');

const emailError = document.getElementById('error-email');


const submitForm = document.getElementById('submit-form');
const submitBtn = document.getElementById('submit-btn');

function validateForm(){
    let validId = isRe(id, emailError);
    let validName = isRe(psname, emailError);
    let validPs = isRe(ps, emailError);
    let validAddress = isRe(address, emailError);
    let validPhone = isRe(phone, emailError);
    let validEmail = isRe(email, emailError);
    let validPass = isRe(pass, emailError);


    if(!validId || !validName || !validPs || !validAddress || !validPhone || !validEmail || !validPass){
        return false;
    }
    
    else{
        return true;
    }
}

submitBtn.addEventListener('click', function(e){
    // e.preventDefault();
    if(validateForm()){
        submitForm.submit();
    }
});