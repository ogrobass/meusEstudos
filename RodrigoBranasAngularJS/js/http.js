var router = require('./router');

var app = router(3412);
	
	var operadoras = [
		{nome: "Oi", codigo: 14, categoria: "Celular", preco: 2},
		{nome: "Vivo",codigo: 15, categoria: "Celular", preco: 1},
		{nome: "Tim", codigo: 41, categoria: "Celular", preco: 3},
		{nome: "GVT", codigo: 25, categoria: "Fixo", preco: 1},
		{nome: "Embratel",  codigo: 21, categoria: "Fixo", preco: 2}
	];
	

	var contatos = [
		{nome: "Pedro", telefone: "5555-5555", data: new Date(), operadora: { nome: "Tim", codigo: 14 }, cor: "blue"},
		{nome: "Ana", telefone: "7777-7777", data: new Date(), operadora: { nome: "Oi", codigo: 41 }, cor: "yellow"}, 
		{nome: "Maria", telefone: "9999-9999", data: new Date(), operadora:  { nome: "Vivo", codigo: 15 }, cor: "red"}
	];


	app.get('/operadoras/', function(req, res) {
		res.write(JSON.stringify(operadoras));
		res.end();
	});

	app.get('/contatos/', function(req, res) {
		res.write(JSON.stringify(contatos));
		res.end();
	});	

	app.post('/contatos/', function(req, res) {		
		contatos.push(JSON.parse(contato));
		res.end();
	});	
	
