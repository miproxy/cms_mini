var handleMainContent = function() {
    // Init DataTable
    $(document).ready( function () {
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
