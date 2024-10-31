# API Lumen

Esta es una API construida con Lumen que se comunica con un servicio SOAP para realizar varias operaciones relacionadas con la gestión de clientes y pagos.

## Requisitos

- PHP 7.4 o superior
- Composer
- Un servidor web (como Apache o Nginx)

## Instalación

1. **Clona el repositorio:**

   ```bash
   git clone git@github.com:rodriguezrod1/rest-service.git
   cd rest-service
   ```

2. **Instala las dependencias:**

   Asegúrate de tener Composer instalado en tu máquina, luego ejecuta:

   ```bash
   composer install
   ```

3. **Configura el archivo `.env`:**

   Copia el archivo de entorno de ejemplo y renómbralo:

   ```bash
   cp .env.example .env
   ```

   Luego, edita el archivo `.env` para configurar la conexión a la base de datos y otros parámetros.

4. **Genera la clave de la aplicación:**

   ```bash
   php artisan key:generate
   ```

5. **Inicia el servidor:**

   Puedes utilizar el servidor embebido de PHP para propósitos de desarrollo:

   ```bash
   php -S localhost:8000 -t public
   ```

   Tu API estará disponible en `http://localhost:8000`.

## Endpoints

A continuación se describen los principales endpoints de la API.

### 1. Registrar Cliente

- **URL:** `/api/register-client`
- **Método:** `POST`
- **Headers:**
  - `Content-Type: application/json`
- **Cuerpo de la Solicitud:**
  ```json
  {
      "document": "123456789",
      "names": "Juan Pérez",
      "email": "juan@example.com",
      "phone": "1234567890"
  }
  ```
- **Respuesta Exitosa:**
  ```json
  {
      "status": "success",
      "data": {
          // Datos devueltos por el servicio SOAP
      }
  }
  ```

### 2. Cargar Monedero

- **URL:** `/api/load-wallet`
- **Método:** `POST`
- **Headers:**
  - `Content-Type: application/json`
- **Cuerpo de la Solicitud:**
  ```json
  {
      "document": "123456789",
      "phone": "1234567890",
      "value": "100.00"
  }
  ```
- **Respuesta Exitosa:**
  ```json
  {
      "status": "success",
      "data": {
          // Datos devueltos por el servicio SOAP
      }
  }
  ```

### 3. Realizar Pago

- **URL:** `/api/pay`
- **Método:** `POST`
- **Headers:**
  - `Content-Type: application/json`
- **Cuerpo de la Solicitud:**
  ```json
  {
      "sessionId": "session-id-123",
      "amount": "50.00"
  }
  ```
- **Respuesta Exitosa:**
  ```json
  {
      "status": "success",
      "data": {
          // Datos devueltos por el servicio SOAP
      }
  }
  ```

### 4. Confirmar Pago

- **URL:** `/api/confirm-payment`
- **Método:** `POST`
- **Headers:**
  - `Content-Type: application/json`
- **Cuerpo de la Solicitud:**
  ```json
  {
      "sessionId": "session-id-123",
      "token": "payment-token"
  }
  ```
- **Respuesta Exitosa:**
  ```json
  {
      "status": "success",
      "data": {
          // Datos devueltos por el servicio SOAP
      }
  }
  ```

### 5. Consultar Saldo

- **URL:** `/api/check-balance`
- **Método:** `POST`
- **Headers:**
  - `Content-Type: application/json`
- **Cuerpo de la Solicitud:**
  ```json
  {
      "document": "123456789",
      "phone": "1234567890"
  }
  ```
- **Respuesta Exitosa:**
  ```json
  {
      "status": "success",
      "data": {
          // Datos devueltos por el servicio SOAP
      }
  }
  ```

## Manejo de Errores

Si ocurre un error durante la invocación del servicio SOAP, la respuesta incluirá un mensaje de error:

```json
{
    "error": "Descripción del error"
}
```

## Notas

- El servicio SOAP se invoca mediante el protocolo HTTP.
