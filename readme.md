# CIDEM UNTREF - Buscador de servicios

[https://projects.nayra.coop/browse/CIDEM]

## Descripción de tecnologías

* REST API
* Laravel 5.6
* MySql (MariaDB)
* Passport (API Authentication)
* VUEjs (Frontend)
* bootstrap 4

## Estandares

Estandar de repuesta API json 1.0 http://jsonapi.org/format/
El mismo está implementado en laravel https://laravel.com/docs/5.6/eloquent-resources

---
*En redacción - a partir de aquí nada es definido*


## Requerimientos

 **Tipo de Servicio**: Análisis, Asistencia técnica, Calibración, Calificación, Certificación/Homologación/Regímenes Especiales, Control ambiental/Medio ambiental, Control de calidad, Desarrollo de procesos, Desarrollo de productos, Diseño de producto, Ensayo, Formación de RRHH, Peritaje, Programación y desarrollo software, Tecnología de Gestión, Otros.

 **Sector al que está destinado el servicio**: Alimentos y bebidas, Química y petroquímica, Metalmecánica, Automotriz, Minería, Agricultura, Ganadería, Construcción (incl. materiales), Salud humana y animal, Cuero, Papel, Madera, Textil, Biotecnología, Nanotecnología, Tics, Diseño, Energía, Sistema científico tecnológico, Electrónica, Industria cultural, Transporte, Educación, Sociedad civil/Economía social/Asociativismo/cooperativas, Comunidad, Organismos públicos, Sector privado en general, Organismos No Gubernamentales, Otros

## Modelos


### Service
|Atributo|Descripción | Tipo|
|--------|------------|-----|
|id      |            |unsigned integer|
slug     |            | string
name     | Nombre del servicio| string
description | descripción de servicio | text
 website | | string
 icon | imagen png | string   

### Filter

para crear categorias entre elementos. Para ser aplicados como filtros

|Atributo|Descripción | Tipo|
|--------|------------|-----|
|id      |            |unsigned integer|
|type_id | id asociado al tipo de filtro | foreign key |
|slug     | nombre de uso interno| string (sin espacios)|   
|name    | nombre público |string |
| description| |text |
|icon | ruta a imagen png |string|
|parent | filtro padre (ej: unidad es padre subunidad)|unsigned integer - foreign key |

### FilteType

|Atributo|Descripción | Tipo|
|--------|------------|-----|
|id      |            |unsigned integer|
|type     | nombre de uso interno| string (sin espacios)|   
|name    | nombre público |string |
| description| |text |
|icon | ruta a imagen png |string|
|parent | filtro padre (ej: unidad es padre subunidad)|unsigned integer - foreign key |

### Provider

|Atributo|Descripción | Tipo|
|--------|------------|-----|
|id      |            |unsigned integer|
|slug    |            |string  
|name    |nombre del proveedor| string|
|first_name| nombre responsable | string|
|last_name | apellido responsable | string |
| email | email proveedor | string |
| phone1 | telefono proveedor | string |
| phone2 | telefono proveedor |string |
| address1 | dirección proveedor |string |
| address2 | dirección proveedor |string |
| website  | sitio web proveedor |string|

### Message (formulario contacto)
|Atributo|Descripción | Tipo|
|--------|------------|-----|
|id      |            |unsigned integer|
|subject| asunto contacto |string|
|email| email del solicitante| string|
|message| mensaje |text|

---

# API REST

```
Los endpoints DELETE implementarán siempre un *soft delete*.
En principio no implementamnos verbo **PATCH**.
Se listan los endpoints para interactuar con la API con ejemplos.
```
## Endpoints

### Services
```

```
* GET api/services
* POST api/services
* GET api/services/{id}
* UPDATE api/services/{id}
* DELETE api/services/{id}

* POST api/services/import

* GET api/services/{id}/filters
* UPDATE api/services/{id}/filters/{id}
```
POST y DELETE no los implementaríamos porque son "fijos"
```
### Filters Types

API para tipos de filtro (FilterType).
El usuario ADMIN puede definir que entidadespodrán ser utilizadas como filtro.
Habrá configurados por defecto 4 tipos:
Unidad, Subunidad, Tipo de servicio, Sector del Servicio


* GET api/filters
* POST api/filters
* GET api/filters/{id}
* UPDATE api/filters/{id}
* DELETE api/filters/{id}  

### Filter
*ver Services*

### Provider

* GET api/providers
* POST api/providers
* GET api/providers/{id}
* UPDATE api/providers/{id}
* DELETE api/providers/{id}

### Messages

* GET api/messages
* GET api/message/{id}
* DELETE api/message/{id}
---
## Descripción de los endpoints

### GET api/services

```javascript
HTTP/1.1 200
Content-Type: application/json
{
    "data": [
        {
            "id": 1,
            "slug": "aliquam-repellendus-et-dolore-ad-inventore-et",
            "name": "Dolore delectus omnis sapiente iste eligendi aliquam.",
            "summary": "Fully-configurable high-level pricingstructure",
            "description": "Explicabo distinctio dolore odio sed. Quidem expedita commodi modi sed repellendus. Accusantium placeat quis deserunt quis.",
            "website": "cruz.org",
            "icon": "https://lorempixel.com/200/200/food/?34483",
            "created_at": "2018-08-08 15:24:09",
            "updated_at": "2018-08-08 15:24:09"
        },
        .
        .
        .
    ],
    "links": {
        "first": "http://resource-api.nayra/api/services?page=1",
        "last": "http://resource-api.nayra/api/services?page=10",
        "prev": null,
        "next": "http://resource-api.nayra/api/services?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 10,
        "path": "http://resource-api.nayra/api/services",
        "per_page": 3,
        "to": 3,
        "total": 30
    }
}
```
### POST api/services



### GET api/services/{id}
```javascript
HTTP/1.1 200
Content-Type: application/json

  {
    "id":12,
    "title": "Cómputo de estadísticas",
    "description" : "El servicio ofrece....",
    "website": "https://eyetracker.ito",
    "filters": [
                {
                  "id":"1",
                  "key":"type",
                  "name":"Consultoría tecnológica",
                  "description":"Se desarrollan aplicaciones ...."
                },
                {...}
              ],
    "tags":{"estadística", "Big Data"},    
    "contact":{
                "id":"2",
                "first_name":"",
                "last_name" :"",
                "provider_name" : "",
                "phones": [{...}],

              }

  }
```
### UPDATE api/services/{id}

### PATCH api/services/{id}

### DELETE api/services/{id}
---
## Perfiles de Usuario


### Usuario Anónimo - Invitado

Se comunica con la API a traves de un access token provisto por passport



### Usuario Administrador

Se comunica con la API a traves de un access token provisto por passport (password grant token)
