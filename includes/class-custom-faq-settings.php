<?php
/**
 * Clase para manejar la configuración del plugin
 */
class Custom_FAQ_Settings {
    
    /**
     * Instancia única de la clase
     */
    private static $instance = null;
    
    /**
     * Constructor de la clase
     */
    private function __construct() {
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    /**
     * Obtiene la instancia única de la clase
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Registra las opciones y secciones de configuración
     */
    public function register_settings() {
        register_setting(
            'custom_faq_options_group',
            'custom_faq_options',
            array($this, 'sanitize_options')
        );
        
        add_settings_section(
            'custom_faq_appearance_section',
            __('Apariencia del FAQ', 'custom-faq-plugin'),
            array($this, 'appearance_section_callback'),
            'custom-faq-settings'
        );

        // NUEVO: Campo para el título de la sección FAQ
        add_settings_field(
            'faq_section_title',
            __('Título de la sección FAQ', 'custom-faq-plugin'),
            array($this, 'text_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'faq_section_title', 'label' => __('Título principal que se muestra arriba de las preguntas frecuentes', 'custom-faq-plugin'))
        );
        // NUEVO: Campo para la descripción de la sección FAQ
        add_settings_field(
            'faq_section_description',
            __('Descripción de la sección FAQ', 'custom-faq-plugin'),
            array($this, 'textarea_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'faq_section_description', 'label' => __('Descripción que aparece debajo del título principal', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'bg_color',
            __('Color de fondo', 'custom-faq-plugin'),
            array($this, 'color_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'bg_color', 'label' => __('Color de fondo para los elementos FAQ', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'title_color',
            __('Color del título', 'custom-faq-plugin'),
            array($this, 'color_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'title_color', 'label' => __('Color para los títulos de las preguntas', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'text_color',
            __('Color del texto', 'custom-faq-plugin'),
            array($this, 'color_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'text_color', 'label' => __('Color para el texto de las respuestas', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'accent_color',
            __('Color de acento', 'custom-faq-plugin'),
            array($this, 'color_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'accent_color', 'label' => __('Color de acento para elementos activos', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'border_color',
            __('Color del borde', 'custom-faq-plugin'),
            array($this, 'color_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'border_color', 'label' => __('Color para los bordes', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'title_font_size',
            __('Tamaño de fuente del título', 'custom-faq-plugin'),
            array($this, 'text_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'title_font_size', 'label' => __('Tamaño de fuente para los títulos (ej. 18px)', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'text_font_size',
            __('Tamaño de fuente del texto', 'custom-faq-plugin'),
            array($this, 'text_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'text_font_size', 'label' => __('Tamaño de fuente para las respuestas (ej. 16px)', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'border_radius',
            __('Radio de borde', 'custom-faq-plugin'),
            array($this, 'text_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'border_radius', 'label' => __('Radio de borde para los elementos (ej. 4px)', 'custom-faq-plugin'))
        );
        
        add_settings_field(
            'animation_speed',
            __('Velocidad de animación', 'custom-faq-plugin'),
            array($this, 'text_field_callback'),
            'custom-faq-settings',
            'custom_faq_appearance_section',
            array('id' => 'animation_speed', 'label' => __('Velocidad de animación en milisegundos (ej. 300)', 'custom-faq-plugin'))
        );
    }
    
    /**
     * Callback para la sección de apariencia
     */
    public function appearance_section_callback() {
        echo '<p>' . __('Personaliza la apariencia de tus Preguntas Frecuentes', 'custom-faq-plugin') . '</p>';
    }
    
    /**
     * Callback para campos de color
     */
    public function color_field_callback($args) {
        $options = get_option('custom_faq_options');
        $id = $args['id'];
        $value = isset($options[$id]) ? $options[$id] : '';
        
        echo '<input type="text" class="color-picker" id="custom_faq_options_' . esc_attr($id) . '" name="custom_faq_options[' . esc_attr($id) . ']" value="' . esc_attr($value) . '" />';
        echo '<p class="description">' . esc_html($args['label']) . '</p>';
    }
    
    /**
     * Callback para campos de texto
     */
    public function text_field_callback($args) {
        $options = get_option('custom_faq_options');
        $id = $args['id'];
        $value = isset($options[$id]) ? $options[$id] : '';
        
        echo '<input type="text" id="custom_faq_options_' . esc_attr($id) . '" name="custom_faq_options[' . esc_attr($id) . ']" value="' . esc_attr($value) . '" class="regular-text" />';
        echo '<p class="description">' . esc_html($args['label']) . '</p>';
    }

    /**
     * NUEVO: Callback para campos de textarea
     */
    public function textarea_field_callback($args) {
        $options = get_option('custom_faq_options');
        $id = $args['id'];
        $value = isset($options[$id]) ? $options[$id] : '';
        echo '<textarea id="custom_faq_options_' . esc_attr($id) . '" name="custom_faq_options[' . esc_attr($id) . ']" rows="3" cols="60">' . esc_textarea($value) . '</textarea>';
        echo '<p class="description">' . esc_html($args['label']) . '</p>';
    }
    
    /**
     * Sanitiza las opciones antes de guardarlas
     */
    public function sanitize_options($input) {
        $sanitized_input = array();
        
        // Sanitizar colores
        $color_fields = array('bg_color', 'title_color', 'text_color', 'accent_color', 'border_color');
        foreach ($color_fields as $field) {
            if (isset($input[$field])) {
                // Sanitizar como color hexadecimal
                $sanitized_input[$field] = sanitize_hex_color($input[$field]);
            }
        }
        
        // Sanitizar campos de texto
        $text_fields = array('title_font_size', 'text_font_size', 'border_radius');
        foreach ($text_fields as $field) {
            if (isset($input[$field])) {
                // Sanitizar como texto con unidades CSS
                $sanitized_input[$field] = preg_replace('/[^0-9a-z%\.]/i', '', $input[$field]);
            }
        }
        
        // Sanitizar velocidad de animación como entero
        if (isset($input['animation_speed'])) {
            $sanitized_input['animation_speed'] = intval($input['animation_speed']);
        }

        // NUEVO: Sanitizar título y descripción de la sección FAQ
        if (isset($input['faq_section_title'])) {
            $sanitized_input['faq_section_title'] = sanitize_text_field($input['faq_section_title']);
        }
        if (isset($input['faq_section_description'])) {
            $sanitized_input['faq_section_description'] = sanitize_textarea_field($input['faq_section_description']);
        }
        
        return $sanitized_input;
    }
}

// Inicializar la clase de configuración
Custom_FAQ_Settings::get_instance();