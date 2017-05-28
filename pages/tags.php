<?php 
/*
*Template Name: 标签云
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
							.tag-box{ width:33% }
							@media screen and ( max-width:1100px ){
								.tag-box { width:50% }
							}
						</style>';
				}
			?>
			<section class="content <?php had_sidebar_class(); ?>">
				<div class="content-wrap" id="position-sidebar">
					<div class="w60 roo  showsidebar">
						<?php breadcrumb_output(); ?>
						<div class="clear tag-wrap">
							<?php 
								$args = array(
									'number' => '0',
									'orderby' =>'count',
									'order' => 'DESC'
									
								);
								foreach(get_tags($args) as $tags){
									$slug = $tags -> slug;
									$name = $tags -> name;
									$count = $tags -> count;
									$description = $tags -> description;
									echo '<div class="tag-box"><a href="/tag/' . $slug . '" title="' . $name .'">' . $name . '</a>';
									echo '<span class="tagmeta">×' . $count . '篇文章</span>';
									echo '<p>描述：</p>';
									if(!empty($description)){
										echo '<p title=' . $description . '>' . wp_trim_words($description, 50, '...') . '</p></div>';
									} else {
										echo '<p>暂无描述！</p></div>';
									}
								}
							?>
						</div>
					</div>
				</div>
			</section>
		</article>
	
	<?php get_footer();  ?>