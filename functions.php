<?php 
	include ('include/theme-options.php');
	//禁用响应式图片功能
	add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );
	add_action('after_setup_theme','art_molec_setup');
	function art_molec_setup(){
		//移除head冗余代码
		remove_action('wp_head','wp_generator');
		remove_action( 'wp_head', 'rsd_link' ); 
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_resource_hints', 2  );
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'start_post_rel_link');
		remove_action('wp_head', 'parent_post_rel_link');
		remove_action('wp_head', 'adjacent_posts_rel_link'); 
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		function disable_emojis_tinymce( $plugins ) {
			if ( is_array( $plugins ) ) {
				return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
				return array();
			}
		}
		remove_filter('the_content', 'wptexturize');
		add_filter('show_admin_bar' , '__return_false');
		add_filter('json_enabled', '__return_false' );
		add_filter('json_jsonp_enabled', '__return_false' );
		add_filter('rest_enabled', '__return_false');
		add_filter('rest_jsonp_enabled', '__return_false');
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
		update_option( 'image_default_align', 'center' );
		update_option( 'image_default_link_type', 'file' );
		update_option( 'image_default_size', 'full' );
		//移除自带的某些鸡肋小工具并且注册主题小工具
		function art_widget_register(){
			unregister_widget('WP_Widget_RSS');
			unregister_widget('WP_Widget_Calendar');
			unregister_widget('WP_Widget_Tag_Cloud');
			unregister_widget('WP_Widget_Recent_Posts');
			unregister_widget('WP_Widget_Recent_Comments');
			unregister_widget('WP_Widget_Pages');
		}
		add_action( 'widgets_init', 'art_widget_register',10 );
		//让分类描述、链接描述、备注、用户描述支持HTML代码
		foreach (array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description') as $filter) {
			remove_filter($filter, 'wp_filter_kses');
		}
		foreach (array('term_description', 'link_description', 'link_notes', 'user_description') as $filter) {
			remove_filter($filter, 'wp_kses_data');
		}
		//小工具标题支持font-icon小图标代码
		function art_widget_icon( $title ){
			$title = preg_replace('/\[(.*?)\]/','<span class="widget-icon"><i class="fa fa-$1" aria-hidden="true"></i></span> ', $title);
			return $title;
		}
		add_filter('widget_title', 'art_widget_icon');
		//开启文章格式支持
		add_theme_support('post-formats' , array(
			'standard',
			'image',
			'aside',
			'gallery'
		));
		//注册菜单
		if (function_exists('register_nav_menus')) {
			register_nav_menus(array(
				'headermenu' => '头部菜单',
				'footermenu' => '底部菜单',
				'blogroll' => '友情链接'
			));
		}
		//注册小工具栏，dynamic_sidebar('小工具名称')调用
		if (function_exists('register_sidebar')) {
			register_sidebar(array(
				'name' => '全站左栏', 
				'id' => 'site_left_sidebar',
				'before_widget' => '<div class="left-sidebar-widget sidebar-widget">', 
				'after_widget' => '</div>', 
				'before_title' => '<h3>', 
				'after_title' => '</h3>'
			));
		}
		if (function_exists('register_sidebar')) {
			register_sidebar(array(
				'name' => '全站右栏', 
				'id' => 'site_right_sidebar',
				'before_widget' => '<div class="right-sidebar-widget sidebar-widget">', 
				'after_widget' => '</div>', 
				'before_title' => '<h3>', 
				'after_title' => '</h3>'
			));
		}
		if (function_exists('register_sidebar')) {
			register_sidebar(array(
				'name' => '全站底栏', 
				'id' => 'site_footbar',
				'before_widget' => '<div class="site-footbar-widget">', 
				'after_widget' => '</div>', 
				'before_title' => '<h3>', 
				'after_title' => '</h3>'
			));
		}
		//取消主题、插件及wordpress自动更新
		add_filter('pre_site_transient_update_core',    create_function('$a', "return null;")); // 关闭核心提示
		add_filter('pre_site_transient_update_plugins', create_function('$a', "return null;")); // 关闭插件提示
		add_filter('pre_site_transient_update_themes',  create_function('$a', "return null;")); // 关闭主题提示
		remove_action('admin_init', '_maybe_update_core');    // 禁止 WordPress 检查更新
		remove_action('admin_init', '_maybe_update_plugins'); // 禁止 WordPress 更新插件
		remove_action('admin_init', '_maybe_update_themes');  // 禁止 WordPress 更新主题
		//关闭wordpress自动生成缩略图的功能
		update_option('medium_large_size_w', 0);
		update_option('thumbnail_size_h', 0);
		update_option('thumbnail_size_w', 0);
		update_option('medium_size_h', 0);
		update_option('medium_size_w', 0);
		update_option('large_size_h', 0);
		update_option('large_size_w', 0);
		//增加用户联系方式字段
		function art_add_user_contact($contactmethods){
			$contactmethods['qq'] = 'QQ';
			$contactmethods['wx'] = '微信';
			$contactmethods['sina_weibo'] = '新浪微博';
			$contactmethods['qq_weibo'] = '腾讯微博';
			$contactmethods['renren'] = '人人网';
			$contactmethods['douban'] = '豆瓣';
			$contactmethods['alipay'] = '支付宝';
			$contactmethods['facebook'] = 'facebook';
			$contactmethods['twitter'] = 'twitter';
			$contactmethods['google'] = 'google+';
			$contactmethods['git'] = 'github';
			return $contactmethods;
		}
		add_filter( 'user_contactmethods', 'art_add_user_contact' );
	}
