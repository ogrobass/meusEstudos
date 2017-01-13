decrescente = True
anterior = int(input("Digite o primeiro numero da sequencia: "))

valor = 1

while valor != 0 and decrescente:
	valor = int(input("Digite o proximo numero da sequencia: "))
	if valor > anterior:
		decrescente = False
	anterior = valor

if decrescente == True:
	print("A sequencia esta em ordem decrescente :-)");
else:
	print("A sequencia nao esta em ordem decrescente :-(")
	
