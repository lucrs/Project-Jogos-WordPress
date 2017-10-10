<?php
/**
 * The theme header
 *
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
			<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
		<![endif]-->





		<div class="container page-container">
			<?php do_action('before'); ?>
            <header id="header">

			</header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php
                            $pages = get_pages(['parent' => 0]);
                            foreach ($pages as $p):
                                $childPages = get_pages(['child_of' => $p->ID]);
                                if(!count($childPages)) {
                                    $link = get_page_link($p->ID);
                                    $title = $p->post_title;
                                    printf('<li><a href="%s">%s</a></li>', $link, $title);
                                }else{
                                    echo "<li>";
                                    printf('<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                                    aria-haspopup="true" aria-expanded="false">%s<span class="caret"></span></a>',$p->post_title);
                                    echo '<ul class="dropdown-menu">';
                                    foreach ($childPages as $child) {
                                        $link = get_page_link($child->ID);
                                        $title = $child->post_title;
                                        printf('<li><a href="%s">%s</a></li>', $link, $title);
                                    }
                                    echo "</li></ul>";
                                }
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>


			<div id="content" class="row row-with-vspace site-content">
