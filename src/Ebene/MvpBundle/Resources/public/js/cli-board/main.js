angular.module('cliapp',['ui.bootstrap'])
        .controller('boardController', function($scope, $http, $modal, $log) {
            $scope.id= id;
            $scope.sections = [];  
            $scope.panier = [];
            $scope.msgData = {'type': 'sections', 'id': $scope.id};
            $http.post("/ebene/web/app_dev.php/mvp_actionboard/test", 
            $scope.msgData).
                success(function(data){
                    $scope.sections = data;
                    angular.forEach($scope.sections, function(section){
                            section.showPannel = false;
                            angular.forEach(section.listearticles, function (article) {
                                $scope.open = function () {
                                    var modalInstance = $modal.open({
                                        templateUrl: 'myModalContent.html',
                                        controller: 'ModalInstanceCtrl',
                                        size: 'sm',
                                        resolve: {
                                            article: function () {
                                                return article;
                                            }
                                        }
                                    });

                                    modalInstance.result.then(function (selectedArticle) {
                                        $scope.panier = panier.concat(selectedArticle);
                                    });
                                };
                            article.showPannel = false;
                        });
                    });
            });
});


angular.module('cliapp').controller('ModalInstanceCtrl', function ($scope, $modalInstance, article) {

  $scope.article = article;
  $scope.selected = {
    article: $scope.article
  };

  $scope.ok = function () {
    $modalInstance.close($scope.selected.article);
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
});