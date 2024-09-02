<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $country = trim($_POST['country']);
    $state = trim($_POST['state']);
    $city = trim($_POST['city']);
    $zipCode = trim($_POST['zip_code']);
    $cardNumber = trim($_POST['card_number']);
    $expDate = trim($_POST['exp_date']); // Should be formatted as MMYY
    $cvc = trim($_POST['cvc']);
    $amount = 139.00; // You can set this dynamically

    // Basic server-side validation
    if (
        empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address) ||
        empty($country) || empty($state) || empty($city) || empty($zipCode) || empty($cardNumber) ||
        empty($expDate) || empty($cvc)
    ) {
        echo "All fields are required.";
        exit;
    }

    // Here you should validate the email, phone number format, etc.

    // Prepare data for NMI API
    $postData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'country' => $country,
        'state' => $state,
        'city' => $city,
        'zip_code' => $zipCode,
        'ccnumber' => $cardNumber,
        'ccexp' => $expDate,
        'cvv' => $cvc,
        'amount' => $amount,
        'type' => 'sale',
        'payment' => 'creditcard',
        'security_key' => 'your-security-key-here' // Replace with your NMI security key
    ];

    // Convert array to URL-encoded query string
    $postString = http_build_query($postData);

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://secure.networkmerchants.com/api/transact.php");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request and capture response
    $response = curl_exec($ch);
    curl_close($ch);

    // Process the response
    parse_str($response, $output);

    if ($output['response'] == 1) {
        echo "Payment Successful!";
        // Redirect or perform other actions as needed
    } else {
        echo "Payment Failed: " . $output['responsetext'];
    }
}
?>