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
