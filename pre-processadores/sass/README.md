# SASS  

É uma linguagem de folhas de estilos dinâmica. Possui dois tipos de sintaxe, SASS e SCSS.  

Foi desenvolvido em Ruby.


## Instalação (Linux)  

`gem install sass` em usuário root


## Exemplos Comuns  

Criando um breve código como o a seguir e salvo como `style.scss`:  

```css  
.content{  
	background: #000;  
	font-family: Arial;  
	font-size: 15px;  

	p{  
		line-height: 20px;  
	}  
}  
```  

Como vemos no código acima, dentro do `.content` é especificado o `p`. No terminal ao executarmos `sass --watch style.scss:style.css` ele cria um novo arquivo `style.css` separando o `.content`, deixando-o assim:  

```css  
.content {  
  background: #000;  
  font-family: Arial;  
  font-size: 15px; }  
  .content p {  
    line-height: 20px; }  
```

Agora, acrescentei ao nosso `style.scss`:  

```css  
section.qualquer{  
	h1{  
		font-size: 20px;  
		padding: 10px;  
		margin-bottom: 5px;  
	}  

	article{  
		text-align: justify;  
		line-height: 2px;  
		color: #dcdcdc;  
		padding: 2px;  
	}  

	margin-top: 5px;  
}  
```

Declarando assim, vários elementos contidos no `section.qualquer`. Legal! :)  

Enquanto o comando no terminal ainda roda, nota-se que enquanto vamos alterando e sando nosso arquivo `style.scss` ele já vai atualizando o `style.css`. E no terminal, ele vai mostrando na tela mais ou menos um tipo de log, com o que foi feito e onde, e ainda mostra alguns erros, se houver.  

Os exemplos acimas foram exemplos comuns utilizando SASS.


## Exemplos com Variáveis  

`$cor-de-fundo-box-section: #acacac;`

Criei antes dos estilos da `section.qualquer` a variável acima, e chamei dentro de `section.qualquer`:  

```css  
.section.qualquer{  
	background: $cor-de-fundo-box-section;  
}  
```  

Segue a lógica, criar a variável primeiro e depois chamá-la onde deseja!


## Exemplos com Pseudoelementos  

No arquivo `style.scss`:  

```css  
a{  
	color: purple;  
	text-decoration: none;  

	&:hover{  
		color: red;  
		text-decoration: underline;  
	}  

	&:visited{  
		color: $cor-de-fundo-box-section;  
	}  
}  
```  

E como resultado no `style.css`:  

```css  
a {  
  color: purple;  
  text-decoration: none; }  
  a:hover {  
    color: red;  
    text-decoration: underline; }  
  a:visited {  
    color: #acacac; }  
```


## Exemplos com Operações  

Arquivo `style.scss`:  

```css  
nav{  
	$nav-width: 750px;  

	width: 100%;  
	max-width: $nav-width;  

	li{  
		width: $nav-width / 10;  
	}  
}  
```  

Arquivo `style.css`:  

```css  
nav {  
  width: 100%;  
  max-width: 750px; }  
  nav li {  
    width: 75px; }  
```


## Exemplos com `@mixin` e `@include`  

Arquivo `style.scss`:  

```css  
@mixin espacamento-geral{  
	$padding-global: 5px;  
	$margin-global: 5px;  

	padding: $padding-global;  
	margin-bottom: $margin-global;  
	margin-top: $margin-global;  
}  

footer{  
	@include espacamento-geral;  
}  
```  

Arquivo `style.css`:  

```css  
footer {  
  padding: 5px;  
  margin-bottom: 5px;  
  margin-top: 5px; }  
```


## Concluido  

Notei com esses pequenos exemplos o que é possível fazer com um pré-processador. Se trabalharei em um projeto um pouco complexo, onde a folha de estilo irá repetir vários elementos, é aconselhável utilizar SASS para ganharmos tempo de desenvolvimento.


## Fontes  

[O que é SASS? Entenda esse outro método de escrever CSS - Tableless](http://tableless.com.br/sass-um-outro-metodo-de-escrever-css/)  
[CSS Menos Sofrido com SASS - Blog Caelum](http://blog.caelum.com.br/css-menos-sofrido-com-sass/)