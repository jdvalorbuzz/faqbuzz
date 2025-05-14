/**
 * JavaScript del admin para el plugin Custom FAQ
 */
(function($) {
    'use strict';
    
    // Inicialización cuando el DOM esté listo
    $(document).ready(function() {
        initColorPickers();
        initPreview();
    });
    
    /**
     * Inicializa los selectores de color
     */
    function initColorPickers() {
        $('.color-picker').wpColorPicker({
            change: function(event, ui) {
                // Actualizar la vista previa cuando cambia el color
                updatePreview();
            }
        });
    }
    
    /**
     * Inicializa la vista previa
     */
    function initPreview() {
        // Inicializar la vista previa
        updatePreview();
        
        // Actualizar la vista previa cuando se cambien los valores de los campos
        $('input[name^="custom_faq_options"]').on('change input', function() {
            updatePreview();
        });
        
        // Mostrar/Ocultar respuesta en la vista previa
        $('#custom-faq-preview-container .custom-faq-question').on('click', function() {
            $(this).next('.custom-faq-answer').slideToggle(300);
        });
    }
    
    /**
     * Actualiza la vista previa basada en los valores actuales
     */
    function updatePreview() {
        const previewContainer = $('#custom-faq-preview-container');
        const question = previewContainer.find('.custom-faq-question');
        const answer = previewContainer.find('.custom-faq-answer');
        
        // Obtener los valores actuales
        const bgColor = $('#custom_faq_options_bg_color').val() || '#ffffff';
        const titleColor = $('#custom_faq_options_title_color').val() || '#333333';
        const textColor = $('#custom_faq_options_text_color').val() || '#666666';
        const accentColor = $('#custom_faq_options_accent_color').val() || '#00a651';
        const borderColor = $('#custom_faq_options_border_color').val() || '#e0e0e0';
        const titleFontSize = $('#custom_faq_options_title_font_size').val() || '18px';
        const textFontSize = $('#custom_faq_options_text_font_size').val() || '16px';
        const borderRadius = $('#custom_faq_options_border_radius').val() || '4px';
        
        // Aplicar estilos a la vista previa
        previewContainer.find('.custom-faq-item').css({
            'backgroundColor': bgColor,
            'borderColor': borderColor,
            'borderRadius': borderRadius
        });
        
        question.css({
            'color': titleColor,
            'fontSize': titleFontSize,
            'borderColor': borderColor
        });
        
        answer.css({
            'color': textColor,
            'fontSize': textFontSize,
            'borderColor': borderColor
        });
        
        // Actualizar color de acento para el ícono (simulado aquí)
        question.find('::after').css('color', accentColor);
    }
    
})(jQuery);