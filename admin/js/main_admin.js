// Modal Them
const modal = document.querySelector('.js-add-modal')
const closeModal = document.querySelector('.js-close')
const buyBtns = document.querySelectorAll('.js-them')
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
// Modal Sua
const editModal = document.querySelector('.js-edit-modal')
const closeEditModal = document.querySelector('.js-edit-close')
const buyEditBtns = document.querySelectorAll('.js-sua')
const editForm = document.querySelector('.js-edit-form')

function showEditModal(){
    editModal.classList.add('open')
}

function removeEditModal(){
    editModal.classList.remove('open')
}

for(const buyEditBtn of buyEditBtns){
    buyEditBtn.addEventListener('click', showEditModal)
}

closeEditModal.addEventListener('click', removeEditModal)

editModal.addEventListener('click', removeEditModal)

editForm.addEventListener('click', function(event){
    event.stopPropagation()
})