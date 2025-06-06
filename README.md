<pre class="vditor-reset" placeholder="" contenteditable="true" spellcheck="false"><div class="vditor-wysiwyg__block" data-type="html-block" data-block="0"><pre class="vditor-wysiwyg__preview" data-render="1"><p align="center"><a href="https://laravel.com/" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"/></a></p></pre></div><p data-block="0"></p></pre>

# **InternLink** – Plataforma de gestión de prácticas académicas

Aplicación web desarrollada en **Laravel 11** con una API RESTful robusta, diseñada para facilitar la gestión de las prácticas profesionales de estudiantes, la administración de empresas colaboradoras y tutores, y la asignación de roles a usuarios. Parte de una base funcional (CRUD, autenticación, relaciones entre modelos), esta plataforma amplía su alcance con una estructura modular, una API documentada y un control de versiones riguroso para adaptarse a escenarios reales de seguimiento académico y empresarial.

## **📌 Tecnologías Utilizadas**

## 📖 Índice

1. [Tecnologías Utilizadas](https://www.google.com/search?q=%23tecnologias-utilizadas&authuser=2)
2. [Arquitectura](https://www.google.com/search?q=%23arquitectura&authuser=2)
3. [Funcionalidades Implementadas](https://www.google.com/search?q=%23funcionalidades-implementadas&authuser=2)
4. [Detalle por Sprint](https://www.google.com/search?q=%23detalle-por-sprint&authuser=2)
5. [Instalación y Configuración](https://www.google.com/search?q=%23instalacion-y-configuracion&authuser=2)
6. [Autor](https://www.google.com/search?q=%23autor&authuser=2)

## **📌 Tecnologías Utilizadas**

🔹 **Laravel 11** – Framework PHP robusto y modular para el backend.
🔹 **MySQL** – Sistema de gestión de base de datos relacional.
🔹 **Laravel Sanctum** – Solución ligera para la autenticación de APIs (tokens y SPA).
🔹 **Composer** – Gestor de paquetes de PHP.
🔹 **PHPUnit** – Framework de pruebas para el backend.

## 🚀 Funcionalidades Implementadas

* ✅ **CRUD completo de Institutos y Alumnos.**
* ✅ **Autenticación con Laravel Sanctum.**
* ✅ **Protección de rutas con Middleware.**
* ✅ **Generación de datos de prueba con Seeders y Factories.**
* ✅ **Relaciones entre modelos (Institutos ↔ Alumnos).**
* ✅ **Despliegue y documentación de la API.**

## **🏗️ Arquitectura**

El backend se adhiere a una arquitectura **RESTful API** basada en el patrón **MVC (Modelo-Vista-Controlador)** de Laravel. Se ha puesto énfasis en la **separación de responsabilidades** para asegurar la modularidad y escalabilidad del código. La comunicación con el frontend (desarrollado en Vue.js) se realiza exclusivamente a través de la API REST.

## 🚀 Funcionalidades Implementadas

* ✅ **Gestión Completa de Asignaciones de Prácticas (CRUD).**
* ✅ **Gestión de Empresas (CRUD).**
* ✅ **Gestión de Tutores (CRUD).**
* ✅ **Gestión de Usuarios (CRUD), incluyendo asignación de Roles.**
* ✅ **Autenticación robusta con Laravel Sanctum (SPA y API Tokens).**
* ✅ **Autorización detallada basada en Roles y Permisos mediante Policies y Middlewares.**
* ✅ **Protección de rutas de la API.**
* ✅ **Serialización de datos con Laravel API Resources.**
* ✅ **Optimización de consultas a la base de datos (Eager Loading).**
* ✅ **Generación de datos de prueba con Seeders y Factories.**
* ✅ **Pruebas unitarias y funcionales.**
* ✅ **Documentación de la API.**

## **📈 Detalle por Sprint**

### **Sprint 1: Modelos Base, Relaciones y CRUD Inicial**

Este sprint sentó las bases de la aplicación, definiendo los modelos principales y sus relaciones, y estableciendo las operaciones CRUD básicas para la gestión de entidades clave.

#### **Modelos y Relaciones Centrales:**

* **`User` (Usuario):** Modelo central para estudiantes y administradores. Se introdujo una relación con el modelo `Role`.
* **`Role` (Rol):** Define los distintos tipos de usuarios en el sistema (ej., `admin`, `student`, `tutor`). Relación uno a muchos con `User`.
* **`Company` (Empresa):** Gestión de los datos de las empresas colaboradoras.
* **`Tutor` (Tutor):** Representa a los tutores de empresa.
* **`InternshipAssignment` (Asignación de Prácticas):** Modelo principal que vincula a un `User` (estudiante) con una `Company` y un `Tutor` durante un periodo de tiempo y un estado específico. Define relaciones de "pertenece a" con `User`, `Company` y `Tutor`.

#### **Operaciones CRUD Iniciales:**

* Implementación de las operaciones **Crear, Leer, Actualizar y Eliminar (CRUD)** para los modelos de `Company` y `Tutor`.
* Desarrollo de las operaciones CRUD básicas para `User`, incluyendo la asignación de roles.

#### **Generación de Datos de Prueba:**

* **Migrations:** Se crearon migraciones para definir el esquema de la base de datos para todos los modelos.
* **Seeders:** Configuración de `DatabaseSeeder` y seeders específicos (`RoleSeeder`, `UserSeeder`, `CompanySeeder`, `TutorSeeder`, `InternshipAssignmentSeeder`) para poblar la base de datos con datos iniciales y de prueba.
* **Factories:** Uso extensivo de factories (`UserFactory`, `CompanyFactory`, `TutorFactory`, `InternshipAssignmentFactory`) para generar instancias de modelos con datos ficticios realistas, facilitando el desarrollo y las pruebas.

### **Sprint 2: API REST, Autenticación y Autorización**

Este sprint se centró en exponer las funcionalidades del backend a través de una API RESTful y en asegurar el acceso mediante autenticación y autorización.

#### **API RESTful:**

* **Endpoints:** Se definieron y documentaron los endpoints de la API para todas las operaciones CRUD de los modelos principales (`Users`, `Roles`, `Companies`, `Tutors`, `InternshipAssignments`).
  * `GET /api/{resource}`: Listar todos.
  * `POST /api/{resource}`: Crear nuevo.
  * `GET /api/{resource}/{id}`: Ver detalles.
  * `PUT /api/{resource}/{id}`: Actualizar.
  * `DELETE /api/{resource}/{id}`: Eliminar.
* **API Resources:** Implementación de Laravel API Resources para transformar los modelos Eloquent en respuestas JSON consistentes y optimizadas para el consumo del frontend, controlando la estructura y los datos expuestos.

#### **Autenticación y Middleware:**

* **Laravel Sanctum:** Se adoptó Laravel Sanctum como el sistema de autenticación de la API, ideal para Single Page Applications (SPAs) y APIs basadas en tokens.
  * **Flujo de Autenticación SPA:** Manejo de sesiones y protección CSRF a través de cookies (endpoint `/sanctum/csrf-cookie`).
  * **Flujo de API Token:** Generación y validación de tokens de portador para acceso a la API (utilizado para autenticación de usuarios una vez logueados o para posibles aplicaciones móviles/clientes de terceros).
* **Rutas de Autenticación:**
  * `POST /api/register` → Registro de un nuevo usuario.
  * `POST /api/login` → Inicio de sesión (genera sesión y token si aplica).
  * `POST /api/logout` → Cierre de sesión (invalida la sesión/token).
* **Protección de Rutas:** Uso de **Laravel Middlewares** (`auth:sanctum`) para asegurar que solo los usuarios autenticados puedan acceder a los endpoints protegidos de la API.

#### **Autorización basada en Roles y Permisos:**

* **Roles:** Se definieron roles para los usuarios, como `admin`, `student`, `tutor`.
* **Policies:** Se implementaron **Laravel Policies** para definir reglas de autorización granular a nivel de modelo. Por ejemplo, una política para `InternshipAssignment` puede especificar que solo un administrador puede eliminarla, o que un estudiante solo puede ver sus propias asignaciones.
* **Middleware de Rol/Permiso:** Creación o configuración de middlewares para restringir el acceso a rutas o acciones específicas basándose en el rol del usuario autenticado.

### **Sprint 3: API para Integración Front-end y Optimización**

Este sprint se enfocó en perfeccionar la API para una integración fluida con el frontend de Vue.js y en mejorar el rendimiento del backend.

#### **Comunicación Frontend y Backend:**

* **Optimización de Respuestas:** Refinamiento de los Laravel API Resources para asegurar que las respuestas JSON contengan exactamente los datos necesarios para el frontend, incluyendo la carga eficiente de relaciones (`eager loading`).
* **Manejo de CORS:** Configuración adecuada de las políticas de CORS (Cross-Origin Resource Sharing) en Laravel para permitir la comunicación segura entre el dominio del frontend (Vite dev server) y el backend.

#### **Vínculo con el Frontend:**

* **Repositorio Front-end:** [📁 Enlace al Repositorio Front-end](https://github.com/RSAdrian9/InternLink-Web)
* **Comunicación:** La integración se realiza vía **Axios** en el frontend, enviando los tokens de autenticación de **Laravel Sanctum** en las cabeceras HTTP.

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
git clone https://github.com/RSAdrian9/InternLink-API.git
cd InternLink-API

# Instalar dependencias de PHP
composer install

# Configurar el archivo .env
cp .env.example .env
php artisan key:generate

# Configurar la base de datos en tu archivo .env
# DB_DATABASE=internlink_db
# DB_USERNAME=your_db_user
# DB_PASSWORD=your_db_password

# Ejecutar las migraciones de la base de datos y poblar con datos de prueba
php artisan migrate --seed

# Si este backend tiene activos de frontend que compilar (aunque el frontend es separado)
# npm install
# npm run dev # o npm run build si es para producción

# Iniciar el servidor de desarrollo de Laravel
php artisan serve
```

---

## 👨‍💻 **Autor**

Adrián Ruiz Sánchez

[Correo](mailto:adrian.dev24@gmail.com)

[GitHub](https://github.com/RSAdrian9)

[LinkedIn](http://linkedin.com/in/adri%C3%A1n-ruiz-s%C3%A1nchez)

---
