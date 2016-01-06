# Learning AngularJS


## O que é?  

É um framework para o desenvolvimento de aplicações web utilizando a linguagem JavaScript.  

Com ele é possível estruturar a arquitetura da aplicação web em camadas muito bem definidas. Além de permitir a criação de componentes reusáveis e modulares.  

Também fornece uma infra necessária para interagir com o backend, sem a necessidade de baixar outras coisas para que essa interação ocorra, e, facilita a automação de testes.  

O Angular foi criado em 2009 por Misko Hevery e Adams Abrons com o objetivo de facilitar o desenvolvimento de aplicações web. Ele não foi criado pelo Google. Hevery foi trabalhar para o Google posteriormente e, ele apostou com seu gerente que conseguiria reescrever um sistema com o Angular em 2 semanas. Porém, ele conseguiu reescrever com 1.500 linhas de 17.000 do anterior. Atualmente, o AngularJS é mantido pelo Google.


## Quem usa AngularJS?  

* NASA (alguns sites); 
* Walmart; 
* YouTube (PlayStation); 
* Etc..


## Vantagens de Utilizar AngularJS  

* Produtividade;  
* Contuidade;  
* Comunidade;  
* Escrito 100% em JavaScript.


## Arquitetura  

Ele segue uma arquitetura muita bem definida.  

A **arquitetura** se diz respeito a parte tecnologia de um projeto, quais linguagens, assíncrona, etc. Já o design é a lindeza do projeto.


## MVC - Model-View-Controller  

O View é o que o cliente vê. O Controller é responsável pelo que a View comsome. Já o Scope faz a medição entre a View e o Controller. O Scope não é o Model, é apenas a **ponte** entre View e Controller!  

Ele separa muito bem as responsabilidades.


## Diretivas  

São extensões da linguagem HTML que permitem a implementação de novos comportamentos, de forma declarativa.


### `ngApp`  

Ele atua e define as fronteiras da aplicação web. Então ele vai compilar essa diretiva e executar o comportamento descrito em cada diretiva.  

Ele define o nome do módulo principal da aplicação web.


### `ngController`  

Ele vincula um elemento da View ao Controller.


### `ngBind`  

Ele substitui um elemento por uma expressão.


`<h4 ng-bind="app"></h4>` OU `<h4>{{app}}</h4>`


### `ngRepeat`  

Iterando sobre os itens de uma coleção ou de um objeto.  

JS  
```js  
angular.module("listaTelefonica", []);

angular.module("listaTelefonica").controller("listaTelefonicaCtrl", function($scope){
	$scope.app = "Lista Telefônica";

	$scope.contatos = [
		{nome: "Pedro", telefone: "35217070"},
		{nome: "Ana", telefone: "35219999"},
		{nome: "Maria", telefone: "35218888"},
	];
});
```  

HTML  
```html  
<table class="table table-striped">
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
	</tr>

	<tr ng-repeat="contato in contatos">
		<!--
		<td>{{contato.nome}}</td>
		<td>{{contato.telefone}}</td>
		-->

		<td ng-repeat="(key, value) in contato">
		{{value}}
		</td>
	</tr>
</table>
```


### `ngModel`  

Ele vincula uma propriedade ao `$scope`. Ele pega uma coisa da View e define no Scope.


### `ngClick`  

Ele atribui um comportamento a um determinado evento.


> Devemos evitar ao máximo de ler o controller dentro do scope!