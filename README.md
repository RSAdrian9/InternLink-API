<pre class="vditor-reset" placeholder="" contenteditable="true" spellcheck="false"><div class="vditor-wysiwyg__block" data-type="html-block" data-block="0"><pre class="vditor-wysiwyg__preview" data-render="1"><p align="center"><a href="https://laravel.com/" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"/></a></p></pre></div><p data-block="0"></p></pre>

# Sistema de Gestión de Institutos y Alumnos.

Este proyecto es una aplicación web desarrollada en **Laravel 11** que permite gestionar institutos y alumnos. Implementa un **CRUD**, autenticación de **API con Laravel Sanctum**, relaciones entre modelos y funcionalidades avanzadas como **testing** y **deploy**.

## 📖 Índice

1. [Tecnologías Utilizadas](#tecnologias-utilizadas)
3. [Funcionalidades Implementadas](#funcionalidades-implementadas)
4. [Sprint 1: CRUD y Datos de Prueba](#sprint-1-crud-y-datos-de-prueba)
5. [Sprint 2: API REST y Autenticación](#sprint-2-api-rest-y-autenticacion)
6. [Sprint 3: Integración con Vue y Testing](#sprint-3-integracion-con-vue-y-testing)
7. [Instalación y Configuración](#instalacion-y-configuracion)
8. [Autor](#autor)

## **📌 Tecnologías Utilizadas**

🔹 **Laravel 11** – Framework backend PHP.

🔹 **Vue.js** – Frontend dinámico.

🔹 **SQLite** – Base de datos.

🔹 **Sanctum** – Autenticación API.

🔹 **Blade** – Sistema de plantillas de Laravel.

🔹 **Faker** – Generación de datos de prueba.

🔹 **PHPUnit** – Testing automatizado.

## 🚀 Funcionalidades Implementadas

* ✅ **CRUD completo de Institutos y Alumnos.**
* ✅ **Autenticación con Laravel Sanctum.**
* ✅ **Protección de rutas con Middleware.**
* ✅ **Generación de datos de prueba con Seeders y Factories.**
* ✅ **Relaciones entre modelos (Institutos ↔ Alumnos).**
* ✅ **Despliegue y documentación de la API.**

### Sprint 1. CRUD de Alumnos e Institutos.

#### 🏫 Gestión de Institutos.

* **Crear nuevo instituto.** Permite registrar institutos.
* **Editar instituto.** Actualiza la información de un instituto existente.
* **Mostrar detalles del instituto.** Visualiza la información detallada de un instituto.
* **Eliminar instituto.** Permite eliminar un instituto.

#### 👨‍🎓 Gestión de Alumnos.

* **Crear nuevo alumno.** Permite registrar alumnos.
* **Editar alumno.** Actualiza la información de un alumno existente.
* **Mostrar detalles del alumno.** Visualiza la información detallada de un alumno.
* **Eliminar alumno.** Permite eliminar un alumno.

#### 🔄 **Generación de Datos de Prueba**

* **Seeders:** Se han configurado seeders para poblar automáticamente la base de datos con información inicial.
* **Factories:** Uso de factories para la creación rápida y flexible de instancias de modelos con datos ficticios.
* **Faker:** Implementación de Faker para generar nombres, correos y otros datos de manera aleatoria y realista, mejorando la simulación de un entorno real.

  `SchoolFactory` y `SchoolSeeder` se encargan de crear 5 institutos, con sus respectivos atributos (`name`, `city`).
  `StudentFactory` y `StudentSeeder` generan múltiples alumnos asociados a estos institutos.

### Sprint 2: API REST.

#### **🔒 Autenticación y Middleware.**

Para proteger las rutas de la API, se ha implementado **Laravel Sanctum** como sistema de autenticación basado en tokens. Solo los usuarios autenticados pueden acceder a las rutas protegidas.

##### 📌 **Flujo de autenticación:**

1. **Registro de usuario:** Se crea un nuevo usuario en la base de datos.
2. **Inicio de sesión:** Se genera un token de autenticación para acceder a las rutas protegidas.
3. **Acceso a la API:** El usuario debe enviar el token en el encabezado `Authorization: Bearer {token}`.
4. **Cierre de sesión:** Se revoca el token de acceso.

##### 📌 **Rutas de autenticación:**

* `POST /api/register` → Registro de usuario.
* `POST /api/login` → Inicio de sesión (devuelve un token).
* `POST /api/logout` → Cierre de sesión (revoca el token).

##### 📌 **Uso del token en ThunderClient o Postman:**

1. Realizar **POST /api/login** con email y contraseña.
2. Copiar el token de respuesta.
3. En cada petición protegida, agregar el header:
   ```
   Authorization: Bearer {token}
   ```

#### 🛡️ Rutas protegidas con autenticación.

##### 📌 **Institutos:**

* `GET /api/schools` → Listar todos los institutos.
* `POST /api/schools` → Crear un nuevo instituto.
* `GET /api/schools/{id}` → Ver detalles de un instituto.
* `PUT /api/schools/{id}` → Actualizar instituto.
* `DELETE /api/schools/{id}` → Eliminar instituto.

##### 📌 **Alumnos:**

* `GET /api/students` → Listar todos los alumnos.
* `POST /api/students` → Registrar un nuevo alumno.
* `GET /api/students/{id}` → Ver detalles de un alumno.
* `PUT /api/students/{id}` → Actualizar alumno.
* `DELETE /api/students/{id}` → Eliminar alumno.

### Sprint 3: Laravel (Back-end) & Vue (Front-end).

#### [📁 Repositorio Front-end.](https://github.com/RSAdrian9/ProjectSchoolStudent-Front-end)

#### ☁️ **Despliegue Front-end.**

#### 📌 **Comunicación Front-End y Back-End:**

- Se utiliza **Axios** para las peticiones HTTP.
- Se gestiona la autenticación con el token de **Laravel Sanctum**.

#### **🛠️ Testing**

- Pruebas unitarias y funcionales para garantizar la integridad de la aplicación.

## ⚙️ Instalación y Configuración.

### 🛠 Requisitos Previos.

- PHP 8+.
- Composer.
- Laravel 11.
- Node.js (para Vue).

### 📌 Pasos de instalación

```bash
# Clonar el repositorio
git clone https://github.com/RSAdrian9/ProjectSchoolStudent-Back-end.git
cd ProjectSchoolStudent-Back-end

# Instalar dependencias
composer install
npm install

# Configurar el archivo .env
cp .env.example .env
php artisan key:generate

# Configurar la base de datos
php artisan migrate --seed

# Ejecutar el servidor
php artisan serve
```

---

## 👨‍💻 **Autor**

Adrián Ruiz Sánchez

[Correo](mailto:adrian.dev24@gmail.com)

[GitHub](https://github.com/RSAdrian9)

[LinkedIn](http://linkedin.com/in/adri%C3%A1n-ruiz-s%C3%A1nchez)

---
