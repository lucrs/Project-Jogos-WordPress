<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header('jogos');

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
<?php get_sidebar('left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php


						while (have_posts()) {

							the_post();
                            echo "<div class='test' style='color: gray;'>";
                            echo "<h2>"; the_title(); echo "</h2>";
                            echo "<div class='col-md-4 img'>";the_post_thumbnail(array(250,400)); echo "</div>";


							get_template_part('content-jogos', get_post_format());


							echo "\n\n";


							bootstrapBasicPagination();

							echo "\n\n";


							// If comments are open or we have at least one comment, load up the comment template
							if (comments_open() || '0' != get_comments_number()) {
								comments_template();
							}






						} //endwhile;
						?>
					</main>
				</div>
<?php get_sidebar('jogos'); ?>
<?php get_footer('jogos'); ?>
