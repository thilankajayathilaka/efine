
    // empty input validation
    function isRequired(inputField){
         if(inputField.value.trim() === ''){
              return true;
         }
         else{
              return false;
         }
    }

    // input length validation
    function isBetween(inputField, min, max){
         if(inputField.value.length < min || inputField.value.length >  max){
              return false;
         }
         else{
              return true;
         }
    }

    // validate email address is existing one or not using an API request
    // async static isEmailExist(inputField){
    //      const email = inputField.value;
    //      const api_key = '4f2ed61f9d974c3ea1848e563efa7f82';
    //      const url = new URL(`https://emailvalidation.abstractapi.com/v1/`);
    //      // set url parameters
    //      url.searchParams.set('api_key',api_key);
    //      url.searchParams.set('email',email);
    //      const res = await fetch(url);
    //      console.log("before");
    //      if(res.status === 200){
    //           const data = await res.json();
    //           return data.deliverability;
    //      }
    // }

    // first name validation
    function isFirstNameValid(inputField, messageEl){

         /* 
              validation rule:
              characters should be only letters in uppercase or lowercase
              should not include white spaces
         */
         const nameRegex = /^[A-Za-z]+$/;

         if(isRequired(inputField)){
              error(inputField, messageEl, "*first name is required");
              return false;
         }
         else if(!nameRegex.test(inputField.value)){
              error(inputField, messageEl, "*invalid first name");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // last name validation
    function isLastNameValid(inputField, messageEl){

         /* 
              validation rule:
              characters should be only letters in uppercase or lowercase
              should not include white spaces
         */
         const nameRegex = /^[A-Za-z]+$/;

         if(isRequired(inputField)){
              error(inputField, messageEl, "*last name is required");
              return false;
         }
         else if(!nameRegex.test(inputField.value)){
              error(inputField, messageEl, "*invalid last name");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // dob validation
    function isDOBValid(inputField, messageEl){
         if(isRequired(inputField)){
              error(inputField, messageEl, "*date of birth is required");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // NIC validation
    function isNicValid(inputField, messageEl){
         /* 
              validation rule:
              must not contain white spaces
              must have either 12 numbers or 10 numbers including letter 'v' or 'x'
         */
         const whiteSpaceRegex = /\s/;
         const nic = inputField.value;

         if(isRequired(inputField)){
              error(inputField, messageEl, "*NIC number is required");
              return false;
         }
         else if(!whiteSpaceRegex.test(nic)){
              success(inputField, messageEl);
              return true;
         }
         else if(nic.length === 10 && !isNaN(nic.substring(0,9)) && isNaN(nic.substring(9,1).toUpperCase()) && ['X','Y'].includes(nic.substring(9,1).toUpperCase())){
              success(inputField, messageEl)
              return true;
         }
         else if(nic.length === 12 && !isNaN(nic)){
              success(inputField, messageEl);
              return true;
         }
         else{
              error(inputField, messageEl, "*invalid NIC number");
              return false;
         }
    }

    // address validation
    function isAddressValid(inputField, messageEl){
         if(isRequired(inputField)){
              error(inputField, messageEl, "*address is required");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // email validation
    function isEmailValid(inputField, messageEl){
         const emailRegex = /[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]/;
         // const emailStatus = await isEmailExist(inputField.value);
         // const emailStatus = "DELIVERABLE";

         if(isRequired(inputField)){
              error(inputField, messageEl, "*email is required");
              return false;
         }
         else if(!emailRegex.test(inputField.value)){
              error(inputField, messageEl, "*email is invalid");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // phone number validation
    function isPhoneNoValid(inputField, messageEl){
         /*
              validation rule:
              must contain only 10 digits
              accepted phone no formats :
              (071) 222-3456
              (071)222-3456
              071-222-3456
              0712223456
         */
         const phoneRegex = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
         
         if(isRequired(inputField)){
              error(inputField, messageEl, "*Phone no is required");
              return false;
         }
         else if(!phoneRegex.test(inputField.value)){
              error(inputField, messageEl, "*Phone no is invalid");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // username validation
    function isUsernameValid(inputField, messageEl){
         /*
              validation rule:
              must be between 8 and 30 characters
              can only contain alphanumeric characters
          */
         const usernameRegex = /^[a-zA-Z][a-zA-Z0-9]{7,29}$/;

         if(isRequired(inputField)){
              error(inputField, messageEl, "*username is required");
              return false;
         }
         else if(!usernameRegex.test(inputField.value)){
              error(inputField, messageEl, "*username must be alphanumeric and only contain 8-30 characters");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // password validation
    function isPasswordValid(inputField, messageEl){
         /*
              validation rule:
              at least one lowercase character
              at least one uppercase character
              at least one number
              at least one special character(!,@,#,$,%,^,&,*)
              eight characters or longer
          */
         const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;

         if(isRequired(inputField)){
              error(inputField, messageEl, "*password is required");
              document.getElementById('password').style.color = '#DC3545';
              return false;
         }
         else if(!passwordRegex.test(inputField.value)){
              error(inputField, messageEl, "*Password must have at least one lowercase, uppercase, special character and must be 8 characters or longer");
              document.getElementById('password').style.color = '#DC3545';
              return false;
         }
         else{
              success(inputField, messageEl);
              document.getElementById('password').style.color = '#28A745';
              return true;
         }
    }
// password validation 2 required
function isPasswordRe(inputField, messageEl){
    

    if(isRequired(inputField)){
        error(inputField, messageEl, "*address is required");
        return false;
   }
   else{
        success(inputField, messageEl);
        return true;
   }
}
// input required
function isRe(inputField, messageEl){
    

    if(isRequired(inputField)){
        error(inputField, messageEl, "*Input is required");
        return false;
   }
   else{
        success(inputField, messageEl);
        return true;
   }
}



    // confirm password validation
    function isPasswordMatch(inputField, confirmField, messageEl){
         if(isRequired(inputField)){
              error(inputField, messageEl, "*password is required");
              document.getElementById('show-pwd-repeat').style.color = '#DC3545';
              return false;
         }
         else if(inputField.value !== confirmField.value){
              error(inputField, messageEl, "*password does not match");
              document.getElementById('show-pwd-repeat').style.color = '#DC3545';
              return false;
         }
         else{
              success(inputField, messageEl);
              document.getElementById('show-pwd-repeat').style.color = '#28A745';
              return true;
         }
    }

    function isOTPValid(inputField, messageEl){
         if(isRequired(inputField)){
              error(inputField, messageEl, "*OTP is required");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // appointment date validation
    function isDateValid(inputField, messageEl){
         if(isRequired(inputField)){
              error(inputField, messageEl,"*Date is required");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    // appointment time validation
    function isTimeValid(inputField, messageEl){
         if(isRequired(inputField)){
              error(inputField, messageEl,"*Time is required");
              return false;
         }
         else{
              success(inputField, messageEl);
              return true;
         }
    }

    function success(inputField, element){
         inputField.style.border = "2px solid #28A745";
         element.innerHTML = "";
    }

    function error(inputField, element, errMessage){
         inputField.style.border = "2px solid #DC3545";
         element.innerHTML = errMessage;
    }






























