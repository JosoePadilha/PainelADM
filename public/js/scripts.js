var $ = jQuery.noConflict();
function id(el) {
    return document.getElementById(el);
}

$("input[data-bootstrap-switch]").each(function () {
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
})

function validarData(data, input) {
    var dataAtual = new Date();
    var dia = data.substring(0, 2);
    var mes = data.substring(3, 5);
    var ano = data.substring(6, 11);
    var mesAtual = dataAtual.getMonth() + 1;

    if (dia < 0 || dia > 31 || mes < 0 || mes > 12 || ano < 2020) {
        input.setCustomValidity('Data inválida');
    }
    else {
        input.setCustomValidity('');
    }
}

function validaTelefone(fone, input) {
    if (fone.length < 14 || fone.length > 15) {
        input.setCustomValidity('Telefone inválido');
    } else {
        input.setCustomValidity('');
    }
}

function validaSenha(input) {
    var passwordRepit = $(input).val();
    var password = $('input[name=password]').val();
    if (password != passwordRepit) {
        input.setCustomValidity('Repita a senha corretamente');
    } else {
        input.setCustomValidity('');
    }
}

function validaSenhaEdit(input) {
    var passwordRepit = $(input).val();
    var password = $('input[name=password]').val();
    if (password != null && passwordRepit == null) {
        input.setCustomValidity('Repita a senha corretamente');
        passwordRepit.attr('required', true);
    } else {
        input.setCustomValidity('');
    }
}

function limitarInput(input) {
    input.value = input.value.substring(0, 2);
}

function SomenteNumero(e) {
    var tecla = (window.event) ? event.keyCode : e.which;
    if ((tecla > 47 && tecla < 58))
        return true;
    else {
        if (tecla == 8 || tecla == 0)
            return true;
        else
            return false;
    }
}

function formatarMoeda() {
    var elemento = document.getElementById('price');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }

    elemento.value = valor;
    if(valor == 'NaN') elemento.value = '';
}

function moeda(z) {
    v = z.value;
    v = v.replace(/\D/g, "")  //permite digitar apenas números
    v = v.replace(/[0-9]{12}/, "inválido")   //limita pra máximo 999.999.999,99
    v = v.replace(/(\d{1})(\d{8})$/, "$1.$2")  //coloca ponto antes dos últimos 8 digitos
    v = v.replace(/(\d{1})(\d{5})$/, "$1.$2")  //coloca ponto antes dos últimos 5 digitos
    v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2")    //coloca virgula antes dos últimos 2 digitos
    z.value = v;
}

function validarCNPJ(cnpj, input) {

    cnpj = cnpj.replace(/[^\d]+/g, '');

    if (cnpj == '') {
        input.setCustomValidity('CNPJ inválido!!');
        cnpj = "";
        return false;
    }

    if (cnpj.length != 14) {
        input.setCustomValidity('CNPJ inválido!!');
        cnpj = "";
        return false;
    }

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999") {
        input.setCustomValidity('CNPJ inválido!!');
        cnpj = "";
        return false;
    }

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)) {
        input.setCustomValidity('CNPJ inválido!!');
        cnpj = "";
        return false;
    }

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)) {
        input.setCustomValidity('CNPJ inválidos!!');
        cnpj = "";
        return false;
    }

    input.setCustomValidity('');
    return true;
}

function validarCPF(cpf, input) {
    var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
    if (!filtro.test(cpf)) {
        input.setCustomValidity('CPF inválido!!');
        cpf = "";
        return false;
    }

    cpf = remove(cpf, ".");
    cpf = remove(cpf, "-");
    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
        cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
        cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
        cpf == "88888888888" || cpf == "99999999999") {
        input.setCustomValidity('CPF inválido!!');
        cpf = "";
        return false;
    }
    soma = 0;
    for (i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    resto = 11 - (soma % 11);
    if (resto == 10 || resto == 11) {
        resto = 0;
    }
    if (resto != parseInt(cpf.charAt(9))) {
        input.setCustomValidity('CPF inválido!!');
        cpf = "";
        return false;
    }
    soma = 0;
    for (i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = 11 - (soma % 11);
    if (resto == 10 || resto == 11) {
        resto = 0;
    }

    if (resto != parseInt(cpf.charAt(10))) {
        input.setCustomValidity('CPF inválido!!');
        cpf = "";
        return false;
    }
    input.setCustomValidity('');
    return true;
}

function remove(str, sub) {
    i = str.indexOf(sub);
    r = "";
    if (i == -1)
        return str;
    {
        r += str.substring(0, i) + remove(str.substring(i + sub.length), sub);
    }

    return r;
}

function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function cnpj_mask(v) {
    v = v.replace(/\D/g, "")                           //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/, "$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v = v.replace(/(\d{4})(\d)/, "$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}

function cpf_mask(v) {
    v = v.replace(/\D/g, "")                 //Remove tudo o que não é dígito
    v = v.replace(/(\d{3})(\d)/, "$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
    v = v.replace(/(\d{3})(\d)/, "$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    return v
}

$('.modalConfirma').on('click', function () {
    var type = $(this).data('type'); // busca o valor do atributo data-tipo (editar ou excluir)
    var rout = $(this).data('rout'); // busca a rota
    if (type === "edit") {
        $('a.edit-yes').attr('href', rout); // mudar dinamicamente o link, href do botão confirmar da modal
        $('#modalEditar').modal('show'); // modal aparece

    } else if (type === "delete") {
        $('a.delete-yes').attr('href', rout); // mudar dinamicamente o link, href do botão confirmar da modal
        $('#modalExcluir').modal('show'); // modal aparece
    }
    else if (type === "see") {
        $('a.see-yes').attr('href', rout); // mudar dinamicamente o link, href do botão confirmar da modal
        $('#modalSee').modal('show'); // modal aparece
    }
    else if (type === "document") {
        $('a.document-yes').attr('href', rout); // mudar dinamicamente o link, href do botão confirmar da modal
        $('#modalDocument').modal('show'); // modal aparece
    }
});
