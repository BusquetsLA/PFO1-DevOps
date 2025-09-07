# Práctica Formativa 1 - Seminario de actualización DevOps

Integrantes:
- Agustina Bartolomé
- Abril Bartolomé
- Lautaro Agustín Busquets
- Macarena Desireé García Quintans
- Rosina Reñores

Vamos a usar este repo para practicar:
- Creación y cambio de ramas (branching/switch)
- Desarrollo en paralelo entre ramas
- Identificación y resolución de conflictos de merge
- Importancia de mensajes de commit claros
- Flujo de trabajo con Issues y Pull Requests

## Ramas principales de la práctica:
- `feature/perfil-nuevo-ui`: Desarrollo de formulario y llamada al backend desde el front.
- `feature/perfil-nuevo-backend`: Desarrollo de endpoint para recibir y validar datos.
- `feature/estilos`: Desarrollo de estilos.

## Cómo ejecutar localmente:
Solo se requiere un navegador para abrir `index.html`.

## Notas:
Los conflictos intencionales en `index.html` se generarán en ambas ramas para practicar su resolución.

## Frontend: Llamada AJAX:
La pantalla `index.html` envía los datos del formulario (usuario y contraseña) al backend mediante `fetch`.

- Endpoint: `/api/registrar.php`
- Método: `POST`
- Headers: `Content-Type: application/json`
- Body (JSON):
  - `username` (string)
  - `password` (string)

Ejemplo (desde el navegador):

```js
fetch('/api/registrar.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ username: 'dev-oops', password: '1234' })
}).then(r => r.json()).then(console.log)
```

Ejemplo (CURL):
```bash
curl -X POST \
  -H "Content-Type: application/json" \
  -d '{"username":"dev-oops","password":"1234"}' \
  http://localhost:8000/api/registrar.php
```

Respuesta esperada:
```json
{ "status": "ok" }
```

o en caso de error:
```json
{ "status": "error", "message": "Detalle del error" }
```