//UA判断
	function art_access_ua(){
		$ua = $_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/iphone|ipad|safari/i', $ua, $match) == 0){
			echo '<style type="text/css" css-name="Apple bg no fixed">.bg>div{background-attachment:fixed}</style>';
		}
	}
	add_action( 'wp_head', 'art_access_ua' );
//创建robots.txt
	function creat_robots_txt(){
		if( get_option( 'seo_creat_folder' ) == 'WP安装目录' ){
			$loc = ABSPATH;
		} else {
			$loc = $_SERVER['DOCUMENT_ROOT'] . '/';
		}
		$pfile = ABSPATH . '/wp-content/themes/Art-Molec/include/robots.txt';
		$file = $loc . 'robots.txt';
		if ( !file_exists( $file ) ){
			copy( $pfile, $file );
		} else {
			@$content = file_get_contents( $file );
			$robots = get_option('seo_robots_txt');
			if ( $content != $robots && $robots != '' ){
				$fileopen = fopen( $file, 'w+' );
				fwrite( $fileopen, $robots );
				fclose( $fileopen );
			}
		}
	}
	if( get_option( 'seo_robtstxt_toggle' ) ) add_action('init', 'creat_robots_txt', 10);
//读取robots.txt
	function load_robots_txt(){
		@$robots = file_get_contents( ABSPATH . '/wp-content/themes/Art-Molec/include/robots.txt' );
		return $robots;
	}
//有边栏时输出特定的class
	function had_sidebar_class(){
		if ( get_option( 'show_left_sidebar' ) && !get_option( 'show_right_sidebar' ) ){
			echo 'had-left-sidebar';
		} elseif ( get_option( 'show_right_sidebar' ) && !get_option( 'show_left_sidebar' ) ) {
			echo 'had-right-sidebar';
		} elseif ( get_option( 'show_right_sidebar' ) && get_option( 'show_left_sidebar' ) ) {
			echo 'both-sidebar';
		}
	}
