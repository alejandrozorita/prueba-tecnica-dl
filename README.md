## Prueba Técnica DL

Procedemos a realizar la prueba técnica en función de los requisitos facilitados

#### Instalación

- Copiaremos el .env.example a .env
- Ejecutamos npm install
- Composer install
- Cargamos la BD siguiendo los pasos del [Repositorio de BD](https://github.com/datacharmer/test_db)

#### Estrucutra BD

La BD está definida según su [esquema](https://dev.mysql.com/doc/employee/en/images/employees-schema.png)

#### Tecnología

Para desarrollar esta prueba hemos usado:

* [Laravel7] - Framework Laravel for PHP
* [Bootstrap4] - Framework HTML/CSS 
* [MdBootstrap] - Material Design for Bootstrap 4
* [jQuery] - Framework JS
* [Gulp] - the streaming build system


#### Arquitectura

La aplicación se divide en MVC añadiendo una pequeña capa más de abstracción. Dicha capa es la carpeta *SRC*

##### SRC
Aquí encontraremos los modelos ```DepartmentSRC``` y ```EmployersSRC```. Desde estos modelos se inicia la ejecución de la aplicación.

##### Models

| Model | Explicación |
| ------ | ------ |
| Department | Modelo Eloquent de acceso a BD y relaciones |
| DepartmentEmployers | Modelo Eloqunet de acceso a tabla pivote entre departments y employees |
| DepartmentManagers | Modelo Eloqunet de acceso a tabla pivote entre departments y managers|
| Employer | Modelo Eloquent de acceso a BD y relaciones. Incorpora un serializer |
| Title | Modelo Eloquent de acceso a BD y relaciones |
| Salary | Modelo Eloquent de acceso a BD y relaciones |

##### HTTP

```HomeController```  Principio y final de la ejecución. Controla la petición de las rutas y la respuesta de la aplicación

##### Repositories
Mediante esta carpeta separamos la lógica de negocio de los modelos. hace de capa intermedia al acceso a la BD.

```DepartmentRepo```  Controla las peticiones del los modelos de la carpeta SRC y los modelos Eloquent para Departments
```EmployerRepo```  Controla las peticiones del los modelos de la carpeta SRC y los modelos Eloquent para Employeer

##### Factory

```EmployerFactory```  Nos genera un Objeto de la clase Employeer para hacer test


#### Tests

Para ejecutar los tests unitarios y de integración, ejecutaremos desde la consola:

```php
vendor/bin/phpunit
```


   [Laravel7]: <https://laravel.com/>
   [Bootstrap4]: <https://getbootstrap.com/>
   [MdBootstrap]: <https://mdbootstrap.com/>
   [Gulp]: <http://gulpjs.com>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [jQuery]: <http://jquery.com>

 