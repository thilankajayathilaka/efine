// Function to validate the license number
function validateLicenseNumber() {
    var licenseNumberInput = document.getElementById('searchfield');
    var licenseNumber = licenseNumberInput.value.trim();

    // Regular expression to match the license number pattern
    var licenseNumberRegex = /^[A-G]\d{6,9}$/;

    if (!licenseNumberRegex.test(licenseNumber)) {
        var errorElement = document.getElementById('license-error');
        errorElement.textContent = "Invalid license number. Please enter a valid license number.";
        licenseNumberInput.classList.add('error');
        return false;
    } else {
        var errorElement = document.getElementById('license-error');
        errorElement.textContent = ""; // Clear any previous error message
        licenseNumberInput.classList.remove('error');
    }

    return true;
}

// Function to validate the phone number
function validatePhoneNumber() {
    var phoneNumberInput = document.getElementById('mobileNo');
    var phoneNumber = phoneNumberInput.value.trim();

    // Regular expression to match the phone number pattern
    var phoneNumberRegex = /^94[1-9]\d{8}$/;

    if (!phoneNumberRegex.test(phoneNumber)) {
        var errorElement = document.getElementById('phone-error');
        errorElement.textContent = "Please enter a valid mobile number starting with 94 and having 11 digits.";
        phoneNumberInput.classList.add('error');
        return false;
    } else {
        var errorElement = document.getElementById('phone-error');
        errorElement.textContent = ""; // Clear any previous error message
        phoneNumberInput.classList.remove('error');
    }

    return true;
}

// Event listener for input changes - License Number
var licenseNumberInput = document.getElementById('searchfield');
licenseNumberInput.addEventListener('input', function () {
    validateLicenseNumber();
});

// Event listener for input changes - Phone Number
var phoneNumberInput = document.getElementById('mobileNo');
phoneNumberInput.addEventListener('input', function () {
    validatePhoneNumber();
});


