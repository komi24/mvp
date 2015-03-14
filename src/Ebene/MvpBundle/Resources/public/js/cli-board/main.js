angular.module('cliapp',['ui.bootstrap','ngCookies'])
        .controller('boardController', function($scope, $http, $modal, $cookieStore) {
            $scope.id= id;//id du restaurant
            $scope.user=$cookieStore.get('user');//User ID
            $scope.user= ($scope.user == null) ? 0 : $scope.user;
            $scope.panier=$cookieStore.get('panier');
            $scope.panier= ($scope.panier == null) ? [] : $scope.panier;
            $scope.sections = []; 
            $scope.bugres = function(){
                $scope.user = 0;
                $scope.panier = [];
            }
            $scope.openPanier = function(){
                var modalInstance = $modal.open({
                    templateUrl: 'myPanierContent.html',
                    controller: 'PanierInstanceCtrl',
                    size: 'sm',
                    resolve: {
                        panier: function () {
                            return $scope.panier;
                        }
                    }
                });

                modalInstance.result.then(function (nouveauPanier) {
                    if (nouveauPanier.hasOwnProperty('contentres')){
                        $http.post("/ebene/web/app_dev.php/mvp_actionboard/commande",
                            { 'id': $scope.id, 'user': $scope.user, 'content' : nouveauPanier })
                                    .success(function(response){
                                        $scope.user = response.user;
                                        $scope.panier = [];
                                        $cookieStore.put('panier', $scope.panier);
                                        $cookieStore.put('user', $scope.user);
                                    });
                        
                    }
                    $scope.panier = nouveauPanier;
                    $cookieStore.put('panier', $scope.panier);
                });
            };        
            $scope.msgData = {'type': 'sections', 'id': $scope.id};
            $http.post("/ebene/web/app_dev.php/mvp_actionboard/test", 
            $scope.msgData).
                success(function(data){
                    $scope.sections = data;
                    angular.forEach($scope.sections, function(section){
                            section.showPannel = false;
                            angular.forEach(section.listearticles, function (article) {
                                article.open = function () {
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
                                        $scope.panier = $scope.panier.concat(selectedArticle);
                                        $cookieStore.put('panier',$scope.panier);
                                    });
                                };
                            article.showPannel = false;
                        });
                    });
            });
});


angular.module('cliapp').controller('ModalInstanceCtrl', function ($scope, $modalInstance, article) {

  $scope.article = article;//TODO copier en fonction des options choisies
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

angular.module('cliapp').controller('PanierInstanceCtrl', function ($scope, $modalInstance, panier) {

  $scope.panier = panier;
  $scope.askName = false;
  $scope.tmppanier = angular.copy(panier);
  /*$scope.selected = {
    article: $scope.article
  };*/
  $scope.erase = function (idx) {//post et supprimer panier
    if($scope.tmppanier != null) $scope.tmppanier.splice(idx,1);
  };

  $scope.commande = function () {//post et supprimer panier
    if(this.form1.$valid){
        $scope.panier = {username: this.form1.username.$viewValue, contentres: $scope.tmppanier};
        $modalInstance.close($scope.panier);
    }else{
        $scope.askName=true;
    }
  };

  $scope.ok = function () {//post et supprimer panier
    $scope.panier = $scope.tmppanier;
    $modalInstance.close($scope.panier);
  };

  $scope.cancel = function () {   
    $modalInstance.dismiss('$scope.panier');
  };
});
