
# validaciones.py

import sys

def validar_tamano(texto, min_tam, max_tam):
    if len(texto) < min_tam:
        sys.exit(f"El valor ingresado debe tener como mínimo {min_tam} caracteres.")
    elif len(texto) > max_tam:
        sys.exit(f"El valor ingresado debe tener como máximo {max_tam} caracteres.")

