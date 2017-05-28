<?php
/*
 Template Name: 站点地图
*/
	get_header();
?>
<style type="text/css">
	.article-content a { color:#666 }
	.article-content h2 { margin:0.5rem 1rem;font-size:1.2rem;text-align:center }
	.article-content h3 { margin:0.5rem 2rem;font-size:1rem;border-bottom:1px dashed #666 }
	.article-content ul { margin-left:2em;list-style:circle inside; }
	.article-content li { line-height:1.8rem }
	.tagbtn { margin:1rem 2rem }
	.tagbtn a { margin:0 0.5rem }
</style>
		<article class="article">
			<header class="article-header description-bg">
				<h1><?php the_title(); echo ' For '; bloginfo('name'); ?></h1>
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
						<div class="map-article clear">
						<h2>本站内容索引</h2>
							<h3>文章</h3>
							<ul>
								<?php 
									$sitemap_posts = get_posts('numberposts=-1&orderby=post_date&order=DESC');
									foreach ( $sitemap_posts as $sitemap_post ): 
									$sid = $sitemap_post -> ID;
								?>
								<li><a href="<?php echo get_the_permalink($sid); ?>" title="<?php echo get_the_title($sid); ?>"><?php echo get_the_title($sid); ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="map-category">
							<h3>目录</h3><ul>
							<?php 
								$args = array(
									'show_option_all' => '',
									'orderby' => 'ID',
									'order' => 'ASC',
									'show_count' => '1',
									'title_li' => '0',
									'show_option_none' => '暂无任何分类'
								);
								wp_list_categories($args);
							 ?>
							 </ul>
						</div>
						<div class="map-tags">
							<h3>标签</h3>
							<div class="tagbtn">
								<?php 
									wp_tag_cloud('smallest=0.9&largest=0.9&unit=rem');
								 ?>
							</div>
						</div>
						<div class="map-page">
							<h3>页面</h3>
							<ul>
								<?php 
									$sitemap_pages = get_pages();
									foreach ( $sitemap_pages as $sitemap_page ):
										$link = $sitemap_page -> post_name;
										$title = $sitemap_page -> post_title;
										echo '<li><a href="/' . $link . '" title="' . $title . '">' . $title . '</a></li>';
									endforeach; ?>
							</ul>
							<h2><a href="<?php bloginfo('url'); ?>" 
							title="<?php bloginfo('name'); echo '&nbsp;|&nbsp;首页'; ?>">访问网站首页</a></h2>
						</div>
					</div>
				</div>
			</section>
		</article>
	
	<?php get_footer(); ?>

