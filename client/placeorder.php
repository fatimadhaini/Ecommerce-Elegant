<?php
$total = $_GET['total'];
// var_dump($total);exit;
$shipping=10;
session_start();
header('Content-Type: application/json');

include("../class/client.class.php");

$response = array('status' => 'error', 'message' => 'An unexpected error occurred.');

try {
    if (!isset($_POST['fname']) || !isset($_POST['lname']) || !isset($_POST['email'])) {
        throw new Exception('Required form fields are missing.');
    }

    $orderss = new client();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $names = $fname . " " . $lname;
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $id = $_POST['id'];
    $city = $_POST['city'];
    $payment = $_POST['payment'];
    $zip = $_POST['zipcode'];
    $phone = $_POST['phone'];
    $total = $_GET['total'];

    // Calculate discount
    $dis = 0;
    if (isset($_SESSION['coupon_discount'])) {
        if (!isset($_SESSION['only_once'])) {
            $coupon = $orderss->selectcodeid($_SESSION['coupon_id']);
            $limit = $coupon[0]['limits'] - 1;
            $orderss->updatelimit($_SESSION['coupon_id'], $limit);
            $ids = $coupon[0]['code_id'];
            $a = explode("/", $coupon[0]['used_by']);
            $a[count($a)] = $_SESSION['client_id'];
            $k = implode("/", $a);
            $orderss->updateused($k, $ids);
            $dis = $_SESSION['coupon_discount'];
        }
    }

    // Insert order
    $order = $orderss->insertorder($id, $country, $city, $zip, $address, $names, $email, $phone, $total, $dis, $shipping);

    if ($order) {
        foreach ($_SESSION['cart'] as $itemId => $item) {
            $product_id = $item['id'];
            $price = $item['itemprice'];
            $sub_total = $item['itemTotal'];
            $quantity = $item['quantity'];
            $name = $item['name'];
            $order_id = $order;

            $orderss->updatequantity($product_id, $quantity);
            $orderss->insertorderdetails($product_id, $price, $sub_total, $quantity, $name, $order_id);
        }

        // Clear session data
        unset($_SESSION['cart']);
        unset($_SESSION['theordertotal']);
        unset($_SESSION['shipping']);
        if (isset($_SESSION['coupon_discount'])) {
            unset($_SESSION['coupon_discount']);
            unset($_SESSION['limits']);
            unset($_SESSION['only_once']);
        }

        $response = array('status' => 'success', 'message' => 'Order placed successfully');
    } else {
        $response = array('status' => 'error', 'message' => 'Error placing the order');
    }
} catch (Exception $e) {
    $response = array('status' => 'error', 'message' => $e->getMessage());
}

// Send JSON response
echo json_encode($response);
exit;
?>
