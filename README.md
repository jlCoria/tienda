## Tienda
Panel interno para el equipo de logística para visualizar el estado de los pedidos.

## Tecnologías
- Laravel 11
- MySQL
- Docker (Laravel Sail)
- OAuth 2.0 (GitHub)
- Tailwind CSS

## Requisitos
- Docker Desktop
- WSL2 (Windows)

## Instalación
1. Clonar el repositorio
2. Copiar `.env.example` a `.env` y configurar credenciales
3. `./vendor/bin/sail up -d`
4. `./vendor/bin/sail artisan migrate --seed`

## Comandos útiles
# Cargo exprés
./vendor/bin/sail artisan pedidos:cargo-expres
