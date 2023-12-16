// Modal Sua
const editModal = document.querySelector('.js-edit-modal')
const closeEditModal = document.querySelector('.js-edit-close')
const buyEditBtns = document.querySelectorAll('.js-sua')
const editForm = document.querySelector('.js-edit-form')



function removeEditModal(){
    editModal.classList.remove('open')
}


if(closeEditModal !== null){
    closeEditModal.addEventListener('click', removeEditModal)
}
if(editModal !== null){
    editModal.addEventListener('click', removeEditModal)
}
if(editForm !==null){
    editForm.addEventListener('click', function(event){
        event.stopPropagation()
    })
}
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