angular.module('bmapp',[]).controller('bmController', function($scope, $http){
            $scope.pieces = [];
            $scope.liens = [];
            $scope.focuson = 0;
            $scope.msgData = { };
            $scope.clickon = function(id){
                $scope.focuson = id;
            };
            $http.post("/ebene/web/app_dev.php/bmodel/getpieces",
            { }).
            success(function (data) {
                $scope.pieces = data;
            });
            $http.post("/ebene/web/app_dev.php/bmodel/getliens",
            { }).
            success(function (data) {
                $scope.liens = data;
            });
    
});
angular.module('bmapp').filter('focus',function(){
    return function(element,focuson, liens){
        if(element.id == focuson)
            return "info";
        res = "primary";
        angular.forEach(liens, function(lien){
            if((lien.sortie == element.id) && (lien.entree == focuson))
                res = "warning";
        });
        return res;
    };
});
angular.module('bmapp').filter('filtre',function(){
    return function(elements,param){
        tmparray = [];
        angular.forEach(elements, function(element){
            if(element.section == param)
                tmparray.push(element);
        });
        return tmparray;
    };
});
