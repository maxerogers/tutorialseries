<?php
/**
 * typefocus Theme Customizer
 *
 * @package typefocus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function typefocus_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'typefocus_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function typefocus_customize_preview_js() {
    wp_enqueue_script( 'typefocus_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'typefocus_customize_preview_js' );

/**
 * Author Image addition using customizer
 */
function typefocus_author_image_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'typefocus_author_image',
        array(
            'title'     => 'TYPEFOCUS - Author Image',
            'priority'  => 201
        )
    );
    
    // disabling
    $wp_customize->add_setting(
        'typefocus_author_image_disabled',
        array(
            'default'      => 'false',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_author_image_disabled',
        array(
            'label'    => 'Disable TF author-image',
            'section'  => 'typefocus_author_image',
            'type'     => 'checkbox',
        )
    );    
    
    $wp_customize->add_setting(
        'typefocus_author_image',
        array(
            'default'      => '',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'typefocus_author_image',
            array(
                'label'    => 'Author Image',
                'settings' => 'typefocus_author_image',
                'section'  => 'typefocus_author_image'
            )
        )
    );
}
add_action( 'customize_register', 'typefocus_author_image_customizer' );

/**
 * Copyright addition using customizer
 */
function typefocus_copyright_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'typefocus_copyright',
        array(
            'title'     => 'TYPEFOCUS - Footer copyright',
            'priority'  => 202
        )
    );
    $wp_customize->add_setting(
        'typefocus_copyright',
        array(
            'default'      => 'All Rights Reserved',
            'sanitize_callback'  => 'typefocus_sanitize_copyright',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
            'typefocus_copyright',
            array(
                'label'    => 'Copyright Message',
                'section'  => 'typefocus_copyright',
                'type'       => 'text'
            )
    );
}
add_action( 'customize_register', 'typefocus_copyright_customizer' );
function typefocus_sanitize_copyright( $input ) {
    return strip_tags( stripslashes( $input ) );
}

/**
 * Header-Social icons using customizer
 */
function typefocus_social_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'typefocus_social',
        array(
            'title'     => 'TYPEFOCUS - Social Icons',
            'priority'  => 203
        )
    );
    
    // disabling
    $wp_customize->add_setting(
        'typefocus_social_disabled',
        array(
            'default'      => 'false',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_social_disabled',
        array(
            'label'    => 'Disable TF social-icons',
            'section'  => 'typefocus_social',
            'type'     => 'checkbox',
        )
    );
    
    // facebook
    $wp_customize->add_setting(
        'typefocus_social[tf_facebook]',
        array(
            'default'      => 'http://www.facebook.com',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_social[tf_facebook]',
        array(
            'label'    => 'Facebook URL',
            'section'  => 'typefocus_social',
            'type'     => 'text',
        )
    );
    
    //twitter
    $wp_customize->add_setting(
        'typefocus_social[tf_twitter]',
        array(
            'default'      => 'http://www.twitter.com',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_social[tf_twitter]',
        array(
            'label'    => 'Twitter URL',
            'section'  => 'typefocus_social',
            'type'     => 'text',
        )
    );
    
    //linkedin
    $wp_customize->add_setting(
        'typefocus_social[tf_linkedin]',
        array(
            'default'      => 'http://www.linkedin.com',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_social[tf_linkedin]',
        array(
            'label'    => 'linkedin URL',
            'section'  => 'typefocus_social',
            'type'     => 'text',
        )
    );
    
    //github
    $wp_customize->add_setting(
        'typefocus_social[tf_github]',
        array(
            'default'      => 'http://www.github.com',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_social[tf_github]',
        array(
            'label'    => 'github URL',
            'section'  => 'typefocus_social',
            'type'     => 'text',
        )
    );
    
    //google-plus
    $wp_customize->add_setting(
        'typefocus_social[tf_google-plus]',
        array(
            'default'      => 'http://www.google.com',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'typefocus_social[tf_google-plus]',
        array(
            'label'    => 'google-plus URL',
            'section'  => 'typefocus_social',
            'type'     => 'text',
        )
    );       
}
add_action( 'customize_register', 'typefocus_social_customizer' );

/**
 * Disclaimer addition using customizer
 */
function typefocus_disclaimer_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'typefocus_disclaimer',
        array(
            'title'     => 'TYPEFOCUS - Disclaimer',
            'priority'  => 202
        )
    );
    $wp_customize->add_setting(
        'typefocus_disclaimer',
        array(
            'default'      => 'All Rights Reserved',
            'sanitize_callback'  => 'typefocus_sanitize_disclaimer',
            'transport'    => 'postMessage'
        )
    );
    $wp_customize->add_control(
            'typefocus_disclaimer',
            array(
                'label'    => 'Disclaimer Message',
                'section'  => 'typefocus_disclaimer',
                'type'       => 'text'
            )
    );
}
add_action( 'customize_register', 'typefocus_disclaimer_customizer' );
function typefocus_sanitize_disclaimer( $input ) {
    return strip_tags( stripslashes( $input ) );
}