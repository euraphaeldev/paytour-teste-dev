<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Paytour - Processo seletivo Desenvolvedor Full Stack</title>
</head>

<body>
    <div class="main-container">
        <div class="main-content">
            <div class="form-container">

                <form action="/" name="envia_msg" method="POST">

                    <div class="form-control">
                        <label for="nome">Digite seu nome</label>
                        <input type="text" name="nome" id="nome" placeholder="digite seu nome completo">
                    </div>

                    <div class="form-control">
                        <label for="email">Digite seu email</label>
                        <input type="email" name="email" id="email" placeholder="exemplo@email.com.br">
                    </div>

                    <div class="form-control">
                        <label for="tel">Digite seu telefone com DDD:</label>
                        <input type="tel" name="tel" id="tel" placeholder="(xx)xxxxx-xxxx">
                    </div>

                    <div class="form-control">
                        <label for="cargo">Cargo:</label>
                        <input type="text" name="cargo" id="cargo" placeholder="digite o cargo desejado">
                    </div>

                    <div class="form-control">
                        <label for="escolaridade">Selecione seu nível de escolaridade</label>
                        <input list="list-escolaridade" type="text" name="escolaridade" id="escolaridade" placeholder="Selecione seu grau de escolaridade">
                        <datalist id="list-escolaridade">
                            <select>
                                <option value="Ensino Fundamental"></option>
                                <option value="Ensino Médio incompleto"></option>
                                <option value="Ensino Médio completo"></option>
                                <option value="Ensino Superior incompleto"></option>
                                <option value="Ensino Superior completo"></option>
                            </select>
                        </datalist>
                    </div>

                    <div class="form-control">
                        <p><label for="obs">Observação:</label></p>
                        <textarea type="textarea" name="obs" id="obs" placeholder="Tem alguma observação sobre o processo? Escreve aqui pra gente!" rows="6" cols="50"></textarea>
                    </div>

                    <div class="form-control">
                        <label for="curriculo" class="file">Envie seu currículo.</label>
                        <input type="file" name="curriculo" id="curriculo">
                    </div>

                    <button type="submit" class="btn-form" name="sendMessage" value="Enviar">ENVIAR</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>