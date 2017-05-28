<?php get_header(); ?>
	<style type="text/css">
		.f404{margin:0 auto}
		.f404-wrap{vertical-align:middle;text-align:center;color:#478BAB;font-family:"Microsoft JHenghei","Microsoft Yahei";margin:10rem auto 2rem;min-height:600px}
		.f404-title{font-size:10rem}
		.f404-description{font-size:3rem}
		.f404-content{font-size:1.2rem;line-height:2.5rem}
		.f404-content a{font-size:0.85rem;color:#f1f1f1;padding:2px 10px;background:#2e2e2e;margin:0 1rem}
		.f404-content a:hover{color:#fff;background:#000}
		.f404-content a:active{transform:scale(0.95,0.95)}
	</style>
	<div class="cat-description description-bg"><span class="aligncenter w60"><?php breadcrumb_output(); ?></span></div>
	<?php 
		if( get_option( 'show_left_sidebar' ) ){
			get_sidebar('left');
		}
		if( get_option( 'show_right_sidebar' ) ){
			get_sidebar('right');
		} 
	?>
	<section class="f404 <?php had_sidebar_class(); ?>" id="position-sidebar">
		<div class="f404-wrap w60">
			<p class="f404-title">404</p>
			<p class="f404-description">啊哦！您访问的页面穿越到异次元啦...</p>
			<p class="f404-content">Oops! The Page You Are Requesting Is Not Found...</p>
			<p class="f404-content">您可以尝试</p>
			<p class="f404-content"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); echo ' | '; bloginfo('description') ?>">返回首页</a><a href="javascript:void(0);" class="open-search-screen" title="打开搜索窗口">进行搜索</a></p>
		</div>
	</section>
<?php get_footer(); ?>