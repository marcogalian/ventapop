// Cards -------------------------------------------------------------------------------####

function textView() {
    let cardTexts = document.querySelectorAll('.card-text');
    let cardImgs = document.querySelectorAll('.card-img');

    cardImgs.forEach((cardImg, index) => {

        let cardText = cardTexts[index];

        cardImg.addEventListener('mouseover', () => {
            cardText.classList.add('text-view')
        })

        cardImg.addEventListener('mouseout', () => {
            cardText.classList.remove('text-view')
        })
    })

}
textView()

// Vista show --------------------------------------------------------------------------####


// box-shadow navbar -------------------------------------------------------------------####

function navShadow(){

    let navbarContainer = document.querySelector('.navbar-container');
    let inputSearch = document.querySelector('.search-input');
    let btnSearch = document.querySelector('.btn-search');
    if (window.scrollY >= 80) {
        navbarContainer.classList.add('shadow-bottom');
        inputSearch.classList.add('shadow-bottom');
        btnSearch.classList.add('shadow-bottom');
    }else{
        navbarContainer.classList.remove('shadow-bottom');
        inputSearch.classList.remove('shadow-bottom');
        btnSearch.classList.remove('shadow-bottom');
    } 
}

window.addEventListener('scroll', navShadow);


// Mensaje trabaja con nosotros ----------------------------------------------------------####

let trabajaNosotros = document.querySelector('.trabaja-nosotros');
let mainHero = document.querySelector('.main-hero');
if (mainHero) {
    mainHeroMarginOriginal = mainHero.style.marginTop;
}

if (trabajaNosotros) {
    mainHero.style.cssText = "margin-top: 0px !important";
    console.log(mainHero);
    setTimeout(() => {
        trabajaNosotros.style.display = 'none';
        mainHero.style.marginTop = mainHeroMarginOriginal;
    }, 5000)
}
