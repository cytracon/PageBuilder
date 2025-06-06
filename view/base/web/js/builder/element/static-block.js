define([
	'jquery'
], function($) {

	var directive = function(cytraconBuilderUrl, cytraconBuilderService) {
		return {
      		replace: true,
			templateUrl: function(elem) {
				return cytraconBuilderUrl.getTemplateUrl(elem, 'Cytracon_PageBuilder/js/templates/builder/element/static-block.html');
			},
			controller: function($scope, $controller) {
				var parent = $controller('baseController', {$scope: $scope});
				angular.extend(this, parent);
				$scope.name = '';
				$scope.$watch('element.block_id', function(value) {
					if (value) {
						cytraconBuilderService.elemPost($scope.element, 'mgzbuilder/ajax/itemInfo', {
							type: 'block',
							q: value
						}, true, function(res) {
							$scope.$apply(function() {
								$scope.name = res.label;
							})
						});
					} else {
						$scope.name = '';
					}
				});
			},
			controllerAs: 'mgz'
		}
	}

	return directive;
});