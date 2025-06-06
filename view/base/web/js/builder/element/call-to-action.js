define([
	'angular'
], function(angular) {

	var directive = function(cytraconBuilderUrl, cytraconBuilderService, $rootScope) {
		return {
      		replace: true,
			templateUrl: function(elem) {
				return cytraconBuilderUrl.getTemplateUrl(elem, 'Cytracon_PageBuilder/js/templates/builder/element/call_to_action.html');
			},
			controller: function($scope, $controller) {
				var parent = $controller('baseController', {$scope: $scope});
				angular.extend(this, parent);

				$scope.getTitleHtml = function() {
					var element = $scope.element;
					var html = '<' + element.title_type + ' class="mgz-cta-title ' + ( element.content_hover_animation ? 'mgz-animated-item--' + element.content_hover_animation : '' ) + '">'
						html += element.title;
					html += '</' + element.title_type + '>';
					return html;
				}
			},
			link: function(scope, element) {
				scope.$watch('element.image', function(image) {
					$(element).find('.mgz-bg').css('background-image', 'url(' + $rootScope.cytraconBuilderUrl.getImageUrl(image) + ')');
				});
			},
			controllerAs: 'mgz'
		}
	}

	return directive;
});