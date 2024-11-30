function checkPasswordStrength() {
    var password = document.getElementById('admin-password').value;
    var strengthBar = document.getElementById('strength-bar');
    var strengthText = document.getElementById('password-strength-text');
    
    var strength = 0;
    
    // Check password length
    if (password.length >= 8) strength += 1;
    if (password.match(/[A-Z]/)) strength += 1;
    if (password.match(/[a-z]/)) strength += 1;
    if (password.match(/[0-9]/)) strength += 1;
    if (password.match(/[!@#$%^&*(),.?":{}|<>]/)) strength += 1;

    // Adjust the strength bar based on the password complexity
    switch (strength) {
        case 1:
            strengthBar.style.width = '20%';
            strengthBar.style.backgroundColor = 'red';
            strengthText.textContent = 'Weak';
            break;
        case 2:
            strengthBar.style.width = '40%';
            strengthBar.style.backgroundColor = 'orange';
            strengthText.textContent = 'Fair';
            break;
        case 3:
            strengthBar.style.width = '60%';
            strengthBar.style.backgroundColor = 'yellow';
            strengthText.textContent = 'Good';
            break;
        case 4:
            strengthBar.style.width = '80%';
            strengthBar.style.backgroundColor = 'lightgreen';
            strengthText.textContent = 'Strong';
            break;
        case 5:
            strengthBar.style.width = '100%';
            strengthBar.style.backgroundColor = 'green';
            strengthText.textContent = 'Very Strong';
            break;
        default:
            strengthBar.style.width = '0';
            strengthText.textContent = '';
            break;
    }
}

function togglePasswordVisibility() {
    var passwordField = document.getElementById('admin-password');
    var showPasswordCheckbox = document.getElementById('show-password');

    if (showPasswordCheckbox.checked) {
        passwordField.type = 'text'; // Show password
    } else {
        passwordField.type = 'password'; // Hide password
    }
}
