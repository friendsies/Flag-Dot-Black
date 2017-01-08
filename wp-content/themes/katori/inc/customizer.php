<?php
/**
 * Katori Theme Customizer
 *
 * @package Katori
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function katori_customize_register( $wp_customize ) {

  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  //Add a class for titles
    class Katori_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
      <h3 style="border: 1px solid #ff4040; color: #ff4040; padding: 5px; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

  //___General___//
    $wp_customize->add_section(
        'katori_general',
        array(
            'title' => __('General', 'katori'),
            'priority' => 9,
        )
    );
  //Logo Upload
  $wp_customize->add_setting(
    'katori_site_logo',
    array(
      'default-image' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_site_logo',
            array(
               'label'      => __( 'Upload your logo', 'katori' ),
               'type'       => 'image',
               'section'    => 'katori_general',
               'settings'   => 'katori_site_logo',
               'priority'   => 9,
            )
        )
    );
  //Favicon Upload
  $wp_customize->add_setting(
    'katori_site_favicon',
    array(
      'default-image' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'katori' ),
                'type'       => 'image',
               'section'        => 'katori_general',
               'settings'       => 'katori_site_favicon',
               'priority' => 10,
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'katori_apple_touch_144',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_general',
               'settings'       => 'katori_apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'katori_apple_touch_114',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_general',
               'settings'       => 'katori_apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'katori_apple_touch_72',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_general',
               'settings'       => 'katori_apple_touch_72',
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'katori_apple_touch_57',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_general',
               'settings'       => 'katori_apple_touch_57',
               'priority'       => 14,
            )
        )
    );

  //___FRONT PAGE PANEL___//
  $wp_customize->add_panel( 'katori_fp_panel', array(
      'priority'       => 10,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __('Front page config', 'katori'),
      'description'    => '',
  ) );

    //___Slider___//
    $wp_customize->add_section(
        'katori_slider',
        array(
            'title' => __('Slider', 'katori'),
            'priority' => 10,
            'panel'  => 'katori_fp_panel',
        )
    );
    //Display
    $wp_customize->add_setting(
        'katori_slider_display',
        array(
            'sanitize_callback' => 'katori_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'katori_slider_display',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the slider.', 'katori'),
            'section' => 'katori_slider',
            'priority'       => 10,
        )
    );
    //Display random slides
    $wp_customize->add_setting(
        'katori_slider_random',
        array(
            'sanitize_callback' => 'katori_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'katori_slider_random',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display random slides.', 'katori'),
            'section' => 'katori_slider',
            'priority'       => 11,
        )
    );
    //Image 1
    $wp_customize->add_setting(
        'katori_slider_image_1',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_1',
            array(
               'label'          => __( 'Upload your first image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_1',
               'priority'       => 12,
            )
        )
    );
    //Image 2
    $wp_customize->add_setting(
        'katori_slider_image_2',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_2',
            array(
               'label'          => __( 'Upload your second image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_2',
               'priority'       => 13,
            )
        )
    );
    //Image 3
    $wp_customize->add_setting(
        'katori_slider_image_3',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_3',
            array(
               'label'          => __( 'Upload your third image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_3',
               'priority'       => 14,
            )
        )
    );        
    //Image 4
    $wp_customize->add_setting(
        'katori_slider_image_4',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_4',
            array(
               'label'          => __( 'Upload your fourth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_4',
               'priority'       => 15,
            )
        )
    );
    //Image 5
    $wp_customize->add_setting(
        'katori_slider_image_5',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_5',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_5',
               'priority'       => 16,
            )
        )
    );
    //Image 6
    $wp_customize->add_setting(
        'katori_slider_image_6',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_6',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_6',
               'priority'       => 17,
            )
        )
    );
    //Image 7
    $wp_customize->add_setting(
        'katori_slider_image_7',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_7',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_7',
               'priority'       => 18,
            )
        )
    );
    //Image 8
    $wp_customize->add_setting(
        'katori_slider_image_8',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_8',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_8',
               'priority'       => 19,
            )
        )
    );
    //Image 9
    $wp_customize->add_setting(
        'katori_slider_image_9',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_9',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_9',
               'priority'       => 20,
            )
        )
    );
    //Image 10
    $wp_customize->add_setting(
        'katori_slider_image_10',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_slider_image_10',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'katori' ),
               'type'           => 'image',
               'section'        => 'katori_slider',
               'settings'       => 'katori_slider_image_10',
               'priority'       => 21,
            )
        )
    );

    //___Welcome___//
      $wp_customize->add_section(
          'katori_welcome',
          array(
              'title' => __('Welcome section', 'katori'),
              'priority' => 11,
              'panel'  => 'katori_fp_panel',
          )
      );
    //Photo
    $wp_customize->add_setting(
      'katori_wcm_photo',
      array(
        'default-image' => '',
        'sanitize_callback' => 'esc_url_raw',
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'katori_wcm_photo',
            array(
               'label'          => __( 'Upload your photo', 'katori' ),
               'type'       => 'image',
               'section'        => 'katori_welcome',
               'settings'       => 'katori_wcm_photo',
               'priority' => 9,
            )
        )
    );
     //Welcome title
    $wp_customize->add_setting(
        'katori_wcm_title',
        array(
            'default' => '',
            'sanitize_callback' => 'katori_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'katori_wcm_title',
        array(
            'label' => __( 'Enter the title for the welcome area', 'katori' ),
            'section' => 'katori_welcome',
            'type' => 'text',
            'priority' => 10
        )
    );
    //Textarea
    $wp_customize->add_setting(
        'katori_wcm_textarea',
        array(
            'default' => '',
            'sanitize_callback' => 'katori_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'katori_wcm_textarea',
        array(
            'label' => __( 'Enter a bit of info about yourself. It will be displayed in the welcome area', 'katori' ),
            'section' => 'katori_welcome',
            'type' => 'textarea',
            'priority' => 11
        )
    );
    //Border
    $wp_customize->add_setting(
        'katori_wcm_border',
        array(
            'sanitize_callback' => 'katori_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'katori_wcm_border',
        array(
            'type'        => 'checkbox',
            'label'       => __('Check this box to hide the border', 'katori'),
            'section'     => 'katori_welcome',
            'priority'    => 12
        )
    );
    //Welcome area padding
    $wp_customize->add_setting(
        'katori_wcm_padding',
        array(
            'sanitize_callback' => 'absint',
            'default' => '60',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_wcm_padding', array(
        'type'        => 'number',
        'priority'    => 10,
        'section'     => 'katori_welcome',
        'label'       => __('Welcome area padding', 'katori'),
        'description' => __('Here you can change the padding. Values are in px', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 100,
            'step'  => 5,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );


  //Portfolio area
    $wp_customize->add_section(
        'katori_portfolio',
        array(
            'title' => __('Portfolio section', 'katori'),
            'priority' => 12,
            'panel'  => 'katori_fp_panel',
        )
    );
   //Portfolio title
  $wp_customize->add_setting(
      'katori_portfolio_title',
      array(
          'default' => '',
          'sanitize_callback' => 'katori_sanitize_text',
      )
  );
  $wp_customize->add_control(
      'katori_portfolio_title',
      array(
          'label' => __( 'Enter the title for your portfolio section', 'katori' ),
          'section' => 'katori_portfolio',
          'type' => 'text',
          'priority' => 10
      )
  );
  //___Colors___//
  //Primary
  $wp_customize->add_setting(
    'katori_primary_color',
    array(
      'default'           => '#FF4040',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'         => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_primary_color',
      array(
        'label' => __('Primary color', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_primary_color',
        'priority' => 11
      )
    )
  );
  //Secondary
  $wp_customize->add_setting(
    'katori_secondary_color',
    array(
      'default'           => '#292c32',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'         => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_secondary_color',
      array(
        'label' => __('Secondary color', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_secondary_color',
        'priority' => 12
      )
    )
  );
  //Portfolio
  $wp_customize->add_setting(
    'katori_portfolio_color',
    array(
      'default'           => '#FFB340',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'         => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_portfolio_color',
      array(
        'label' => __('Portfolio color', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_portfolio_color',
        'priority' => 13
      )
    )
  );    
  //Site title
  $wp_customize->add_setting(
    'katori_site_title_color',
    array(
      'default'     => '#FF4040',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'     => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_site_title_color',
      array(
        'label' => __('Site title', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_site_title_color',
        'priority' => 13
      )
    )
  );
  //Site description
  $wp_customize->add_setting(
    'katori_site_desc_color',
    array(
      'default'     => '#fff',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'     => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_site_desc_color',
      array(
        'label' => __('Site description', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_site_desc_color',
        'priority' => 14
      )
    )
  );
  //Entry title
  $wp_customize->add_setting(
    'katori_entry_title_color',
    array(
      'default'     => '#505050',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'     => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_entry_title_color',
      array(
        'label' => __('Entry title', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_entry_title_color',
        'priority' => 15
      )
    )
  );  
  //Body
  $wp_customize->add_setting(
    'katori_body_text_color',
    array(
      'default'     => '#838383',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport'     => 'postMessage'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'katori_body_text_color',
      array(
        'label' => __('Text', 'katori'),
        'section' => 'colors',
        'settings' => 'katori_body_text_color',
        'priority' => 16
      )
    )
  );
  //___Fonts___//
    $wp_customize->add_section(
        'katori_typography',
        array(
            'title' => __('Fonts', 'katori' ),
            'priority' => 15,
        )
    );
  $font_choices = 
    array(
      'Fira Sans:400,700,400italic,700italic' => 'Fira Sans',
      'Merriweather:900,700' => 'Merriweather',
      'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',   
      'Droid Sans:400,700' => 'Droid Sans',
      'Lato:400,700,400italic,700italic' => 'Lato',
      'Arvo:400,700,400italic,700italic' => 'Arvo',
      'Lora:400,700,400italic,700italic' => 'Lora',
      'PT Sans:400,700,400italic,700italic' => 'PT Sans',
      'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
      'Arimo:400,700,400italic,700italic' => 'Arimo',
      'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
      'Bitter:400,700,400italic' => 'Bitter',
      'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
      'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
      'Roboto:400,400italic,700,700italic' => 'Roboto',
      'Oswald:400,700' => 'Oswald',
      'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
      'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
      'Raleway:400,700' => 'Raleway',
      'Roboto Slab:400,700' => 'Roboto Slab',
      'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
      'Rokkitt:400' => 'Rokkitt',
    );
  
  $wp_customize->add_setting(
    'katori_headings_fonts',
    array(
      'sanitize_callback' => 'katori_sanitize_fonts',
    )
  );
  
  $wp_customize->add_control(
    'katori_headings_fonts',
    array(
      'type' => 'select',
      'priority'    => 9,
      'label' => __('Select your desired font for the headings.', 'katori'),
      'section' => 'katori_typography',
      'choices' => $font_choices
    )
  );
  
  $wp_customize->add_setting(
    'katori_body_fonts',
    array(
      'sanitize_callback' => 'katori_sanitize_fonts',
    )
  );
  
  $wp_customize->add_control(
    'katori_body_fonts',
    array(
      'type' => 'select',
      'priority'    => 10,
      'label' => __('Select your desired font for the body.', 'katori'),
      'section' => 'katori_typography',
      'choices' => $font_choices
    )
  );

    //H1 size
    $wp_customize->add_setting(
        'katori_h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_h1_size', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'katori_typography',
        'label'       => __('H1 font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'katori_h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_h2_size', array(
        'type'        => 'number',
        'priority'    => 12,
        'section'     => 'katori_typography',
        'label'       => __('H2 font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'katori_h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_h3_size', array(
        'type'        => 'number',
        'priority'    => 13,
        'section'     => 'katori_typography',
        'label'       => __('H3 font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //h4 size
    $wp_customize->add_setting(
        'katori_h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_h4_size', array(
        'type'        => 'number',
        'priority'    => 14,
        'section'     => 'katori_typography',
        'label'       => __('H4 font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //h5 size
    $wp_customize->add_setting(
        'katori_h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_h5_size', array(
        'type'        => 'number',
        'priority'    => 15,
        'section'     => 'katori_typography',
        'label'       => __('H5 font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //h6 size
    $wp_customize->add_setting(
        'katori_h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_h6_size', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'katori_typography',
        'label'       => __('H6 font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );
    //body
    $wp_customize->add_setting(
        'katori_body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'katori_body_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'katori_typography',
        'label'       => __('Body font size', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 15px;',
        ),
    ) );    
    //___Blog options___//
      $wp_customize->add_section(
          'katori_options',
          array(
              'title' => __('Blog options', 'katori'),
              'priority' => 13,
          )
      );
    //Full content posts
    $wp_customize->add_setting(
      'katori_full_content',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_full_content',
      array(
        'type' => 'checkbox',
        'label' => __('Check this box to display the full content of the posts on the home page.', 'katori'),
        'section' => 'katori_options',
        'priority' => 10,
      )
    );
    //Excerpt
    $wp_customize->add_setting(
        'katori_exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )       
    );
    $wp_customize->add_control( 'katori_exc_lenght', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'katori_options',
        'label'       => __('Excerpt lenght', 'katori'),
        'description' => __('Choose your excerpt length here. Default: 55 words', 'katori'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;',
        ),
    ) );
    //Index post info title
    $wp_customize->add_setting('katori_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new katori_Info( $wp_customize, 'info_index', array(
        'label' => __('Index post info', 'katori'),
        'section' => 'katori_options',
        'settings' => 'katori_options[info]',
        'priority' => 12
        ) )
    );    
    //Hide date
    $wp_customize->add_setting(
      'katori_date',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_date',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post date on index?', 'katori'),
        'section' => 'katori_options',
        'priority' => 13,
      )
    );
    //Hide categories
    $wp_customize->add_setting(
      'katori_cats',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_cats',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post categories on index?', 'katori'),
        'section' => 'katori_options',
        'priority' => 14,
      )
    );
    //Hide tags
    $wp_customize->add_setting(
      'katori_tags',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_tags',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post tags on index?', 'katori'),
        'section' => 'katori_options',
        'priority' => 15,
      )
    );
    //Hide comments
    $wp_customize->add_setting(
      'katori_comm',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_comm',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post comments on index?', 'katori'),
        'section' => 'katori_options',
        'priority' => 16,
      )
    );
    //Single post info title
    $wp_customize->add_setting('katori_options[info]', array(
            'type' => 'info_control',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new katori_Info( $wp_customize, 'info_single', array(
        'label' => __('Single post info', 'katori'),
        'section' => 'katori_options',
        'settings' => 'katori_options[info]',
        'priority' => 17
        ) )
    );
    //Hide date
    $wp_customize->add_setting(
      'katori_single_date',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_single_date',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post date &amp; author on single posts?', 'katori'),
        'section' => 'katori_options',
        'priority' => 18,
      )
    );
    //Hide categories
    $wp_customize->add_setting(
      'katori_single_cats',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_single_cats',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post categories on single posts?', 'katori'),
        'section' => 'katori_options',
        'priority' => 19,
      )
    );
    //Hide tags
    $wp_customize->add_setting(
      'katori_single_tags',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_single_tags',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post tags on single posts?', 'katori'),
        'section' => 'katori_options',
        'priority' => 20,
      )
    );
    //Single post info title
    $wp_customize->add_setting('katori_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new katori_Info( $wp_customize, 'thumbs', array(
        'label' => __('Featured images', 'katori'),
        'section' => 'katori_options',
        'settings' => 'katori_options[info]',
        'priority' => 21
        ) )
    );
    //Hide thumb index
    $wp_customize->add_setting(
      'katori_thumb_index',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_thumb_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide featured images on index?', 'katori'),
        'section' => 'katori_options',
        'priority' => 22,
      )
    );    
    //Hide thumb single posts
    $wp_customize->add_setting(
      'katori_thumb_single_post',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_thumb_single_post',
      array(
        'type' => 'checkbox',
        'label' => __('Hide featured image on single posts?', 'katori'),
        'section' => 'katori_options',
        'priority' => 23,
      )
    );
    //Hide thumb single pages
    $wp_customize->add_setting(
      'katori_thumb_single_page',
      array(
        'sanitize_callback' => 'katori_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'katori_thumb_single_page',
      array(
        'type' => 'checkbox',
        'label' => __('Hide featured image on single pages?', 'katori'),
        'section' => 'katori_options',
        'priority' => 24,
      )
    ); 
}
add_action( 'customize_register', 'katori_customize_register' );


//Text
function katori_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Fonts
function katori_sanitize_fonts( $input ) {
    $valid = array(
      'Fira Sans:400,700,400italic,700italic' => 'Fira Sans',
      'Merriweather:900,700' => 'Merriweather',
      'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',   
      'Droid Sans:400,700' => 'Droid Sans',
      'Lato:400,700,400italic,700italic' => 'Lato',
      'Arvo:400,700,400italic,700italic' => 'Arvo',
      'Lora:400,700,400italic,700italic' => 'Lora',
      'PT Sans:400,700,400italic,700italic' => 'PT Sans',
      'PT+Sans+Narrow:400,700' => 'PT Sans Narrow',
      'Arimo:400,700,400italic,700italic' => 'Arimo',
      'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
      'Bitter:400,700,400italic' => 'Bitter',
      'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
      'Open+Sans:400italic,700italic,400,700' => 'Open Sans',
      'Roboto:400,400italic,700,700italic' => 'Roboto',
      'Oswald:400,700' => 'Oswald',
      'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
      'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
      'Raleway:400,700' => 'Raleway',
      'Roboto Slab:400,700' => 'Roboto Slab',
      'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
      'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Checkboxes
function katori_sanitize_checkbox( $input ) {
  if ( $input == 1 ) {
    return 1;
  } else {
    return '';
  }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function katori_customize_preview_js() {
  wp_enqueue_script( 'katori_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'katori_customize_preview_js' );
