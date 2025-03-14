
# Airline

## ▶️💻 Installation
- Clone repository
```
git clone https://github.com/Leonkeneddy86/Project-Airline.git
```

- Install Composer dependencies

```
composer install
```
- Install Nodejs dependencies

```
npm install
```
- Duplicate .env.example file and rename to .env
- In this new .env, you uncomment the DB connection lines which are these:
 
In DB_CONNECTION will come mysqlite, change it to the bd you use (in this case MySQL)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=airline2
DB_USERNAME=root
DB_PASSWORD=
```
 - Generate an App Key with this command 
```
php artisan key:generate 
```
- Execute migrations  
```
php artisan migrate:fresh
php artisan migrate:fresh --seed
```
- How to run the Laravel server  
```
php artisan serve
```

- If you want to run all this in development environment run the following command  
```
npm run dev
```
## Vista de los vuelos

<img width="959" alt="vista vuelos" src="https://github.com/user-attachments/assets/4fb4d392-4469-4ce6-966a-e8f3eb1b84ee" />

## Vista de aviones

<img width="959" alt="vista aviones" src="https://github.com/user-attachments/assets/ec4752bf-74ad-4e7d-a0e1-2dee7bac4eb2" />

## Tech Stack

PHP, Laravel, Composer, NodeJS, Xampp, Blade, TailwindCSS


## Tests

```bash
  php artisan test
```

## Cobertura de los Tests


## Diagrama de base de datos

<img width="685" alt="relations" src="https://github.com/user-attachments/assets/c835e145-c074-4e4b-b8fc-84d6ee69225a" />


## API Flights


## API Planes
