<?php 
/*
Template Name: 文章归档
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
	?>
<section class="content <?php had_sidebar_class(); ?>">
	<div class="content-wrap" id="position-sidebar">
		<div class="article-content w60 bf showsidebar">
			<?php breadcrumb_output(); ?>
			<span class="pull-right"><button class="btn white" id="arc-all-open" style="cursor:pointer">全部展开</button></span>
			<div class="single-content clear ff">
				<?php 
					$mon_cache = 0;
					$year_cache = 0;
					$echodiv = false;
					$args = array(
						'numberposts' => '-1',
						'orderby' => 'post_date',
						'order' => 'DESC'
					);
					$all_posts = get_posts($args);
					foreach ($all_posts as $post) { 
						$year = get_the_time('Y');
						$month = get_the_time('m');
						if($month != $mon_cache || $year != $year_cache){
							if($echodiv == true){echo '</ul></div>';}
							echo '<div id="arc-wrap"><div class="arc-title"><h2>' . $year . '年' . $month . '月</h2>';
							echo '</div><ul class="arc-content">';
							echo '<li><time>' . get_the_time('j日') . '</time><a href="' . get_the_permalink() . '" title="';
							echo get_the_title() . '">' . get_the_title() . '</a></li>';
							$mon_cache = $month;
							$year_cache = $year;
							$echodiv = true;
						} else {
							echo '<li><time>' . get_the_time('j日') . '</time><a href="' . get_the_permalink() . '" title="';
							echo get_the_title() . '">' . get_the_title() . '</a></li>';
						} 
					} ?>
					</ul>
			</div>
		</div>
	</div>
</section>

</article>
<?php get_footer(); ?>
			