function showRegisterForm() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
}

function showLoginForm() {
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
}

function validatePassword() {
    var password = document.getElementById("regPassword").value;
    var confirmPassword = document.getElementById("regConfirmPassword").value;

    if (password !== confirmPassword) {
        alert("Mật khẩu và mật khẩu nhập lại không khớp.");
        return false; // Ngăn chặn form được submit
    }

    return true; // Cho phép form được submit
}