# Regular Expressions


## O que são?

São padrões utilizados para selecionar cadeias de caracteres em um determinado texto. No JS, também são objetos.  

Podem ser utilizadas com os métodos `exec` e `test` do objeto `regExp`. Já do objeto `String` podem ser utilizadas com os métodos `match`, `replace`, `search` e `split`.


## Criando

### Expressão literal

```js  
var regExp = /<expressão regular>/;
```  

Na expressão literal as expressões regulares são compiladas quando o script é carregado. Aqui é possível obter uma melhor performance quando a expressão utilizada é constante, ou seja, não muda durante a execução.


### Chamando a função construtora do objeto

```js  
var regExp = new RegExp("ab+c");
```  

É realizada em tempo de execução. É recomendado utilizar a forma construtora quando o padrão for desconhecido ou quando esse padrão pode mudar de forma recorrente, ou então, quando o padrão é de outra fonte, como na entrada de dados do usuário.


### Escrita

`abc` > vai procurar no texto o conjunto de caracteres **abc**  
`ab*c` > vai procurar no texto o conjunto que tenha `a` seguido de zero ou mais `b`


### Onde usar?

* Validação de campos
* Extração de dados
* Substituição de caracteres em texto


### RegExp API

`exec` - executa a RegExp e retorna os detalhes  
`test` - testa a RegExp e retorna `true` ou `false`


### Exemplos

```js  
var regExp = /9999-9999/;  
var telefone = "9999-9999";  

console.log(regExp.exec(telefone));  
["9999-9999", index: 0, input: "9999-9999"]  
```  

No código acima utilizamos o método `exec` apenas para executar nossa expressão regular.


```js  
var regExp = /9999-9999/;  
var telefone = "9999-9999";  

console.log(regExp.test(telefone));  
true  
```

Agora, no código acima, utilizamos o método `test`para testarmos nossa expressão regular e saber se a mesma é `true` ou `false`.


```js  
var regExp = /(48) 9999-9999/;  
var telefone = "(48) 9999-9999";  

console.log(regExp.test(telefone));  
false  
```  

Nesse trecho ele retorna `false` pois na RegExp possui caracteres especiais, como os parentêses. Para que ele identifique esses caracteres especiais precisam ser escapados.  

```js  
var regExp = /\(48\) 9999-9999/;  
var telefone = "(48) 9999-9999";  

console.log(regExp.test(telefone));  
true  
```  

Para escapar os parenteses basta colocar uma contra-barra (`\`) antes de cada parenteses.


```js  
var regExp = /\(48\) 9999-9999/;  
var telefone = "O telefone é (48) 9999-9999, tratar com Fulano da Silva!";  

console.log(regExp.test(telefone));  
true  
```

O código acima ainda vai devolver `true`, pois ele encontra dentro do texto a expressão regular.


```js  
var regExp = /\(48\) 9999-9999/;  
var telefone = "O telefone é (48) 9999-9999, tratar com Fulano da Silva!";  

console.log(regExp.exec(telefone));  

[ '(48) 9999-9999',  
  index: 13,  
  input: 'O telefone é (48) 9999-9999, tratar com Fulano da Silva!' ]  
```


Assim, com o `exec` ainda vai dar `true` e nos dizer em qual `index` ele está. E como deixar isso `false`? =o


```js  
var regExp = /^\(48\) 9999-9999/;  
var telefone = "O telefone é (48) 9999-9999, tratar com Fulano da Silva!";  

console.log(regExp.test(telefone)); 
```  

O `^` diz que o texto deve **começar** com tal especificação. Já o $ diz que ele tem que terminar com tal especificação.


### Grupo de Caracteres

`[abc]` > aceita qualquer caractere dentro do grupo **a**, **b** e **c**.  
`[^abc]` > **não** aceita qualquer caractere dentro do grupo **a**, **b** e **c**.  
`[0-9]` > aceita qualquer caractere entre 0 e 9.  
`[^0-9]` > **não** aceita qualquer caractere entre 0 e 9.  

O `^` dentro de um grupo de caracteres é **negação**. Já o `-` dentro dos [ ] é **range**.

```js  
var regExp = /^\([0-9][0-9]\) [0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/;  
var telefone = "(11) 9999-1234";  

console.log(regExp.test(telefone));  
true  
```  

No código acima temos uma expressão regular utilizando o grupo de caracter `[0-9]`, onde diz que pode ser encontrado qualquer caractere entre 0 e 9 no texto.

```js  
var regExp = /^\([0-9]{2}\) [0-9]{4}-[0-9]{4}$/;  
var telefone = "(11) 9999-1234";  

console.log(regExp.test(telefone));  
```  

O `{2}` diz que repetirá o grupo de caractere listado duas vezes.


```js  
var regExp = /^\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$/;  
var telefone = "(11) 9999-1234";  

console.log(regExp.test(telefone));    

var telefone2 = "(15) 99875-8888";  
console.log(regExp.test(telefone));  
```  

Acima, dizemos que a repetição do primeiro grupo de caracteres pode ser repetido de 4 a 5 vezes. Isso serve para números de celulares que possuem o nono dígito.


```js  
var regExp = /^\([0-9]{2}\) [0-9]{4,5}-?[0-9]{4}$/;  
var telefone = "(11) 99991234";  

console.log(regExp.test(telefone)); 
```

Com o `?` o uso do hífen pode ser utilizado ou não.  

`?` > aplicado a zero ou um caracter  
`*` > aplicado a zero ou mais caracteres  
`+` > um ou mais caracter



### Metacaracteres

`.` > representa qualquer caractere  
`\w` > representa o conjunto [a-zA-Z0-9]  
`\W` > representa o conjunto [^a-zA-Z0-9]  
`\d` > representa o conjunto [0-9]  
`\D` > representa o conjunto [^0-9]  
`\s` > representa um espaço em branco  
`\S` > representa um **não** espaço em branco  
`\n` > representa uma quebra de linha  
`\t` > representa um tab


### String API

`match` > executa uma busca na String e retorna um array contendo os dados encontrados ou null  
`split` > divide a String com base em uma outra String fixa ou expressão regular  
`replace` > substitui partes da String com base em outra String fixa ou expressão regular


### Modificadores

`i` > case insensitive matching `/<expressão regular>/i`  
`g` > global matching `/<expressão regular>/g`  
`m` > multiline matching `/<expressão regular>/m`  


## Fontes

[Desvendando o Javascript - Rodrigo Branas](https://www.youtube.com/playlist?list=PLQCmSnNFVYnT1-oeDOSBnt164802rkegc)  
[Regular Expressions - Mozilla Developer Network](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Guide/Regular_Expressions)  
[JavaScript - Expressões Regulares - linhacódigo](http://www.linhadecodigo.com.br/artigo/328/javascript-expressoes-regulares.aspx)