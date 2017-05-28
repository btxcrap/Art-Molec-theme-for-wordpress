<?php 
	get_header();
	if ( !have_posts() ){
?>
<article class="content" id="content">
	<div class="cat-description search-title description-bg"><span class="aligncenter w60"><?php breadcrumb_output(); ?></span></div>
	<?php 
		if( get_option( 'show_left_sidebar' ) ){
			get_sidebar('left');
		}
		if( get_option( 'show_right_sidebar' ) ){
			get_sidebar('right');
		} 
	?>
	<section class="content <?php had_sidebar_class(); ?>">
		<h3 class="w60 margincenter">啊欧~没有与“<?php echo get_search_query(); ?>”相关的东西…您可以尝试下面的关键词 或者 <a href="javascript:void(0);" class="open-search-screen">重新搜索</a>：</h3>
		<div class="search-tag w60 aligncenter">
			<?php wp_tag_cloud('smallest=0.9&largest=0.9&unit=rem&number=14&orderby=count&order=DESC'); ?>
			<a href="/tag" target="_blank">更多&raquo;</a>
		</div>
		<h3 class="w60 margincenter">为您推荐以下内容：</h3>
		<div class="w60 aligncenter search-card">
			<?php 
			$all_posts = get_posts('numberposts=12&orderby=post_date&order=DESC');
			foreach ($all_posts as $post): ?>
			<div class="search-post pull-left">
				<div class="post-box">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php get_art_thumb(get_the_ID(), 300, 180,'search-thumb'); ?>
						</a>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</div><!-- post-box -->
			</div><!-- search-post -->
			<?php endforeach; ?>
		</div>
	</section>
</article>
<?php 
	}else{
		include( 'category.php' );
	}
	get_footer();
?>