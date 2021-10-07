# Inventario de Estilos de Aprendizaje de Kolb

Este es el código para la aplicación Inventario de Estilos de Aprendizaje de Kolb.

## Tecnologías usadas

* Composer 2+
* Apache 2.2+
* Node 12+
* MySQL Community 5.6+
* PHP 7.1+
* Laravel 5.8+
* Vui.js 2.6+

## Instalación

1. Instalar Apache 2.2+.
2. Instalar Node 12+.
3. Instalar PHP 7.1+.
4. Asegurarse que las siguientes extensiones de PHP se encuentran disponibles y habilitadas:
 * php_mysqli
 * php_mbstring
 * php_gettext
 * php_curl
 * php_exif
 * php_xmlrpc
 * php_openssl
 * php_soap
 * php_imap
 * php_fileinfo
5. Conectarse a MySQL y crear una base de datos para el proyecto. Opcionalmente se puede crear un usuario y contraseña con acceso exclusivo a esta base de datos.
6. Clonar el repositorio en la carpeta de su preferencia.
7. Ir al directorio del proyecto e instalar las dependencias con las siguientes instrucciones:

 ```
 composer install
 composer dumpautoload -o
 ```

8. Renombrar el archivo _.env.example_ a _.env_.
9. En este archivo, cambiar los parámetros pertinentes, especialmente: 
 * APP_URL: URL del proyecto (usualmente http://localhost).
 * DB_HOST: Servidor de base de datos.
 * DB_PORT: Puerto de la base de datos (usualmente 3306).
 * DB_DATABASE: Nombre de la base de datos creada en el paso 5.
 * DB_USERNAME: Usuario de la base de datos.
 * DB_PASSWORD: Contraseña de la base de datos.
10. Crear la base de datos con sus datos semilla con la siguiente instrucción:
 
 ```
 php artisan migrate:fresh --seed
  
 ```
 
11. Instalar dependencias de vui.js, compilarlo y correrlo ejecutando la siguiente instrucción:

 ```
 npm install
 npm run dev
  
 ```
 
12. Ir al URL del proyecto en su navegador favorito.

## Notas

* Puede usar otro servidor web en lugar de IIS, Nginx o el mismo servidor web de Artisan, solo asegúrese de configurar las reglas de reescritura de URLs para ese servidor web en particular de manera correcta.
* Para ambientes de desarrollo y pruebas se recomienda instalar Laragon ([https://laragon.org](https://laragon.org)) para facilitar la instalación de Apache, PHP, MySQL y Node.js.