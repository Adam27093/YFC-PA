<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recaptcha_secret = 'VOTRE_CLÉ_SECRÈTE';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Construire l'URL de vérification de reCAPTCHA
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response,
        $_SERVER['REMOTE_ADDR']
    ];

    // Faire une requête pour vérifier la réponse
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);

    if ($captcha_success->success) {
        // La vérification CAPTCHA a réussi
        echo 'CAPTCHA vérifié avec succès !';
        // Ici, vous pouvez continuer le traitement de votre formulaire (enregistrement de l'utilisateur, etc.)
    } else {
        // La vérification CAPTCHA a échoué
        echo 'Échec de la vérification CAPTCHA. Veuillez réessayer.';
    }
}
?>
