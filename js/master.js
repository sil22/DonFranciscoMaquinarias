// featured.php - modal img

;(function($){

$("document").ready(function () {

$(function () {
  $('.modalButton').on('click', function() {
    $('.enlargeImageModalSource').attr($(this).attr("data-id"));
    $('#enlargeImageModal').modal('show');
  });
});


 // sidebar.php - search

var $j = jQuery.noConflict();

$j(document).ready(function(){


	function fill_dd_model() {
		$j("#homeSearch #make_modelsub").empty();

		var $make_id = $j("#homeSearch #make_model").val();


		$j.ajax({
			type    : 'POST',
			url     : 'http://wp.inoart.com/demo/autotrader/wp-admin/admin-ajax.php',
			data    : { action : 'dox_get_model', make_id: $make_id, sel_text: true },
			success : function(response) {
				$j("#homeSearch #make_modelsub").removeAttr("disabled");
				$j("#homeSearch #make_modelsub").append(response);
			}
		});

	}

	/* if make changed */
	$j("#homeSearch #make_model").change(function () {
		fill_dd_model();
	});


	function fill_dd_cities() {
		$j("#homeSearch #locationsub").empty();

		var $location_id = $j("#homeSearch #location").val();

		$j.ajax({
			type    : 'POST',
			url     : 'http://wp.inoart.com/demo/autotrader/wp-admin/admin-ajax.php',
			data    : { action : 'dox_get_city', location_id: $location_id, sel_text: true },
			success : function(response) {
				$j("#homeSearch #locationsub").removeAttr("disabled");
				$j("#homeSearch #locationsub").append(response);
			}
		});

	}

	/* if location changed */
	$j("#homeSearch #location").change(function () {
		fill_dd_cities();
	});


})


});
})(jQuery);
