<?php 
	get_header();
	while(have_posts()): the_post();
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
			?>
		<section class="content <?php had_sidebar_class(); ?>">
			<div class="content-wrap" id="position-sidebar">
				<div class="article-content w60 bf showsidebar">
					<?php breadcrumb_output(); ?>
					<div class="single-content clear ff">
						<?php 
							the_content();
							wp_link_pages('before=<div class="post-paga">&after=</div>&link_before=<span class=pagalink>&link_after=</span>'); 
						?>
					</div>
				</div><!-- article-content -->
			</div><!-- content-wrap -->
	<?php endwhile; ?>
	<?php comments_template(); ?>
		</section>
	</article>
	<?php get_footer(); ?>