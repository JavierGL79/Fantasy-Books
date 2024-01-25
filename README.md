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