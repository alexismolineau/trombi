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

// asking user to confirm deletion

const deleteButtons = document.querySelectorAll('.del-link');

deleteButtons.forEach(link => link.addEventListener('click', event => {
    confirm('Voulez-vous supprimer cet étudiant ?') ? true : event.preventDefault();
}))

const onePageDeleteBtn = document.querySelector('.bo-options-button-red');

onePageDeleteBtn.addEventListener('click', event => {
    confirm('Voulez-vous supprimer cet étudiant ?') ? true: event.preventDefault();
})