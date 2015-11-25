var regExp = /^\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$/;
var telefone = "(11) 9999-1234";  

console.log(regExp.test(telefone));  

var telefone2 = "(15) 99875-8888";
console.log(regExp.test(telefone));
