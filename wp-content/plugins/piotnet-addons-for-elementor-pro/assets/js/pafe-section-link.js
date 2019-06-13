// Frontend

jQuery(document).ready(function( $ ) {
	$('[data-pafe-section-link]').click(function() {

		var link = $(this).data('pafe-section-link'),
			external = $(this).data('pafe-section-link-external');

		if(external == 'on') {
			window.open( link , '_blank' );
		} else {
			window.location.href = link;
		}
		
	});
});

// Editor

// (function($){

// 	var pafeSectionLink = function ($scope,$){
// 		var elementId = $scope.data('id'),
// 			elementType =  $scope.data('element_type'),
// 			editorElements      = null,
// 			elementData         = {},
// 			settings            = [];

// 		if ( window.elementor == undefined ) {
// 			return false;
// 		}

// 		if ( ! window.elementor.hasOwnProperty( 'elements' ) ) {
// 			return false;
// 		}

// 		editorElements = window.elementor.elements;

// 		if ( ! editorElements.models ) {
// 			return false;
// 		}

// 		$.each( editorElements.models, function( index, obj ) {
// 			if ( elementId == obj.id ) {
// 				elementData = obj.attributes.settings.attributes;
// 			}
// 		} );

// 		if (elementData['pafe_section_link'] != undefined) {
// 			var sectionLink = elementData['pafe_section_link'];
// 			if(sectionLink['url'] != '') {
// 				var link = sectionLink['url'],
// 					external = sectionLink['external'];
// 				$scope.click(function() {
// 					window.open( link , '_blank' );
// 				});
// 			}
// 		}
//     };
// 	$(window).on('elementor/frontend/init', function () {
//         elementorFrontend.hooks.addAction('frontend/element_ready/section', pafeSectionLink);
//     });
// })(jQuery);