angular.module('cliapp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

angular.module('cliapp',[])
        .controller('boardController', function($scope, $http) {
            $scope.sections = [];
            $scope.msgData = {'type': 'sections', 'id': 1};//$scope.ide};
            $http.post("/ebene/web/app_dev.php/mvp_actionboard", 
            $scope.msgData).
                success(function(data){
                    $scope.sections = data;
            })
});
