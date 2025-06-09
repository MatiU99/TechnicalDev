# Ticket Management System – Clearit by Freightos

## Descripción

Este proyecto es una solución para el ejercicio técnico solicitado por Clearit by Freightos, desarrollado en **PHP (Laravel)** y **MySQL**.

El sistema permite a **usuarios** crear tickets relacionados con importación/exportación y a **agentes** gestionar estos tickets, incluyendo solicitudes de documentación adicional y seguimiento del estado.

## Tecnologías utilizadas

- PHP 8.x  
- Laravel 10.x  
- MySQL  
- Docker  
- Composer  
- Laravel Breeze (para autenticación básica)

## Funcionalidades implementadas

### ✅ Autenticación de usuarios
- Login y registro para dos tipos de usuarios: `user` y `agent`.

### ✅ Gestión de tickets (lado cliente)
- Creación de tickets con:
  - Nombre del ticket
  - Tipo (1, 2, 3)
  - Medio de transporte (aéreo, terrestre, marítimo)
  - Producto
  - País de origen / destino
  - Estado: nuevo, en progreso, completado

### ✅ Carga de documentación
- Los usuarios pueden adjuntar archivos a sus tickets.

### ⚠️ Pendiente (en desarrollo)
- Funcionalidad del lado del agente (revisión, solicitud de documentos, cierre del ticket)

---

## Instrucciones para correr el proyecto con Docker

### Paso 1: Clonar el repositorio


git clone https://github.com/MatiU99/TechnicalDev.git
cd repositorio
Paso 2: Levantar el entorno con Docker

docker-compose up -d
docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
La aplicación estará disponible en: http://localhost:8000

Crear .env 
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

Paso 3: Ejecutar migraciones y seeders
docker-compose exec app php artisan migrate --seed

URLS 

http://localhost:8000/register
http://localhost:8000/login
http://localhost:8000/tickets/create
http://localhost:8000/tickets
http://localhost:8000/tickets/1


La parte de Notificaciones se encuentra desarrolada en gran parte pero comentada para no interrumpir funcionalidad
