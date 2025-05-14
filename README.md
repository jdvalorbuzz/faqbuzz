# <div align="center">📋 BUZZ FAQ ENGINE 📋</div>

<div align="center">
  <img src="https://buzz.cr/wp-content/uploads/2024/07/logo.png" alt="Buzz Costa Rica" width="280" style="margin: 20px auto" />
  
  <h3>Sistema Avanzado de Preguntas Frecuentes para WordPress</h3>

  [![WordPress](https://img.shields.io/badge/WordPress-5.6%2B-00749C?style=flat-square&logo=wordpress)](https://wordpress.org)
  [![PHP](https://img.shields.io/badge/PHP-7.2%2B-777BB4?style=flat-square&logo=php)](https://php.net)
  [![jQuery](https://img.shields.io/badge/jQuery-3.5%2B-0769AD?style=flat-square&logo=jquery)](https://jquery.com)
  [![Licencia](https://img.shields.io/badge/Licencia-GPL%20v2-EF9421?style=flat-square)](https://www.gnu.org/licenses/gpl-2.0.html)
</div>

<p align="center">
  <img src="https://github.com/jdvalorbuzz/faqbuzz/raw/main/assets/screenshots/faq-preview.png" alt="Vista previa del FAQ" width="85%" />
</p>

<div align="center">

```
🔍 BÚSQUEDA INSTANTÁNEA | 🧩 FILTRADO POR CATEGORÍAS | 📱 100% RESPONSIVO | 🎨 PERSONALIZABLE
```

</div>

---

## 📖 Índice de Contenidos

- [📋 Descripción General](#-descripción-general)
- [✨ Características Principales](#-características-principales)
- [💼 Casos de Uso](#-casos-de-uso)
- [🚀 Instalación y Activación](#-instalación-y-activación)
- [🔧 Configuración y Personalización](#-configuración-y-personalización)
- [🧩 Uso del Shortcode](#-uso-del-shortcode)
- [📂 Estructura de Archivos](#-estructura-de-archivos)
- [🧠 Arquitectura y Flujo de Datos](#-arquitectura-y-flujo-de-datos)
- [🎮 API y Hooks Para Desarrolladores](#-api-y-hooks-para-desarrolladores)
- [🌐 Internacionalización](#-internacionalización)
- [⚡ Optimización y Rendimiento](#-optimización-y-rendimiento)
- [🤝 Contribución y Soporte](#-contribución-y-soporte)
- [📜 Licencia y Créditos](#-licencia-y-créditos)

---

## 📋 Descripción General

**Buzz FAQ Engine** es un plugin WordPress premium desarrollado por [Buzz Costa Rica](https://buzz.cr) para la implementación profesional de secciones de preguntas frecuentes (FAQs) interactivas, responsivas y totalmente personalizables. Diseñado con una arquitectura moderna y enfocado en el usuario final, este plugin combina una interfaz visual elegante con potentes características técnicas.

<div align="center">
  <p><strong>"La manera más inteligente de responder las dudas de tus clientes"</strong></p>
</div>

El plugin ha sido construido siguiendo estrictos estándares de codificación WordPress, con un enfoque en rendimiento, accesibilidad y una experiencia de usuario excepcional. Ideal para cualquier sitio que necesite organizar y presentar información de manera estructurada y navegable.

---

## ✨ Características Principales

### 🎯 Funcionalidades Core

- **Custom Post Type para FAQs**: Sistema de gestión dedicado con taxonomía propia
- **Buscador Inteligente**: Filtrado en tiempo real sin recarga de página, con resaltado de términos
- **Sistema de Categorías**: Dropdown personalizado para filtrado rápido por taxonomía
- **Acordeón Optimizado**: Transiciones suaves con control total de la animación
- **Shortcode Flexible**: Versatilidad para integrarse en cualquier punto del sitio
- **Área Administrativa**: Interfaz intuitiva para gestionar todo el contenido
- **Personalización Visual**: Control total sobre colores, tipografías, espaciados y más
- **Integración SEO**: Estructura de datos Schema.org para mejorar rankings en buscadores

### 🌟 Diferenciadores

- **Vista Previa en Tiempo Real**: Visualización inmediata de cambios en el panel de administración
- **Interfaz Responsive Avanzada**: Adaptación perfecta a todos los dispositivos sin comprometer usabilidad
- **Compatibilidad Multi-Idioma**: Preparado para traducciones con soporte RTL incluido
- **Accesibilidad WCAG 2.1**: Navegación total por teclado y soporte para lectores de pantalla
- **Modo Oscuro Automático**: Detección y adaptación al modo preferido del usuario
- **Rendimiento Optimizado**: Carga diferida (lazy loading) y mínimo impacto en tiempos de carga
- **Extensibilidad para Desarrolladores**: Sistema de hooks y filtros documentado

---

## 💼 Casos de Uso

El Buzz FAQ Engine es la solución ideal para:

- **Sitios Corporativos**: Centraliza información relevante sobre productos y servicios
- **E-commerce**: Resuelve dudas frecuentes sobre envíos, devoluciones y productos
- **Proyectos SaaS**: Documenta de forma accesible preguntas técnicas y de soporte
- **Sitios Educativos**: Organiza información por temáticas para estudiantes y padres
- **Landing Pages**: Convierte mejor al resolver objeciones comunes del usuario
- **Sitios de Eventos**: Concentra información logística, inscripciones y programación

---

## 🚀 Instalación y Activación

### Requisitos Previos

- WordPress 5.6 o superior
- PHP 7.2 o superior
- Permisos para instalar plugins

### Métodos de Instalación

#### 1️⃣ Instalación Directa (Recomendado)
1. Descarga el archivo ZIP desde el repositorio oficial
2. Ve a tu WordPress > Plugins > Añadir Nuevo > Subir Plugin
3. Selecciona el archivo ZIP descargado y haz clic en "Instalar ahora"
4. Una vez instalado, haz clic en "Activar plugin"

#### 2️⃣ Instalación Manual
1. Descarga y descomprime el archivo del plugin
2. Sube la carpeta `custom-faq-plugin` al directorio `/wp-content/plugins/`
3. Activa el plugin desde el menú 'Plugins' en WordPress

#### 3️⃣ Instalación vía Composer
```bash
composer require buzzcr/faq-plugin
```

#### 4️⃣ Instalación vía WP-CLI
```bash
wp plugin install https://github.com/jdvalorbuzz/faqbuzz/archive/refs/heads/main.zip --activate
```

---

## 🔧 Configuración y Personalización

### Panel de Control

Después de activar el plugin, encontrarás un nuevo menú "Preguntas Frecuentes" en tu panel de administración de WordPress:

1. **Preguntas Frecuentes**: Gestiona todas tus FAQs
2. **Añadir Nueva**: Crea una nueva pregunta y respuesta
3. **Categorías**: Administra las categorías para organizar tus FAQs
4. **Configuración**: Personaliza la apariencia y comportamiento

### Creación de FAQs

1. Ve a **Preguntas Frecuentes > Añadir Nueva**
2. Añade un título (la pregunta)
3. Escribe el contenido (la respuesta) usando el editor de WordPress
4. Asigna categorías desde el panel lateral
5. Publica la pregunta

### Personalización Visual

Desde **Preguntas Frecuentes > Configuración** puedes personalizar:

- **Título y Descripción**: Texto introductorio para la sección
- **Paleta de Colores**: Personalización completa de colores
  - Fondo principal
  - Color de títulos
  - Color de texto
  - Color de acento
  - Color de bordes
- **Tipografía**: Tamaños para títulos y texto
- **Bordes y Espaciado**: Radio de bordes y márgenes
- **Animaciones**: Velocidad y tipo de transiciones

Todos los cambios se reflejan inmediatamente en la **Vista Previa en Tiempo Real**.

---

## 🧩 Uso del Shortcode

### Shortcode Básico
```
[custom_faq]
```

### Parámetros Disponibles

| Parámetro | Tipo | Descripción | Ejemplo |
|-----------|------|-------------|---------|
| `category` | string | Slug de categoría específica | `[custom_faq category="general"]` |
| `limit` | number | Número máximo de preguntas | `[custom_faq limit="5"]` |
| `orderby` | string | Campo para ordenar (date, title, menu_order) | `[custom_faq orderby="title"]` |
| `order` | string | Orden ASC o DESC | `[custom_faq order="ASC"]` |

### Ejemplos Avanzados

```
// Mostrar 5 preguntas de la categoría 'soporte' ordenadas por título
[custom_faq category="soporte" limit="5" orderby="title" order="ASC"]

// Mostrar todas las preguntas de la categoría 'envios'
[custom_faq category="envios"]

// Mostrar las 10 preguntas más recientes de cualquier categoría
[custom_faq limit="10" orderby="date" order="DESC"]
```

### Uso en Templates PHP

```php
<?php echo do_shortcode('[custom_faq category="general" limit="5"]'); ?>
```

### Uso con Gutenberg

El plugin es compatible con el editor de bloques. Puedes insertar el shortcode en un bloque de Shortcode o utilizar nuestro bloque personalizado "Buzz FAQ" que ofrece opciones visuales para configurar los parámetros.

---

## 📂 Estructura de Archivos

```
custom-faq-plugin/
├── custom-faq-plugin.php           # Archivo principal del plugin
├── admin/
│   └── settings-page.php           # Interfaz de configuración
├── assets/
│   ├── css/
│   │   ├── admin.css               # Estilos del panel admin
│   │   └── front.css               # Estilos del frontend
│   ├── js/
│   │   ├── admin.js                # JavaScript del admin
│   │   └── front.js                # JavaScript del frontend
│   └── img/                        # Imágenes e iconos
├── includes/
│   └── class-custom-faq-settings.php  # Clase para gestión de opciones
├── languages/                      # Archivos de traducción
│   └── custom-faq-plugin.pot       # Archivo base para traducciones
├── templates/
│   └── shortcode-faq.php           # Plantilla del shortcode
└── readme.txt                      # Documentación del plugin
```

### Descripción de Componentes

- **Clase Principal**: Inicializa el plugin, registra hooks y define funcionalidades core
- **Custom Post Type**: Implementa el tipo personalizado `custom_faq` con su taxonomía `faq_category`
- **Sistema de Configuración**: Gestiona las opciones usando la API Settings de WordPress
- **Shortcode**: Procesa parámetros y renderiza la salida HTML
- **Frontend**: JS para buscador, filtrado y acordeón + CSS para estilos responsivos
- **Admin**: Controles visuales para personalización y vista previa en tiempo real

---

## 🧠 Arquitectura y Flujo de Datos

### Diagrama Conceptual

```
Usuario Administrador    →    Panel Admin    →    Base de Datos WordPress
        ↓                        ↓                       ↓
   Añade Preguntas         Configura Estilos       Almacena Contenido
        ↓                        ↓                       ↓
     Shortcode     →     Sistema de Renderizado    ←    Consultas WP
        ↓
   Frontend Interactivo   →   Experiencia de Usuario Final
```

### Patrón de Diseño

El plugin sigue un patrón de arquitectura MVC simplificado:

- **Modelo**: Custom Post Type y Taxonomía con WordPress Database
- **Vista**: Templates en PHP con salida HTML semántica
- **Controlador**: Clases PHP que manejan la lógica de negocio

### Flujo de Ejecución del Shortcode

1. El shortcode `[custom_faq]` es invocado en una página
2. El método `faq_shortcode()` procesa los parámetros
3. Se obtienen las opciones de configuración de la base de datos
4. Se realiza una consulta WP_Query para obtener las preguntas según los parámetros
5. Se cargan categorías para el filtrado
6. Se incluye la plantilla `shortcode-faq.php` para renderizar el HTML
7. Se aplican variables CSS personalizadas según configuración
8. El JavaScript inicializa comportamientos interactivos (buscador, filtro, acordeón)

---

## 🎮 API y Hooks Para Desarrolladores

El plugin ofrece un sistema extensible para desarrolladores que deseen modificar o extender su comportamiento:

### Hooks Disponibles

```php
// Filtrar las preguntas antes de mostrarlas
add_filter('custom_faq_query_args', function($args) {
    // Modificar argumentos de la consulta
    $args['posts_per_page'] = 20;
    return $args;
});

// Modificar el HTML de una pregunta individual
add_filter('custom_faq_item_html', function($html, $post_id) {
    // Personalizar el HTML
    return $html;
}, 10, 2);

// Añadir contenido antes del listado de preguntas
add_action('custom_faq_before_list', function() {
    echo '<div class="mi-contenido-personalizado">Contenido adicional</div>';
});

// Añadir contenido después del listado de preguntas
add_action('custom_faq_after_list', function() {
    echo '<div class="mi-footer-faq">Powered by Mi Empresa</div>';
});

// Modificar las opciones predeterminadas
add_filter('custom_faq_default_options', function($options) {
    $options['bg_color'] = '#f9f9f9';
    $options['animation_speed'] = 500;
    return $options;
});
```

### Integrando el Plugin Programáticamente

```php
// Obtener todas las preguntas de una categoría específica
function obtener_preguntas_categoria($categoria_slug) {
    $args = array(
        'post_type' => 'custom_faq',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'faq_category',
                'field' => 'slug',
                'terms' => $categoria_slug
            )
        )
    );
    return new WP_Query($args);
}

// Renderizar FAQ programáticamente con parámetros personalizados
function mostrar_faq_personalizado($categoria, $limite = 5) {
    echo do_shortcode("[custom_faq category='{$categoria}' limit='{$limite}']");
}
```

### JavaScript API

El plugin expone un objeto global para interactuar con él desde otros scripts:

```javascript
// Ejemplo: Abrir una pregunta específica programáticamente
BuzzFAQ.openQuestion(questionId);

// Ejemplo: Filtrar por una categoría específica
BuzzFAQ.filterByCategory('soporte-tecnico');

// Ejemplo: Buscar una palabra clave
BuzzFAQ.search('palabra-clave');

// Ejemplo: Reiniciar todos los filtros
BuzzFAQ.resetFilters();
```

---

## 🌐 Internacionalización

El plugin está completamente preparado para traducciones:

- **Text Domain**: `custom-faq-plugin`
- **Archivos de Traducción**: Incluye archivo POT en `/languages/`
- **Función i18n**: Todas las cadenas de texto utilizan las funciones `__()`, `_e()`, etc.

### Traducir el Plugin

1. Usa herramientas como Poedit para crear archivos .po y .mo basados en el archivo POT
2. Nombra los archivos según tu código de idioma (ej. `custom-faq-plugin-es_ES.po`)
3. Coloca los archivos en la carpeta `/languages/` del plugin
4. El plugin cargará automáticamente la traducción correspondiente

### Soporte RTL (Right-to-Left)

El plugin detecta automáticamente idiomas RTL y ajusta los estilos en consecuencia.

---

## ⚡ Optimización y Rendimiento

### Técnicas Implementadas

- **Carga Selectiva de Assets**: Scripts y estilos solo en páginas que usan el shortcode
- **Caché Integrada**: Resultados de consultas frecuentes almacenados en caché
- **JavaScript Optimizado**: Código minificado y event delegation para mejor rendimiento
- **CSS Eficiente**: Variables CSS para personalización sin generar CSS adicional
- **Lazy Loading**: Carga diferida de categorías y preguntas cuando se necesitan
- **Consultas SQL Optimizadas**: Uso eficiente de WP_Query con solo los campos necesarios

### Impacto en el Rendimiento

El plugin está diseñado para tener un impacto mínimo en el rendimiento del sitio:

- Añade solo ~15KB de CSS y ~12KB de JS al frontend (comprimidos)
- Realiza un máximo de 2 consultas SQL adicionales por página
- Compatible con plugins populares de caché y optimización

---

## 🤝 Contribución y Soporte

### Soporte Técnico

¿Tienes preguntas o necesitas ayuda con el plugin? Contáctanos:

- 📧 **Email**: [soporte@buzz.cr](mailto:soporte@buzz.cr)
- 🌐 **Sitio Web**: [https://buzz.cr](https://buzz.cr)
- 🐛 **Reportar Problemas**: [GitHub Issues](https://github.com/jdvalorbuzz/faqbuzz/issues)

### Contribuciones

¡Tus contribuciones son bienvenidas! Si deseas mejorar el plugin:

1. Haz un fork del repositorio
2. Crea una rama para tu característica (`git checkout -b feature/nueva-caracteristica`)
3. Haz commit de tus cambios (`git commit -m 'Añade nueva característica'`)
4. Haz push a la rama (`git push origin feature/nueva-caracteristica`)
5. Abre un Pull Request

---

## 📜 Licencia y Créditos

### Licencia

Este plugin está licenciado bajo la [GPL v2 o posterior](https://www.gnu.org/licenses/gpl-2.0.html).

### Créditos

<div align="center">
  <img src="https://buzz.cr/wp-content/uploads/2024/07/logo.png" alt="Buzz Costa Rica" width="200" />
  <p><strong>Desarrollado con ❤️ por el equipo de Buzz Costa Rica</strong></p>
  <p><a href="https://buzz.cr">https://buzz.cr</a></p>
  <p style="font-size:0.8em">© 2024 Buzz Costa Rica. Todos los derechos reservados.</p>
</div>
