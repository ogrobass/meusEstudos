meuCartao = int(input("Digite o numero do seu cartao de credito: "))

cartaoLido = 1
encontreiMeuCartaoNaLista = False
tentativas = 0

while cartaoLido != 0 and not encontreiMeuCartaoNaLista:
	cartaoLido = int(input("Digite novamente o numero do cartao de credito: "))
	if cartaoLido == meuCartao:
		encontreiMeuCartaoNaLista = True
	
	tentativas += 1
	
	print("Tentativa: ", tentativas)
if encontreiMeuCartaoNaLista:
	print("Eba!! Encontrei meu carta ona lista")

elif tentativas > 5:
	print("Xii, ele nao esta la")