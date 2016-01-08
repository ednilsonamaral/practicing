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


### `ngDisabled`  

Serve para desabilitar um elemento de forma dinâmica, seja ele um botão ou um input.


`<button class="btn btn-primary btn-block" ng-click="adicionarContato(contato)" ng-disabled="!contato.nome || !contato.telefone">Adicionar Contato</button>`

No código acima, quando declaramos a diretiva `ng-disabled="!contato.nome || !contato.telefone"` queremos dizer que ele só vai ativar o botão se escrevermos em ambos os campos.


### `ngOptions`  

Ele renderiza as opções de um select. E é a melhor opção para isso.  

JS  
```js  
$scope.operadoras = [  
	{nome: "Oi", codigo: 14},  
	{nome: "Vivo", codigo: 15},  
	{nome: "Tim", codigo: 41}  
];  
```  

HTML  
```html  
<select ng-model="contato.operadora" ng-options="operadora.nome for operadora in operadoras" class="form-control">  
	<option value="">Selecione uma operadora</option>  
</select>  
```  

No exemplo acima, estamos enviando como value o nome da operadora. Mas, dependendo da situação, precisamos mostar o nome da operadora e enviar apenas o código dela como value. Para isso, devemos fazer da seguinte maneira:  

```html  
<select ng-model="contato.operadora" ng-options="operadora.codigo as operadora.nome for operadora in operadoras" class="form-control">  
	<option value="">Selecione uma operadora</option>  
</select>  
```  

Onde eu digo ao `ngOptions` que irei enviar como value o código ao invés do nome em `operadora.codigo as operadora.nome`.  

Temos outro jeito de utilizarmos o `ngOptions`. Digamos que tenhamos várias operadoras e elas estão separadas por **celular** e **fixo**, então, aqui entra o *group by* dentro da nossa expressão, ficando assim:  

JS  
```js  
$scope.operadoras = [
	{nome: "Oi", codigo: 14, categoria: "Celular"},
	{nome: "Vivo", codigo: 15, categoria: "Celular"},
	{nome: "Tim", codigo: 41, categoria: "Celular"},
	{nome: "GVT", codigo: 25, categoria: "Fixo"},
	{nome: "Embratel", codigo: 21, categoria: "Fixo"}
];
```  

HTML  
```html  
<select ng-model="contato.operadora" ng-options="operadora.nome group by operadora.categoria for operadora in operadoras" class="form-control">  
	<option value="">Selecione uma operadora</option>  
</select>  
```  

Onde, na expressão, é dita que ele deve agrupar os nomes das operadores pelas suas respectivas categorias.


### `ngClass` e `ngStyle`  

É possível aplicar classes CSS e estilos de uma forma dinâmica.  

JS  
```js  
$scope.classe = "selecionado";
```  

HTML  
```html  
<tr ng-repeat="contato in contatos" ng-class="classe" class="ng-scope selecionado">
	(...)  
</tr>  
```  

CSS  
```css  
.selecionado{  
	background-color: yellow;  
}  

.negrito{  
	font-weight: bold;  
}  
```  

Acima, vemos que ele declarou no Scope o nome classe desejada, e no HTML, é chamado via `ng-class="classe` e faz a ponte com `class="ng-scope selecionado"`.  

HTML  
```html  
<tr ng-repeat="contato in contatos" ng-class="{'selecionado negrito': contato.selecionado}">  
	<td>  
		<input type="checkbox" ng-model="contato.selecionado">  
	</td>  
</tr>  
```  

Nesse outro exemplo, ele vai fazer com que ao selecionarmos um checkbox, ele vai chamar as classes negrito e selecionado ao mesmo tempo.  

Agora, queremos apagar um contato ao selecionar seu checkbox, os códigos ficariam:  

JS  
```js  
$scope.apagarContatos = function (contatos){  
	$scope.contatos = contatos.filter(function (contato){  
		if (!contato.selecionado) return contato;  
	});  
};  
```  

HTML  
```html  
<button class="btn btn-danger btn-block" ng-click="apagarContatos(contatos)">Apagar Contato</button>
```  

Onde, eu informo no Scope que os contatos que **NÃO** foram selecionados é que ficam no array. Aqui, também é possível deixar o botão *apagar* apenas se estiver um contato selecionado, ficando assim:  

JS  
```js  
$scope.isContatoSelecionado = function (contatos){
	return contatos.some(function (contato) {
		return contato.selecionado;
	});
};
```  

HTML  
```html  
<button class="btn btn-danger btn-block" ng-click="apagarContatos(contatos)" ng-disabled="!isContatoSelecionado(contatos)">Apagar Contato</button>  
```


### `ngShow`, `ngHide` e `ngIf`  

Eles servem para exibir um elemento condicionalmente.  

```html  
<button class="btn btn-danger btn-block" ng-click="apagarContatos(contatos)" ng-if="isContatoSelecionado(contatos)">Apagar Contato</button>  
```  

