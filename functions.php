<?php
/**
 * Encolar estilos del tema padre y del tema hijo
 */
function limo_child_enqueue_styles() {
    // 1. Cargamos el CSS del tema padre
    wp_enqueue_style( 'limoservice-parent-style', get_template_directory_uri() . '/style.css' );

    // 2. Cargamos el CSS del tema hijo asegurándonos de que cargue DESPUÉS del padre
    wp_enqueue_style( 'limoservice-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'limoservice-parent-style' ), // Esto dice: "no cargues el hijo hasta que el padre esté listo"
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'limo_child_enqueue_styles', 20 ); // El '20' da prioridad al hijo

