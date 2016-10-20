guestbook.controller('authorsCtrl', function($scope,$http){
    $http.get('/api/authors').success(function(res){
        $scope.authors = res;//получаем массив объекта и добавляем в область видимости
    });
    
    $scope.addNewAuthor = function(){
        console.log($scope.authorObj);
        
        $http.post('/api/authors/new',$scope.authorObj)
        .success(function(res){
            if(res.status === "success"){
                $scope.authors = res.result;
            }
           // console.log(res);
        });
    }
    
});

//$http - отвечает за ajax в angular
//$scope - отвечает за область видимости в html