$( document ).ready(function() {
  // open/close menu when you click on the button
  var isOpen = false;

  $('#openMenu').click(function(){
    if (isOpen == true) {
      $('#createForm').css('height', '0');
      isOpen = false;
    } else {
      $('#createForm').css('height', '100vh');
      isOpen = true;
    }
  });
});
