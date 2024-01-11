// onkeyup': 'mascaraCPF();

/**
 * Aplica uma máscara de CPF ao campo de entrada.
 */
function formatarCPF() {
    // Obtém o elemento de input do CPF
    let campoCPF = document.querySelector('#text-cpf');

    // Adiciona um ponto após o terceiro e o sétimo dígito do CPF
    if (campoCPF.value.length === 3 || campoCPF.value.length === 7) {
        campoCPF.value += '.';
    } 
    // Adiciona um traço após o décimo primeiro dígito do CPF
    else if (campoCPF.value.length === 11) {
        campoCPF.value += '-';
    }
}

/**
 * Aplica uma máscara de telefone celular ao campo de entrada.
 */
function formatarPhone() {
    let campoCelular = document.querySelector('#text-phone');
    let numeros = campoCelular.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (numeros.length >= 1 && numeros.length <= 2) {
        campoCelular.value = `(${numeros}`;
    } else if (numeros.length >= 3 && numeros.length <= 7) {
        campoCelular.value = `(${numeros.substr(0, 2)}) ${numeros.substr(2)}`;
    } else if (numeros.length >= 8 && numeros.length <= 12) {
        campoCelular.value = `(${numeros.substr(0, 2)}) ${numeros.substr(2, 1)} ${numeros.substr(3, 4)}-${numeros.substr(7)}`;
    }
    // Você pode adicionar mais lógica conforme necessário
}


/**
 * Aplica uma máscara de CEP ao campo de entrada.
 */
function formatarCEP() {
    // Obtém o elemento de input do CEP
    let campoCEP = document.querySelector('#text-cep');

    // Adiciona o traço após o quinto dígito do CEP
    if (campoCEP.value.length === 5) {
        campoCEP.value += '-';
    }
}


function validationInput(input) {
    // Remove caracteres não permitidos (exceto números, pontos e vírgulas)
    input.value = input.value.replace(/[^0-9.,]/g, '');
  }