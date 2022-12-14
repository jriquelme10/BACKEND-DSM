
![Logo](https://codebrisk.com/assets/images/posts/1625808060_laravel-banner1.webp)


# Proyecto restaurant Colo-Colo BACKEND.

Proyecto realizado por estudiantes de la UCN Antofagasta para la asignatura DSM.
Esta aplicación se basa en el entorno de un restaurant, y su función principal es listar un pedido de productos
el cual llegará a un entorno web, donde se podrá atender.






## Instalación

En primera instancia es necesario que utilices composer para la instalación
de paquetes y librerías de la aplicación.

```bash
  composer install
```

Luego de realizar la instalación de los paquetes, es necesario que modifiques
el archivo `.env.example` a `.env` para que luego puedas modificar el puerto asignado
para tu locahost el cual por defecto es `3306`, también debes ingresar el
nombre de tu base de datos especificamente aquí:
```bash
DB_HOST=127.0.0.1 //ip por defecto de laravel.
DB_PORT=3306 //puerto por defecto de laravel.
DB_DATABASE=restaurant //nombre de la base de datos.
```
Luego de haber realizado los pasos anteriores, es necesario generar las migraciones
de las tablas hacia la base datos. Esto lo puedes hacer de la siguiente manera:
```bash
  php artisan migrate
```
Luego de realizar las migraciones de las tablas, debes correr en el terminal el siguiente
comando, el cual permite la conexión directa del API de Laravel con el FRONTEND de la aplicación
restaurant:
```bash
  php artisan serve --host='0.0.0.0'
```
Ya con el backend corriendo con la dirección IP de tu conexión de red actual
puedes correr en tu navegador preferido:
```bash
  192.168.0.15:8000 //Ejemplo de dirección IP junto con el puerto `8000`
  de laravel.
```
Una vez realizados estos pasos, puedes comenzar a registrarte en la aplicación:

![Logo](https://i.imgur.com/jNl0z2e.png)

Luego de haber llenado todos los campos, puedes iniciar sesión con tu cuenta creada.

![Logo](https://i.imgur.com/5KS17c3.png)

Una vez iniciado sesión podras ver el panel del administrador junto con un sidebar
el cual tiene la opción de administrar las ordenes del restaurant.

![Logo](https://i.imgur.com/iVQljUV.png)

Y ya puedes empezar a listar pedidos desde la aplicación con el FRONTEND Y poder 
atenderlos desde el BACKEND web.