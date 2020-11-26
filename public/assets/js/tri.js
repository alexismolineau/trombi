let cards = document.querySelectorAll('.card-container');
let content = document.querySelector('.main-content');

function sortByName(){
    const cardsArray = Array.from(cards);
    cardsArray.sort(function(a, b){
        if(a.childNodes[1].childNodes[1].alt.split(' ')[1] === b.childNodes[1].childNodes[1].alt.split(' ')[1]){
            return 0;
        }
        if(a.childNodes[1].childNodes[1].alt.split(' ')[1] < b.childNodes[1].childNodes[1].alt.split(' ')[1]){
            return 1;
        }
        if(a.childNodes[1].childNodes[1].alt.split(' ')[1] > b.childNodes[1].childNodes[1].alt.split(' ')[1]){
            return -1;
        }
    });
    return cardsArray;
}

function triAZ(){
    cardsArray = sortByName();
    console.log(cardsArray);
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