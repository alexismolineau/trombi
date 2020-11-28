const cards = document.querySelectorAll('.card-container');
const promotionCards = document.querySelectorAll('.promotion-card');
const content = document.querySelector('.main-content');
const promotionList = document.querySelector('.promotion-list');

function sortByName(){
    const cardsArray = Array.from(cards);
    cardsArray.sort(function(a, b){
        if(a.childNodes[1].childNodes[1].alt.split(' ')[1] == b.childNodes[1].childNodes[1].alt.split(' ')[1]){
            return 0;
        }
        if(a.childNodes[1].childNodes[1].alt.split(' ')[1] < b.childNodes[1].childNodes[1].alt.split(' ')[1]){
            return -1;
        }
        if(a.childNodes[1].childNodes[1].alt.split(' ')[1] > b.childNodes[1].childNodes[1].alt.split(' ')[1]){
            return 1;
        }
    });
    return cardsArray;
}


function sortByNumber(){
    const promotionCardsArray = Array.from(promotionCards);
    promotionCardsArray.sort(function(a, b){
        if(a.children[1].children[0].innerHTML == b.children[1].children[0].innerHTML){
            return 0;
        }
        if(a.children[1].children[0].innerHTML < b.children[1].children[0].innerHTML){
            return -1;
        }
        if(a.children[1].children[0].innerHTML > b.children[1].children[0].innerHTML){
            return 1;
        }
    });
    return promotionCardsArray;
}

function triAZ(){
    cardsArray = sortByName();

    for(let i = 0; i < cardsArray.length; i++){
        content.appendChild(cardsArray[i]);
    }
}

function triZA(){
    cardsArray = sortByName();

    for(let i = cardsArray.length - 1; i >= 0; i--){
        content.appendChild(cardsArray[i]);
    }
}

function tri19(){
    promotionCardsArray = sortByNumber();

    for(let i = 0; i < promotionCardsArray.length; i++){
        promotionList.appendChild(promotionCardsArray[i]);
    }
}

function tri91(){
    promotionCardsArray = sortByNumber();

    for(let i = promotionCardsArray.length - 1; i >= 0; i--){
        promotionList.appendChild(promotionCardsArray[i]);
    }
}