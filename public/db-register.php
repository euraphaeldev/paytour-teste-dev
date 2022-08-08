<?php
require("./lib/user_info-master/UserInfo.php");
require './lib/vendor/autoload.php';

include_once "./connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$alert = '<script>
alert("email. já cadastrado!")
</script>';
// inserindo os dados e enviando email

if (!empty($data['enviaForm'])) {
    // var_dump($data);
    
    $email = $data['email']; // capturando email e verificando ele através de uma query sql.
    $sql = $conn->prepare("SELECT * FROM teste_paytour WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();
    // se a query retornar alguma linha, retornamos a falha, se não deixamos o programa seguir.
    if ($email) {
        if ($sql->rowCount() != 0) {
            echo $alert;
        } else {
            $curriculo = $_FILES['curriculo'];
            $ip =  UserInfo::get_ip();
            $query_data = "INSERT INTO teste_paytour (nome, email, telefone, cargo, escolaridade, obs, curriculo, envio, ip) VALUE (:nome, :email, :telefone, :cargo, :escolaridade, :obs, :curriculo, NOW(), :ip)";

            $cadastro_form = $conn->prepare($query_data);
            $cadastro_form->bindParam(':nome', $data['nome'], PDO::PARAM_STR);
            $cadastro_form->bindParam(':email', $data['email'], FILTER_VALIDATE_EMAIL, PDO::PARAM_STR);
            $cadastro_form->bindParam(':telefone', $data['telefone'], PDO::PARAM_STR);
            $cadastro_form->bindParam(':cargo', $data['cargo'], PDO::PARAM_STR);
            $cadastro_form->bindParam(':escolaridade', $data['escolaridade'], PDO::PARAM_STR);
            $cadastro_form->bindParam(':obs', $data['obs'], PDO::PARAM_STR);
            $cadastro_form->bindParam(':curriculo', $curriculo['name'], PDO::PARAM_STR);
            $cadastro_form->bindParam(':ip', $ip, PDO::PARAM_STR);


            $cadastro_form->execute();

            if ($cadastro_form->rowCount()) {
                $mail = new PHPMailer(true);
                $nome = $data['nome'];
                try {
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.mailtrap.io';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = '1775f4663440fe';
                    $mail->Password   = '1ec094bbf06aa0';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 2525;

                    // Envia email para quem preencheu o formulário.
                    $mail->setFrom('raphaellpb2@gmail.com', 'Raphael');
                    $mail->addAddress($email, $nome);

                    $mail->isHTML(true);
                    $mail->Subject = 'Sua candidatura';
                    $mail->Body    = '<b>Nós recebemos o seu email!</b>.<br><br>
            Olá ' . $data['nome'] . "," . "<br><br>Recebemos o seu email.<br> Agora é com a gente! Boa sorte!<br><br> Atenciosamente,<br><br> Equipe de recrutamento.";

                    $mail->send();

                    $mail->clearAddresses();

                    //Enviar e-mail para o colaborador da empresa
                    $mail->setFrom('raphaellpb2@gmail.com', 'Raphael');
                    $mail->addAddress('euraphael.dev@gmail.com', 'Dev');
                    $mail->addAttachment($curriculo['tmp_name'], $curriculo['name']);

                    $mail->isHTML(true);
                    $mail->Subject = 'Processo Seletivo';
                    $mail->Body = "Nome: " . $data['nome'] . "<br>E-mail: " . $data['email'] . '<br>Escolaridade: ' . $data['escolaridade'] . "<br>Conteúdo: " . $data['obs'] . "<br>IP: " . $ip;
                    $mail->AltBody = "Nome: " . $data['nome'] . "\nE-mail: " . $data['email'] . "\nConteúdo: " . $data['obs'];

                    $mail->send();
                    unset($data);

                   
                    if ((isset($curriculo['name'])) and (!empty($curriculo['name']))) {    // criando diretorio no servidor para registrar os arquivos enviados.
                        
                        $lastId = $conn->lastInsertId();                                   // Recuperar o ultimo id inserido no DB

                        
                        $diretorio = 'curriculos/' . $lastId . "_" . $nome . "/";          // diretorio onde o arquivo sera salvo

                        
                        mkdir($diretorio, 07555);                                          // Criar o diretorio

                        
                        $file = $curriculo['name'];                                        // realizar upload
                        move_uploaded_file($curriculo['tmp_name'], $diretorio . $file);
                    }

                    header('Location: ./obrigado.html');
                } catch (Exception $e) {
                    header("Location: ./index.php");
                }
            }
        }
    }
}
