<?php
include_once "./connect.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>


    <title>Paytour - Processo seletivo Desenvolvedor Full Stack</title>
</head>

<body>
    <section class="main-container">
        <section class="info">
            <div class="header">
                <div class="logo">
                    <img src="./assets/img/logo-paytour.svg" alt="logo da paytour">
                </div>
                <div class="content">
                    <h1>Preencha as informações e um especialista irá te responder o mais rápido possível!</h1>
                </div>
            </div>
        </section>

        <section class="form" id="form">
            <div class="form-group">

                <form class="form-box" action="./db-register.php" name="envia_msg" method="POST" enctype="multipart/form-data">

                    <div class="form-controler">
                        <label for="nome">Nome*</label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome completo" required autofocus>

                        <i><img class="img-success" src="assets/img/success-icon.svg" alt="icone de sucesso"></i>
                        <i><img class="img-error" src="assets/img/error-icon.svg" alt="icone de erro"></i>

                        <small>Digite um nome válido.</small>
                    </div>

                    <div class="form-controler">
                        <label for="email">E-mail*</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com.br" required>

                        <i><img class="img-success" src="assets/img/success-icon.svg" alt="icone de sucesso"></i>
                        <i><img class="img-error" src="assets/img/error-icon.svg" alt="icone de erro"></i>

                        <small>Email já cadastrado ou inválido.</small>
                    </div>

                    <div class="form-controler">
                        <label for="telefone">Telefone*</label>
                        <input type="telefone" name="telefone" id="telefone" class="form-control" placeholder="(xx)xxxxx-xxxx" maxlength="15" required>

                        <i><img class="img-success" src="assets/img/success-icon.svg" alt="icone de sucesso"></i>
                        <i><img class="img-error" src="assets/img/error-icon.svg" alt="icone de erro"></i>
                    </div>

                    <div class="form-controler">
                        <label for="cargo">Cargo*</label>
                        <input type="text" name="cargo" id="cargo" class="form-control" placeholder="Digite o cargo desejado" required>

                        <i><img class="img-success" src="assets/img/success-icon.svg" alt="icone de sucesso"></i>
                        <i><img class="img-error" src="assets/img/error-icon.svg" alt="icone de erro"></i>
                    </div>

                    <div class="form-controler">
                        <label for="escolaridade">Selecione seu grau de escolaridade*</label>
                        <input list="list-escolaridade" name="escolaridade" id="escolaridade" class="field" placeholder="Selecionar" required>
                        <datalist name="list-escolaridade">
                            <datalist id="list-escolaridade">
                                <option value="Ensino Fundamental">
                                <option value="Ensino Médio completo">
                                <option value="Ensino Superior incompleto">
                                <option value="Ensino Superior completo">
                            </datalist>
                    </div>

                    <div class="form-file">
                        <label for="curriculo">Adicionar currículo</label>
                        <input type="file" name="curriculo" id="curriculo" class="form-file" required accept=".doc,.docx,application/msword, .pdf">
                        
                        <small class="all-media">Limite de tamanho de 1MB.</small>
                        <p class="desc-arquivo"></p>
                    </div>

                    <div class="form-controler">
                        <p><label for="obs">Deseja nos contar algo?</label></p>
                        <textarea class="form-control" type="textarea" name="obs" id="obs" placeholder="Tem alguma observação sobre o processo? Escreve aqui pra gente!" rows="3" cols="50"></textarea>
                    </div>



                    <div class="form-controler">
                        <button type="submit" class="btn-form" name="enviaForm" value="Enviar">Enviar</button>
                    </div>


                </form>
            </div>
        </section>
    </section>
    <script src="./assets/js/main.js"></script>
</body>

</html>