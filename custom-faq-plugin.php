<?php
/**
 * Plugin Name: Custom FAQ Plugin
 * Plugin URI: https://buzz.cr
 * Description: Plugin personalizado para gestionar preguntas frecuentes por categorías con estilos personalizables.
 * Version: 1.0.0
 * Author: Buzz Costarica
 * Author URI: https://buzz.cr
 * Text Domain: custom-faq-plugin
 * Domain Path: /languages
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Clase principal del plugin
 */
class Custom_FAQ_Plugin {
    
    /**
     * Instancia única del plugin
     */
    private static $instance = null;
    
    /**
     * Versión del plugin
     */
    private $version = '1.0.0';
    
    /**
     * Constructor de la clase
     */
    private function __construct() {
        // Definir constantes
        $this->define_constants();
        
        // Incluir archivos necesarios
        $this->includes();
        
        // Hooks de inicialización
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_front_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        
        // Registrar shortcode
        add_shortcode('custom_faq', array($this, 'faq_shortcode'));
    }
    
    /**
     * Obtiene la instancia única del plugin
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Define las constantes del plugin
     */
    private function define_constants() {
        define('CUSTOM_FAQ_VERSION', $this->version);
        define('CUSTOM_FAQ_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('CUSTOM_FAQ_PLUGIN_URL', plugin_dir_url(__FILE__));
    }
    
    /**
     * Incluye los archivos necesarios para el plugin
     */
    private function includes() {
        require_once CUSTOM_FAQ_PLUGIN_DIR . 'includes/class-custom-faq-settings.php';
    }
    
    /**
     * Registra el tipo de post personalizado para FAQs
     */
    public function register_post_types() {
        $labels = array(
            'name'               => __('Preguntas Frecuentes', 'custom-faq-plugin'),
            'singular_name'      => __('Pregunta Frecuente', 'custom-faq-plugin'),
            'menu_name'          => __('Preguntas Frecuentes', 'custom-faq-plugin'),
            'name_admin_bar'     => __('Pregunta Frecuente', 'custom-faq-plugin'),
            'add_new'            => __('Añadir Nueva', 'custom-faq-plugin'),
            'add_new_item'       => __('Añadir Nueva Pregunta', 'custom-faq-plugin'),
            'new_item'           => __('Nueva Pregunta', 'custom-faq-plugin'),
            'edit_item'          => __('Editar Pregunta', 'custom-faq-plugin'),
            'view_item'          => __('Ver Pregunta', 'custom-faq-plugin'),
            'all_items'          => __('Todas las Preguntas', 'custom-faq-plugin'),
            'search_items'       => __('Buscar Preguntas', 'custom-faq-plugin'),
            'parent_item_colon'  => __('Pregunta Padre:', 'custom-faq-plugin'),
            'not_found'          => __('No se encontraron preguntas.', 'custom-faq-plugin'),
            'not_found_in_trash' => __('No hay preguntas en la papelera.', 'custom-faq-plugin')
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'faq'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-format-chat',
            'supports'           => array('title', 'editor')
        );

        register_post_type('custom_faq', $args);
    }
    
    /**
     * Registra la taxonomía para categorías de FAQ
     */
    public function register_taxonomies() {
        $labels = array(
            'name'              => __('Categorías de FAQ', 'custom-faq-plugin'),
            'singular_name'     => __('Categoría de FAQ', 'custom-faq-plugin'),
            'search_items'      => __('Buscar Categorías', 'custom-faq-plugin'),
            'all_items'         => __('Todas las Categorías', 'custom-faq-plugin'),
            'parent_item'       => __('Categoría Padre', 'custom-faq-plugin'),
            'parent_item_colon' => __('Categoría Padre:', 'custom-faq-plugin'),
            'edit_item'         => __('Editar Categoría', 'custom-faq-plugin'),
            'update_item'       => __('Actualizar Categoría', 'custom-faq-plugin'),
            'add_new_item'      => __('Añadir Nueva Categoría', 'custom-faq-plugin'),
            'new_item_name'     => __('Nuevo Nombre de Categoría', 'custom-faq-plugin'),
            'menu_name'         => __('Categorías', 'custom-faq-plugin'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'faq-category'),
        );

        register_taxonomy('faq_category', array('custom_faq'), $args);
    }
    
    /**
     * Añade el menú de administración
     */
    public function add_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=custom_faq',
            __('Configuración de FAQ', 'custom-faq-plugin'),
            __('Configuración', 'custom-faq-plugin'),
            'manage_options',
            'custom-faq-settings',
            array($this, 'settings_page')
        );
    }
    
    /**
     * Renderiza la página de configuración
     */
    public function settings_page() {
        require_once CUSTOM_FAQ_PLUGIN_DIR . 'admin/settings-page.php';
    }
    
    /**
     * Carga los scripts del frontend
     */
    public function enqueue_front_scripts() {
        wp_enqueue_style('custom-faq-styles', CUSTOM_FAQ_PLUGIN_URL . 'assets/css/front.css', array(), $this->version);
        wp_enqueue_script('custom-faq-script', CUSTOM_FAQ_PLUGIN_URL . 'assets/js/front.js', array('jquery'), $this->version, true);
        
        // Pasar las opciones de estilo como datos localizados
        $options = get_option('custom_faq_options');
        if (!$options) {
            $options = $this->get_default_options();
        }
        
        wp_localize_script('custom-faq-script', 'customFaqData', $options);
    }
    
    /**
     * Carga los scripts de admin
     */
    public function enqueue_admin_scripts($hook) {
        if ('custom_faq_page_custom-faq-settings' !== $hook) {
            return;
        }
        
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_style('custom-faq-admin', CUSTOM_FAQ_PLUGIN_URL . 'assets/css/admin.css', array(), $this->version);
        wp_enqueue_script('custom-faq-admin', CUSTOM_FAQ_PLUGIN_URL . 'assets/js/admin.js', array('jquery', 'wp-color-picker'), $this->version, true);
    }
    
    /**
     * Implementación del shortcode
     */
    public function faq_shortcode($atts) {
        $atts = shortcode_atts(array(
            'category' => '',
            'limit' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
        ), $atts, 'custom_faq');
        
        // Obtener opciones de estilos
        $options = get_option('custom_faq_options');
        if (!$options) {
            $options = $this->get_default_options();
        }
        // NUEVO: Título y descripción personalizables
        $faq_section_title = !empty($options['faq_section_title']) ? $options['faq_section_title'] : __('Preguntas frecuentes', 'custom-faq-plugin');
        $faq_section_description = !empty($options['faq_section_description']) ? $options['faq_section_description'] : __('Encuentre aquí la información que se consulta frecuentemente sobre PROCOMER.', 'custom-faq-plugin');
        
        // Obtener las categorías de FAQ
        $categories = get_terms(array(
            'taxonomy' => 'faq_category',
            'hide_empty' => false,
        ));
        
        ob_start();
        
        // Cargar la plantilla del shortcode
        include CUSTOM_FAQ_PLUGIN_DIR . 'templates/shortcode-faq.php';
        
        return ob_get_clean();
    }
    
    /**
     * Opciones por defecto
     */
    public function get_default_options() {
        return array(
            'bg_color' => '#ffffff',
            'title_color' => '#333333',
            'text_color' => '#666666',
            'accent_color' => '#00a651',
            'border_color' => '#e0e0e0',
            'title_font_size' => '18px',
            'text_font_size' => '16px',
            'border_radius' => '4px',
            'animation_speed' => '300',
        );
    }
}

