#Creación de API REST con Laravel 10
## Instalación
1. Clonar el repositorio https://github.com/AngelMontesR/blog en la carpeta deseada
2. Ejecutar el comando `composer install` para instalar las dependencias de Laravel
3. Crear una base de datos en MySQL
4. Crear un archivo .env en la raíz del proyecto, copiar el contenido de .env.example y pegarlo en el archivo .env creado
5. Configurar las variables de entorno en el archivo .env
6. Ejecutar el comando `php artisan migrate --seed` para crear las tablas en la base de datos y poblarlas con datos de prueba
7. Crear una llave para la aplicación con el comando `php artisan key:generate`
8. Crear host virtual para el proyecto llamado blog-api.dev.com ejemplo:
``` <VirtualHost *:80>
    ServerName blog-api.dev.com
    DocumentRoot "C:/xampp/htdocs/blog/public"
    <Directory  "C:/xampp/htdocs/blog/public/">
        Options +Indexes +Includes +FollowSymLinks +MultiViews
        AllowOverride All
        Require local
    </Directory>
    </VirtualHost> ```
9. Agregar la siguiente línea en el archivo hosts de tu sistema operativo: `127.0.0.0.1 blog-api.dev.com`
10. Reiniciar el servidor

## Endpoints
### Autenticación de usuarios (Login)
#### Petición
`POST /api/login`
#### Parámetros
| email | password |
|-------|----------|
| string| string   |

### Registro de publicaciones
#### Petición
`POST /api/publications`
#### Parámetros
| title | content |
|-------|---------|
| string| string  |

### Obtener publicaciones
#### Petición
`GET /api/publications`
#### Parámetros
ninguno

### Obtener publicación
#### Petición
`POST /api/publications/show`
#### Parámetros
| id |
|----|
| int|

### Actualizar publicación
#### Petición
`PUT /api/publications/update`
#### Parámetros
| id | title | content |
|----|-------|---------|
| int| string| string  |

### Eliminar publicación
#### Petición
`DELETE /api/publications/delete`
#### Parámetros
| id |
|----|
| int|

### Obtener comentarios todos los comentarios
#### Petición
`GET /api/comments`
#### Parámetros
ninguno

### Obtener comentarios de una publicación
#### Petición
`POST /api/comments/show`
#### Parámetros
| id |
|----|
| int|

### Crear comentario
#### Petición
`POST /api/comments`
#### Parámetros
| id_user | id_publicacion | content |
|---------|----------------|---------|
| int     | int            | string  |

### Actualizar comentario
#### Petición
`PUT /api/comments/update`
#### Parámetros
| id | content |
|----|---------|
| int| string  |


### Eliminar comentario
#### Petición
`DELETE /api/comments/delete`
#### Parámetros
| id |
|----|
| int|





