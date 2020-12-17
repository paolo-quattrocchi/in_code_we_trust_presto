
$(document).ready(function(){
    $('.toast').toast('show');
    $('.toast').addClass('toast-anim');
    setTimeout(function () {
      $('.toast').removeClass('toast-anim');
  }, 5500);
  });