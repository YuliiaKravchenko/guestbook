//подключаем модули angular
var guestbook = angular.module('authors', [
    'ngRoute'
]);

//переопределяем синтаксис для использования angular
guestbook.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});