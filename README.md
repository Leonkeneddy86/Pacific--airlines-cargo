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
- Laravel 11
- Composer
- Node.js
- Servidor web: XAMPP

### Pasos de Instalación

1. Clonar el repositorio:
```
https://github.com/Leonkeneddy86/Pacific--airlines-cargo.git
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

<img width="698" alt="porcentaje de los test" src="https://github.com/user-attachments/assets/ff357361-3344-48c5-9a41-ea380a822988" />


## 🗃️ Diagrama de Base de Datos

[Project Airline - DrawSQL](https://drawsql.app/teams/jonathan-28/diagrams/project-airline)

## Captura de pantalla del Diagrama

<img width="953" alt="Drawsql" src="https://github.com/user-attachments/assets/9401c757-5a1c-49e4-97b7-8611ea2731bd" />

## Moockups Figma:

[Ver el diseño en Figma](https://embed.figma.com/design/Itn7Rt7OGH4yYwDAPpCm5H/AIRLINE?node-id=0-1&embed-host=share)


## Para la gestion de Tareas he usado Jira

## Mi Tablero: 

![Jira tablero](https://github.com/user-attachments/assets/b5499010-6f7e-41b5-9ecc-88c9e7a19b8e)

## Mi Backlog:

![Jira backlog](https://github.com/user-attachments/assets/dc95f604-1fd0-4f19-af4c-0efbc7884114)


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

| Método | Endpoint                | Descripción                          
|--------|-------------------------|--------------------------------------
| GET    | `/api/flights`          | Listar todos los vuelos              
| GET    | `/api/flight/{id}`      | Obtener detalles de un vuelo         
| POST   | `/api/flight`           | Crear nuevo vuelo                    
| PUT    | `/api/flight/{id}`      | Actualizar vuelo                     
| DELETE | `/api/flight/{id}`      | Eliminar vuelo                       

### 🛩️ Aviones (Planes)

| Método | Endpoint                | Descripción                          
|--------|-------------------------|--------------------------------------
| GET    | `/api/planes`           | Listar todos los aviones             
| GET    | `/api/plane/{id}`       | Obtener detalles de un avión         
| POST   | `/api/plane`            | Añadir nuevo avión                   
| PUT    | `/api/plane/{id}`       | Actualizar avión                     
| DELETE | `/api/plane/{id}`       | Eliminar avión                       


## 👥 Roles y Permisos

### 👤 Usuario Regular
- Ver vuelos disponibles
- Reservar vuelos
- Ver sus reservas

### 👨‍💼 Administrador
- Gestionar vuelos (eliminar)

  ## Licencia

Este proyecto está bajo la **MIT License**. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## 🤝 Contribución
Las contribuciones son bienvenidas. Por favor:
- Abre un issue para reportar problemas o sugerencias
- Envía un pull request para contribuir con mejoras

## ✉️ Contacto
**Jonathan Torreblanca**  
📧 Email: [Jonathan19.jtv@gmail.com](mailto:Jonathan19.jtv@gmail.com)

<a href="https://www.linkedin.com/in/jonathantorreblanca" target="_blank">
  <img src="https://img.shields.io/badge/linkedin-1de9b6?style=for-the-badge&logo=linkedin&logoColor=blue" alt="Linkedin Badge">
</a>

## ⚠️ Notas de Atención

Nota:
Las vistas actuales son prototipos y podrían cambiar en futuras actualizaciones.

Nota:
Este proyecto está en constante actualización. Conforme se implementen mejoras, se reflejarán en este documento.
