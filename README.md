## Instalación

Clona el repositorio con el siguiente comando

```bash
$ git clone https://github.com/aidachumacero/laravel.git
```

```bash
$ composer install
```

```bash
$ npm install && npm run dev
```

## Configuración

Copia el archivo .env.example a .env

**Linux**

```bash
$ cp .env.example .env
```

**Windows**

```bash
$ copy .env.example .env
```

Genera una llave única de la aplicación

```bash
$ php artisan key:generate
```

## Base de Datos y Migración de Datos

Configura las credenciales de acceso a base de datos

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=username
DB_PASSWORD=password
```

Con el siguiente comando realiza el cargado de usuario por defecto y un 100 usuarios de prueba

```bash
$ php artisan migrate --seed
```

> Si quiere cancelar la migración de usuarios de prueba comenta la línea de código N° 32, en el archivo `database\seeders\DatabaseSeeder.php`

```php
\App\Models\User::factory(100)->create();
```

o Tambien puede cambiar el numero 100, por la cantidad de usuarios aleatorios a crear.

Levanta el servicio en localhost

```bash
$ php artisan serve
```

Ingresa en `http://localhost:8000/login` y utiliza las siguientes credenciales de usuario Administrador:

```php
email: admin@admin.com
password: password
```

# create a livewire component

`php artisan make:livewire subfolder.component`
