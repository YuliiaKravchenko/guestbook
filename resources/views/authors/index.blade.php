@extends('layouts.layout')
@section('content')

<!--ng-app="authors" инициируем angular-->

<div class="row" ng-app="authors"  ng-controller="authorsCtrl">
    <h3>Authors</h3>
    
    <div class="col-md-10">
       <form action="" name="newAuthorForm" class="form-inline" novalidate>
<!--novalidate - игнорирует required-->
            <input type="text" id="newAuthor" class="form-control col-md-2" ng-model="authorObj.name" required name="name">
<!--проверка поля с именем на заполнение информации-->
          <br>
           <p ng-show="newAuthorForm.name.$error.required" class="alert alert-danger">Enter a name</p>
           <br>
            
            <button type="button" class="btn btn-default addAuthor" ng-click="addNewAuthor()">Add new author</button>
       </form>
    </div>
   
    <div class="page-header"></div>

    <!--ng-model="search" - мгновенная фильтрация списка авторов, которые вводиться в input-->
    <div class="row">
        <input type="text" class="form-control" ng-model="search">
    </div>
    <!--[[search]] запись для вывода набиремого текста-->
    <div class="row">
        <ul>
            <!--$scope доступно в роли переменной в цикле ниже-->
            <!--orderBy:'name' сортировка в алфавитном порядке-->
            <li ng-repeat="author in authors | orderBy:'name' | filter:search">
                [[author.name]]
            </li>
        </ul>
    </div>
</div>

@endsection