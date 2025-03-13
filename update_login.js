function updateLoginButton() {
    fetch('check_login.php')
        .then(response => response.json())
        .then(data => {
            const loginButton = document.getElementById('loginSignupButton');
            const dropdownMenu = document.getElementById('accountDropdown');

            if (data.logged_in) {
                loginButton.textContent = 'My Account';
                loginButton.href = '#';
                loginButton.classList.add("dropdown-toggle");

                loginButton.addEventListener("mouseover", function() {
                    dropdownMenu.style.display = "block";
                });

                dropdownMenu.addEventListener("mouseleave", function() {
                    dropdownMenu.style.display = "none";
                });

                console.log("User ID:", data.user_id);
                console.log("First Name:", data.fname);
                console.log("Last Name:", data.lname);
                console.log("Email:", data.Email);

            } else {
                loginButton.textContent = 'Login/Signup';
                loginButton.href = 'Login.php';
            }
        })
        .catch(error => console.error('Error checking login:', error));
}

updateLoginButton();

// Logout functionality
const logoutLink = document.getElementById("logoutLink");
const dropdownMenu = document.getElementById("accountDropdown");

logoutLink.addEventListener("click", function(event) {
    event.preventDefault();

    if (confirm("Are you sure you want to log out?")) {
        fetch("logout.php")
            .then(response => {
                if (response.ok) {
                    alert("You have been logged out.");
                    window.location.reload();
                } else {
                    alert("Logout failed. Please try again.");
                }
                dropdownMenu.style.display = "none";
            })
            .catch(error => {
                console.error("Logout error:", error);
                alert("An error occurred during logout.");
            });
    }
});
