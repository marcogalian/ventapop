let cardText = document.querySelector('.card-text');
let cardImg = document.querySelector('.card-img');

function textView() {
    cardImg.addEventListener('mouseover', () => {
        cardText.classList.add('text-view')
    })

    cardImg.addEventListener('mouseout', () => {
        cardText.classList.remove('text-view')
    })
}

textView()