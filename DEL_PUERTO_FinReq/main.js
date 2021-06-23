// match password
var this_password = document.getElementById("this_password"),
    confirm = document.getElementById("confirm");

function validatePassword() {
    if (this_password.value != confirm.value) {
        confirm.setCustomValidity("Passwords Don't Match");
        return false;
    } else {
        confirm.setCustomValidity('');
        return true;
    }
}

function messageForm(formElement, type, message) {
    const this_message = formElement.querySelector(".form_message");

    this_message.textContent = message;
    this_message.classList.remove("form_message--success", "form_message--error");
    this_message.classList.add(`form_message--${type}`);
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form_input--error");
    inputElement.parentElement.querySelector(".input-error-message").textContent = "";
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form_input--error");
    inputElement.parentElement.querySelector(".input-error-message").textContent = message;
}

// show/hide password
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');

togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

document.addEventListener("DOMContentLoaded", () => {

    // sign up Phone number
    document.querySelectorAll(".form_input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            // sign up Phone number
            if (e.target.id == "phone_num" && e.target.value.length > 0 && e.target.value.length < 11) {
                setInputError(inputElement, "Phone number must be at 11 numbers in length");
            }
        });
    });
});

// phone number/telephone
// only numbers allowed
function onlyNumberKey(evt) {
    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
        return false;
    }
    return true;
}

//Password strength calculation
function CheckPasswordStrength(psswrd) {
    var password_strength = document.getElementById("password_strength");

    if (psswrd.length == 0) {
        psswrd_strength.innerHTML = "";
        return;
    }

    var regex = new Array();
    regex.push("[A-Z]");
    regex.push("[a-z]");
    regex.push("[0-9]");
    regex.push("[$@$!%*#?&]");

    var passed = 0;

    for (var i = 0; i < regex.length; i++) {
        if (new RegExp(regex[i]).test(psswrd)) {
            passed++;
        }
    }
    if (passed > 2 && psswrd.length > 8) {
        passed++;
    }
    var color = "";
    var strength = "";
    switch (passed) {
        case 0:
        case 1:
            strength = "Weak";
            color = "red";
            break;
        case 2:
            strength = "Good";
            color = "darkorange";
            break;
        case 3:
        case 4:
            strength = "Strong";
            color = "green";
            break;
        case 5:
            strength = "Very Strong";
            color = "darkgreen";
            break;
    }
    password_strength.innerHTML = strength;
    password_strength.style.color = color;
}

function confirmation() {
    confirm("This item will be deleted immediately. You can't undo this action.");
}