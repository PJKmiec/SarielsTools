$(document).ready(function() {


  $('#g_num_form').submit(function() { // catch the form's submit event
    $('#g_num_form').closest('form').find(':submit').prop('disabled', true);
    $('#output').find('.card-body').text('Loading...');
    $('#output').removeClass('d-none');

      $.ajax({
          data: $(this).serialize(),
          type: $(this).attr('method'),
          url: $(this).attr('action'),
          success: function(response) {
            $('#output').find('.card-body').html(response);
            $('#g_num_form').closest('form').find(':submit').prop('disabled', false);
          }
      });
      return false; // cancel original event to prevent form submitting
  });

  $(document).on("click", "#markCodeButton", function(){
    $('#finalcode').focus().select();
    document.execCommand('copy');
    $(this).text("CODE COPIED!");
  });

  $(document).on("click", "#clearCodeButton", function(){
    $('#finalcode').val('');
    $('#markCodeButton').text('Mark & copy the code');
  });

  $(document).on("click", ".thumb", function(){
    if ($(this).hasClass('border')) {
      $(this).removeClass("border");
      rem_pic($(this).attr('data-big'), $(this).attr('src'));
    } else {
      $(this).addClass("border");
      $(this).attr("style","border-width: 2px !important; border-color: #17C671 !important")
      add_pic($(this).attr('data-big'), $(this).attr('src'));
    }
  });


function add_pic(big, thumb){
  $('#finalcode').val($('#finalcode').val() + '[URL=' + big + '][img]' + thumb + '[/img][/URL] ');
}

function rem_pic(big, thumb){
  var $to_remove = '[URL=' + big + '][img]' + thumb + '[/img][/URL] ';
  $('#finalcode').val($('#finalcode').val().replace($to_remove, ''));
}

});
