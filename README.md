# Taller Mecánico 

## Caso de estudio
Aplicación web para la administración de talleres mecánicos que controla:
- Ingreso de vehículos  
- Estados de reparación  
- Cotizaciones  
- Notificaciones automáticas al cliente  

## Requisitos previos
- PHP 8.2+  
- Composer  
- MySQL 8+  

## Instalación y ejecución

```bash
# 1. Clonar / descomprimir
git clone https://github.com/TU_USUARIO/TallerMecanico.git
cd TallerMecanico

# 2. Dependencias
composer install

# 3. Variables de entorno
# Editar .env con tus credenciales de MySQL
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=taller
# DB_USERNAME=root
# DB_PASSWORD=***

# 4. Base de datos + datos de prueba
php artisan migrate:fresh --seed