//菜单输出图像描述
	class description_walker extends Walker_Nav_Menu{
		function start_el(&$output, $item, $depth = 0 , $args = array(), $id = 0 ){
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
			$prepend = '<strong>';
			$append = '</strong>';
			$description  = ! empty( $item->description ) ? esc_attr( $item->description ) : '';
			if($depth != 0){
				$description = $append = $prepend = "";
			}
			$item_output = $args->before;
			$item_output .= '<a class="rolla"'. $attributes .'>';
			$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
			$item_output .= '</a>'.$args->link_after.'<a class="rollp"'.$attributes.'>'.$description;
			$item_output .= '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
//上传图片自动更名
	function art_rename_filename( $file ) {
		$time = date("YmdHis");
		$file['name'] = $time . mt_rand( 1, 100 ) . "." . pathinfo( $file['name'], PATHINFO_EXTENSION );
		return $file;
	}
	add_filter('wp_handle_upload_prefilter', 'art_rename_filename', 10);
//获取文章中的图片个数 
	function get_post_images_number(){  
		global $post;
		$content = $post->post_content;    
		preg_match_all('/\[caption.*?\]<a\s+href=".*?"><img\s+src="(.*?)".*?\/><\/a>.*\[\/caption\]/', $content, $result, PREG_PATTERN_ORDER);    
		return count($result[1]); 
	}
//后台新标签打开查看站点和新文章
	function open_in_newtab(){
		echo '
			<script type="text/javascript">
				jQuery(document).ready(function($){
					$(".ab-item").attr("target" , "_blank");
					$("#sample-permalink").find("a").attr("target" , "_blank");
					$(".view a").attr("target", "_blank");
					var seeSingle = $("#message").find("p a").text();
					if(seeSingle == "查看文章"){
						$("#message").find("p a").attr("target" , "_blank");
					}
				});
			</script>';
	}
	add_action('admin_footer' , 'open_in_newtab');
//统计文章点击次数
	function count_post_view_meta(){
		if( is_single() ){
			$id = get_the_ID();
			$views = get_post_meta($id, 'art_post_views', true);
			if( $views != null ){
				$views = $views + 0.5;
				update_post_meta( $id, 'art_post_views', ceil( $views ) );
			} else {
				add_post_meta( $id, 'art_post_views', rand(99, 999), true );
			}
		}
	}
	add_action('wp_head', 'count_post_view_meta');
//输出文章点击次数
	function art_post_views( $before='（', $after='）' ){
		$id = get_the_ID();
		$views = get_post_meta( $id, 'art_post_views', true );
		if($views == '' ) { $view = 0; }
		$views = number_format( ceil( $views ) ) ;
		return $before . $views . $after;
	}
//输出SEO<meta>标签
	function art_seo_head(){
		global $post;
		//首页关键词和描述
		if(is_home()){
			$keywords = get_option( 'seo_index_keywords' );
			$description = get_option( 'seo_index_description' );
		//分类页关键词和描述
		} elseif ( is_category() ){
			$cat_id = get_query_var( 'cat' );
			$args = array( 'numberposts' => -1, 'category' => $cat_id );
			$this_posts = get_posts( $args );
			if( $this_posts == null ) { return; }
			foreach( $this_posts as $this_post ){ 
				$tag_in_post[] = get_the_tags( $this_post -> ID );
			}/* 得到一个二维数组，文章为第一维 => 该文章关联的 标签(对象 * n) 为第二维 */
			foreach( $tag_in_post as $tags ){
				if ( !empty($tags) ) {
					foreach( $tags as $tag ){ $tag_name[] = $tag -> name; }
				} else {
					continue;
				}
			}
			$tag_name = array_merge( array_unique( $tag_name, SORT_STRING ) );
			for( $i = 0; $i < count($tag_name) && $i < 5; $i++ ){ $keywords .= $tag_name[$i] . ','; }
			$keywords = get_category( $cat_id ) -> name .',' . rtrim( $keywords, ',' );
			$description = get_category( $cat_id ) -> description;
		//文章页关键词和描述
		} elseif ( is_single() && !is_attachment()  ){
			$art_excerpt = $post -> post_excerpt ;
			if( !empty( $art_excerpt ) ){
				$description = get_the_title() . ':' . strip_shortcodes( $art_excerpt ); 
			} else {
				$description = get_the_title() . ':' . strip_shortcodes( $post -> post_content );
			}
			if( get_the_tags() ){
				foreach( get_the_tags() as $tag ){ $keywords .= $tag -> name . ','; }
			}
			$keywords = rtrim( $keywords, ',' );
		//独立页关键词和描述
		} elseif ( is_page() ){
			$keywords = get_the_title() . ',' . get_option( 'seo_index_keywords' );
			$description = get_the_title() . ':' . strip_shortcodes( $post -> post_content ); 
		//归档页关键词和描述
		} elseif ( is_archive() && !is_tag() ){
			$keywords = get_option( 'seo_archive_keywords' );
			$description = get_option( 'seo_archive_description' );
		//标签页关键词和描述
		} elseif ( is_tag() ){
			$keywords = get_option( 'seo_tag_keywords');
			$description = get_option( 'seo_tag_description' );
		//搜索页关键词和描述
		} elseif ( is_search() ){
			$keywords = get_option( 'seo_search_keywords');
			$description = get_option( 'seo_search_description' );
		}
		//格式化输出文本
		$description = mb_substr( $description, 0, 200, 'utf-8');
		$description = preg_replace( '/\s+/', '', stripslashes( strip_tags( $description ) ) );
		$keywords = preg_replace( '/\s+/', '', stripslashes( strip_tags( $keywords ) ) );
		if( $description == '' ) $description = get_option('seo_index_description');
		if( $keywords == '' ) $keywords = get_option('seo_index_keywords');
		//开始输出
		if( is_home() || is_category() || is_single() || is_page() ){
			echo '<meta name="keywords" content="' . $keywords . '" />' . "\n";
			echo '<meta name="description" content="' . $description . '" />' . "\n";
		} elseif( is_archive() || is_search() || is_tag() ) {
			//该三类页面根据后面选项设置nofollow
			if( get_option( 'seo_page_nofollow' ) ){
				echo '<meta name="robots" content="NOINDEX, FOLLOW" />' . "\n";
			} else {
				echo '<meta name="keywords" content="' . $keywords . '" />' . "\n";
				echo '<meta name="description" content="' . $description . '" />' . "\n";
			}
			//其余页面直接nofollow
		} else {
			echo '<meta name="robots" content="NOINDEX, NOFOLLOW" />' . "\n";
		}
	}
	add_action( 'wp_head', 'art_seo_head' );
//自动为文章和评论的外链添加nofollow
	function auto_nofollow($content) {
		return preg_replace_callback('/<a[^>]+?>/', 'auto_nofollow_callback', $content);
	}
	function auto_nofollow_callback($matches) {
		$link = $matches[0];
		$site_link = get_bloginfo('url');
		if (strpos($link, 'rel') === false) {
			$link = preg_replace("%(href=\S(?!$site_link))%i", 'rel="nofollow" $1', $link);
		} elseif (preg_match("%href=\S(?!$site_link)%i", $link)) {
			$link = preg_replace('/rel=".*?"/i', 'rel="nofollow"', $link);
		}
		return $link;
	}
	//nofollow文章内容的站外链接
	if( get_option('seo_post_outsite_nofollow') ){add_filter('the_content', 'auto_nofollow');} 
	//nofollow评论内容的站外链接
	if( get_option('seo_comment_outsite_nofollow') ){add_filter('comment_text', 'auto_nofollow');} 
//面包屑导航
	function breadcrumb_output(){
		$sep = '<i class="fa fa-caret-right" aria-hidden="true"></i>';
		$home = '<a href="' . get_bloginfo('siteurl') . '" title="首页 | ' . get_bloginfo('name') . '">';
		$home .= '<i class="fa fa-home fa-lg" aria-hidden="true"></i></a>' . $sep;
		$post_url = '<a href="' . get_the_permalink() . '" title="'. get_the_title() . '">';
		$post_url .=get_the_title() . '</a>' . $sep;
		$single_cat = get_the_category()[0] -> term_id;
		$cat = get_query_var('cat');
		echo '<div class="breadcrumb">' . $home;
		if( is_single() && !is_attachment() ){
			echo get_category_parents($single_cat, true, $sep, false) . $post_url;
		}elseif( is_category() ){
			echo get_category_parents($cat, true, $sep, false);
		}elseif( is_page() ){
			global $post;
			$id_page_par = $post -> post_parent;
			if($id_page_par == 0){
				echo $post_url;
			}else{
				echo '<a href="' . get_permalink($id_page_par) . '">' . get_the_title($id_page_par) . '</a>';
				echo $sep . $post_url;
			}
		}elseif (is_archive() && !is_tag()){	//文章归档
			echo '<a href="/archive" title="文章归档">文章归档</a>';
		} elseif (is_tag()){	//标签
			echo '<a href="/tag">全站标签</a>' . $sep . '标签为：【';
			echo single_tag_title('',false) . '】的文章' . $sep;
		}elseif( is_search() ){	//搜索页面
			echo '【' . get_search_query() . '】的搜索结果' . $sep;
		}elseif( is_404() ){
			echo '页面未找到！' . $sep;
		}else{
			echo wp_title('', true) . $sep;
		}
		echo '</div>';
	}
//文章页前篇后篇导航增加title属性
	function add_prev_title($output){
		$prev = 'title="' . get_previous_post('true') -> post_title . '" ';
		$output = str_replace( 'rel', $prev . 'rel', $output );
		return $output;
	}
	function add_next_title($output){
		$next = 'title="' . get_next_post('true') -> post_title . '" ';
		$output = str_replace( 'rel', $next . 'rel', $output );
		return $output;
	}
	add_filter( 'previous_post_link', 'add_prev_title' );
	add_filter( 'next_post_link', 'add_next_title' );
//footer设置
	function art_molec_footer(){
		if( get_option( 'baidu_share_toggle' ) || get_option( 'post_baidu_share_toggle' ) ){
			echo '<script>
with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion="+~(-new Date()/36e5)];</script>';
			echo stripslashes( get_option( 'baidu_share_config' ) );
		}
	}
	add_action('wp_footer' , 'art_molec_footer');
//短代码
	function art_btn( $atts, $content = null ){
		extract(shortcode_atts( array ( 'color' => '', 'href' => '' ),$atts ) );
		return '<a href="'.$href.'" class="btn '.$color.'" target="_blank">'.$content.'</a>';
	}
	function art_label( $atts, $content = null ){
		extract(shortcode_atts( array ( 'bgcolor' => '', 'color' => '' ), $atts ) );
		return '<div class="label" style="background:' . $bgcolor . ';color:' . $color . '">' . $content . '</div>';
	}
	add_shortcode('btn', 'art_btn');//颜色按钮
	add_shortcode('lb', 'art_label');//颜色条幅
//添加后台编辑器按钮
	function art_admin_btn() {
		wp_enqueue_script('art_admin_btn', get_template_directory_uri() . '/js/admin.js', array('quicktags'));
	};
	add_action('admin_print_scripts', 'art_admin_btn');
//防止代码转义
	function art_prettify_esc_html($content){
		$regex = '/(<pre\s+[^>]*?class\s*?=\s*?[",\'].*?prettyprint.*?[",\'].*?>)(.*?)(<\/pre>)/sim';
		return preg_replace_callback($regex, art_esc_callback, $content);
	}
	function art_esc_callback($matches){
		$tag_open = $matches[1];
		$content = $matches[2];
		$tag_close = $matches[3];
		$content = esc_html($content);
		$content = preg_replace( array( '/\[/', '/\]/' ), array( '&#91;', '&#93;' ), $content );
		return $tag_open . $content . $tag_close;
	}
	add_filter('the_content', 'art_prettify_esc_html', 2);
	add_filter('comment_text', 'art_prettify_esc_html', 2);
//格式化文章形式为gallery的正文输出
	function gallery_drop_text( $content ){
		if( has_post_format( 'image' ) ){
			preg_match_all( '/\[caption.*?_(\d+)[^\]]*?\].*?\[\/caption\]/i', $content, $images, PREG_PATTERN_ORDER );
			$content = '';
			$count = count( $images[0] );
			foreach( $images[0] as $image ){
				$content .= $image;
			}
			$content .= '<div class="gallery-thumb-container">';
			$content .= '<ul id="list-wrap">';
			$content .= get_art_thumb($art_id, 160, 120, '', $count, 1, '<li>', '</li>', 0);
			$content .= '</ul></div>';
			$attachments = get_children( 'post_parent=' . get_the_ID() );
			foreach ( $images[1] as $id ){
				$att_contents[] = $attachments[$id] -> post_content;
			}
			$content .= '<div class="gallery-info">图片简介：</div>';
			$content .= '<div class="gallery-info-wrap">';
			foreach( $att_contents as $att_content ){
				$content .= '<div class="gallery-info-content">' . $att_content . '</div>';
			}
			$content .= '</div>';
		}
		return $content;
	}
	add_filter( 'the_content', 'gallery_drop_text', 9 );
//指定文章ID提取缩略图
	function get_art_thumb($art_id, $art_w, $art_h, $class='', $num=1, $start=1, $before='', $after='', $echo=1){
		$start = $start - 1;
		if ( $art_id == null ){ $art_id = get_the_ID(); }
		$content = get_post($art_id) -> post_content;
		$z = '/\[caption.*?\]<a\s+href=".*?"><img\s+src="(.*?)".*?\/><\/a>.*\[\/caption\]/i';
		preg_match_all($z, $content, $thumb, PREG_PATTERN_ORDER);
		if( $num == 0 ) $num = count( $thumb[1] );
		$num = $num + $start;
		if ( !empty( $thumb[1] ) ){
			for( $m = $start; $m < count( $thumb[1] ) && $m < $num; $m++){
				$thumb_html .= $before . '<img class="' . $class . '" src="' . get_template_directory_uri();
				$thumb_html .= '/timthumb.php?src=' . $thumb[1][$m];
				$thumb_html .= '&h=' . $art_h . '&w=' . $art_w . '&q=90&zc=1&ct=1" ';
				$thumb_html .= 'alt="' . get_the_title($art_id) . '" />' . $after;
			}
		} else {
			$thumb_html = $before . '<img class="' . $class . '" src="' . get_template_directory_uri();
			$thumb_html .= '/timthumb.php?src=' . get_option( 'post_default_thumbnail' );
			$thumb_html .= '&h=' . $art_h . '&w=' . $art_w . '&q=90&zc=1&ct=1" ';
			$thumb_html .= 'alt="' . get_the_title($art_id) . '" />' . $after;
		}
		if($echo == 1){
			echo $thumb_html;
		}else{
			return $thumb_html;
		}
	}
//输出当前文章同分类的文章
	function art_glike($num,$orderby='rand'){
		$id = get_the_category()[0] -> term_id;
		$args = array( 'numberposts' => $num, 'category' => $id, 'orderby' => $orderby );
		$glikes = get_posts($args);
		if(!empty($glikes)){
			foreach ($glikes as $glike){
				$link = get_the_permalink($glike -> ID);
				$title = $glike -> post_title;
				echo '<a href="' . $link . '" title="' . $title . '">';
				get_art_thumb($glike -> ID, 300, 150);
				echo '<p>' . $title . '</p></a>';
			}
		} else {
			echo '暂无相关文章！';
		}
	}
//输出当前文章同标签的文章
	function art_related($num){
		$tags = get_the_tags();
		$post_id = array( get_the_ID() );
		$tagid = '';
		if($tags):
			foreach( $tags as $tag ){ $tagid .= $tag -> term_id . ','; }
		endif;
		$args = array ( 
			'tag__in' =>explode(',' , $tagid ),  
			'orderby' => 'rand',
			'nopaging' => true,
			'post__not_in' => $post_id
		);
		$query = new WP_Query( $args );
		$n = 0;
		if( $query -> have_posts() ) : 
			while ( $query -> have_posts() && $n < $num ) : $query -> the_post(); 
				echo '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
				echo '<i class="fa fa-minus" aria-hidden="true"></i>';
				echo get_the_title();
				echo '</a>';
				$n++;
			endwhile; 
		wp_reset_postdata();
		else: echo '暂无相关文章！';
		endif;
	}
//去除分类链接中的category
	if( get_option('no_category_url') ):
		add_action( 'load-themes.php',  'no_category_base_refresh_rules');
		add_action('created_category', 'no_category_base_refresh_rules');
		add_action('edited_category', 'no_category_base_refresh_rules');
		add_action('delete_category', 'no_category_base_refresh_rules');
		function no_category_base_refresh_rules() {
			global $wp_rewrite;
			$wp_rewrite -> flush_rules();
		}
		add_action('init', 'no_category_base_permastruct');
		function no_category_base_permastruct() {
			global $wp_rewrite, $wp_version;
			if (version_compare($wp_version, '3.4', '<')) {
				$wp_rewrite -> extra_permastructs['category'][0] = '%category%';
			} else {
				$wp_rewrite -> extra_permastructs['category']['struct'] = '%category%';
			}
		}
		add_filter('category_rewrite_rules', 'no_category_base_rewrite_rules');
		function no_category_base_rewrite_rules($category_rewrite) {
			$category_rewrite = array();
			$categories = get_categories(array('hide_empty' => false));
			foreach ($categories as $category) {
				$category_nicename = $category -> slug;
				if ($category -> parent == $category -> cat_ID)
					$category -> parent = 0;
				elseif ($category -> parent != 0)
					$category_nicename = get_category_parents($category -> parent, false, '/', true) . $category_nicename;
				$category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
				$category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
				$category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
			}
			global $wp_rewrite;
			$old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
			$old_category_base = trim($old_category_base, '/');
			$category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
			return $category_rewrite;
		}
		add_filter('query_vars', 'no_category_base_query_vars');
		function no_category_base_query_vars($public_query_vars) {
			$public_query_vars[] = 'category_redirect';
			return $public_query_vars;
		}
		add_filter('request', 'no_category_base_request');
		function no_category_base_request($query_vars) {
			if (isset($query_vars['category_redirect'])) {
				$catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
				status_header(301);
				header("Location: $catlink");
				exit();
			}
			return $query_vars;
		}
	endif;
//表情
	function art_smilies_src($old, $img){ //更改表情图片路径
		return get_template_directory_uri() . '/images/smilies/' . $img;
	}
	add_filter('smilies_src', 'art_smilies_src', 1, 10);
	function art_similies_trans(){ //更改表情文字的对应图片
		global $wpsmiliestrans;
		$wpsmiliestrans = array (
			':?:' => 'icon_question.gif',
			':razz:' => 'icon_razz.gif',
			':sad:' => 'icon_sad.gif',
			':evil:' => 'icon_evil.gif',
			':!:' => 'icon_exclaim.gif',
			':smile:' => 'icon_smile.gif',
			':oops:' => 'icon_redface.gif',
			':grin:' => 'icon_biggrin.gif',
			':eek:' => 'icon_surprised.gif',
			':shock:' => 'icon_eek.gif',
			':???:' => 'icon_confused.gif',
			':cool:' => 'icon_cool.gif',
			':lol:' => 'icon_lol.gif',
			':mad:' => 'icon_mad.gif',
			':twisted:' => 'icon_twisted.gif',
			':roll:' => 'icon_rolleyes.gif',
			':wink:' => 'icon_wink.gif',
			':idea:' => 'icon_idea.gif',
			':arrow:' => 'icon_arrow.gif',
			':neutral:' => 'icon_neutral.gif',
			':cry:' => 'icon_cry.gif',
			':mrgreen:' => 'icon_mrgreen.gif'
		);
	}
	add_action( 'init', 'art_similies_trans', 5 );
//评论submit按钮区域改造
	function art_rewrite_submit_field(){
		$after = include( 'include/smiley.php' );
		$a = rand(0, 10);
		$b = rand(0, 10);
		$sum = $a + $b;
		if ( !is_user_logged_in() && get_option( 'comment_with_verify' ) ){
			$before = '<span class="calc">
	<label for="sum">【验证码】发表评论前请填写正确答案：'
		. $a . ' + ' . $b . ' = 
	</label>
	<input type="text" name="sum" id="sum" class="sum" aria-required="true" required="required" maxlength="2"> 
	？
	<span class="required">*</span>
	<input type="hidden" name="comment-verify" value="' . md5($sum) . '">
</span>';
		} else {
			$before = '';
		}
		$submit_field = '<p class="form-submit">' . $before . '%1$s %2$s' . $after . '</p>';
		return $submit_field;
	}
//评论编辑链接
	function art_comment_edit_text($link){
		$text = 'edit';
		return $link = '<a class="comment-edit-link" href="' . esc_url( get_edit_comment_link( $comment ) ) . '">' . $text . '</a>';
	}
	add_filter('edit_comment_link', 'art_comment_edit_text');
//评论图片链接自动转化
	function art_comment_image($content) {
		$content = preg_replace('/\[img\](.*)\[\/img\]/i','<a href="$1" target="_blank" title="评论插图"><img src="$1" alt="评论插图" /></a>', $content);
		return $content;
	}
	add_filter('comment_text', 'art_comment_image');
//gravatar头像使用SSL链接
	function art_default_avatar($avatar) {
		$avatar = preg_replace('/http\:\/\/.*?\/avatar\//','https://cn.gravatar.com/avatar/',$avatar);
		return $avatar;
	}
	add_filter( 'get_avatar', 'art_default_avatar', 2, 10 );
//评论过滤
	function art_filter_comment($commentdata){
		if(!is_user_logged_in()):
			$verify = $_POST['comment-verify'];
			$sum = $_POST['sum'];
			$commentdata['comment_author_IP'] = $_SERVER['REMOTE_ADDR'];
			$commentdata['comment_agent'] = $_SERVER['HTTP_USER_AGENT'];
			preg_match_all( '/[一-龥]/u', $commentdata['comment_content'], $chinese );
			$chinese = count( $chinese[0] );
			$zh_num = get_option('comment_chinese_num');
			if( md5($sum) != $verify && get_option('comment_with_verify') ){ // 评论验证码
				wp_die( '<p><strong>错误</strong>：验证码错误，请返回重新填写。</p>', '评论提交失败', array( 'response' => 200, 'back_link' => true) );
			} elseif( $chinese < $zh_num && get_option('comment_must_chinese') ){ // 评论必须有汉字
				wp_die( '<p><strong>错误</strong>：评论内容至少包含' . $zh_num . '个汉字。</p>', '评论提交失败', array( 'response' => 200, 'back_link' => true) );
			} elseif( wp_blacklist_check( $commentdata['comment_author'], $commentdata['comment_author_email'], $commentdata['comment_author_url'], $commentdata['comment_content'], '', '' ) && get_option( 'comment_sensitive_words' ) ){
				wp_die( '<p><strong>错误</strong>：对不起，您发表的内容中含有非法词汇。</p>', '评论提交失败', array( 'response' => 200, 'back_link' => true) );
			} elseif( wp_blacklist_check( '', '', '', '', $commentdata['comment_author_IP'], $commentdata['comment_agent'] ) && get_option( 'comment_sensitive_words' ) ){
				wp_die( '<p><strong>错误</strong>：对不起，当前用户IP（或用户代理）已被屏蔽。</p>', '评论提交失败', array( 'response' => 200, 'back_link' => true) );
			} else {
				return $commentdata;
			}
		else:return $commentdata;
		endif;
	}
	add_filter( 'preprocess_comment', 'art_filter_comment', 1 );
//生成sitemap.xml
	function creat_sitemap_xml(){
		if( get_option( 'seo_creat_folder' ) == 'WP安装目录' ){
			$loc = ABSPATH;
		} else {
			$loc = $_SERVER['DOCUMENT_ROOT'] . '/';
		}
		$file = fopen( $loc . 'sitemap.xml', 'w+' );
		$writen = '<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
		<url>
			<loc>' . get_bloginfo('url') . '</loc>
			<lastmod>' . date('c') . '</lastmod>
			<changefreq>daily</changefreq>
			<priority>1.0</priority>
		</url>';
		$num = get_option('seo_sitemap_posts');
		$sitemap_posts = get_posts('numberposts=' . $num . '&orderby=date&order=DESC');
			foreach ( $sitemap_posts as $sitemap_post ): 
			$id = $sitemap_post -> ID;
				$writen .= '
		<url>
			<loc>' . get_the_permalink($id) . '</loc>
			<lastmod>' . get_the_date('c', $id) . '</lastmod>
			<changefreq>monthly</changefreq>
			<priority>0.5</priority>
		</url>';
			endforeach;
		$writen .= '</urlset>';
		fwrite( $file, $writen );
		fclose( $file );
	}
	add_filter( 'publish_post', 'creat_sitemap_xml', 10 );
/****** 开始后台设置相关函数 ******/
	//首页背景图
		function art_index_background(){
			$imgs = explode ( "\n", get_option( 'index_bg_image' ) );
			foreach ( $imgs as $img ){
				echo '<div style="background-image:url(' . stripslashes($img) . ')"></div>';
			}
		}
	//背景图说明文字
		function art_index_description(){
			$text = explode ( "\n", get_option( 'index_desc_text' ) );
			foreach ( $text as $txt ){
				echo '<p class="index-desc-text"><i class="fa fa-info-circle" aria-hidden="true"></i> ' . stripslashes($txt) . '</p>';
			}
		}
	//自定义颜色
		function art_custom_color(){
			$color = '#478bab';
			$bg = get_option( 'second_header_bg' );
			echo "\n" . '<style type="text/css" css-name="自定义颜色&背景">' . "\n"; 
			echo '.description-bg{background:' . $color . ' url(' . $bg . ') right bottom;background-size:cover}';
			echo "\n" . '</style>' . "\n";
		}
		add_action( 'wp_head', 'art_custom_color' );
	//文章版权信息
		function art_post_copyright($content){
			if( is_single() || is_feed() ){
				$copyright = get_option( 'post_copyright_text' );
				$title = get_the_title();
				$link = get_the_permalink();
				$copyright = str_replace( '::title::', $title, $copyright );
				$copyright = str_replace( '::link::', $link, $copyright );
				$copyright = str_replace( "\n", '<br />', $copyright );
				$copyright = str_replace( "\t", '"&nbsp;"', $copyright );
				$copyright = stripslashes( $copyright );
				$copyright = '<div class="post-copyright">' . $copyright . '</div>';
				$content .= $copyright;
			}
			return $content;
		}
		add_filter('the_content', 'art_post_copyright', 10);
	//搜索框占位文本
		function search_form_value($form){
			$form = str_replace( 'value=""', 'value="' . get_option('search_form_value') . '"', $form );
			$form = str_replace( 'id="s"', 'id="s" class="search-input-text"', $form );
			return $form;
		}
		add_filter( 'get_search_form', 'search_form_value', 10 );
	//边栏跟随
		function scroll_fixed_sidebar(){
			if( get_option( 'show_left_sidebar' ) && !empty(get_option( 'scroll_fixed_left_sidebar' ) ) ){
				echo '<meta name="scroll_fixed_left_sidebar" content="' . get_option( 'scroll_fixed_left_sidebar' ) . '" />';
			}
			if( get_option( 'show_right_sidebar' ) && !empty(get_option( 'scroll_fixed_right_sidebar' ) ) ){
				echo '<meta name="scroll_fixed_right_sidebar" content="' . get_option( 'scroll_fixed_right_sidebar' ) . '" />';
			}
		}
		add_action( 'wp_head', 'scroll_fixed_sidebar' );
	//后台加密
		function secret_login_protect(){
			$key1 = get_option('secret_login_key1');
			$key2 = get_option('secret_login_key2');
			if( get_option( 'secret_login_toggle' ) && $_GET[$key1] != $key2 ){
				header("location:404"); 
			}
		}
		add_action( 'login_enqueue_scripts', 'secret_login_protect' );
	//首页置顶文章模块
		function index_sticky_post(){
			if(get_option('post_index_orderby') == '降序'){
				$orderby = 'DESC';
			} elseif ( get_option('post_index_orderby') == '升序' ){
				$orderby = 'ASC';
			}
			if(get_option('post_index_order') == '发表时间'){
				$order = 'date';
			} elseif ( get_option('post_index_order') == '随机' ){
				$order = 'rand';
			}
			$args = array(
				'numberposts' => get_option('post_index_number'),
				'orderby' => $orderby,
				'order' => $order,
				'include' => get_option( 'sticky_posts' ),
			); 
			$index_posts = get_posts( $args );
			foreach ( $index_posts as $post ) {
				$id = $post -> ID;
				$title = get_the_title($id);
				$ilink = get_permalink($id);
				echo "<div class=\"index-post\"><a href=\"$ilink\" title=\"$title\">";
				get_art_thumb($id, 300, 450, 'index-thumb', 1);
				echo "<div class=\"cover-title\"><div class=\"table-wrap\"><div class=\"cover-title-content\">$title";
				echo "<i class=\"fa fa-search-plus\" aria-hidden=\"true\"></i></div></div>";
				echo "</div></a></div>";
			}
		}
		// 首页简介模块
		function index_skills_content($x){
			$img = stripslashes( get_option('index_mb_' . $x . '_img') );
			$txt = get_option('index_mb_' . $x . '_txt');
			$html = '
				<p><img src="' . $img . '" alt="' . $txt . '"></p>
				<p>'. $txt . '</p>';
			return $html;
		}
		// 清理修订版本和缓存 @testing 待测试
		if( get_option( 'delete_revisions_caches' ) == 1 ){
			$wpdb->query( "DELETE FROM $wpdb->posts WHERE post_type = 'revision'" );
			$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE '%_transient_%'" );
			update_option( 'delete_revisions_caches', 0 );
		}
 ?>