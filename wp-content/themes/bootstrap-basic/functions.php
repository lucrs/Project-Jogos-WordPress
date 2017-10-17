<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
    $content_width = 1170;
}


if (!function_exists('bootstrapBasicSetup')) {
    /**
     * Setup theme and register support wp features.
     */
    function bootstrapBasicSetup() 
    {
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * 
         * copy from underscores theme
         */
        load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

        // add theme support title-tag
        add_theme_support('title-tag');

        // add theme support post and comment automatic feed links
        add_theme_support('automatic-feed-links');

        // enable support for post thumbnail or feature image on posts and pages
        add_theme_support('post-thumbnails');

        // allow the use of html5 markup
        // @link https://codex.wordpress.org/Theme_Markup
        add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

        // add support menu
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'bootstrap-basic'),
        ));

        // add post formats support
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // add support custom background
        add_theme_support(
            'custom-background', 
            apply_filters(
                'bootstrap_basic_custom_background_args', 
                array(
                    'default-color' => 'ffffff', 
                    'default-image' => ''
                )
            )
        );
    }// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');


if (!function_exists('bootstrapBasicWidgetsInit')) {
    /**
     * Register widget areas
     */
    function bootstrapBasicWidgetsInit() 
    {
        register_sidebar(array(
            'name' => __('Sidebar right', 'bootstrap-basic'),
            'id' => 'sidebar-right',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        ));


    }// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');

function sideBarJogos()
{
    register_sidebar(array(
        'name' => __('Sidebar Jogos'),
        'id' => 'sidebar-jogos',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));


}// bootstrapBasicWidgetsInit

add_action('widgets_init', 'sideBarJogos');





if (!function_exists('bootstrapBasicEnqueueScripts')) {
    /**
     * Enqueue scripts & styles
     */
    function bootstrapBasicEnqueueScripts() 
    {
        global $wp_scripts;

        wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7');
        wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '3.3.7');
        wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');
        wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');

        wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '3.3.1');
        wp_register_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js', array(), '1.4.2');
        $wp_scripts->add_data('respond-script', 'conditional', 'lt IE 9');
        wp_enqueue_script('respond-script');
        wp_register_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.min.js', array(), '3.7.3');
        $wp_scripts->add_data('html5-shiv-script', 'conditional', 'lte IE 9');
        wp_enqueue_script('html5-shiv-script');
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array(), '3.3.7', true);
        wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), false, true);
        wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
    }// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


/**
 * admin page displaying help.
 */
if (is_admin()) {
    require get_template_directory() . '/inc/BootstrapBasicAdminHelp.php';
    $bbsc_adminhelp = new BootstrapBasicAdminHelp();
    add_action('admin_menu', array($bbsc_adminhelp, 'themeHelpMenu'));
    unset($bbsc_adminhelp);
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';


/**
 * --------------------------------------------------------------
 * Criação de Custom Post Types Blog do Lucas
 * --------------------------------------------------------------
 */

function bootstrap_bdl_type_jogos(){
    $labels = array(

        'name' => "Jogos",
        'singular_name' => "Jogo",
        'add_new'=> "Adicionar Novo Jogo",
        'add_new_label' => "Adicionar Novo Jogo",
        'all_item' => "Todos os Jogos",
        'add_new_item'=> "Adicionar Novo Jogo",
        'edit_item' => "Editar Jogo",
        'new_item' =>  "Novo Jogo",
        'view_item' => "Visualizar Jogo",
        'search_item' => "Procurar Jogo",
        'not_found' => "Nenhum Jogo Encontrado",
        'not_found_in_trash' => "Nenhum Jogo Na Lixeira"
    );
    $args = array(
        'labels'=> $labels,
        'public'=> true,
        'has_archive'=> true,
        'publicly_queryable'=> true,
        'query_var'=> true,
        'rewrite'=> true,
        'capability_type'=> 'post',
        'supports'=> array(
            'title','editor','thumbnail','excerpt,custom-field','page-attributes'
        ),
        'menu_position'=> 5,
        'exclude_from_search'=>false

    );

    register_post_type('jogos',$args);

}

add_action('init','bootstrap_bdl_type_jogos');

function bootstrap_bgl_taxonomias()
{
    //t Taxonomia Hierarquia - Genêro

    $labels = array(
        'name' => "Gêneros",
        'singular_name' => "Gênero",
        'search_items' => "Procurar Gênero",
        'all_items' => "Todos os Gêneros",
        'parent_item' => "Gênero Pai",
        'parent_item_colon' => "Gênero Pai",
        'edit_item' => "Editar Gênero",
        'update_item' => "Atualizar Gênero",
        'add_new_item' => "Adicionar Novo Gênero",
        'new_item_name' => "Novo Gênero",
        'menu_name' => "Gênero"
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array("slug" => "genero")
    );
    register_taxonomy('genero', 'jogos', $args);
}


add_action('init','bootstrap_bgl_taxonomias');

function bootstrap_bgl_taxonomias_platform()
{
    //t Taxonomia Hierarquia - Genêro

    $labels = array(
        'name' => "Plataformas",
        'singular_name' => "Plataforma",
        'search_items' => "Procurar Plataforma",
        'all_items' => "Todos os Gêneros",
        'parent_item' => "Plataforma Pai",
        'parent_item_colon' => "Plataforma Pai",
        'edit_item' => "Editar Plataforma",
        'update_item' => "Atualizar Plataforma",
        'add_new_item' => "Adicionar Novo Plataforma",
        'new_item_name' => "Novo Plataforma",
        'menu_name' => "Plataforma"
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array("slug" => "plataforma")
    );
    register_taxonomy('plataforma', 'jogos', $args);
}


add_action('init','bootstrap_bgl_taxonomias_platform');

// Register Navigation Menus

