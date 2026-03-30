## Tienda

### Requisitos
- Docker Desktop
- WSL2 (Windows)

### Instalación
1. Clonar el repositorio
2. Copiar `.env.example` a `.env` y configurar credenciales
3. `./vendor/bin/sail up -d`
4. `./vendor/bin/sail artisan migrate --seed`

### Comando cargo exprés
`./vendor/bin/sail artisan pedidos:cargo-expres`