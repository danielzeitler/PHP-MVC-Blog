// Select all Buttons and Forms
let submitBtn = document.querySelector("#submitBtn");

// Select all text Inputs
let firstnameInput = document.forms["myForm"]["firstname"]; 
let lastnameInput = document.forms["myForm"]["lastname"]; 
let emailInput = document.forms["myForm"]["email"]; 
let passwordInput = document.forms["myForm"]["password"]; 
let confirmPasswordInput = document.forms["myForm"]["confirm_password"]; 

let errorMsg = document.querySelectorAll('.invalid-feedback');
let labelMsg = document.querySelectorAll('label');

firstnameInput.addEventListener("input", checkFirstnameInput);
lastnameInput.addEventListener("input", checkLastnameInput);
emailInput.addEventListener("input", checkEmailInput);
passwordInput.addEventListener("input", checkPassword);
confirmPasswordInput.addEventListener("input", checkConfirmPassword);


// check if firstname is empty
function checkFirstnameInput() {
	if(firstnameInput.value == "") {
		firstnameInput.style.borderColor = "#E0B4B4";
        firstnameInput.style.background = "#FFF6F6";
        errorMsg[0].textContent = "Please enter first name";
        labelMsg[0].style.color = "#9F3A38";
	} else {
        firstnameInput.style.border = "1px solid rgba(34, 36, 38, 0.15)";
        firstnameInput.style.background = "#fff";
        firstnameInput.style.color = "#000";
        errorMsg[0].textContent = " ";
        labelMsg[0].style.color = "#000";
    }
}

// check if lastname is empty
function checkLastnameInput() {
	if(lastnameInput.value == "") {
		lastnameInput.style.borderColor = "#E0B4B4";
        lastnameInput.style.background = "#FFF6F6";
        errorMsg[1].textContent = "Please enter last name";
        labelMsg[1].style.color = "#9F3A38";
	} else {
        lastnameInput.style.border = "1px solid rgba(34, 36, 38, 0.15)";
        lastnameInput.style.background = "#fff";
        lastnameInput.style.color = "#000";
        errorMsg[1].textContent = " ";
        labelMsg[1].style.color = "#000";
    }
}

// check if lastname is empty
function checkEmailInput() {
	if(emailInput.value == "") {
		emailInput.style.borderColor = "#E0B4B4";
        emailInput.style.background = "#FFF6F6";
        errorMsg[2].textContent = "Please enter email";
        labelMsg[2].style.color = "#9F3A38";
	} else {
        emailInput.style.border = "1px solid rgba(34, 36, 38, 0.15)";
        emailInput.style.background = "#fff";
        emailInput.style.color = "#000";
        errorMsg[2].textContent = " ";
        labelMsg[2].style.color = "#000";
    }
}

// check if lastname is empty
function checkPassword() {
	if(passwordInput.value == "") {
		passwordInput.style.borderColor = "#E0B4B4";
        passwordInput.style.background = "#FFF6F6";
        errorMsg[3].textContent = "Please enter password";
        labelMsg[3].style.color = "#9F3A38";
	} else {
        passwordInput.style.border = "1px solid rgba(34, 36, 38, 0.15)";
        passwordInput.style.background = "#fff";
        passwordInput.style.color = "#000";
        errorMsg[3].textContent = " ";
        labelMsg[3].style.color = "#000";
    }
}

// check if lastname is empty
function checkConfirmPassword() {
	if(confirmPasswordInput.value == "") {
		confirmPasswordInput.style.borderColor = "#E0B4B4";
        confirmPasswordInput.style.background = "#FFF6F6";
        errorMsg[4].textContent = "Please confirm password";
        labelMsg[4].style.color = "#9F3A38";
	} else {
        confirmPasswordInput.style.border = "1px solid rgba(34, 36, 38, 0.15)";
        confirmPasswordInput.style.background = "#fff";
        confirmPasswordInput.style.color = "#000";
        errorMsg[4].textContent = " ";
        labelMsg[4].style.color = "#000";
    }
}