// Inicializar el plugin
function custom_faq_plugin_init() {
    Custom_FAQ_Plugin::get_instance();
}
add_action('plugins_loaded', 'custom_faq_plugin_init');

// Activación del plugin
register_activation_hook(__FILE__, 'custom_faq_plugin_activate');
function custom_faq_plugin_activate() {
    // Crear opciones por defecto
    $default_options = Custom_FAQ_Plugin::get_instance()->get_default_options();
    add_option('custom_faq_options', $default_options);
    
    // Registrar post types para que se creen los rewrite rules
    Custom_FAQ_Plugin::get_instance()->register_post_types();
    Custom_FAQ_Plugin::get_instance()->register_taxonomies();
    
    // Actualizar rewrite rules
    flush_rewrite_rules();
}

// Desactivación del plugin
register_deactivation_hook(__FILE__, 'custom_faq_plugin_deactivate');
function custom_faq_plugin_deactivate() {
    // Limpiar rewrite rules
    flush_rewrite_rules();
}

add_action('wp_ajax_custom_faq_search', 'custom_faq_search_ajax');
add_action('wp_ajax_nopriv_custom_faq_search', 'custom_faq_search_ajax');

function custom_faq_search_ajax() {
    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $args = array(
        'post_type' => 'custom_faq',
        'posts_per_page' => -1,
        's' => $keyword,
    );
    if ($category && $category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'faq_category',
                'field' => 'slug',
                'terms' => $category,
            ),
        );
    }
    $query = new WP_Query($args);
    $results = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'content' => apply_filters('the_content', get_the_content()),
                'categories' => wp_get_post_terms(get_the_ID(), 'faq_category', array('fields' => 'slugs')),
            );
        }
        wp_reset_postdata();
    }
    wp_send_json_success($results);
}