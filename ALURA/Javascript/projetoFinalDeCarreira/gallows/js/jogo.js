var criaJogo = function(sprite) {

    var etapa = 1;
    var lacunas = [];
    var palavraSecreta = '';



    // novas funcionaliades que precisamos implementar

    var ganhou = function () {
        return lacunas.length
            ? !lacunas.some(function(lacuna) {
                return lacuna == '';
            })
            : false;
    };

    var perdeu = function () {
        return sprite.isFinished();
    };

    var ganhouOuPerdeu = function () {
        return ganhou() || perdeu();
    };

    var reinicia = function () {
        etapa = 1;
        lacunas = [];
        palavraSecreta = '';
        sprite.reset();
    };





    var processaChute = function(chute) {
        var exp = new RegExp(chute, 'gi');
        var resultado;    
        var acertou = false;

        while(resultado = exp.exec(palavraSecreta)) {
            lacunas[resultado.index] = chute;
            acertou = true;
        }

        if(!acertou) {
            sprite.nextFrame();
        }
    };

    var criaLacunas = function() {
        
        for (let i = 0; i < palavraSecreta.length; i++) {
            lacunas.push('');
        }        

        /*lacunas = Array(palavraSecreta.length).fill('');*/
        /*Quando fazemos Array(palavraSecreta.length) estamos criando um array com o mesmo tamanho da string palavraSecreta. 
        Todavia, todos os elementos serão undefined. Resolvemos isso facilmente através da função fill():*/

    };

    var proximaEtapa = function() {
        etapa = 2;
    };

    // recebe a palavra secreta e deve atribuí-la à variável `palavraSecreta`. Vai para a próxima etapa
    var setPalavraSecreta = function (palavra) {
        palavraSecreta = palavra;
        criaLacunas();
        proximaEtapa();
    };

    // retorna as lacunas do jogo. Importante para quem for exibí-las.
    var getLacunas = function() {
        return lacunas;
    };

    // retorna a etapa atual do jogo
    var getEtapa = function() {
        return etapa;
    };




    return {
        setPalavraSecreta   : setPalavraSecreta, 
        getLacunas          : getLacunas,
        getEtapa            : getEtapa,
        processaChute       : processaChute,
        ganhou              : ganhou,
        perdeu              : perdeu,
        ganhouOuPerdeu      : ganhouOuPerdeu, 
        reinicia            : reinicia        
    };    
};