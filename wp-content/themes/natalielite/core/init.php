<?php
if ( function_exists('natalielite_require_file') )
{
    // Load Classes
    natalielite_require_file( NATALIELITE_CORE_CLASSES . 'class-tgm-plugin-activation.php' );
    
    // Load Functions
    natalielite_require_file( NATALIELITE_CORE_PATH . 'customizer/natalielite_custom_controll.php' );
    natalielite_require_file( NATALIELITE_CORE_PATH . 'customizer/natalielite_customizer_settings.php' );
    natalielite_require_file( NATALIELITE_CORE_PATH . 'customizer/natalielite_customizer_style.php' );
}