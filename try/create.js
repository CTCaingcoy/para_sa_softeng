// Toggle Password Visibility for Password Field
const togglePassword = document.getElementById('togglePassword');
const passwordField = document.getElementById('password');

togglePassword.addEventListener('click', function () {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

// Toggle Password Visibility for Confirm Password Field
const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
const confirmPasswordField = document.getElementById('confirm_password');

toggleConfirmPassword.addEventListener('click', function () {
    const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPasswordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});

// Password Validation (Check if Password and Confirm Password match)
function validatePasswords() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
    }
    return true;
}
