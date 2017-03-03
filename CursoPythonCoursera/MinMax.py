

def MinMax(temperatura):
    print("A menor temperatura do mês foi: ", minima(temperatura), " C.")
    print("A maior temperatura do mês foi: ", maxima(temperatura), " C.")


def minima(temps):
    min = temps[0]
    i = 1
    while i < len(temps):
        if temps[i] < min:
            min = temps[i]
        i = i + 1
    return min

def maxima(temps):
    max = temps[0]
    i = 1
    while i < len(temps):
        if temps[i] > max:
            max = temps[i]
        i = i + 1
    return max


def teste_pontual(funcao, temp, valor_esperado):
    if funcao == 1:
        valor_calculado = minima(temp)
    if funcao == 2:
        valor_calculado = maxima(temp)
        
    if valor_calculado != valor_esperado:
        print("Valor errado para array ", temp)
        print("Valor esperado é: ", valor_esperado, ". Valor calculado: ", valor_calculado)

        
def testa_minima():
    print("Iniciando testes")
    teste_pontual(1, [0], 0)    
    teste_pontual(1, [0, 0, 0, 0, 0, 0], 0)
    teste_pontual(1, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 0)
    teste_pontual(1, [15, 22, 35, 42, 17, 11, 50, 60, 18, 29, 10], 10)
    teste_pontual(1, [30, 31, 22, 43, 14, -3, -5, 26, 17, 18, 29, 10], -5)        
    print("Finalizando os testes")

def testa_maxima():
    print("Iniciando testes")
    teste_pontual(2, [0], 0)    
    teste_pontual(2, [0, 0, 0, 0, 0, 0], 0)
    teste_pontual(2, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 10)
    teste_pontual(2, [15, 22, 35, 42, 17, 11, 50, 60, 18, 29, 10], 60)
    teste_pontual(2, [30, 31, 22, 43, 14, -3, -5, 26, 17, 18, 29, 10], 43)        
    print("Finalizando os testes")     
