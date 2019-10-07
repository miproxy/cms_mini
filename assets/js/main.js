var handleMainContent = function() {
    $(document).ready( function () {
      // Init DataTable
      $('#public-users-table').DataTable({
         "searching": false,
         "paging": false,
         "info": false
      });
    });
};

var Main = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleMainContent();
		}
	};
}();

// Save user data
$(document).on('click', '#update_profile', function() {
  var user_id = $('#user_id').val();
  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var description = $('#personal_description').val();
  var private = ($('#private').is(":checked")) ? 1 : 0;

  $.ajax({
    url: '/cms_mini/helpers/update_user.php',
    type: 'POST',
    data: {
      'user_id': user_id,
      'first_name': first_name,
      'last_name': last_name,
      'description': description,
      'private': private,
    },
    success: function(response){
      console.log(response);
      // alert("Data successifully updated!");
    }
  });
});
