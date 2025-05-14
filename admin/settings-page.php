<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <form method="post" action="options.php">
        <?php
        settings_fields('custom_faq_options_group');
        do_settings_sections('custom-faq-settings');
        submit_button(__('Guardar cambios', 'custom-faq-plugin'));
        ?>
    </form>
    
    <div class="custom-faq-preview">
        <h2><?php _e('Vista previa', 'custom-faq-plugin'); ?></h2>
        <div id="custom-faq-preview-container">
            <!-- La vista previa se cargará aquí con JavaScript -->
            <div class="custom-faq-item">
                <div class="custom-faq-question">
                    <?php _e('Pregunta de ejemplo', 'custom-faq-plugin'); ?>
                </div>
                <div class="custom-faq-answer">
                    <?php _e('Esta es una respuesta de ejemplo para mostrar cómo se verán tus FAQs con los estilos aplicados.', 'custom-faq-plugin'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="custom-faq-shortcode-info">
        <h2><?php _e('Uso del Shortcode', 'custom-faq-plugin'); ?></h2>
        <p><?php _e('Utiliza el siguiente shortcode para mostrar las FAQs en cualquier página o entrada:', 'custom-faq-plugin'); ?></p>
        <code>[custom_faq]</code>
        
        <h3><?php _e('Parámetros opcionales:', 'custom-faq-plugin'); ?></h3>
        <ul>
            <li><code>category</code> - <?php _e('ID o slug de la categoría específica (por defecto: todas)', 'custom-faq-plugin'); ?></li>
            <li><code>limit</code> - <?php _e('Número de preguntas a mostrar (por defecto: todas)', 'custom-faq-plugin'); ?></li>
            <li><code>orderby</code> - <?php _e('Campo por el cual ordenar (date, title, etc. - por defecto: date)', 'custom-faq-plugin'); ?></li>
            <li><code>order</code> - <?php _e('Orden ascendente o descendente (ASC o DESC - por defecto: DESC)', 'custom-faq-plugin'); ?></li>
        </ul>
        
        <h3><?php _e('Ejemplo:', 'custom-faq-plugin'); ?></h3>
        <code>[custom_faq category="general" limit="5" orderby="title" order="ASC"]</code>
    </div>
    
    <div class="custom-faq-documentation" style="margin-top:40px; padding:32px; background:#f8fafd; border-radius:8px; border:1px solid #e0e7ef; max-width:900px; margin-left:auto; margin-right:auto;">
        <h2 style="color:#007cba; margin-top:0;">📖 Documentación del Plugin Custom FAQ</h2>
        <p>El <strong>Custom FAQ Plugin</strong> te permite mostrar preguntas frecuentes (FAQs) organizadas por categorías, con un diseño moderno, personalizable y responsivo. Ideal para mejorar la experiencia de tus usuarios y resolver dudas comunes de forma rápida.</p>
        <hr style="margin:24px 0;">
        <h3 style="color:#333;">¿Cómo funciona?</h3>
        <ol style="padding-left:20px;">
            <li><strong>Gestión de FAQs:</strong> Crea y edita preguntas frecuentes desde el panel de WordPress, usando el tipo de contenido <code>Pregunta Frecuente</code> y asigna categorías personalizadas.</li>
            <li><strong>Shortcode:</strong> Inserta el shortcode <code>[custom_faq]</code> en cualquier página o entrada para mostrar el listado de FAQs.</li>
            <li><strong>Filtrado por Categoría:</strong> Los usuarios pueden filtrar las preguntas usando un dropdown elegante y responsivo.</li>
            <li><strong>Diseño Personalizable:</strong> Cambia colores, bordes, fuentes y animaciones desde la configuración del plugin.</li>
            <li><strong>Responsive:</strong> El diseño se adapta automáticamente a escritorio y móvil.</li>
        </ol>
        <hr style="margin:24px 0;">
        <h3 style="color:#333;">Opciones del Shortcode</h3>
        <ul style="padding-left:20px;">
            <li><code>category</code>: Muestra solo una categoría específica. Ejemplo: <code>[custom_faq category="general"]</code></li>
            <li><code>limit</code>: Número máximo de preguntas a mostrar. Ejemplo: <code>[custom_faq limit="5"]</code></li>
            <li><code>orderby</code>: Ordenar por campo (<code>date</code>, <code>title</code>, etc). Ejemplo: <code>[custom_faq orderby="title"]</code></li>
            <li><code>order</code>: Orden ascendente (<code>ASC</code>) o descendente (<code>DESC</code>). Ejemplo: <code>[custom_faq order="ASC"]</code></li>
        </ul>
        <p><strong>Ejemplo completo:</strong></p>
        <code style="display:block; background:#eef6fb; padding:10px 16px; border-radius:4px;">[custom_faq category="general" limit="5" orderby="title" order="ASC"]</code>
        <hr style="margin:24px 0;">
        <h3 style="color:#333;">Personalización de Apariencia</h3>
        <ul style="padding-left:20px;">
            <li>Accede a <strong>Preguntas Frecuentes &gt; Configuración</strong> en el panel de WordPress.</li>
            <li>Modifica colores, fuentes, bordes y velocidad de animación según tu marca.</li>
            <li>Guarda los cambios y visualiza la <strong>vista previa</strong> en tiempo real.</li>
        </ul>
        <hr style="margin:24px 0;">
        <h3 style="color:#333;">Características Destacadas</h3>
        <ul style="padding-left:20px;">
            <li>Filtrado instantáneo por categoría.</li>
            <li>Animaciones suaves al mostrar/ocultar respuestas.</li>
            <li>Soporte para múltiples categorías por pregunta.</li>
            <li>Diseño accesible y amigable para SEO.</li>
            <li>Fácil integración en cualquier parte del sitio.</li>
        </ul>
        <hr style="margin:24px 0;">
        <h3 style="color:#333;">¿Necesitas ayuda?</h3>
        <p>Contacta al desarrollador o revisa la documentación oficial para soporte y nuevas funcionalidades.</p>
    </div>
    <!-- Fin de la documentación del plugin -->
</div>