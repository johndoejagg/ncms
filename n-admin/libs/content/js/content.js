$(document).ready(function(){
  $("#content > nav").append($("#navextend"));
  $('#toggleRightSidebar').on('click', function () {
      $('.wrapper').toggleClass('rightsidebaractice');
  });

})
