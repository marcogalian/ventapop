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
    if (window.scrollY >= 80) {
        navbarContainer.classList.add('shadow-bottom');
    }else{
        navbarContainer.classList.remove('shadow-bottom');
    } 
}

window.addEventListener('scroll', navShadow);