# Learning Ionic Framework


## Apps Híbridos  

Os apps híbridos são apps desenvolvidos com linguagens não nativas do smartphone com um navegador embutido. Com Ionic é possível desenvolver apps com HTML, CSS e JS e compilá-lo para iOS e Android.


## Vantagens de Apps Híbridos  

* Não é preciso desenvolver nativamente para cada dispositivo;  
* Velocidade de desenvolvimento;  
* Baixo custo de desenvolvimento.


## Desvantagens de Apps Híbridos  

* Performance: **ainda** não roda os apps na mesma velocidade de apps nativos.


## Instalação (Linux - Debian)  

Antes de instalar o Ionic, deve ter instalado na máquina o Node.js.


`npm install -g cordova ionic` (usuário root)


## Criando um Projeto  

Dentro da pasta do nosso projeto, basta darmos o comando `ionic start nomeProjeto sidemenu`. Eu dei esse comando na pasta `www/` do meu PC, e, então, ele criou a pasta `nomeProjeto` com todos os diretórios e arquivos necessários.  

* `sidemenu`: aquele menu de hamburguer lateral;  
* `blank`: crú, em branco;  
* `tabs`: com header superior fixo e header inferior fixo, com botões inferiores.

### Árvore  

```  
cd menuTeste && ls  

── bower.json     // bower dependencies  
├── config.xml     // cordova configuration  
├── gulpfile.js    // gulp tasks  
├── hooks          // custom cordova hooks to execute on specific commands  
├── ionic.project  // ionic configuration  
├── package.json   // node dependencies  
├── platforms      // iOS/Android specific builds will reside here  
├── plugins        // where your cordova/ionic plugins will be installed  
├── scss           // scss code, which will output to www/css/  
└── www            // application - JS code and libs, CSS, images, etc.  
```

### Visualizando o Projeto  

`ionic serve --lab`  

Esse comando criará um servidor ionic e abrirá em seu navegador com dois containers para visualização, um deles de como ficaria no iOS e o outro no Android.

Utilizando esse comando, seja com o parâmetro `--lab` ou não, ele já atualiza automaticamente no navegador assim que o arquivo for salvo.  

Além disso, no terminal, ele mostra um pequeno log de qual arquivo foi alterado.