
linha = 1
coluna = 1

while linha <= 10:
    print("Tabuada do: ", linha)
    while coluna <= 10:
        print (linha, 'x', coluna, ' = ', linha * coluna)
        coluna = coluna + 1
    print("=================================================")        
    linha = linha + 1
    coluna = 1
