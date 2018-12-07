const allCards = document.querySelectorAll('.card-columns .card');
const paginationPlaceholder = document.querySelector('#cardPagination');

// let activePage = 0;
// let cardsPerPage = 6;

let length = allCards.length;

let pages = Math.ceil(length/cardsPerPage);

init();

showPage(activePage);

function init() {
    let paginationCode = `<li class="page-item" id="prev"><button class="page-link" onclick="prevPage()">Prev</button></li>`;

    for(let i = 0; i < pages; i++) {
        paginationCode += `<li class="page-item"><button class="page-link" onclick="showPage(${i})">${i+1}</button></li>`;
    }
    

    paginationCode += `<li class="page-item" id="next"><button type="button" class="page-link" onclick="nextPage()">Next</button></li>`;
    paginationPlaceholder.innerHTML = paginationCode;    

}

function hideAll() {
    allCards.forEach(function(item) {
        item.classList.add('d-none');
    })
}

function nextPage() {
    showPage(activePage + 1);
}

function prevPage() {
    showPage(activePage - 1);
}


function showPage(index) {
    
    hideAll();
    let start = index * cardsPerPage;
    let stop = index * cardsPerPage + cardsPerPage;

    stop = (stop < allCards.length) ? stop : allCards.length - 1;

    for(let i = start; i < stop; i++) {
        allCards[i].classList.remove('d-none');
    }

    activePage = index;


    const prevButton = document.querySelector('#prev');
    const nextButon = document.querySelector('#next');

    if(activePage === 0) {
        prevButton.classList.add('disabled');
    } else {
        prevButton.classList.remove('disabled');
    }

    if(activePage === pages-1) {
        nextButon.classList.add('disabled');
    } else {
        nextButon.classList.remove('disabled');
    }

}