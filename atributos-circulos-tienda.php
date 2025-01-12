<?php
/*
Plugin Name: Atributos Círculos Tienda Ingepol
Description: Muestra atributos en forma de círculos y excluye productos de la categoría "Materia Prima" en Ingepol.
Version: 1.0
Author: Daniel Diaz Tag Marketing
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

function mostrar_atributos_circulos() {
    // Obtener el producto global
    global $product;

    // Verificar si el producto pertenece a la categoría "Materia Prima"
    if ($product && has_term('materia-prima', 'product_cat', $product->get_id())) {
        // Si pertenece a "Materia Prima", no mostrar nada
        return '';
    }

    // Obtener los atributos globales
    $atributos = wc_get_attribute_taxonomies();
    $output = '<div class="atributos-circulos-container" style="display: flex; gap: 10px;">';

    foreach ($atributos as $atributo) {
        if ($atributo->attribute_type === 'image') { // Solo atributos de tipo imagen
            $taxonomy = 'pa_' . $atributo->attribute_name;
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => false,
            ]);

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $term_meta = get_term_meta($term->term_id, 'product_attribute_image', true);
                    $image_url = wp_get_attachment_url($term_meta);

                    if ($image_url) {
                        $output .= '<div class="atributo-circulo" style="width: 35px; height: 35px; border-radius: 50%; overflow: hidden; border: 2px solid #ccc; display: flex; align-items: center; justify-content: center;">';
                        $output .= '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($term->name) . '" style="width: 100%; height: 100%; object-fit: cover;" />';
                        $output .= '</div>';
                    }
                }
            }
        }
    }

    $output .= '</div>';

    return $output;
}
add_shortcode('mostrar_atributos_circulos', 'mostrar_atributos_circulos');
