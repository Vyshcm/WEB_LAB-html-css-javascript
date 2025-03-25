// Form validation function
function validateForm() {
    let isValid = true;

    // Get form values
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirmPassword").value.trim();

    // Clear previous error messages
    clearErrors();

    // Name validation (only alphabets, no numbers or special characters)
    if (name === "") {
        document.getElementById("nameError").innerText = "Name is required.";
        isValid = false;
    } else if (!/^[a-zA-Z\s]+$/.test(name)) {
        document.getElementById("nameError").innerText = "Name must contain only alphabets.";
        isValid = false;
    }

    // Email validation
    if (email === "") {
        document.getElementById("emailError").innerText = "Email is required.";
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById("emailError").innerText = "Invalid email format.";
        isValid = false;
    }

    // Phone number validation (only 10 digits allowed)
    if (phone === "") {
        document.getElementById("phoneError").innerText = "Phone number is required.";
        isValid = false;
    } else if (!/^\d{10}$/.test(phone)) {
        document.getElementById("phoneError").innerText = "Phone number must be 10 digits.";
        isValid = false;
    }

    // Password validation
    if (password === "") {
        document.getElementById("passwordError").innerText = "Password is required.";
        isValid = false;
    } else if (password.length < 6) {
        document.getElementById("passwordError").innerText = "Password must be at least 6 characters.";
        isValid = false;
    }

    // Confirm Password validation
    if (confirmPassword === "") {
        document.getElementById("confirmPasswordError").innerText = "Please confirm your password.";
        isValid = false;
    } else if (confirmPassword !== password) {
        document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
        isValid = false;
    }

    // Return false to prevent form submission if not valid
    return isValid;
}

// Function to clear error messages
function clearErrors() {
    document.getElementById("nameError").innerText = "";
    document.getElementById("emailError").innerText = "";
    document.getElementById("phoneError").innerText = "";
    document.getElementById("passwordError").innerText = "";
    document.getElementById("confirmPasswordError").innerText = "";
}

// Email format validation using regex
function isValidEmail(email) {
    let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
}
