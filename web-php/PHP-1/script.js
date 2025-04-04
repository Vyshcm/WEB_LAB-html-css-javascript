function validateForm() {
    let isValid = true;

    // Get form inputs
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirm_password").value.trim();

    // Error fields
    let nameError = document.getElementById("nameError");
    let emailError = document.getElementById("emailError");
    let phoneError = document.getElementById("phoneError");
    let passwordError = document.getElementById("passwordError");
    let confirmPasswordError = document.getElementById("confirmPasswordError");

    // Clear previous errors
    nameError.innerText = "";
    emailError.innerText = "";
    phoneError.innerText = "";
    passwordError.innerText = "";
    confirmPasswordError.innerText = "";

    // Name validation (Only alphabets allowed)
    let namePattern = /^[A-Za-z\s]+$/;
    if (name === "") {
        nameError.innerText = "Name is required.";
        isValid = false;
    } else if (!namePattern.test(name)) {
        nameError.innerText = "Name can only contain alphabets.";
        isValid = false;
    }

    // Email validation
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
        emailError.innerText = "Email is required.";
        isValid = false;
    } else if (!emailPattern.test(email)) {
        emailError.innerText = "Invalid email format.";
        isValid = false;
    }

    // Phone validation (Only 10-digit numbers allowed)
    let phonePattern = /^[0-9]{10}$/;
    if (phone === "") {
        phoneError.innerText = "Phone number is required.";
        isValid = false;
    } else if (!phonePattern.test(phone)) {
        phoneError.innerText = "Phone number must be 10 digits.";
        isValid = false;
    }

    // Password validation
    if (password === "") {
        passwordError.innerText = "Password is required.";
        isValid = false;
    }

    // Confirm Password validation
    if (confirmPassword === "") {
        confirmPasswordError.innerText = "Please confirm your password.";
        isValid = false;
    } else if (password !== confirmPassword) {
        confirmPasswordError.innerText = "Passwords do not match.";
        isValid = false;
    }

    return isValid;
}
