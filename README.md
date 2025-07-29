# 🔧 Sistema de Gestión para Taller Mecánico

## 📋 Descripción
Aplicación web moderna para la administración completa de talleres mecánicos desarrollada con Laravel 12 y Tailwind CSS.

### ✨ Características principales:
- 👥 **Gestión de Clientes**: Registro y administración de información de clientes
- 🚗 **Control de Vehículos**: Registro detallado de vehículos con historial de servicios
- 📋 **Órdenes de Trabajo**: Creación y seguimiento de órdenes de servicio
- 🔧 **Gestión de Repuestos**: Inventario y control de repuestos
- 💰 **Cotizaciones**: Sistema de cotizaciones con PDF
- 📧 **Notificaciones**: Notificaciones automáticas por email
- 📊 **Dashboard**: Panel de control con estadísticas
- 🎨 **Diseño Moderno**: Interfaz responsive con Tailwind CSS

## 🛠️ Requisitos del Sistema

### Servidor
- **PHP**: 8.2 o superior
- **Composer**: Última versión
- **Node.js**: 18+ (para compilar assets)
- **NPM**: Incluido con Node.js

### Base de Datos
- **MySQL**: 8.0+ o **MariaDB**: 10.3+

### Servidor Web (Opcional para producción)
- **Apache**: 2.4+ con mod_rewrite
- **Nginx**: 1.18+

## 🚀 Instalación Paso a Paso

### 1. Clonar el Repositorio
```bash
git clone https://github.com/TU_USUARIO/TallerMecanico.git
cd TallerMecanico
```

### 2. Instalar Dependencias de PHP
```bash
composer install
```

### 3. Instalar Dependencias de Node.js
```bash
npm install
```

### 4. Configurar Variables de Entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 5. Configurar Base de Datos
Edita el archivo `.env` con tus credenciales de MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller_mecanico
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 6. Crear Base de Datos
```sql
-- Conectar a MySQL y ejecutar:
CREATE DATABASE taller_mecanico CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 7. Ejecutar Migraciones y Seeders
```bash
# Crear tablas y datos de prueba
php artisan migrate:fresh --seed
```

### 8. Compilar Assets de Frontend
```bash
# Para desarrollo
npm run dev

# Para producción
npm run build
```

### 9. Configurar Permisos (Linux/Mac)
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 10. Iniciar Servidor de Desarrollo
```bash
php artisan serve
```

La aplicación estará disponible en: `http://localhost:8000`

## 📧 Configuración de Email (Opcional)

Para habilitar notificaciones por email, configura en `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu_email@gmail.com
MAIL_PASSWORD=tu_contraseña_app
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=tu_email@gmail.com
MAIL_FROM_NAME="Taller Mecánico"
```

## 🗂️ Estructura del Proyecto

```
TallerMecanico/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── Mail/               # Clases de email
├── database/
│   ├── migrations/         # Migraciones de BD
│   ├── seeders/           # Datos de prueba
│   └── factories/         # Factories para testing
├── resources/
│   ├── views/             # Plantillas Blade
│   ├── css/              # Estilos CSS
│   └── js/               # JavaScript
├── routes/
│   └── web.php           # Rutas web
└── public/               # Archivos públicos
```

## 🎯 Datos de Prueba

Después de ejecutar los seeders, tendrás:
- **10 clientes** con datos ficticios
- **20 vehículos** asignados a los clientes
- **15 órdenes de trabajo** en diferentes estados
- **50 repuestos** en inventario
- **10 cotizaciones** de ejemplo

## 🔧 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Regenerar autoload
composer dump-autoload

# Ejecutar migraciones
php artisan migrate

# Rollback migraciones
php artisan migrate:rollback

# Crear nuevo controlador
php artisan make:controller NombreController

# Crear nuevo modelo
php artisan make:model NombreModelo -m
```

## 🐛 Solución de Problemas

### Error de permisos
```bash
sudo chmod -R 775 storage bootstrap/cache
```

### Error de clave de aplicación
```bash
php artisan key:generate
```

### Error de conexión a base de datos
1. Verificar credenciales en `.env`
2. Asegurar que MySQL esté ejecutándose
3. Verificar que la base de datos existe

### Assets no se cargan
```bash
npm run build
php artisan config:clear
```

## 📱 Características de la Interfaz

- **Diseño Responsive**: Funciona en desktop, tablet y móvil
- **Tema Oscuro**: Interfaz moderna con fondo negro
- **Animaciones**: Transiciones suaves y efectos hover
- **Iconos SVG**: Iconografía consistente y escalable
- **Formularios Modernos**: Campos con iconos y validación

## 🤝 Contribuir

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Soporte

Si tienes problemas con la instalación o uso del sistema:

1. Revisa la sección de **Solución de Problemas**
2. Verifica que cumples todos los **Requisitos del Sistema**
3. Asegúrate de seguir todos los pasos de **Instalación**

---

⭐ **¡No olvides dar una estrella al proyecto si te fue útil!**