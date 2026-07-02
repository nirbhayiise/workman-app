<?php
$secret_key = 'YOUR_PAYSTACK_SECRET_KEY';
//$secret_key = 'YOUR_PAYSTACK_TEST_SECRET_KEY';

$amount = $_GET['amount']; // Amount in kobo (NGN 500.00)
$email = $_GET['email'];
$reference = uniqid(); // Generate a unique reference for the payment
$callback_url = 'https://workman247.com/serviceadmin/apis/paystack-callback.php?reference=';

$data = [
    'amount' => $amount,
    'email' => $email,
    'reference' => $reference,
    'callback_url' => $callback_url+$reference,
];

$ch = curl_init('https://api.paystack.co/transaction/initialize');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $secret_key,
    'Content-Type: application/x-www-form-urlencoded',
]);

$response = curl_exec($ch);
curl_close($ch);

$transaction = json_decode($response);
if ($transaction->status) {
    header("Location: " . $transaction->data->authorization_url);
    exit;
} else {
    echo "Error initiating payment: " . $transaction->message;
}




/*

$amount = $_GET['amount']; // Amount in kobo (NGN 500.00)
$email = $_GET['email'];
$reference = uniqid(); // Generate a unique reference for the payment
$callback_url = 'https://workman247.com/serviceadmin/requrest.php';

$data = [
    'amount' => $amount,
    'email' => $email,
    'reference' => $reference,
    'callback_url' => $callback_url,
];

$query_string = http_build_query($data);
$payment_url = "https://api.paystack.co/transaction/initialize?$query_string";

header("Location: $payment_url");
exit;*/
?>
