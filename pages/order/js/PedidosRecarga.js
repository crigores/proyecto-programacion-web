const selectedOption = document.querySelector('.selected-option')
const selectValue = document.querySelector('.select-value')
const optionContainer = document.querySelector('.options')
const optionList = document.querySelectorAll('.option')
const optionContainer2 = document.querySelector('.transferencia')
const Container1 = document.querySelector('.T2')
const Container2 = document.querySelector('.T3')
const Container3 = document.querySelector('.T5')
const Container4 = document.querySelector('.T6')

/** Toggle function */

const selectToggle = ()=> {
    if(optionContainer.dataset.toggle == 'collapsed') {
        optionContainer.dataset.toggle = ''
    } else {
        optionContainer.dataset.toggle = 'collapsed'
    }
}


/** When click on selected-option */
selectedOption.addEventListener('click', selectToggle)


/** This function update select value */
const updateSelectValue = (option) => {
    selectValue.innerText = option.innerText;

    if(selectValue.innerText == 'Efectivo(Bs.)'){ Container1.dataset.toggle = '', Container3.dataset.toggle = '', Container4.dataset.toggle = 'st'} else {
        Container1.dataset.toggle = 'bs'
    }
    if(selectValue.innerText == 'Dolares(USD)'){ Container2.dataset.toggle = '', Container3.dataset.toggle = '', Container4.dataset.toggle = 'st'} else {
        Container2.dataset.toggle = 'usd'
    }
    if(selectValue.innerText == 'Trasferencia(Bs.)'){ optionContainer2.dataset.toggle = '', Container1.dataset.toggle = '',Container3.dataset.toggle = 'nt', Container4.dataset.toggle = ''} else {
        optionContainer2.dataset.toggle = 'collapsed'
    }
}

optionList.forEach((option) => {
    option.addEventListener('click', (e)=> {
        updateSelectValue(option)
        selectToggle()
    })
})