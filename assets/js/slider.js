const mainSlider = document.querySelector('.slider-img')
const imgs = document.querySelectorAll('.main-slider-img')
const btnLeft = document.querySelector('.btn-left')
const btnRight = document.querySelector('.btn-right')
let current = 0

const sliderShow = () => {
    if(current == 2){
        current = 0;
        mainSlider.style.transform = `translateX(0px)`
    
    }else{
        current ++
        let width = imgs[0].offsetWidth
        mainSlider.style.transform = `translateX(${width * -1 * current}px)`
    }
}
let clickEventNext = setInterval(sliderShow, 3000)

btnRight.addEventListener('click', () => {
    clearInterval(clickEventNext)
    sliderShow()
    clickEventNext = setInterval(sliderShow, 3000)
})
btnLeft.addEventListener('click', () => {
    clearInterval(clickEventNext)
    if(current == 0){
        current = 2;
        let width = imgs[0].offsetWidth
        mainSlider.style.transform = `translateX(${width * -1 * current}px)`
    
    }else{
        current --
        let width = imgs[0].offsetWidth
        mainSlider.style.transform = `translateX(${width * -1 * current}px)`
    }
    clickEventNext = setInterval(sliderShow, 3000)
})