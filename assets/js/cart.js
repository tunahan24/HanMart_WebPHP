// Modal thong tin khach hang
const modal = document.querySelector('.js-add-modal')
const closeModal = document.querySelector('.js-close')
const buyBtns = document.querySelectorAll('.js-pay')
const addForm = document.querySelector('.js-add-form')

function showModal(){
    modal.classList.add('open')
}

function removeModal(){
    modal.classList.remove('open')
}

for(const buyBtn of buyBtns){
    buyBtn.addEventListener('click', showModal)
}

closeModal.addEventListener('click', removeModal)

modal.addEventListener('click', removeModal)

addForm.addEventListener('click', function(event){
    event.stopPropagation()
})