<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome = $_POST ["nome"];
        $email  = $_POST["email"] ;
        $mensagem = $_POST["mensagem"];

        require 'vendor/autoload.php';
    
        $from = new SendGrid\Email(null, "cesar@celke.ga");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "bibia231098@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá, Bianca <br><br> Nova mensagem de contato
        <br> <br> <br> Nome: $nome <br>
        Email: $email <br>
        Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SENDGRID_API_KEY';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo Mensagem enviada com sucesso;
        ?>
    </body>
</html>
