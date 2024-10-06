<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Création de l'instance PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP pour Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'joliedheni07@gmail.com'; // Remplacez par votre adresse Gmail
        $mail->Password = 'Mathilda11/03'; // Remplacez par votre mot de passe Gmail ou mot de passe d'application
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Destinataire et émetteur
        $mail->setFrom('joliedheni07@gmail.com', $name); // Remplacez par votre adresse Gmail
        $mail->addAddress('joliedheni07@gmail.com'); // Adresse où vous recevrez les emails

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de contact';
        $mail->Body = "Nom: $name<br>Email: $email<br>Message:<br>$message";

        // Envoi de l'email
        $mail->send();
        echo 'Message envoyé avec succès.';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
