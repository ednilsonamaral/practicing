// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
var app = angular.module('todo', ['ionic', 'LocalStorageModule']);

app.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
});

app.config(function(localStorageServiceProvider){
  localStorageServiceProvider
    .setPrefix('todo');
});

app.controller('main', function($scope, $ionicModal, localStorageService){
  $scope.tasks = [];

  $scope.task = [];

  $ionicModal.fromTemplateUrl('new-task-modal.html', {
    scope: $scope,
    animation: 'slide-in-up'
  }).then(function(modal){
    $scope.newTaskModal = modal;
  });

  $scope.getTasks = function(){
    //vai pegar as tarefas do local storage
    //se ter tarefa no local storage, ele vai pegar elas e mostrar, se não vai devolver um array vazio
    if (localStorageService.get(taskData)){
      $scope.tasks = localStorageService.get(taskData);
    } else {
      $scope.tasks = [];
    }
  }

  $scope.createTask = function(){
    //vai criar as tarefas
    $scope.tasks.push($scope.task);
    localStorageService.set(taskData, $scope.tasks);
    $scope.task = {};

    //fechando o modal de nova tarefa
    $scope.newTaskModal.hide();
  }

  $scope.remoteTask = function(){
    //vai remover as tarefas
    $scope.tasks.splice(index, 1);
    localStorageService.set(taskData, $scope.tasks);
  }

  $scope.completeTask = function(){
    //vai dar um update em tarefas completadas
    if ( index !== -1 ){
      $scope.tasks[index].completed = true;
    }

    localStorageService.set(taskData, $scope.tasks);
  }
});