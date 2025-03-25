# 🛩️ Pacific Airline Cargo - Sistema de Administración de Aerolínea

Sistema web para la gestión de una aerolínea de carga, con funcionalidades para usuarios y administradores, incluyendo autenticación con JSON Web Tokens (JWT).

## ✨ Características Principales

- **Reserva de vuelos** para usuarios registrados
- **Gestión completa de vuelos y aviones** para administradores
- **Sistema de autenticación seguro** con JWT
- **Interfaz responsive** diseñada con TailwindCSS
- **API RESTful** para integración con otros sistemas
- **Sistema de roles** (Usuario/Administrador)

## 🚀 Instalación

### Requisitos Previos
- PHP 8.0+
- Composer
- Node.js 14+
- MySQL 5.7+ o MariaDB
- Servidor web (Apache/Nginx) o XAMPP

### Pasos de Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/Leonkeneddy86/Project-Airline.git
cd Project-Airline
```
Instalar dependencias de Composer:
```
composer install
```
Instalar dependencias de Node.js:
```
npm install
```
Renombrar Variable de entorno (ENV)
```
.env.example .env
```
Configurar base de datos en .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=airline2
DB_USERNAME=root
DB_PASSWORD=
```
Generar clave de aplicación:
```
php artisan key:generate
```
Ejecutar migraciones:
```
php artisan migrate:fresh
```
Ejecutar Seeders:
```
php artisan migrate:fresh --seed
```
Iniciar servidor de desarrollo:
```
php artisan serve
npm run dev
```
📸 Capturas de Pantalla

Página Principal

<img width="944" alt="index" src="https://github.com/user-attachments/assets/6d3d0ef2-5ff9-4dc2-80d9-d897da82c521" />


Vista de Aviones

<img width="950" alt="aviones" src="https://github.com/user-attachments/assets/f8d8221c-1c39-48a5-8a5d-1fcfa0af0126" />


Vista de Vuelos

<img width="949" alt="flights" src="https://github.com/user-attachments/assets/13fe49b5-6993-46c3-b501-2df0b03ab4fa" />

Vista Show detalles del vuelo

<img width="950" alt="show" src="https://github.com/user-attachments/assets/4b600efb-112c-4333-bb4b-bfa30d62f387" />


Vista de Pagina de error

<img width="950" alt="Error" src="https://github.com/user-attachments/assets/d9cb3ef1-3cb6-4bbf-8e48-906180441d51" />


🛠️ Tecnologías Utilizadas
Backend: Laravel 11

Frontend: Blade, TailwindCSS

Base de Datos: MySQL

Autenticación: JWT (JSON Web Tokens)

Herramientas: Composer, Node.js, XAMPP

🧪 Testing
Ejecutar tests con:
```
php artisan test
```

Para Ver los test de forma mas grafica en un HTML pon este comando:
```
php artisan test --coverage-html=coverage-report
```

Ejecutar un Test Coverage Basico en terminal
```
php artisan test --coverage
```

Mi test Coverage:



🗃️ Diagrama de Base de Datos



## 🌐 API Endpoints

### 🔐 Autenticación

| Método | Endpoint          | Descripción                              | Middleware     |
|--------|-------------------|------------------------------------------|----------------|
| POST   | `/auth/register`  | Registrar nuevo usuario                  | api            |
| POST   | `/auth/login`     | Iniciar sesión (obtener JWT token)       | api            |
| POST   | `/auth/logout`    | Cerrar sesión (invalidar token)          | api, auth:api  |
| POST   | `/auth/refresh`   | Refrescar token JWT                      | api, auth:api  |
| POST   | `/auth/me`        | Obtener información del usuario actual   | api, auth:api  |

### ✈️ Vuelos (Flights)

| Método | Endpoint                | Descripción                          | Permisos       |
|--------|-------------------------|--------------------------------------|----------------|
| GET    | `/api/flights`          | Listar todos los vuelos              | Público        |
| GET    | `/api/flights/active`   | Listar vuelos activos                | Público        |
| GET    | `/api/flight/{id}`      | Obtener detalles de un vuelo         | Público        |
| POST   | `/api/flight`           | Crear nuevo vuelo                    | Admin          |
| PUT    | `/api/flight/{id}`      | Actualizar vuelo                     | Admin          |
| DELETE | `/api/flight/{id}`      | Eliminar vuelo                       | Admin          |

### 🛩️ Aviones (Planes)

| Método | Endpoint                | Descripción                          | Permisos       |
|--------|-------------------------|--------------------------------------|----------------|
| GET    | `/api/planes`           | Listar todos los aviones             | Público        |
| GET    | `/api/plane/{id}`       | Obtener detalles de un avión         | Público        |
| POST   | `/api/plane`            | Añadir nuevo avión                   | Admin          |
| PUT    | `/api/plane/{id}`       | Actualizar avión                     | Admin          |
| DELETE | `/api/plane/{id}`       | Eliminar avión                       | Admin          |


## 👥 Roles y Permisos

### 👤 Usuario Regular
- Ver vuelos disponibles
- Reservar vuelos
- Ver sus reservas

### 👨‍💼 Administrador
- Todas las funciones de usuario
- Gestionar vuelos (eliminar)
- Gestionar aviones
- Ver todas las reservas

## 🤝 Contribución
Las contribuciones son bienvenidas. Por favor:
- Abre un issue para reportar problemas o sugerencias
- Envía un pull request para contribuir con mejoras

## ✉️ Contacto
**Jonathan Torres**  
📧 Email: [Jonathan19.jtv@gmail.com](mailto:Jonathan19.jtv@gmail.com)
