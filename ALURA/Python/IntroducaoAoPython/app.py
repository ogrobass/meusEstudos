# -*- coding: UTF-8

def listar(nomes):
	print 'Listando nomes:'
	for nome in nomes:
			print nome

def cadastrar(nomes):
	print 'Digite o nome:'
	nome = raw_input()
	nomes.append(nome)

def menu():
	nomes = []
	escolha = ''

	while (escolha != '0'):
		print 'Digite: 1 para cadastrar, 0 para terminar, 2 para listar'
		escolha = raw_input()

		if(escolha == '1'):
			cadastrar(nomes)

		if(escolha == '2'):
			listar(nomes)	
menu()					