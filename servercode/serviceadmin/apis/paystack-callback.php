<?php
$secret_key = 'YOUR_PAYSTACK_SECRET_KEY';
//$secret_key = 'YOUR_PAYSTACK_TEST_SECRET_KEY';

$reference = $_GET['reference'];

$ch = curl_init("https://api.paystack.co/transaction/verify/$reference");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $secret_key,
]);

$response = curl_exec($ch);
curl_close($ch);

$payment_data = json_decode($response);
if ($payment_data->status && $payment_data->data->status === 'success') {
    // Payment successful, update your database or perform other actions
    echo "{\"status\":\"successful\"}";
} else {
    // Payment failed
    echo "{\"status\":\"failed\"}";
}
?>
