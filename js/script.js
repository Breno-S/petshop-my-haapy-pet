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


inputNumber.onblur = (e) => {
	const value = e.target.value;
	const valueReplace = value.replaceAll(' ', '')


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

	inputValidateInfo.querySelector('.message').innerText = ''
	inputValidateInfo.classList.remove('visible')
	canSubmit();
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


		cardViewCvv.value = value

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
		
		if(Number(dataValidade[1]) <= Number(yyyy) && (Number(dataValidade[0]) >= 1 || Number(dataValidade[0]) <= 12)){
			if (Number(dataValidade[1]) < Number(yyyy) || Number(dataValidade[0]) < Number(mm)) {
				const message = `Erro: Cartão Vencido`
				inputValidateInfo.querySelector('.message').innerText = message
				inputValidateInfo.classList.add('visible')
				btnSubmit.classList.add('disable')
			}
			else{
				inputValidateInfo.querySelector('.message').innerText = ""
				inputValidateInfo.classList.remove('visible');
				btnSubmit.classList.remove('disable');
			}	
		}
		else if (Number(dataValidade[0]) < 1 || Number(dataValidade[0]) > 12) {
			const message = `Erro: Mês Inválido`
			inputValidateInfo.querySelector('.message').innerText = message
			inputValidateInfo.classList.add('visible')
			btnSubmit.classList.add('disable')
		}
		else{
			inputValidateInfo.querySelector('.message').innerText = ""
			inputValidateInfo.classList.remove('visible');
			btnSubmit.classList.remove('disable');
		}		
	}
}

inputCvv.onfocus = () => {
	cardBox.classList.remove('rotate')
}

inputCvv.onblur = () => {
	cardBox.classList.add('rotate')
	canSubmit();
}

function canSubmit(){
	
	const inputs = document.querySelectorAll('input')

	for(let i = 0; i < inputs.length; i++){

		if(inputs[i].value.length <= 0){
			btnSubmit.classList.add('disable')
			return false;
		}
	}

	btnSubmit.classList.remove('disable')
}

canSubmit()