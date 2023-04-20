const cardBox = document.querySelector('div.card-content-box')
const btnRotateCard = document.querySelector('#rotate-card')
const btnSubmit = document.querySelector('#input-submit')


const inputNumber = document.querySelector('#input-number')
const inputNumberInfo = document.querySelector('#input-number + .info')
const inputName = document.querySelector('#input-name')
const inputNameInfo = document.querySelector('#input-name + .info')
const inputCvv = document.querySelector('#input-cvv')
const inputCvvInfo = document.querySelector('#input-cvv + .info')
const inputValidate = document.querySelector('#input-validate')
const inputValidateInfo = document.querySelector('#input-validate + .info')

const cardViewName = document.querySelector('#card-user-name');
const cardViewNumber = document.querySelector('#card-user-number');
const cardViewCvv = document.querySelector('#card-user-cvv');
const cardViewDate = document.querySelector('#card-user-date');

var numCartao;

var dataValida = false;
var ta_serto = false;
var ta_serto_os2 = false;
var cartoes_aceitos = {
  visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
  mastercard:
    /^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$/,
};

inputNumber.onblur = (e) => {
	const value = e.target.value;
	const valueReplace = value.replaceAll(' ', '')
	numCartao = value;

	if (validateCard(value)){
		ta_serto = true;
		} else {
		  ta_serto = false;
		  btnSubmit.classList.add('disable')
		  return false;
	  }

	if(value.length <= 0){
		const message = "Preenchimento obrigatório!"
		inputNumberInfo.querySelector('.message').innerText = message
		inputNumberInfo.classList.add('visible')
		btnSubmit.classList.add('disable')
		return false;
	}

	if(!/^[0-9]{16}$/.test(valueReplace)){
		const message = "Use apenas números, e verifique se estão completos!"
		inputNumberInfo.querySelector('.message').innerText = message
		inputNumberInfo.classList.add('visible')
		btnSubmit.classList.add('disable')
		return false;
	
	}

	inputNumberInfo.querySelector('.message').innerText = ''
	inputNumberInfo.classList.remove('visible')

	canSubmit();

}

inputName.onblur = (e) => {
	const value = e.target.value;
	const valueReplace = value.replaceAll(' ', '')


	if(value.length <= 0){
		const message = "Preenchimento obrigatório!"
		inputNameInfo.querySelector('.message').innerText = message
		inputNameInfo.classList.add('visible')
		btnSubmit.classList.add('disable')
		return false;
	}

	if(!/^[a-z]+$/i.test(valueReplace)){
		const message = "Insira seu nome de forma correcta!"
		inputNameInfo.querySelector('.message').innerText = message
		inputNameInfo.classList.add('visible')
		btnSubmit.classList.add('disable')
		return false;
	}

	inputNameInfo.querySelector('.message').innerText = ''
	inputNameInfo.classList.remove('visible')
	canSubmit();
}

inputValidate.onblur = (e) => {
	const value = e.target.value;
	const valueReplace = value.replaceAll(' ', '')


	if(value.length <= 0){
		const message = "Preenchimento obrigatório!"
		inputValidateInfo.querySelector('.message').innerText = message
		inputValidateInfo.classList.add('visible')
		btnSubmit.classList.add('disable')
		return false;
	}

	if(!/^[0-9]{2}\/[0-9]{4}/i.test(valueReplace)){
		const message = `Use o padrão "mês/ano"`
		inputValidateInfo.querySelector('.message').innerText = message
		inputValidateInfo.classList.add('visible')
		btnSubmit.classList.add('disable')
		return false;
	}

	validaData(value);

	if (dataValida) {
		canSubmit();
	}
	else{
		return false;
	}
	
}

btnRotateCard.addEventListener('click', (e) => {
	cardBox.classList.toggle('rotate')
})

const handleName = (e) => {

	setTimeout(() => {

		const value = e.target.value

		cardViewName.innerText= value

	}, 100)
	
}

const handleNumber = (e) => {

	setTimeout(() => {
		let apagou = false;
		let teste = '';

		const value = e.target.value


		if(value.length >= 20) {
			return false;
		}

		if(e.key == 'Backspace') {
			cardViewNumber.innerText = value
			apagou = true;
			return false
		}

		if(value.length == 5 || value.length == 10 || value.length == 15) {

			teste = value.replace(/ /g,"");
			teste = teste.match(/.{1,4}/g);
			e.target.value = teste.join(' ');
			// e.target.value += " "
		}

		cardViewNumber.innerText = value

	}, 0)
	
}

