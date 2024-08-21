<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the token from the request
    $data = json_decode(file_get_contents('php://input'), true);
    $token = $data['token'];

    // Secret key from your reCAPTCHA settings
    $secret_key = '6LcCPSwqAAAAADMkFFAnb_bzDcC2IfDy9Avw3WHi';

    // Verify the token with Google's reCAPTCHA API
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$token");
    $response_keys = json_decode($response, true);

    // Return the verification result and score
    header('Content-Type: application/json');
    echo json_encode([
        'success' => intval($response_keys['success']),
        'score' => $response_keys['score']
    ]);
} else {
    // Return 404 for non-POST requests
    header("HTTP/1.0 404 Not Found");
}
?>
