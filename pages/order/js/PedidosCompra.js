const selectedOption = document.querySelector('.selected-option')
const selectValue = document.querySelector('.select-value')
const optionContainer = document.querySelector('.options')
const optionList = document.querySelectorAll('.option')
const optionContainer2 = document.querySelector('.transferencia')
const optionContainer5 = document.querySelector('.T5')
const optionContainer6 = document.querySelector('.T6')

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

    if(selectValue.innerText == 'Dolares(USD)'){ optionContainer5.dataset.toggle = '', optionContainer6.dataset.toggle = 'st'}
    if(selectValue.innerText == 'Trasferencia(Bs.)'){ optionContainer2.dataset.toggle = '', optionContainer5.dataset.toggle = 'nt', optionContainer6.dataset.toggle = ''} else {
        optionContainer2.dataset.toggle = 'collapsed'
    }
}

optionList.forEach((option) => {
    option.addEventListener('click', (e)=> {
        updateSelectValue(option)
        selectToggle()
    })
})
