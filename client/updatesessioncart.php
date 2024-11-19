<?php
session_start();
// Check if productId is provided
if (isset($_POST['productId'])) {
$productId = $_POST['productId'];
$quantity=$_POST['quan'];
$subtotal=$_POST['total'];
// Locate and remove the product_id from the session cart
if (isset($_SESSION['cart'][$productId])) {
$_SESSION['cart'][$productId]['quantity'] = $quantity;
$_SESSION['cart'][$productId]['itemTotal'] = $subtotal;
// Additional logic to handle success if needed
$response = array('status' => 'success', 'message' => 'update
successfully from cart.');
echo json_encode($response);
exit(); // Terminate the script after echoing the JSON response
}
}

$response = array('status' => 'error', 'message' => 'Invalid request or
product not found in cart.');
echo json_encode($response);
?>
<form class="mb-5" id="codeform" action="couponcode.php">
<div class="input-group">
<input type="text" name="code" class="form-control p-4"
placeholder="Coupon Code">
<div class="input-group-append">
<button type="submit" class="btn btn-primary">Apply Coupon</button>
</div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).on('submit', '#codeform', function(e) {
e.preventDefault();
var form = new FormData(this);
console.log(form);
$.ajax({
url: $(this).attr('action'),
type: 'POST',
processData: false,
contentType: false,
dataType: 'json',
data: form,

success: function(response) {
if (response.status === 'success') {
Swal.fire({
icon: 'success',
title: response.message,
showConfirmButton: true,
customClass: {
confirmButton: 'button btn btn-primary app_style'
}
}).then(function() {
window.location.href = 'cart.php';
});
} else if (response.status === 'error') {
Swal.fire({
icon: 'warning',
title: response.message,
showConfirmButton: true,
customClass: {
confirmButton: 'button btn btn-primary app_style'
}
});
} else {
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Something went wrong!'

});
}
}
});
});
</script>