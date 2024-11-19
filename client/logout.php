<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
unset($_SESSION['client_id']);
// unset($_SESSION['auth_role']);
unset($_SESSION['client']);
unset($_SESSION['auth_client']);
unset($_SESSION['clientname']);
// unset($_SESSION['login_user']);
unset($_SESSION['cart']);
unset($_SESSION['theordertotal']);
unset($_SESSION['coupon_discount']);
unset($_SESSION['limits']);
unset($_SESSION['only_once']);
unset($_SESSION['coupon_id']);
//session_destroy();
echo "<script>
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: 'Logged out successfully',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href='index.php';
    });
});
</script>";
exit;
?>