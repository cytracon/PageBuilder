define([
	'jquery',
	'angular',
	'Cytracon_PageBuilder/js/number-counter'
], function($, angular) {

	var directive = function(cytraconBuilderUrl, $timeout) {
		return {
      		replace: true,
			templateUrl: function(elem) {
				return cytraconBuilderUrl.getTemplateUrl(elem, 'Cytracon_PageBuilder/js/templates/builder/element/progress_bar.html');
			},
			controller: function($scope, $controller) {
				var parent = $controller('baseController', {$scope: $scope});
				angular.extend(this, parent);
			},
			link: function(scope, element) {
				scope.initCounter = function() {
					var _element = scope.element;
					$timeout(function() {
						var speed = _element.speed ? parseFloat(_element.speed) * 1000 : 0;
						var delay = _element.speed ? parseFloat(_element.delay) : 0;
						angular.forEach(_element.items, function(item, index) {
							var uid = 'mgz-single-bar' + index;
							var selector = element.find('#' + uid);
							if (selector.data("numberCounter")) {
								selector.css({
									'stroke-dashoffset': '',
									'width': ''
								});
								selector.numberCounter('destroy');
							}
							selector.numberCounter({
								layout: 'bars',
								type: 'percent',
								number: parseFloat(item.value),
								speed: speed,
								delay: delay
							});
						});
					}, 500);
				}
				scope.$watchCollection('element.items', function(items) {
					scope.initCounter();
				}, true);

				scope.loadElement = function() {
					scope.initCounter();
				}
				scope.initCounter();
			},
			controllerAs: 'mgz'
		}
	}

	return directive;
});