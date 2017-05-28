<?php 
/*
*Template Name:友情链接
*/
	get_header();
?>
		<article class="article">
			<header class="article-header description-bg">
				<h1><?php the_title(); ?></h1>
			</header>
			<?php 
				if( get_option( 'show_left_sidebar' ) ){
					get_sidebar('left');
				}
				if( get_option( 'show_right_sidebar' ) ){
					get_sidebar('right');
				} 
				if( get_option( 'show_left_sidebar' ) && get_option( 'show_right_sidebar' ) ){
					echo '
						<style type="text/css">
							@media screen and ( max-width:1400px ){
								.rollnav li { width:25% }
							}
							@media screen and ( max-width:1200px ){
								.rollnav li { width:33% }
							}
						</style>';
				}
			?>
			<section class="content <?php had_sidebar_class(); ?>">
				<div class="content-wrap" id="position-sidebar">
					<div class="w60 roo showsidebar">
						<?php breadcrumb_output(); ?>
						<div class="clear ff">
							<div class="blogroll">
								<?php 
									wp_nav_menu(
										array(
											'theme_location' => 'blogroll',
											'menu_class' => 'rollnav',
											'walker' => new description_walker()
									));
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</article>
	
	<?php get_footer(); ?>