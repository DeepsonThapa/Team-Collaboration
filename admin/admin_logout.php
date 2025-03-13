<?php

session_start();


if (!isset($_GET['confirm'])) {
    echo "<script>
        var confirmLogout = confirm('Are you sure you want to logout?');
        if (confirmLogout) {
            window.location.href = 'admin_logout.php?confirm=true';
        } else {
            window.location.href = 'admin_dashboard.php'; // Redirect back if canceled
        }
    </script>";
    exit();
}

session_unset();
session_destroy();

// alert message and redirect to login page
echo "<script>
    alert('You have been logged out.');
    window.location.href = 'admin_login.php';
</script>";
exit();
?>
