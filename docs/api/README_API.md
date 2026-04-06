# Documentación de Servicios Web (API) – Panadería Jiguales

**Proyecto:** Sistema de Control de Inventario – Panadería Jiguales (Laravel)  
**Autenticación:** Bearer Token (Laravel Sanctum)  
**Base URL (local):** http://127.0.0.1:8000  

---

 ## 1) Login (obtener token)
**POST** `/api/login`  
**Descripción:** genera un token para consumir servicios protegidos.

**Body (JSON):**
```json
{ "email": "admin@jiguales.com", "password": "Admin12345*" }

Respuesta 200 (ejemplo):

{
  "token": "1|...",
  "user": { "id": 1, "name": "Administrador", "email": "admin@jiguales.com", "role": "ADMIN" }
}

## 2) Logout (invalidar token)

POST /api/logout
Headers:

Authorization: Bearer <token>

Respuesta 200:

{ "message": "Sesión cerrada." }

## 3) Listar productos

GET /api/products
Headers: Authorization: Bearer <token>
Salida esperada: lista de productos en JSON.

## 4) Detalle de producto

GET /api/products/{id}
Headers: Authorization: Bearer <token>
Salida esperada: un producto en JSON.

## 5) Crear producto

POST /api/products
Headers: Authorization: Bearer <token>

Body (JSON):

{
  "name": "Producto API",
  "unit": "UND",
  "price": 1000,
  "stock": 2,
  "stock_min": 5,
  "active": true
}

Respuesta 201: producto creado (JSON con id).

## 6) Actualizar producto

PUT /api/products/{id}
Headers: Authorization: Bearer <token>

Body (JSON) ejemplo:

{ "price": 1500, "stock_min": 6 }

Salida esperada: producto actualizado.

## 7) Desactivar producto

PATCH /api/products/{id}/deactivate
Headers: Authorization: Bearer <token>
Salida esperada: mensaje y producto con active=false.

## 8) Bajo stock

GET /api/products/low-stock
Headers: Authorization: Bearer <token>
Descripción: lista productos con stock <= stock_min.

## 9) Registrar movimiento de inventario (ENTRADA / SALIDA)

POST /api/inventory/movements
Headers: Authorization: Bearer <token>

Body (JSON):

{ "product_id": 3, "type": "ENTRADA", "qty": 5 }

Respuesta 201 (ejemplo):

{ "message": "Movimiento registrado.", "product": { "id": 3, "name": "Leche", "stock": 10 } }

Validación stock insuficiente (SALIDA):
Si qty supera el stock, responde:

Respuesta 422:

{ "message": "Stock insuficiente.", "current_stock": 2 }