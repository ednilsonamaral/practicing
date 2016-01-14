//exemplo de lambda em javascript

//passar funções como parâmetro também é conhecido com lambda

var produto = {nome: 'Sapato', preco: 150};

var impostoA = function(preco){
		return preco * 0.1;
};

var impostoB = function(preco){
		return preco * 0.2;
};

var calculaPreco = function(produto, imposto){
			return produto.preco + imposto(produto.preco);
};


console.log("Imposto A: " + calculaPreco(produto, impostoA));
console.log("Imposto B: " + calculaPreco(produto, impostoB));
