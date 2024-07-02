const adminContent = document.querySelector('.admin-content');
const adminUsers = document.querySelector('.admin-users');
const adminZaiava = document.querySelector('.admin-zaiava');

// Sections
const newInfoContent = document.querySelector('.new-info-content');
const contentInfoBlock = document.querySelectorAll('.content-info-block');
const userInfoBlock = document.querySelectorAll('.user-info-block');
const zaiavaNePidtverdjena = document.querySelectorAll('.zaiava-ne-pidtverdjena');
const zaiavaPidtverdjena = document.querySelectorAll('.zaiava-pidtverdjena');

// Zaiava buttons
const nePidtvButton = document.querySelector('.ne-pidtv');
const pidtvButton = document.querySelector('.pidtv');

function hideAll() {
    newInfoContent.classList.add('none');
    contentInfoBlock.forEach(block => block.classList.add('none'));
    userInfoBlock.forEach(block => block.classList.add('none'));
    zaiavaNePidtverdjena.forEach(block => block.classList.add('none'));
    zaiavaPidtverdjena.forEach(block => block.classList.add('none'));
    nePidtvButton.classList.add('none');
    pidtvButton.classList.add('none');
}

adminContent.addEventListener("click", function () {
    hideAll();
    adminContent.classList.add('active-menu');
    adminUsers.classList.remove('active-menu');
    adminZaiava.classList.remove('active-menu');
    newInfoContent.classList.remove('none');
    contentInfoBlock.forEach(block => block.classList.remove('none'));
});

adminUsers.addEventListener("click", function () {
    hideAll();
    adminUsers.classList.add('active-menu');
    adminContent.classList.remove('active-menu');
    adminZaiava.classList.remove('active-menu');
    userInfoBlock.forEach(block => block.classList.remove('none'));
});

adminZaiava.addEventListener("click", function () {
    hideAll();
    adminZaiava.classList.add('active-menu');
    adminContent.classList.remove('active-menu');
    adminUsers.classList.remove('active-menu');
    nePidtvButton.classList.remove('none');
    pidtvButton.classList.remove('none');
    zaiavaNePidtverdjena.forEach(block => block.classList.remove('none'));
});

nePidtvButton.addEventListener("click", function () {
    zaiavaNePidtverdjena.forEach(block => block.classList.remove('none'));
    zaiavaPidtverdjena.forEach(block => block.classList.add('none'));
    nePidtvButton.classList.add('active-menu');
    pidtvButton.classList.remove('active-menu');
});

pidtvButton.addEventListener("click", function () {
    zaiavaNePidtverdjena.forEach(block => block.classList.add('none'));
    zaiavaPidtverdjena.forEach(block => block.classList.remove('none'));
    pidtvButton.classList.add('active-menu');
    nePidtvButton.classList.remove('active-menu');
});