Nesse código, com `ngShow` ele vai mostrar o botão apenas se selecionar um campo. A mesma lógica funciona para o `ngHide`.  

Já o `ngIf` interage com a DOM, para eliminar o elemento.  

O `ngIf` é recomendado quando falamos em performance. Digamos que eu tenha um elemento pesado e possa atrapalhar um pouco a performance da aplicação, então é recomendado utilizar o `ngIf`. Agora, caso não interfira em questão de tamanho e tudo mais, pode ser utilizado o `ngShow` ou `ngHide`.


### `ngInclude`  

Ele serve para incluirmos um conteúdo de forma dinâmica.  

Eu quero incluir um rodapé em todas as páginas. Ao invés de ficar repetindo o mesmo código em todas as páginas e deixar a aplicação mais pesada, criamos um arquivo `footer.html` e, na página desejada colocamos o seguinte cógigo:   

**footer.html**  
```html  
<div style="text-align: center;">  
	Fim!  
</div>  
```  

E nas páginas que quero exibir esse footer, basta chamarmos a div da seguinte maneira:  

```html  
<div ng-include="'footer.html'"></div>  
```  

Nota-se que chamamos o arquivo `footer.html` dentro das aspas e das aspas simples. Isso porque se deixarmos sem as aspas simples, ele vai tentar buscar o `footer.html` no Scope e não no diretório.


## Validação de Formulários  

### `ngRequired`  

Ele vai definir um determinado campo do formulário como obrigatório.  

Dentro do `form`, podemos consultar a validade de um campo ou até mesmo do formulário através do `$valid` e `$invalid`.  

```html  
<form name="contatoForm">  
	<input class="form-control" type="text" ng-model="contato.nome" name="nome" placeholder="nome" ng-required="true">  
	<input class="form-control" type="text" ng-model="contato.telefone" name="telefone" placeholder="telefone" ng-required="true">  

	<select ng-model="contato.operadora" ng-options="operadora.nome group by operadora.categoria for operadora in operadoras" class="form-control">  
		<option value="">Selecione uma operadora</option>  
	</select>  
</form>  

<div class="alert alert-danger" ng-show="contatoForm.nome.$invalid">  
	Por favor, preencha o nome!  
</div>  

<div class="alert alert-danger" ng-show="contatoForm.telefone.$invalid">  
	Por favor, preencha o telefone!  
</div>  
```  

Como vemos no código acima, demos um `name` nos campos nome e telefone e criamos duas div's após o formulário. Onde na div, chamados dentro de `ng-show` o objeto do formulário e o campo desejado, e, então dizemos a ele para mostrar essa mensagem se o campo for inválido, ou seja, se não houver nenhuma entrada do usuário.  

O `$valid` possui a mesma lógica, ao inverso.


#### `$pristine` e `$dirty`  

Eles verificam se um formulário ou algum campo já foi utilizado alguma vez.  

Seguindo o exemplo anterior, nota-se que as mensagens ficam fixas na tela. Para não mostrarmos ela toda hora, devemos fazer o seguinte:  

JS  
```js  
$scope.adicionarContato = function (contato){  
	//(...)  

	//vai fazer os campos voltarem ao estado de pristine = true  
	$scope.contatoForm.$setPristine();  
};  
```  

HTML  
```html  
<div class="alert alert-danger" ng-show="contatoForm.nome.$invalid && contatoForm.nome.$dirty">
	Por favor, preencha o nome!
</div>
```  

Dentro do `ng-show` dizemos que além de ele ser `$invalid` ele é `$dirty`. Então, no JS, fazemos com que ele volte ao estado de pristine. Assim não aparecendo a mensagem cada vez que for adicionado um novo contato.


### `ngMinLength` e `ngMaxLength`  

Eles definem o tamanho mínimo e máximo permitido para determinado campo. Não é uma máscara, é uma validação.


### `ngPattern`  

Ele funciona em cima de uma expressão regular, onde teremos uma flexibilidade para criarmos a expressão que precisarmos para validar um tipo especifico de determinado campo.  

```html  
<input class="form-control" type="text" ng-model="contato.telefone" name="telefone" placeholder="telefone" ng-required="true" ng-pattern="/^\d{4,5}-\d{4}$/">  

<div class="alert alert-danger" ng-show="contatoForm.telefone.$error.pattern">  
	O campo telefone deve ter o formato DDDD-DDDD.  
</div>  
```


### `ngMessage`  

HTML  
```html  
<div class="alert alert-danger" ng-messages="contatoForm.nome.$error">  
	<div ng-message="required">  
		Por favor, preencha o nome!  
	</div>  

	<div ng-message="minlength">  
		O campo nome deve ter no mínimo 10 caracteres!  
	</div>  
</div>  
```  

JS  
```js  
angular.module("listaTelefonica", ["ngMessages"]);
```  

O módulo `ngMessages` é externo ao Angular. Então, devemos declarar na chamada principal dos módulos. Além, é claro, de importar o arquivo JS dele.