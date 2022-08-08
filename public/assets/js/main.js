const form = document.getElementById("form");
const nome = document.getElementById("nome");
const email = document.getElementById("email");
const telefone = document.getElementById('telefone');
const escolaridade = document.getElementById("escolaridade");
const curriculo = document.getElementById("curriculo");

form.addEventListener('submit', e => {
    // verificando se o campo nome foi digitado.
    if (nome.value == '') {
        const nomeControl = nome.parentElement;
        nomeControl.className = 'form-controler error';
        e.preventDefault();
    }

    // verificando o email com uma lógica sobre estrutura do valor digitado no campo email.
    if (email.value.indexOf("@") == -1 || email.value.indexOf(".") == -1 || email.value.indexOf(".") - email.value.indexOf("@") == 1) {
        const emailControl = email.parentElement;
        emailControl.className = 'form-controler error';
        e.preventDefault();
    }

    // molda a string de telefone para chegar no banco de dados como queremos.
    function validaTelefone(telefone) {
        var regex = new RegExp('^\\([0-9]{2}\\)((9[0-9]{4}-[0-9]{4})|([0-9]{5}-[0-9]{4}))$');
        return regex.test(telefone);
    }

    // atribuimos o valor(string) a variavel telefoneValido depois de tratado para ser verificado.
    const telefoneValido = validaTelefone(telefone.value);
    if (telefoneValido == false) {
        const telefoneControl = telefone.parentElement;
        telefoneControl.className = 'form-controler error';
        e.preventDefault();
    }

    // validando o tamanho do arquivo.
    if (curriculo.files.length > 0) {
        for (const i = 0; i <= curriculo.files.length - 1; i++) {
            const size = curriculo.files.item(i).size;
            const tamanho = Math.round(size / 1024);

            if (tamanho > 1024) {
                const curriculoControl = curriculo.parentElement;
                curriculoControl.className = 'form-file error';
                e.preventDefault();
            }
        }
    }


});

// escrevendo o tamanho do arquivo.
$('#curriculo').on('change', function () {
    const fileName = this.files[0].name;
    const size = (this.files[0].size / 1024 / 1024).toFixed(2);
    if (size > 1) {
       return $(".desc-arquivo").html('<b>' +
            fileName + ' tem: ' + size + " MB" + '</b>');
    } else {
        return $(".desc-arquivo").html('<b>' +
            fileName + ' tem: ' + size + " MB" + '</b>');
    }
});



// plugin que define uma máscara para o campo telefone.
$(document).ready(function () {
    $('#telefone').mask('(00)00000-0000');
});

// impede o usuário de digitar qualquer valor.
escolaridade.addEventListener('keypress', (e) => {
    e = e.toString().replace(/\D/g, "");
    escolaridade.value = e;
});