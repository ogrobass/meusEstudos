class NegociacaoController {
    
    constructor(data, quantidade, valor) {        
        let $ = document.querySelector.bind(document);
        this._inputData = $('#data');
        this._inputQuantidade= $('#quantidade');
        this._inputValor = $('#valor');

    }
    
    adiciona(event) {
        //event.preventDefault();
        console.log(event);
        //let data = new Date(this._inputData.value.replace(/-/, ','));
        let data = new Date(
            this._inputData.value
                .split('-')
                .map((item, indice) => item - indice % 2)
        );
        console.log(data);

        let negociacao = new Negociacao(
            data,
            this._inputQuantidade.value,
            this._inputValor
        );

        console.log(negociacao);
    }
}