<?php
class Mail {
    //put your code here
    public function __construct() {

    }
    public function envoyerMailer($destinataire, $sujet, $message, $piecejointe){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP
    $mail->Host = 'smtp.office365.com'; // Spécifier le serveur SMTP
    $mail->SMTPAuth = true; // Activer authentication SMTP
    $mail->Username = 'toni.pira@epsi.fr' ; // Votre adresse email d'envoi
    $mail->Password = '622WQN'; // Le mot de passe de cette adresse email
    $mail->SMTPSecure = 'tls'; // Accepter SSL
    $mail->Port = 587;
    $mail->setFrom('toni.pira@epsi.fr', 'Mailer'); // Personnaliser l'envoyeur
    $mail->addAddress($destinataire);
    $mail->addReplyTo('toni.pira@epsi.fr', 'Information'); // L'adresse de réponse
    if(!empty($piecejointe)){
    $mail->addAttachment($piecejointe); // Ajouter un attachement
    }
    $mail->isHTML(true); // Paramétrer le format des emails en HTML ou non
    $mail->Subject = $sujet;
    $mail->Body = $message;

    if(!$mail->send()) {
    echo 'Erreur, message non envoyé.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    echo 'Le message a bien été envoyé !';
    }
    }
}
?>