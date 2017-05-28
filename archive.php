<?php
	get_header();
?>
		<header class="article-header description-bg">
			<h1><?php
				if ( is_day() ) :
					echo '今日发布：'. get_the_date();
				elseif ( is_month() ) :
					echo '当月发布：'. get_the_date('Y年m月' );
				elseif ( is_year() ) :
					echo '全年发布：'. get_the_date('Y年');
				else :
					echo '文章归档';
				endif;
			?></h1>
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
			<div class="arc-description w60" id="position-sidebar">
				<div class="arc-avatar"><img src="<?php echo get_template_directory_uri(); ?>/images/avatar.png" alt="" /></div>
				<?php breadcrumb_output(); ?>
			</div>
			<div class="content-wrap">
				<div class="arc-posts ff w60 clear showsidebar">
				<ul class="arc-list" id="content">
					<?php while(have_posts()) : the_post(); ?>
						<li id="ajaxloader">
							<span><?php the_time('l'); ?><br /><?php the_time('j/n/Y'); ?></span>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</li>
					<?php 
						endwhile;						
					?>
				</ul></div>
			</div>
			<div id="pagin" class="ff"><?php next_posts_link('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i> 加载中...'); ?></div>
		</section>
<?php get_footer(); ?>
			