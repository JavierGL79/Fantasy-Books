# PHP-Proyecto-Final
Proyecto final del curso PHP/Laravel 2023-2024

Esta App se ha realizado como proyecto final del curso PHP-Laravel 2023-2024 relizado por PONEEEER.

Realizado con :

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>

</p>

## Laravel License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Requisitos Previos

Software o herramientas se necesitan para ejecutar el proyecto

## Cómo descargar el proyecto de GitHub y clonarlo en tu máquina local
comandos.
homestead

## Instalar la base de datos y poblar la base de datos:
REVISAR
Para instalar una base de datos MySQL, necesitas tener instalado previamente el sistema operativo en la máquina virtual, por ejemplo Oracle Linux 8. También necesitas tener instalado el paquete mysql-server, que puedes obtener desde el repositorio oficial de MySQL1 o desde el repositorio AppStream de Oracle Linux2.

Los pasos para instalar una base de datos MySQL son los siguientes:

Inicia la máquina virtual y accede con tu usuario y contraseña.
Abre una terminal y ejecuta el siguiente comando para instalar el paquete mysql-server:
sudo dnf install mysql-server

Espera a que se complete la instalación y luego ejecuta el siguiente comando para iniciar el servicio de MySQL:
sudo systemctl start mysqld

Ejecuta el siguiente comando para verificar el estado del servicio de MySQL:
sudo systemctl status mysqld

Si el servicio está activo y funcionando, ejecuta el siguiente comando para configurar la seguridad de MySQL:
sudo mysql_secure_installation

Este comando te hará una serie de preguntas para establecer una contraseña para el usuario root de MySQL, eliminar los usuarios anónimos, deshabilitar el acceso remoto al root, eliminar la base de datos de prueba, y recargar los privilegios. Responde según tus preferencias, pero se recomienda usar una contraseña segura y eliminar los usuarios y bases de datos innecesarios.
Una vez que hayas configurado la seguridad de MySQL, puedes acceder a la consola de MySQL con el siguiente comando:
sudo mysql -u root -p

Te pedirá la contraseña que estableciste para el usuario root. Introdúcela y pulsa Enter.
Ya estás dentro de la consola de MySQL, donde puedes crear la base de datos, el usuario, y la contraseña que quieras para tu proyecto. Por ejemplo, para crear una base de datos llamada proyecto, un usuario llamado usuario, y una contraseña llamada contraseña, puedes ejecutar los siguientes comandos:
CREATE DATABASE proyecto;

CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'contraseña';

GRANT ALL PRIVILEGES ON proyecto.* TO 'usuario'@'localhost';

FLUSH PRIVILEGES;

Con estos comandos, ya tienes creada la base de datos y el usuario para tu proyecto. Puedes salir de la consola de MySQL con el comando exit.
Si quieres incluir el archivo .sql con el esquema y los datos de la base de datos, puedes copiarlo a la máquina virtual con una herramienta como WinSCP3 o FileZilla, o descargarlo desde una URL con el comando wget. Luego, puedes importar el archivo .sql a la base de datos con el siguiente comando:
mysql -u usuario -p proyecto < archivo.sql

Te pedirá la contraseña del usuario que creaste. Introdúcela y pulsa Enter.
Espera a que se complete la importación y verifica que la base de datos tenga el esquema y los datos correctos.
Si quieres usar las migraciones y los seeders de Laravel para generar el esquema y los datos de la base de datos, puedes seguir los pasos que se explican en la documentación oficial de Laravel. Básicamente, necesitas crear los archivos de migración y de seeder en tu proyecto de Laravel, configurar el archivo .env con los datos de conexión a la base de datos, y ejecutar los siguientes comandos:
php artisan migrate

php artisan db:seed

Estos comandos crearán y poblarán la base de datos según lo que hayas definido en los archivos de migración y de seeder.

##  Conectar el proyecto con la base de datos

## Ejecutar el proyecto



## Página de registro:
Al inicio, la validación del password está limitada a sólo 4 caracteres, tanto ene lado del servidor como en el del cliente. Se recomienda cambiarla como mínimo a la comentada en el código.
Ladao del servidor:
En el arhivo RegistroController.php(/app/Http/Controllers), eliminar o comentar la línea 
'regex:/.{4} ' (línea 22) COMPROBAAAAAR
y descomentar la línea siguiente, sustituyendo el código de validación propuesto (^(?=.[A-Za-z])(?=.\d)[A-Za-z\d]{8,}$) que se estime más adecuado.

En el lado del cliente:
En el archivo registro.blasde.php, en las líneas
                let regex = /.{4}/;
                //let regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
Comentar o eliminnar la primera línea y sustituir el código de validación propuesto (^(?=.[A-Za-z])(?=.\d)[A-Za-z\d]{8,}$) que se estime más adecuado en la segunda.
Además, en el archivo registr.blade.php, en la etiqueta del formulario correspondiente al password, modificar el atributo patter con el código de validación y modificar el atributo title con el texto adecuado en caso de cumplir con las condiciones de validación.
El código de validación tanto en el lado del servidor como en el del cliente deben coincidir.

## Créditos
 Se reconozcas el uso de recursos externos, como imágenes, fuentes e iconos que se han desarrollado/empleado en este proyecto.