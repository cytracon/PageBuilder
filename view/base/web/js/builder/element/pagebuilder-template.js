define([
	'jquery',
	'angular'
], function($, angular) {

	var directive = function(cytraconBuilderUrl, cytraconBuilderService) {
		return {
      		replace: true,
			templateUrl: function(elem) {
				return cytraconBuilderUrl.getTemplateUrl(elem, 'Cytracon_PageBuilder/js/templates/builder/element/pagebuilder_template.html');
			},
			controller: function($scope, $controller) {
				var parent = $controller('baseController', {$scope: $scope});
				angular.extend(this, parent);

				$scope.$watch('element.template_id', function(templateId) {
					if (templateId) {
						cytraconBuilderService.elemPost($scope.element, 'mgzbuilder/ajax/itemInfo', {
							type: 'pagebuilder_template',
							q: templateId
						}, true, function(res) {
							$scope.$apply(function() {
								$scope.templateName = res.label;
							})
						});
					}
				});
			},
			controllerAs: 'mgz'
		}
	}
	return directive;
});