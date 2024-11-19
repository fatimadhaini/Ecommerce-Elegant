<?php

require_once('../class/client.class.php'); // Adjust the path as needed

    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    $order = new client();
//   var_dump($order_id);exit;

    if (isset($order_id)) {
        $result = $order->updatestatus($order_id, $new_status);
        $response = array(
            'status' => 'success',
            'message' => 'Status updated successfully.'
        );
    }

else {
       $response = array(
           'status' => 'error',
           'message' => 'Failed to update product.'
       );
   }
   // Send JSON response
//    header('Content-Type: application/json');
echo json_encode($response);
?>