const handleCvv = (e) => {

	setTimeout(() => {

		const value = e.target.value


		cardViewCvv.innerText = "•••"

	}, 0)
	
}

const handleValidate = (e) => {

	setTimeout(() => {
		

		const value = e.target.value


		cardViewDate.innerText = value

		let adcBarra = '';
		if(value.length == 3) {

			adcBarra = value.replace(/\//ig,"");
			adcBarra = adcBarra.match(/.{1,2}/g);
			e.target.value = adcBarra.join('/');
		}
	}, 0)
	
}

function validaData(data) {
	if (data.length == 7) {
		var hoje = new Date();
		var mm = String(hoje.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = hoje.getFullYear();
		let dataValidade = data.split('/');
		
		if(Number(dataValidade[1]) <= Number(yyyy) && (Number(dataValidade[0]) >= 1 && Number(dataValidade[0]) <= 12)){
			if (Number(dataValidade[1]) < Number(yyyy) || Number(dataValidade[0]) < Number(mm)) {
				const message = `Erro: Cartão Vencido`
				inputValidateInfo.querySelector('.message').innerText = message
				inputValidateInfo.classList.add('visible')
				btnSubmit.classList.add('disable')
				dataValida = false;
			}
			else{
				inputValidateInfo.querySelector('.message').innerText = ""
				inputValidateInfo.classList.remove('visible');
				btnSubmit.classList.remove('disable');
				dataValida = true;
			}	
		}
		else if (Number(dataValidade[0]) < 1 || Number(dataValidade[0]) > 12) {
			const message = `Erro: Mês Inválido`
			inputValidateInfo.querySelector('.message').innerText = message
			inputValidateInfo.classList.add('visible')
			btnSubmit.classList.add('disable')
			dataValida = false;
		}
		else{
			inputValidateInfo.querySelector('.message').innerText = ""
			inputValidateInfo.classList.remove('visible');
			btnSubmit.classList.remove('disable');
			dataValida = true;
		}	
	}
}

inputCvv.onfocus = () => {
	cardBox.classList.remove('rotate')
}

inputCvv.onblur = (e) => {
	cardBox.classList.add('rotate');
	const value = e.target.value;
	if (validateCVV(numCartao, value)){
		if (ta_serto) {
			ta_serto_os2 = true;
		}
	} 
	else {
		ta_serto_os2 = false;
		btnSubmit.classList.add('disable');
		return false;
	}

	if (ta_serto && ta_serto_os2) {
		btnSubmit.classList.remove('disable')
	}
	canSubmit();
}

function canSubmit(){
	
	const inputs = document.querySelectorAll('input')

	for(let i = 1; i < 5; i++){
		if(inputs[i].value.length <= 0){
			btnSubmit.classList.add('disable')
			return false;
		}
	}
	if (ta_serto && ta_serto_os2 && dataValida) {
		btnSubmit.classList.remove('disable')
	}
}

canSubmit()

function validateCard(cartao) {
  // remove all non digit characters
  let texto = String(cartao)
  var value = texto.replace(/\D/g, "");
  var sum = 0;
  var shouldDouble = false;
  // loop through values starting at the rightmost side
  for (var i = value.length - 1; i >= 0; i--) {
    var digit = parseInt(value.charAt(i));

    if (shouldDouble) {
      if ((digit *= 2) > 9) digit -= 9;
    }

    sum += digit;
    shouldDouble = !shouldDouble;
  }

  var valid = sum % 10 == 0;
  var accepted = false;

  // loop through the keys (visa, mastercard, amex, etc.)
  Object.keys(cartoes_aceitos).forEach(function (key) {
    var regex = cartoes_aceitos[key];
    if (regex.test(value)) {
      accepted = true;
    }
  });

  return valid && accepted;
}

function validateCVV(creditCard, cvv) {
  // remove all non digit characters
  let textoCartao = String(creditCard);
  let textoCVV = String(cvv);
  var cartao = textoCartao.replace(/\D/g, "");
  var numeros = textoCVV.replace(/\D/g, "");
    // validar se o cvv tem 3 digitos
  if (/^\d{3}$/.test(numeros)) {
    return true;
  }

  return false;
}





