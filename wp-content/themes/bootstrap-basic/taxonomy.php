<?php 
/**
 * Displaying archive page (category, tag, archives post, author's post)
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
						<?php if (have_posts()) { ?> 

						<header class="page-header">
							<h1 class="page-title">
								<?php single_tag_title();?>
							</h1>
							
							<?php
							// Show an optional term description.
							$term_description = term_description();
							if (!empty($term_description)) {
								printf('<div class="taxonomy-description">%s</div>', $term_description);
							} //endif;
							?>
						</header><!-- .page-header -->
						
						<?php 
						/* Start the Loop */
						while (have_posts()) {
                            echo "<div class='test'>";

							the_post();
                            echo "<div class='test'>";
                            echo "<div class='col-md-4 img'>";the_post_thumbnail(array(250,400)); echo "</div>";

							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */


							get_template_part('content-jogos', get_post_format());
                            echo "</div>";
						} //endwhile; 
						?> 

						<?php bootstrapBasicPagination(); ?> 

						<?php } else { ?> 

						<?php get_template_part('no-results', 'archive'); ?> 

						<?php } //endif; ?> 
					</main>
				</div>
<?php get_footer('jogos'); ?>