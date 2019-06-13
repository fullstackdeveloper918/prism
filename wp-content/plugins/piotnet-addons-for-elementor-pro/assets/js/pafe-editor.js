// (function ($) {

// 	var WidgetPafeFormBuilderHandlerDate = function ($scope, $) {

//         var $elements = $scope.find('.elementor-date-field');

// 		if (!$elements.length) {
// 			return;
// 		}

// 		var addDatePicker = function addDatePicker($element) {
// 			if ($($element).hasClass('elementor-use-native')) {
// 				return;
// 			}
// 			var options = {
// 				minDate: $($element).attr('min') || null,
// 				maxDate: $($element).attr('max') || null,
// 				allowInput: true
// 			};
// 			$element.flatpickr(options);
// 		};

// 		$.each($elements, function (i, $element) {
// 			addDatePicker($element);
// 		});

//     };

//     var WidgetPafeFormBuilderHandlerTime = function ($scope, $) {

// 	    var $elements = $scope.find('.elementor-time-field');

// 		if (!$elements.length) {
// 			return;
// 		}

// 		var addTimePicker = function addTimePicker($element) {
// 			if ($($element).hasClass('elementor-use-native')) {
// 				return;
// 			}
// 			$element.flatpickr({
// 				noCalendar: true,
// 				enableTime: true,
// 				allowInput: true
// 			});
// 		};
// 		$.each($elements, function (i, $element) {
// 			addTimePicker($element);
// 		});

// 	};

// 	$(window).on('elementor/frontend/init', function () {

//         elementor.hooks.addAction( 'panel/open_editor/widget/slider', function( panel, model, view ) {
// 			var $element = view.$el.find( '.elementor-selector' );

// 			if ( $element.length ) {
// 				$element.click( function() {
// 					alert( 'Some Message' );
// 				} );
// 			}
// 		} );

//     });

// })(jQuery);

jQuery(document).ready(function( $ ) {
	elementor.hooks.addAction( 'panel/open_editor/widget/pafe-form-builder-field', function( panel, model, view ) {
		var $element = panel.$el.find( '.elementor-form-field-shortcode' ),
			$fieldID = panel.$el.find( '[data-setting="field_id"]' );

		if ( $element.length ) {
			var id = $fieldID.val().trim();
			if (id != '') {
				$element.val('[field id="' + id + '"]');
			} else {
				$element.val('');
			}
		}

		$fieldID.on('change, keyup',function(){
			var id = $fieldID.val().trim();
			if (id != '') {
				$element.val('[field id="' + id + '"]');
			} else {
				$element.val('');
			}
		});
	} );
});