'use strict';
const modifyLinks = document.querySelectorAll('.modify-link');
const modifyModal = document.querySelector('#modify-modal');
const modifyContent = document.querySelector('#modify-content');

modifyLinks.forEach((link) => {
    link.addEventListener('click', async (evt) => {
        evt.preventDefault();
        const id = link.dataset.id;
        const response = await fetch('modifyForm.php?id=' + id);
        const html = await response.text();
        modifyContent.innerHTML = '';
        modifyContent.insertAdjacentHTML('afterbegin', html);
        modifyModal.showModal();
    })
})