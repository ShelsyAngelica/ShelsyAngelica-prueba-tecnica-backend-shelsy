# Sistema de Gestión de Citas - Barbería

Sistema de gestión de citas para barbería desarrollado como prueba técnica Full Stack. Backend API RESTful construido con Laravel 12 y Vue.js en el frontend.

## Descripción

Este sistema permite gestionar  las citas de una barbería, incluyendo la administración de servicios, empleados, posiciones y clientes. Cuenta con autenticación segura mediante Laravel Sanctum.

## Características Principales

-**Autenticación y Autorización** con Laravel Sanctum
-**Catálogo de Servicios** (cortes, afeitados, etc.)
-**Sistema de Citas** con asignación de servicios múltiples
-**Rutas protegidas** con middleware de autenticación
-**API RESTful** completa y documentada

## Tecnologías Utilizadas

### Backend
- **PHP** 8.2+
- **Laravel** 12.x
- **Laravel Sanctum** 4.0 - Autenticación API
- **Postgres** - Base de datos
- **Composer** 2.8.12+

### Herramientas de Desarrollo
- **Faker** - Generación de datos de prueba

## Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- PHP >= 8.2
- Composer >= 2.8
- Git

## Instalación

### 1. Clonar el Repositorio

```bash
git clone https://github.com/ShelsyAngelica/prueba-tecnica-backend-shelsy.git
cd prueba-tecnica-backend-shelsy
```

### 2. Instalar Dependencias

```bash
composer install
```

### 3. Configurar Variables de Entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar Base de Datos

El proyecto utiliza Postgres.


### 5. Ejecutar Migraciones

```bash
php artisan migrate
```

### 6. Poblar la Base de Datos (Seeders)

```bash
php artisan db:seed --class=DatabaseSeeder
```

Este comando ejecutará los siguientes seeders:
- PositionSeeder - Crea posiciones laborales
- PeopleSeeder - Genera empleados de ejemplo
- UserSeeder - Crea usuarios del sistema
- ServiceSeeder - Pobla el catálogo de servicios

### 7. Iniciar el Servidor de Desarrollo

```bash
php artisan serve
```

La API estará disponible en: `http://localhost:8000`

## Credenciales de Prueba

Después de ejecutar los seeders, puedes iniciar sesión con:

**Email:** `admin@local.test`  
**Contraseña:** `secret123`

## API Endpoints

### Autenticación

| Método | Endpoint | Descripción | Autenticación |
|--------|----------|-------------|---------------|
| POST | `/api/login` | Iniciar sesión | No |
| POST | `/api/logout` | Cerrar sesión | Sí |

### Servicios

| Método | Endpoint | Descripción | Autenticación |
|--------|----------|-------------|---------------|
| GET | `/api/service` | Listar todos los servicios | Sí |
| POST | `/api/service` | Crear nuevo servicio | Sí |
| GET | `/api/service/{id}` | Obtener servicio específico | Sí |
| PUT/PATCH | `/api/service/{id}` | Actualizar servicio | Sí |
| DELETE | `/api/service/{id}` | Eliminar servicio | Sí |

### Citas

| Método | Endpoint | Descripción | Autenticación |
|--------|----------|-------------|---------------|
| GET | `/api/appointment` | Listar todas las citas | Sí |
| POST | `/api/appointment` | Crear nueva cita | Sí |
| GET | `/api/appointment/{id}` | Obtener cita específica | Sí |
| PUT/PATCH | `/api/appointment/{id}` | Actualizar cita | Sí |
| DELETE | `/api/appointment/{id}` | Eliminar cita | Sí |

### Personal (Protegido)

| Método | Endpoint | Descripción | Autenticación |
|--------|----------|-------------|---------------|
| GET | `/api/people` | Listar personal | Sí |
| POST | `/api/people` | Crear empleado | Sí |
| GET | `/api/people/{id}` | Obtener empleado | Sí |
| PUT/PATCH | `/api/people/{id}` | Actualizar empleado | Sí |
| DELETE | `/api/people/{id}` | Eliminar empleado | Sí |

### Posiciones

| Método | Endpoint | Descripción | Autenticación |
|--------|----------|-------------|---------------|
| GET | `/api/positions` | Listar posiciones | Sí |

## Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/       # Controladores de API
│   │   ├── AppointmentApiController.php
│   │   ├── AuthApiController.php
│   │   ├── PeopleApiController.php
│   │   ├── PositionApiController.php
│   │   └── ServiceApiController.php
│   ├── Requests/          # Form Request Validation
│   └── Middleware/        # Middlewares personalizados
├── Models/                # Modelos Eloquent
│   ├── Appointment.php
│   ├── People.php
│   ├── Position.php
│   ├── Service.php
│   └── User.php
├── Repositories/          # Capa de repositorios
│   ├── AppointmentRepository.php
│   ├── AuthRepository.php
│   ├── PeopleRepository.php
│   ├── PositionRepository.php
│   └── ServiceRepository.php
└── Services/              # Lógica de negocio
    ├── AppointmentService.php
    ├── AuthService.php
    ├── PeopleService.php
    ├── PositionService.php
    └── ServiceService.php

database/
├── migrations/            # Migraciones de base de datos
├── seeders/              # Seeders para datos de prueba
└── factories/            # Factories para testing
```


## Patrones de Diseño

El proyecto implementa los siguientes patrones:

- **Repository Pattern**: Abstracción de la capa de datos
- **Service Layer**: Lógica de negocio separada de controladores
- **Resource Controllers**: Controllers RESTful estándar de Laravel
- **Form Request Validation**: Validación centralizada

## Contribuciones

Este es un proyecto de prueba técnica. Si deseas contribuir o reportar problemas:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## Autor

**Shelsy Angelica Garcia**

- GitHub: [@ShelsyAngelica](https://github.com/ShelsyAngelica)
- Repositorio: [prueba-tecnica-backend-shelsy](https://github.com/ShelsyAngelica/prueba-tecnica-backend-shelsy)

## Licencia

Este proyecto está bajo la Licencia MIT.
