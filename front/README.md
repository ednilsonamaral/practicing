# Frontend


Aqui deixarei algumas brincadeiras ("tontices" também, rsrsrs') com HTML + CSS + JS! :)


## Dicas CSS  

A dica abaixo é do Willian Justen. Visualizei-a nos comentários do post dele sobre ITCSS.

**Pergunta:** media queries, faz um arquivo separado ou não?
*Resposta:* Cara, o mais correto e até para se ter uma manutenção mais fácil é você ter o media-query dentro do próprio elemento que você
 está modificando. Isso evita com que tenha de ficar procurando alguma modificação num arquivo que não era o do mesmo.

**Pergunta:** Mas porque não usar um arquivo separado para todas as media queries?
 *Resposta:* Essa é exatamente a boa prática, ter os elementos com suas modificações unidas. Ter arquivos separados com as mesmas classes é uma péssima prática, pois descentraliza e prejudica sobre a existência da mesma.


## ITCSS  

**SETTINGS** ==> configurações básicas, variáveis globais (cores), espaçamentos  
**TOOLS** ==> mixins e funções necessárias  
**GENERIC** ==> resets, box-sizing, etc  
**BASE** ==> estilos para headings, blockquotes, a, buttons, etc. estilizações BÁSICAS  
**OBJECTS** ==> pequenos pedaços da interface. padrões de botões, listas, paineis, etc.  
**COMPONENTS** ==> componentes/elementos criados  
**TRUMPS** ==> também conhecido como helpers.


## Font-size  

**EM** utilizar como base a div como elemento pai. Já o **REM** utiliza o BODY como elemento pai (ROOT). *UTILIZAR REM NOS PRÓXIMOS PROJETOS.*

Se for IE8+, declarar:  

```stylus
font-size: 00px;  
font-size: 0.0rem;  
```  

Pois assim os browsers que suportem REM irão sobreescrever a declaração em px. Já o IE8, irá ignorar o REM e ler apenas o PX :smiley:
