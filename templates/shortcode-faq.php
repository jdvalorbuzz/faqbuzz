<div class="custom-faq-container" 
     style="
        --custom-faq-bg-color: <?php echo esc_attr($options['bg_color']); ?>;
        --custom-faq-title-color: <?php echo esc_attr($options['title_color']); ?>;
        --custom-faq-text-color: <?php echo esc_attr($options['text_color']); ?>;
        --custom-faq-accent-color: <?php echo esc_attr($options['accent_color']); ?>;
        --custom-faq-border-color: <?php echo esc_attr($options['border_color']); ?>;
        --custom-faq-title-font-size: <?php echo esc_attr($options['title_font_size']); ?>;
        --custom-faq-text-font-size: <?php echo esc_attr($options['text_font_size']); ?>;
        --custom-faq-border-radius: <?php echo esc_attr($options['border_radius']); ?>;
     "
     data-animation-speed="<?php echo esc_attr($options['animation_speed']); ?>">
    
    <h1 class="custom-faq-main-title text-[36px] font-[Gotham-Book] text-center lg:mt-[50px] mt-[40px] mb-[20px]">
        Preguntas <strong class="font-bold text-[#2270A8]">frecuentes</strong>
    </h1>
    <div class="text-center">
        <label for="custom-faq-search-input" class="custom-faq-description text-[14px] font-[Gotham-Medium] mb-[25px]">
            ¿Qué consultas tiene hoy?
        </label>
    </div>
    <div class="custom-faq-search-wrapper" style="margin: 24px auto; max-width: 500px; text-align:center;">
        <div class="custom-faq-search-input-wrapper" style="position:relative;display:flex;align-items:center;">
            <input type="text" id="custom-faq-search-input" class="custom-faq-search-input" placeholder="Ingrese una palabra clave" style="flex:1;padding:12px 40px 12px 16px;border:1px solid var(--custom-faq-border-color);border-radius:var(--custom-faq-border-radius);font-size:16px;outline:none;" />
            <span class="custom-faq-search-icon">
              <svg viewBox="0 0 20 20"><circle cx="9" cy="9" r="7" stroke="currentColor" stroke-width="2" fill="none"/><line x1="14" y1="14" x2="19" y2="19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </span>
        </div>
    </div>
    <div class="custom-faq-flex-layout">
        <?php if (!empty($categories)) : ?>
            <div class="custom-faq-categories">
                <div class="custom-faq-category-label"><?php _e('Seleccione una categoría', 'custom-faq-plugin'); ?></div>
                <div class="custom-faq-category-dropdown-wrapper">
                    <div class="custom-faq-category-dropdown-selected">
                        <span class="selected-text">
                        <?php 
                        // Establecer la categoría activa por defecto (primera categoría o la especificada en el shortcode)
                        $active_category = 'all';
                        $active_category_name = __('Todas las categorías', 'custom-faq-plugin');
                        if (!empty($atts['category'])) {
                            $active_category = $atts['category'];
                            foreach ($categories as $category) {
                                if ($category->slug === $atts['category']) {
                                    $active_category_name = $category->name;
                                    break;
                                }
                            }
                        } else if (!empty($categories)) {
                            $first_category = reset($categories);
                            $active_category = $first_category->slug;
                            $active_category_name = $first_category->name;
                        }
                        echo esc_html($active_category_name);
                        ?>
                        </span>
                        <span class="custom-faq-dropdown-arrow"></span>
                    </div>
                    <div class="custom-faq-category-dropdown-options">
                        <div class="custom-faq-category-option <?php echo ($active_category === 'all') ? 'active' : ''; ?>" 
                             data-value="all">
                            <?php _e('Todas las categorías', 'custom-faq-plugin'); ?>
                        </div>
                        <?php foreach ($categories as $category) : ?>
                            <div class="custom-faq-category-option <?php echo ($active_category === $category->slug) ? 'active' : ''; ?>" 
                                 data-value="<?php echo esc_attr($category->slug); ?>">
                                <?php echo esc_html($category->name); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Campo oculto para almacenar el valor seleccionado -->
                    <input type="hidden" id="custom-faq-category-value" value="<?php echo esc_attr($active_category); ?>">
                </div>
            </div>
        <?php endif; ?>
        <div class="custom-faq-items-container">
            <?php
            // Argumentos para obtener todas las preguntas para filtrar mediante JavaScript
            $args = array(
                'post_type'      => 'custom_faq',
                'posts_per_page' => $atts['limit'],
                'orderby'        => $atts['orderby'],
                'order'          => $atts['order'],
            );
            
            $query = new WP_Query($args);
            
            if ($query->have_posts()) {
                echo '<div class="custom-faq-list">';
                
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_id = get_the_ID();
                    $post_categories = get_the_terms($post_id, 'faq_category');
                    $category_classes = 'custom-faq-item';
                    $hide_initially = false;
                    
                    // Si hay una categoría activa inicial, solo mostrar esas preguntas
                    if (!empty($active_category) && $active_category !== 'all') {
                        $in_active_category = false;
                        
                        if (!empty($post_categories) && !is_wp_error($post_categories)) {
                            foreach ($post_categories as $category) {
                                if ($category->slug === $active_category) {
                                    $in_active_category = true;
                                    break;
                                }
                            }
                        }
                        
                        if (!$in_active_category) {
                            $hide_initially = true;
                        }
                    }
                    
                    // Añadir clases de categoría para filtrado con JavaScript
                    $category_names = array();
                    if (!empty($post_categories) && !is_wp_error($post_categories)) {
                        foreach ($post_categories as $category) {
                            $category_classes .= ' custom-faq-category-' . esc_attr($category->slug);
                            $category_names[] = esc_html($category->name);
                        }
                    }
                    ?>
                    <div class="<?php echo esc_attr($category_classes); ?>" 
                         data-post-id="<?php echo esc_attr($post_id); ?>"
                         <?php echo $hide_initially ? 'style="display: none;"' : ''; ?> >
                        <div class="custom-faq-question-row">
                            <label class="custom-faq-question-label" tabindex="0">
                                <span class="custom-faq-question-text"><?php the_title(); ?></span>
                                <img src="https://vui.cr/wp-content/themes/vui-theme/images/more.svg" alt="more" class="custom-faq-arrow" />
                            </label>
                        </div>
                        <div class="custom-faq-answer">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                }
                
                echo '</div>';
                
                wp_reset_postdata();
            } else {
                echo '<p class="custom-faq-no-results">' . __('No se encontraron preguntas frecuentes.', 'custom-faq-plugin') . '</p>';
            }
            ?>
        </div>
    </div>
</div>