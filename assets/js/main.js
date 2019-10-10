// Home page scripts
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

// Members page scripts
var handleMembersContent = function() {
    $(document).ready( function () {
      // Init DataTable
      $('#all-users-table').DataTable({
         "searching": false,
         "paging": false,
         "info": false
      });
    });

    // Update profile status
    $(document).on( "click", "input[type='checkbox']", function() {
        var user_id = $(this).val();
        var active  = ($(this).is(':checked') ? 1 : 0);

      $.ajax({
        url: '/cms_mini/helpers/update_profile_status.php',
        type: 'POST',
        data: {
          'user_id': user_id,
          'active': active
        },
        success: function(response){
          alert(response);
        }
      });
    });
};

var Members = function () {
	"use strict";
	return {
		//main function
		init: function () {
			handleMembersContent();
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
      alert(response);
    }
  });
});

// Redirect to reset password page
$(document).on('click', '#reset_password', function() {
  window.location.href = "/cms_mini/pages/reset_password.php";
});
