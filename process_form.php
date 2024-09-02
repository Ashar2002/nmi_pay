<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $card_number = str_replace(' ', '', $_POST['ccnumber']);
    $exp_date = $_POST['ccexp'];
    $cvv = $_POST['cvv'];
    // $card_number = '4111111111111111'; // Use Visa test card number
    // $exp_date = '10/25';
    // $cvc = '123'; // Any CVC

    // NMI API endpoint and tokenization key
    $url = 'https://secure.nmi.com/api/transact.php';
    $api_key = 'security_key=6457Thfj624V5r7WUwc5v6a68Zsd6YEm'; // Replace with your actual key

    // Prepare the request fields
    $fields = [
        'security_key' => $api_key,
        'type' => 'sale',
        'amount' => '10.00', // Example amount, replace with actual amount
        'card_number' => $card_number,
        'exp_date' => $exp_date,
        'cvv' => $cvv,
        'first_name' => 'John', // Replace with actual customer data
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'phone' => '1234567890',
        'address' => '123 Main St',
        'city' => 'Anytown',
        'state' => 'CA',
        'zip' => '12345',
        'country' => 'US',
        'test_mode' => 'enabled' // Enable test mode
    ];

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Handle the response
    parse_str($response, $response_array);

    if ($response_array['response'] == 1) {
        echo 'Transaction successful! Transaction ID: ' . $response_array['transactionid'];
    } else {
        echo 'Transaction failed: ' . $response_array['responsetext'];
    }
} else {
    echo 'Invalid request method.';
}
?>