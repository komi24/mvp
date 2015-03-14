angular.module('restapp',[]).controller('restController', function($scope, $http, $interval){
            $scope.id= id;//id du restaurant
            $scope.commandes = [];
            $scope.msgData = { 'id': $scope.id};
            $scope.suiv = function(idx){
                $http.post("/ebene/web/app_dev.php/mvp_restboard/suiv",
                        {id: idx}).
                        success(function () {
                            $scope.updateListe();
                        });    
            }
            $scope.prec = function(idx) {
                $http.post("/ebene/web/app_dev.php/mvp_restboard/prec",
                        {id: idx}).
                        success(function () {
                            $scope.updateListe();
                        });
            }

            $scope.updateListe1 = function () {
                $http.post("/ebene/web/app_dev.php/mvp_restboard/liste",
                        $scope.msgData).
                        success(function (data) {
                            $scope.commandes = data;
                            angular.forEach($scope.commandes, function (commande) {
                                commande.showPannel = false;
                            });
                        });
            };
            $scope.updateListe = function () {
                $http.post("/ebene/web/app_dev.php/mvp_restboard/liste",
                        $scope.msgData).
                        success(function (data) {
                            $scope.commandes = data;
                        });
            };

            $scope.updateListe();
            $interval($scope.updateListe1,5000);
    
});
angular.module('restapp').filter('etat',function(){
    return function(commande,param){
        if(commande.dateprep != null){
            if(commande.datepret != null) {
                if(commande.datefin != null) {
                    if (param == 'visi') return false;
                    return (param == 'etat') ? 'FINI' : "success";
                }
                if (param == 'visi') return true;
                return  (param == 'etat') ? 'PRET' : "success"
            }
            if (param == 'visi') return true;
            return  (param == 'etat') ? 'EN PREP' : "warning";
        }
        if (param == 'visi') return true;
        return  (param == 'etat') ? 'EN ATTENTE' : "primary";
    };
});