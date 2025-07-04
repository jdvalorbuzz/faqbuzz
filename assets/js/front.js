/**
 * JavaScript del frontend para el plugin Custom FAQ
 */
(function($) {
    'use strict';
    
    // Inicialización cuando el DOM esté listo
    $(document).ready(function() {
        initFAQ();
    });
    
    /**
     * Inicializa la funcionalidad del FAQ
     */
    function initFAQ() {
        const $container = $('.custom-faq-container');
        const animationSpeed = parseInt($container.data('animation-speed')) || 300;
        
        // Manejo de clic en el botón de toggle (solo el botón, no toda la pregunta)
        $('.custom-faq-toggle-btn').on('click keypress', function(e) {
            if (e.type === 'click' || (e.type === 'keypress' && (e.key === 'Enter' || e.key === ' '))) {
                e.preventDefault();
                const $item = $(this).closest('.custom-faq-item');
                const $answer = $item.find('.custom-faq-answer');
                const animationSpeed = parseInt($('.custom-faq-container').data('animation-speed')) || 300;
                if ($item.hasClass('active')) {
                    $item.removeClass('active');
                    $answer.slideUp(animationSpeed);
                } else {
                    $item.addClass('active');
                    $answer.slideDown(animationSpeed);
                }
            }
        });
        
        // Acordeón: abrir/cerrar al hacer click o Enter/espacio en la pregunta
        $('.custom-faq-question-label').on('click keypress', function(e) {
            if (e.type === 'click' || (e.type === 'keypress' && (e.key === 'Enter' || e.key === ' '))) {
                e.preventDefault();
                const $item = $(this).closest('.custom-faq-item');
                if ($item.hasClass('active')) {
                    $item.removeClass('active');
                } else {
                    // Opcional: cerrar otros
                    $('.custom-faq-item.active').removeClass('active');
                    $item.addClass('active');
                }
            }
        });
        
        // Filtrado por categoría usando dropdown personalizado
        $('.custom-faq-category-dropdown-selected').on('click', function() {
            $(this).parent('.custom-faq-category-dropdown-wrapper').toggleClass('active');
        });

        // Al hacer clic en una opción de categoría
        $('.custom-faq-category-option').on('click', function() {
            const selectedCategory = $(this).data('value');
            // Actualizar visualmente la opción seleccionada
            $('.custom-faq-category-option').removeClass('active');
            $(this).addClass('active');
            // Actualizar el texto mostrado
            $(this).closest('.custom-faq-category-dropdown-wrapper').find('.selected-text').text($(this).text());
            // Actualizar el valor oculto
            $('#custom-faq-category-value').val(selectedCategory);
            // Cerrar el dropdown
            $(this).closest('.custom-faq-category-dropdown-wrapper').removeClass('active');

            // Filtrar preguntas
            if (selectedCategory === 'all') {
                $('.custom-faq-item').show();
            } else {
                $('.custom-faq-item').hide();
                $(`.custom-faq-category-${selectedCategory}`).show();
            }
            // Cerrar todas las preguntas abiertas
            $('.custom-faq-item.active').removeClass('active').find('.custom-faq-answer').hide();
        });

        // Aplicar filtro inicial si hay una categoría en el shortcode
        const initialCategory = $('#custom-faq-category-value').val();
        if (initialCategory && initialCategory !== 'all') {
            // Simular clic en la opción activa al cargar
            $(`.custom-faq-category-option[data-value="${initialCategory}"]`).trigger('click');
        }

        // Búsqueda instantánea de FAQs en frontend (sin AJAX, con resaltado y soporte tildes)
        function normalize(str) {
            return str
                .toLowerCase()
                .normalize('NFD')
                .replace(/[ -6f]/g, ''); // Quita tildes correctamente
        }
        $('.custom-faq-search-input').on('input', function() {
            const keyword = normalize($(this).val().trim());
            let found = 0;

            if (keyword.length > 0) {
                // Buscar en todas las preguntas, sin importar la categoría
                $('.custom-faq-item').each(function() {
                    const $item = $(this);
                    const $questionText = $item.find('.custom-faq-question-text');
                    const $answer = $item.find('.custom-faq-answer');
                    const questionText = $questionText.text();
                    const answerText = $answer.text();
                    const question = normalize(questionText);
                    const answer = normalize(answerText);

                    // Quitar resaltado anterior solo en el texto, no en el tooltip/icono
                    $questionText.html($questionText.text());
                    $answer.each(function() {
                        this.innerHTML = this.textContent;
                    });

                    if (question.includes(keyword) || answer.includes(keyword)) {
                        $item.show();
                        found++;
                        // Resaltar coincidencias solo en el texto de la pregunta y respuesta
                        if (keyword.length > 0) {
                            const regex = new RegExp('('+keyword+')', 'gi');
                            $questionText.html($questionText.text().replace(regex, '<mark>$1</mark>'));
                            $answer.each(function() {
                                this.innerHTML = this.textContent.replace(regex, '<mark>$1</mark>');
                            });
                        }
                    } else {
                        $item.hide();
                    }
                });
            } else {
                // Si el input está vacío, mostrar solo las preguntas de la categoría seleccionada
                const category = $('#custom-faq-category-value').val() || 'all';
                $('.custom-faq-item').each(function() {
                    const $item = $(this);
                    const $questionText = $item.find('.custom-faq-question-text');
                    $questionText.html($questionText.text());
                    $item.find('.custom-faq-answer').each(function() {
                        this.innerHTML = this.textContent;
                    });
                    if (category === 'all' || $item.hasClass('custom-faq-category-' + category)) {
                        $item.show();
                        found++;
                    } else {
                        $item.hide();
                    }
                });
            }

            if (found === 0) {
                if ($('.custom-faq-no-results').length === 0) {
                    $('.custom-faq-list').after('<p class="custom-faq-no-results">¡Ups! No hay ninguna pregunta relacionada con tu palabra clave.</p>');
                }
                $('.custom-faq-no-results').show();
            } else {
                $('.custom-faq-no-results').hide();
            }
        });
    }
    
})(jQuery);