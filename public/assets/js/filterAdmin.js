const tBody = document.querySelector('tbody');
const tRows = document.querySelectorAll('.back-office-row');


function filterByName(inputValue){
    const tRowsArray = Array.from(tRows);
    let filteredtRowsArray = [];
    for(let i = 0; i < tRowsArray.length; i++){
        if(tRowsArray[i].children[2].innerHTML.toLowerCase().includes(inputValue.toLowerCase())){
            filteredtRowsArray.push(tRowsArray[i]);
        }
    }
    return filteredtRowsArray;
}

function filterByPromotionName(inputValue){
    const tRowsArray = Array.from(tRows);
    let filteredtRowsArray = [];
    for(let i = 0; i < tRowsArray.length; i++){
        if(tRowsArray[i].children[1].innerHTML.toLowerCase().includes(inputValue.toLowerCase())){
            filteredtRowsArray.push(tRowsArray[i]);
        }
    }
    return filteredtRowsArray;
}

function inputName(){
    let inputValue = document.querySelector('.js-search-bar').value;
    let filteredArray = filterByName(inputValue);
    tBody.innerHTML = '';
    for(let i = 0; i < filteredArray.length; i++){
        tBody.appendChild(filteredArray[i]);
    }
}

function inputPromotionName(){
    let inputValue = document.querySelector('.js-search-bar').value;
    let filteredArray = filterByPromotionName(inputValue);
    tBody.innerHTML = '';
    for(let i = 0; i < filteredArray.length; i++){
        tBody.appendChild(filteredArray[i]);
    }
}