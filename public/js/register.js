const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="notification_email"]');
const loginInput = form.querySelector('input[name="login"]');
const submitButton = form.querySelector('button');

function markValidation(element, message, condition) {
    const messages = document.querySelector(".messages");
    if (!condition) {
        element.classList.add('invalid');
        messages.textContent.concat(`${messages}\n`)
        return
    }
    messages.textContent.replace(`${messages}\n`, '');
    element.classList.remove('invalid');
}

function isEmailValid(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function isLoginValid(login) {
    return login !== null && login !== "";
}

function hasLoginValidLength(login) {
    return login.length > 3;
}

function validateLogin() {
    markValidation(loginInput, "Invalid login - empty.", isLoginValid(loginInput.value))
    markValidation(loginInput, "Invalid login - too short.", hasLoginValidLength(loginInput.value))
}

function validateEmail() {
    markValidation(emailInput, "Invalid email.", isEmailValid(emailInput.value))
}

loginInput.addEventListener('focusout', validateLogin)
emailInput.addEventListener('focusout', validateEmail)
