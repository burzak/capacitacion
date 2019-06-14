import threading
import random
import time

superlista = []
for n in range(1000):
    superlista.append(n)

print("Resultado deberia ser: ", (999*1000)/2)

class SuperContador(threading.Thread):
    def __init__(self, start, end, lista):
        super().__init__()
        self.inicio = start
        self.fin = end
        self.lista = lista
        self.total = 0
    
    def dameTotal(self):
        return self.total

    def run(self):
        indices = range(self.inicio, self.fin+1)
        for n in indices:
            self.total += self.lista[n]
            time.sleep(1.0/100.0)



procesos = []
procesos.append( SuperContador(0, 199, superlista) )
procesos.append( SuperContador(200, 399, superlista) )
procesos.append( SuperContador(400, 599, superlista) )
procesos.append( SuperContador(600, 799, superlista) )
procesos.append( SuperContador(800, 999, superlista) )

for proceso in procesos:
    proceso.start()


resultado = 0
for proceso in procesos:
    proceso.join()
    resultado += proceso.dameTotal()

print("El resultado es:", resultado)