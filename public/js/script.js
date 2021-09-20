// Script navbar
const burgerIcon = document.querySelector('.navbar-burger');
const navbarMenu = document.querySelector('.navbar-menu');

burgerIcon.addEventListener('click', () =>{
  navbarMenu.classList.toggle('is-active');
});


// Button delete notification
document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});