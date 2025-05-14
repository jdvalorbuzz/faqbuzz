# Custom FAQ Plugin

> **Desarrollado por [Buzz Costarica](https://buzz.cr) — Plugin profesional para gestión avanzada de preguntas frecuentes en WordPress.**

---

## Tabla de Contenidos

- [Descripción General](#descripción-general)
- [Características Principales](#características-principales)
- [Instalación y Activación](#instalación-y-activación)
- [Uso del Shortcode](#uso-del-shortcode)
- [Estructura del Plugin](#estructura-del-plugin)
- [Flujo y Detalles Técnicos](#flujo-y-detalles-técnicos)
- [Opciones de Personalización](#opciones-de-personalización)
- [Internacionalización y Accesibilidad](#internacionalización-y-accesibilidad)
- [Extensibilidad y Buenas Prácticas](#extensibilidad-y-buenas-prácticas)
- [Soporte y Créditos](#soporte-y-créditos)

---

## Descripción General

**Custom FAQ Plugin** es una solución robusta y moderna para la gestión de preguntas frecuentes (FAQs) en WordPress. Permite crear, categorizar, buscar y mostrar FAQs con un diseño responsivo, personalizable y amigable para usuarios y desarrolladores.

---

## Características Principales

- **Custom Post Type** para FAQs (`custom_faq`)
- **Taxonomía personalizada** para categorías de FAQ (`faq_category`)
- **Shortcode flexible** para insertar el bloque de FAQs en cualquier página
- **Buscador instantáneo** por palabra clave (JS, sin recarga)
- **Filtrado dinámico** por categoría (dropdown responsivo)
- **Acordeón animado** para mostrar/ocultar respuestas
- **Panel de configuración** en el admin para personalizar colores, fuentes, bordes, animaciones, título y descripción
- **Vista previa en tiempo real** en el admin
- **Internacionalización** lista para traducción (`Text Domain: custom-faq-plugin`)
- **Código seguro, limpio y extensible**

---

## Instalación y Activación

1. **Clona o descarga el repositorio:**
   ```bash
   git clone https://github.com/jdvalorbuzz/faqbuzz.git
   ```
2. **Copia la carpeta del plugin** (`Faq Plugin` o `custom-faq-plugin`) en `wp-content/plugins/` de tu WordPress.
3. **Activa el plugin** desde el panel de administración.
4. **(Opcional) Configura la apariencia** en el menú “Preguntas Frecuentes > Configuración”.

---

## Uso del Shortcode

Agrega el siguiente shortcode en cualquier página o entrada para mostrar el bloque completo de FAQs:

```plaintext
[custom_faq]
```

**Parámetros opcionales:**
- `category`: slug de la categoría a mostrar por defecto (ej: `category="general"`)
- `limit`: número máximo de preguntas a mostrar (ej: `limit="5"`)
- `orderby`: campo para ordenar (`date`, `title`, etc.)
- `order`: `ASC` o `DESC`

**Ejemplo avanzado:**
```plaintext
[custom_faq category="general" limit="5" orderby="title" order="ASC"]
```

---

## Estructura del Plugin

```
custom-faq-plugin/
├── custom-faq-plugin.php           # Archivo principal, hooks y lógica central
├── admin/
│   └── settings-page.php           # Página de configuración y documentación en admin
├── assets/
│   ├── css/
│   │   ├── admin.css               # Estilos para el panel de administración
│   │   └── front.css               # Estilos frontend, responsivo y personalizable
│   └── js/
│       ├── admin.js                # Lógica JS para vista previa y color pickers en admin
│       └── front.js                # Lógica JS para buscador, acordeón y filtrado en frontend
├── includes/
│   └── class-custom-faq-settings.php # Registro de opciones, sanitización y callbacks de campos
├── templates/
│   └── shortcode-faq.php           # Plantilla HTML/PHP del bloque de FAQs
```

---

## Flujo y Detalles Técnicos

### 1. **Registro de Custom Post Type y Taxonomía**
- Se crea el tipo de post `custom_faq` y la taxonomía `faq_category` en `custom-faq-plugin.php`.
- Permite gestionar preguntas y categorías desde el admin de WordPress.

### 2. **Shortcode y Renderizado**
- El shortcode `[custom_faq]` carga la plantilla `templates/shortcode-faq.php`.
- Se obtienen todas las preguntas y categorías, y se renderiza el buscador, el filtro y el acordeón de preguntas.

### 3. **Buscador Instantáneo**
- Implementado en `assets/js/front.js`.
- Filtra en tiempo real por palabra clave (título y contenido), ignorando tildes y mayúsculas.
- Resalta la palabra buscada en los resultados.

### 4. **Filtrado por Categoría**
- Dropdown responsivo a la izquierda (desktop) o arriba (mobile).
- Al seleccionar una categoría, solo se muestran las preguntas asociadas.

### 5. **Acordeón Animado**
- Cada pregunta se puede expandir/cerrar con animación suave.
- Accesible vía teclado (Enter/Espacio).

### 6. **Panel de Configuración**
- En `admin/settings-page.php` y `includes/class-custom-faq-settings.php`.
- Permite personalizar:
  - Colores (fondo, título, texto, acento, borde)
  - Tamaños de fuente
  - Radio de borde
  - Velocidad de animación
  - Título y descripción de la sección FAQ
- Vista previa en tiempo real.

### 7. **Seguridad y Buenas Prácticas**
- Sanitización y escape de todos los campos y opciones.
- Uso de `wp_enqueue_script` y `wp_enqueue_style` para cargar assets solo donde se necesitan.
- AJAX seguro para futuras extensiones.

---

## Opciones de Personalización

Puedes personalizar la apariencia desde el admin o sobrescribir las variables CSS:

```css
.custom-faq-container {
  --custom-faq-bg-color: #ffffff;
  --custom-faq-title-color: #682766;
  --custom-faq-text-color: #666666;
  --custom-faq-accent-color: #682766;
  --custom-faq-border-color: #e0e0e0;
  --custom-faq-title-font-size: 18px;
  --custom-faq-text-font-size: 16px;
  --custom-faq-border-radius: 15px;
}
```

---

## Internacionalización y Accesibilidad

- **Text Domain:** `custom-faq-plugin` (listo para traducción).
- **Accesibilidad:** Navegación por teclado, roles y labels en acordeón y buscador.
- **Mensajes y textos** personalizables desde el admin.

---

## Extensibilidad y Buenas Prácticas

- **Hooks y filtros** listos para ampliar funcionalidad (puedes añadir más hooks según tus necesidades).
- **Código modular**: separación clara entre lógica, presentación y configuración.
- **Preparado para integración** en proyectos empresariales y equipos SR.

---

## Soporte y Créditos

Desarrollado por [Buzz Costarica](https://buzz.cr).

¿Dudas, sugerencias o mejoras?  
Contáctanos en [https://buzz.cr](https://buzz.cr) o abre un issue en este repositorio.

---

> **Hecho con ❤️ por el equipo de Buzz Costarica**
