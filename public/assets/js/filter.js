

function filterByName(inputValue){
    const cardsArray = Array.from(cards);
    let filteredCardsArray = [];
    for(let i = 0; i < cardsArray.length; i++){
        if(cardsArray[i].childNodes[1].childNodes[1].alt.split(' ')[1].toLowerCase().includes(inputValue.toLowerCase())){
            filteredCardsArray.push(cardsArray[i]);
        }
    }
    return filteredCardsArray;
}

function filterByPromotionName(inputValue){
    const cardsArray = Array.from(promotionCards);
    let filteredCardsArray = [];
    console.log(cardsArray[0].children[2].children[0].children[0].innerHTML);
    for(let i = 0; i < cardsArray.length; i++){
        if(cardsArray[i].children[2].children[0].children[0].innerHTML.toLowerCase().includes(inputValue.toLowerCase())){
            filteredCardsArray.push(cardsArray[i]);
        }
    }
    return filteredCardsArray; 
}

function inputName(){
    let inputValue = document.querySelector('.js-search-bar').value;
    let filteredcardsArray = filterByName(inputValue);
    content.innerHTML = '';
    for(let i = 0; i < filteredcardsArray.length; i++){
        content.appendChild(filteredcardsArray[i]);
    }
}

function inputPromotionName(){
    let inputValue = document.querySelector('.js-search-bar').value;
    let filteredcardsArray = filterByPromotionName(inputValue);
    promotionList.innerHTML = '';
    for(let i = 0; i < filteredcardsArray.length; i++){
        promotionList.appendChild(filteredcardsArray[i]);
    }
}