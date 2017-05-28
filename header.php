<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="" content="IE=9,10,11" />
<meta charset="utf-8" />
<meta http-equiv="cache-control" content="no-transform" />
<meta http-equiv="cache-control" content="no-siteapp" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="apple-mobile-web-app-title" content="Art-Molec">
<meta name="application-name" content="Art-Molec">
<meta name="msapplication-TileColor" content="#00aba9">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">

<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
<title><?php 
	bloginfo('name');
	echo ' - '; 
	if ( is_home() ) { bloginfo('description');} 
	elseif ( is_category() ) { single_cat_title(); } 
	elseif ( is_single() || is_page() ) { single_post_title(); } 
	elseif ( is_search() ) { echo '搜索结果'; } 
	elseif ( is_404() ) { echo '页面未找到!'; } 
	else { wp_title('',true); } 
?>
</title>
<!–[if IE]>  
<script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>  
<![endif]–>
	<?php 
		if( !empty( get_option( 'code_css_style' ) ) ) { 
			echo '
					<style type="text/css" css-name="custom css">
						' . get_option( 'code_css_style' ) . '
					</style>' ;
		}
		if( get_option( 'show_left_sidebar' ) && get_option( 'show_right_sidebar' ) ){
			echo '
					<style type="text/css" css-name="special css for sidebar">
						@media screen and (max-width:1279px){
							.thumb{width:48%}
							.comment-form-comment{width:97%}
							.comment-form-author, .comment-form-email, .comment-form-url{width:97%}
						}
					</style>';
		}
		if( !empty( get_option( 'code_head_tag' ) ) ) { echo get_option( 'code_head_tag'); }
		wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>
<?php 
	echo '<main id="main" class="';
	if ( is_home() ){ echo 'index'; }
	else { echo 'another'; }
	echo '">';
?>
	<header class="header">
		<div class="header-wrap w60">
			<div class="logo">
				<a href="<?php bloginfo('siteurl'); ?>" title="<?php bloginfo('name'); echo ',' ; bloginfo('description'); ?>">
				<?php 
					if( is_home() && !empty( get_option( 'index_head_logo' ) ) ){
						echo '<img id="logo" src="' . get_option('index_head_logo') . '" alt="' . get_bloginfo('name') . '" />';
					} else {
						echo '<img id="logo" src="' . get_option('site_head_logo') . '" alt="' . get_bloginfo('name') . '" />';
					}
				?>
				</a>
			</div>
			<div class="topbar">
				<div class="tbar-top">
				
					<div class="site-desc" id="roll-pub">
					<?php 
						if( get_option( 'header_description_text' ) ){
							$site_desc = explode ( "\n", get_option( 'header_description_text' ) );
							echo '<ul>';
							foreach( $site_desc as $one_desc ){
								echo '<li>' . stripslashes( $one_desc ) . '</li>';
							};
							echo '</ul>';
						} 
					?>
					</div>
					
					<?php if( get_option( 'baidu_share_toggle' ) ):?>
					<div class="bdsharebuttonbox" id="header-bdshare">
					分享：
						<a href="#" class="bds_weixin fa fa-weixin" data-cmd="weixin" title="分享到微信"></a>
						<a href="#" class="bds_tsina fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a>
						<a href="#" class="bds_sqq fa fa-qq" data-cmd="sqq" title="发送给QQ好友"></a>
						<a href="#" class="bds_more fa fa-plus-square" data-cmd="more" title="点击查看更多分享链接"></a>
						<a href="javascript:;" id="search-link"><i class="fa fa-search" aria-hidden="true"></i></a>
					</div>
					<?php endif; ?>

				</div>
				<nav class="navbar">
					<?php 
						if(!get_option('baidu_share_toggle')){
							echo '<style type="text/css">.nav{text-align:right}</style>';
						}
						if(!get_option('baidu_share_toggle')){
							echo '<a href="javascript:;" id="search-link" class="pull-right"><i class="fa fa-search" aria-hidden="true"></i></a>';
						}
						wp_nav_menu(
							array(
								'theme_location' => 'headermenu',
								'menu_class' => 'nav',
								'depth' => 2
							)); 
					?>
				</nav>
				<div class="narrow-buttons">
					<a href="javascript:;" class="nav-button"><i class="fa fa-bars" aria-hidden="true"></i></a>
					<a href="javascript:;" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
				<?php if( get_option( 'baidu_share_toggle' ) ){ ?>
					<a href="javascript:;" class="share-button"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
				<?php }
					if( get_option( 'site_footbar_toggle' ) ){ ?>
					<a href="javascript:;" class="footer-button"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
				<?php } ?>
				</div>
			</div><!-- topbar -->
			
		</div><!-- header-wrap -->
	</header>