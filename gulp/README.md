# Aprendendo sobre GULP  

* Automatização de tarefas ou *task runners*  

O Gulp também é um *task runner*, porém, se autointitula um **build system**. Tipo um *sistema de construção* ou *sistema de compilação*.


Um *task runner* tem como objetivo:  

> Ajudar desenvolvedores front-end com tarefas necessárias-repetitivas e, com isso, prover maior velocidade/rapidez no desenvolvimento de um projeto e liberar nossas mentes para focar no que realmente importa.


**Velocidade**, **eficiência** e **simplicidade** são os 3 princípios que norteiam o Gulp.  

As principais características do Gulp são:  

* Fácil de usar;  
* Eficiente;  
* Alta qualidade;  
* Fácil de aprender.


**Código ao invés de configuração** ou *code over configuration* quer dizer que é preciso programar ao invés de configurar, ou seja, o fluxo de tarefas com Gulp é programado.  

A **eficiência** do Gulp diz-se muito em função de ele utilizar streams do Node.


> A stream is an abstract interface implemented by various objects in Node.js. For example a request to an HTTP server is a stream, as is stdout. Streams are readable, writable, or both. All streams are instances of EventEmitter.


## Instalação (Linux - Debian)  

Para instalar o Gulp na máquina, basta executar o comando `npm install --global gulp` (em usuário root).  

Para instalar o Gulp em determinado projeto, basta executar o comando `npm install --save-dev gulp`.  

Como estamos trabalhando com Node.js, se faz necessário um arquivo `package.json` para indicar quais módulos iremos utilizar no nosso projeto.  

Podemos criar esse arquivo apenas com `echo "{}" > package.json`. Então, executamos `npm install --save-dev gulp` para instalar o gulp em nosso projeto.


## `gulpfile.js`  

Nesse arquivo é onde ficarão os scripts das tarefas instaladas. Ou seja, aqui estarão os comandos sobre **o que fazer** e **como fazer** serão passados para o Gulp.  

```js  
//requeremos o módulo do gulp, assim como devemos fazer com qualquer outro módulo que pretendemos utilizar  
var gulp = require('gulp');  

//criamos uma tarefa DEFAULT com as instruções que serão realizadas quando ela for chamada  
gulp.task('default', function(){  
	//tarefas  
});  
```  

Sempre que formos executar o Gulp, devemos utilizar `gulp nomeTarefa`. Ou então, caso usemos apenas `gulp` ele irá executar a tarefa *default*.  

```js  
ednilson@EDNILSON-NB:/var/www/practicing/gulp$ gulp  
[15:12:29] Using gulpfile /var/www/practicing/gulp/gulpfile.js  
[15:12:29] Starting 'default'...  
[15:12:29] Finished 'default' after 108 μs  
```


## Gulp API  

Sua API é extremamente simples e enxuta, limitando-se em 4 principais funções, sendo elas:  

* `src()`: arquivos que entrarão na sequência de pipes para serem tratados e/ou manipulados;  
* `task()`: define as tarefas no Gulp;  
* `dest()`: destinos dos arquivos que passaram pelos pipes;  
* `watch()`: observa os arquivos e fará alguma coisa quando este arquivo for alterado.


## Tarefas com Gulp  

* Compilar SASS: `gulp-ruby-sass`;  
* Prefixos de Browsers: `gulp-autoprefixer`;  
* Minificar CSS: `gulp-minify-css`;  
* Recarrega a página automaticamente quando um arquivo for salvo: `gulp-livereload`.


## Instalação de módulos Gulp  

`npm install --save-dev gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-livereload tiny-lr`


## Fontes  

[Desenvolvimento para Web - Gulp](http://desenvolvimentoparaweb.com/javascript/gulp/)  
[Bye bye Grunt.js, hello Gulp.js!](http://blog.caelum.com.br/bye-bye-grunt-js-hello-gulp-js/)  
[Gulp: o novo automatizador](http://tableless.com.br/gulp-o-novo-automatizador/)  
[Gulp API](https://github.com/gulpjs/gulp/blob/master/docs/API.md)