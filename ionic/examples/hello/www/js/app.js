// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
//var app = angular.module('hello', ['ionic', 'hello.Main', 'hello.Page2']);
var app = angular.module('hello', ['ionic', 'hello.Main', 'hello.UserList']);

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

//config
app.config(function($urlRouterProvider){
  $urlRouterProvider.otherwise('/main');
});

//chamando o module hello.Main e o seu controller
var moduleMain = angular.module('hello.Main', ['ionic']);

moduleMain.config(function($stateProvider, $urlRouterProvider){
  $stateProvider
    .state('main', {
      url: "/main",
      templateUrl: "templates/main.html",
      controller: 'mainCtrl'
    });
});

moduleMain.controller("mainCtrl", function(){
  console.log("O controller principal diz: Hello, World!");
});

//chamando o module hello.Page2, o seu controller e o seu factory
var moduleUserList = angular.module('hello.UserList', ['ionic']);

moduleUserList.config(function($stateProvider, $urlRouterProvider){
  $stateProvider
    .state('userList', {
      url: "/userList",
      templateUrl: "templates/userList.html",
      controller: "userListCtrl"
    })

    .state('userListDetail', {
      url: "/userListDetail",
      templates: "templates/userListDetail.html",
      controller: 'userListDetailCtrl'
    })
});

moduleUserList.factory('userService', function($http){
  var users = [];
  
  return {
    getUsers: function(){
      return $http.get('https://randomuser.me/api/?results=10').then(function(response){
        users = response.data.results;
        return response.data.results;
      });
    },
    
    getUser: function(index){
      return users[index];
    }
  }
});

moduleUserList.controller("userListCtrl", function($scope, userService){
  userService.getUsers().then(function(users){
    $scope.users = users;
  })
});

moduleUserList.controller("userListDetailCtrl",function($scope, $stateParams, userService){
  var index = $stateParams.index;
  $scope.item = userService.getUser(index);
});