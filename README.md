# Good practices

## Clases
- Constantes en mayúsculas
- Atributos en PascalCase
- Métodos en PascalCase
- Siempre instanciar al `db` hasta arriba del controlador
- Siempre usar el objeto `db` para hacer consultas a la base de datos
## Archivos
- Nombre de archivos en PascalCase
- Usar sufijos segun el tipo. Por ejemplo un controlador = `ArchivoController.cs`, una vista = `ArchivoView.cshtml`, un modelo = `ArchivoModel.cs`

## Endpoints/rutas
- No dejar el nombre de la ruta por defecto, cambiarlo a plural con `RoutePrefix()` y `Route()` respectivamente
- Rutas siempre en minúsculas
- Rutas en plural

## GIT
- Titulos de commits inician minuscula
- Titulos cortos y directos. Para mayor detalle usar el cuerpo del commit
- Usar [conventional commits](https://www.conventionalcommits.org/en/v1.0.0/) 

## Otros
- Siempre eliminar codigo no usado
- Los comentarios deben de explicar el por qué y no el qué de un bloque de codigo
- Variables en camelCase

---
:bamboo: