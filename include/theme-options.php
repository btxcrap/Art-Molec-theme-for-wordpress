<?php
$options = array(
	//标签一
    array(
        'title' => '图文替换',
        'id'    => 'text-setting',
        'type'  => 'panelstart'
    ),
	array(
		'name' => '全站LOGO',
		'desc' => '填入图片的绝对/相对路径。',
		'id' => 'site_head_logo',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '头部公告栏',
		'desc' => '全站显示的文字推广，滚动显示。每条以回车分隔，留空为关闭。',
		'id' => 'header_description_text',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '主页LOGO',
		'desc' => '主页也许需要另一个LOGO？留空则显示全站LOGO。',
		'id' => 'index_head_logo',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '主页大标题',
		'desc' => '主页正中的大文本内容',
		'id' => 'index_center_text',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '主页小标题',
		'desc' => '主页正中的小文本内容，换行用"p"标签。',
		'id' => 'index_small_text',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '次级头部背景图片',
		'desc' => '菜单下方栏位的背景图片，通用于除主页外的页面。',
		'id' => 'second_header_bg',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '搜索框占位文本',
		'desc' => '',
		'id' => 'search_form_value',
		'type' => 'text',
		'std' => '填入你想查找的内容...',
	),
	array(
		'name' => '文章默认缩略图',
		'desc' => '文章没有图片时将在文章列表中显示的缩略图。',
		'id' => 'post_default_thumbnail',
		'type' => 'text',
		'std' => get_template_directory_uri() . '/images/writing.jpg',
	),
	array(
		'name' => '文章版权文字',
		'desc' => '文章的版权信息声明，::title::引用标题，::link::引用文章链接。',
		'id' => 'post_copyright_text',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '底部版权文字',
		'desc' => '输入文字或html代码，网站的作者、版权、备案号等信息。',
		'id' => 'footer_copyright_text',
		'type' => 'textarea',
		'std' => ''
	),
		array(
		'type' => 'panelend'
	),
	//标签二
	array(
        'title' => '首页栏目',
        'id'    => 'index_setting',
        'type'  => 'panelstart'
    ),
	array(
		'title' => '==========全屏大图==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '背景图说明文字',
		'desc' => '作为背景图的说明，支持用"a"标签生成链接，每条用回车分隔。',
		'id' => 'index_desc_text',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '主页全屏图像',
		'desc' => '图片的地址，每条用回车分隔，注意与上面的文字要一 一对应。',
		'id' => 'index_bg_image',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'title' => '==========简介模块==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '开启简介模块',
		'desc' => '勾选为开启，然后在下面设置内容。这里不勾选，下面的内容不会显示。',
		'id' => 'index_message_box',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '简介模块标题：',
		'desc' => '',
		'id' => 'index_mb_title',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '简介栏位一：图片',
		'desc' => '直接填图片的链接地址。',
		'id' => 'index_mb_a_img',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '简介栏位一：文字',
		'desc' => '一小段文字。',
		'id' => 'index_mb_a_txt',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '简介栏位二：图片',
		'desc' => '直接填图片的链接地址。',
		'id' => 'index_mb_b_img',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '简介栏位二：文字',
		'desc' => '一小段文字。',
		'id' => 'index_mb_b_txt',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '简介栏位三：图片',
		'desc' => '直接填图片的链接地址。',
		'id' => 'index_mb_c_img',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '简介栏位三：文字',
		'desc' => '一小段文字。',
		'id' => 'index_mb_c_txt',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '简介栏位四：图片',
		'desc' => '直接填图片的链接地址。',
		'id' => 'index_mb_d_img',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '简介栏位四：文字',
		'desc' => '一小段文字。',
		'id' => 'index_mb_d_txt',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'title' => '==========关于模块==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '开启关于模块',
		'desc' => '网站的简要介绍模块。',
		'id' => 'index_about_toggle',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '模块标题',
		'desc' => '',
		'id' => 'index_about_title',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '简单介绍你的网站或业务',
		'desc' => '输入文字,支持使用"p"标签。',
		'id' => 'index_about_meta',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'title' => '==========置顶文章模块==========',
		'type' => 'subtitle'
	),
	array(
        'name'  => '开启首页置顶文章',
        'desc'  => '开启后在后台设置相应数量的置顶文章。',
        'id'    => 'post_index_toggle',
        'type'  => 'checkbox',
        'std'   => '',
    ),
	array(
        'name'  => '列表标题',
        'desc'  => '',
        'id'    => 'post_index_title',
        'type'  => 'text',
        'std'   => '',
    ),
	array(
        'name'  => '置顶文章数量',
        'desc'  => '-1 显示全部',
        'id'    => 'post_index_number',
        'type'  => 'number',
        'std'   => '8'
    ),
	array(
        'name'  => '排序方式',
        'desc'  => '选择文章按什么顺序显示。',
        'id'    => 'post_index_orderby',
        'type'  => 'select',
        'options' => array( '发表时间', '随机' ),
        'std'   => '发表时间',
    ),
	array(
        'name'  => '升序还是降序？',
        'desc'  => '',
        'id'    => 'post_index_order',
        'type'  => 'select',
        'options' => array( '降序', '升序' ),
        'std'   => '降序',
    ),
	array(
		'type' => 'panelend'
	),
	//标签三
	array(
        'title' => 'SEO设置',
        'id'    => 'seo-setting',
        'type'  => 'panelstart'
    ),
	array(
		'title' => '==========主页SEO==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '关键字：',
		'desc' => '关键词之间用英文逗号隔开，一般在3-5个词，每个词字数不宜超过16个。',
		'id' => 'seo_index_keywords',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '网站描述：',
		'desc' => '用精湛的语言介绍网站，一般200字以内。',
		'id' => 'seo_index_description',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'title' => '==========其他SEO==========<p>（ps.文章页，独立页，分类页将自动生成关键字和描述）</p>',
		'type' => 'subtitle'
	),
	array(
		'name' => '是否为归档页、标签页、搜索页添加nofollow？',
		'desc' => '勾选后，该三类页面将不会被搜索引擎收录。取消勾选，下面的设置才会生效。',
		'id' => 'seo_page_nofollow',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '归档页关键词',
		'desc' => '',
		'id' => 'seo_archive_keywords',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '归档页描述',
		'desc' => '',
		'id' => 'seo_archive_description',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '标签页关键词',
		'desc' => '',
		'id' => 'seo_tag_keywords',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '标签页描述',
		'desc' => '',
		'id' => 'seo_tag_description',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '搜索页关键词',
		'desc' => '',
		'id' => 'seo_search_keywords',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '搜索页描述',
		'desc' => '',
		'id' => 'seo_search_description',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '文章外链添加nofollow？',
		'desc' => '勾选后，文章正文出现的外链将不会被robots访问。',
		'id' => 'seo_post_outsite_nofollow',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '评论外链添加nofollow',
		'desc' => '勾选后，评论中出现的外链将不会被robots访问。',
		'id' => 'seo_comment_outsite_nofollow',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'title' => '注意下面两个文件设置WP安装目录和网站根目录的区别。<p>PS1：服务器上搭建了其他网站时，建议选择WP安装目录。</p><p>PS2：生成的位置要有<span style="color:red">777</span>权限。</p><p>WP安装目录：' . ABSPATH . '</p><p>根目录：' . $_SERVER['DOCUMENT_ROOT'] . '/</p>',
		'type' => 'subtitle'
	),
	array(
		'name' => 'sitemap.xml和robots.txt的生成位置。',
		'desc' => '',
		'id' => 'seo_creat_folder',
		'type' => 'select',
		'options' => array( 'WP安装目录', '根目录' ),
		'std' => '根目录'
	),
	array(
		'name' => '自动生成xml格式网站地图',
		'desc' => '勾选后每次发表或更新文章都会在上面指定的位置生成sitemap.xml。',
		'id' => 'seo_sitemap_xml',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '网站地图中显示的文章数量',
		'desc' => '显示最新的几篇文章, -1为显示所有文章。',
		'id' => 'seo_sitemap_posts',
		'type' => 'number',
		'std' => '20'
	),
	array(
		'name' => '自动生成robots.txt',
		'desc' => '勾选后在上面指定的位置生成一份robots.txt',
		'id' => 'seo_robtstxt_toggle',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '编辑robots.txt',
		'desc' => '自动生成的robots.txt内容。根据需要修改。',
		'id' => 'seo_robots_txt',
		'type' => 'textarea',
		'std' => load_robots_txt(),
	),
	array(
		'type' => 'panelend'
	),
	//标签四
	array(
        'title' => '编辑代码',
        'id'    => 'code_edit',
        'type'  => 'panelstart'
    ),
	array(
		'name' => '自定义CSS',
		'desc' => '这里填入的CSS代码，会作为内联样式出现在head区域。',
		'id' => 'code_css_style',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'name' => '自定义head代码',
		'desc' => '可以添加"style", "meta", "link", "script"等等头部标签。',
		'id' => 'code_head_tag',
		'type' => 'textarea',
		'std' => ''
	),
	array(
		'type' => 'panelend'
	),
	//标签五
	array(
        'title' => '功能开关',
        'id'    => 'function_toggle',
        'type'  => 'panelstart'
    ),
	array(
		'title' => '==========百度分享==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '开启全站百度分享',
		'desc' => '开启后在所有页面头部菜单位置会显示百度分享栏，文章图片也会带上百度图片分享。',
		'id' => 'baidu_share_toggle',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '开启文章页百度分享',
		'desc' => '开启后在文章尾部显示百度分享按钮，文章图片也会带上百度图片分享。',
		'id' => 'post_baidu_share_toggle',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '百度分享参数配置',
		'desc' => '详见 <a href="http://share.baidu.com/code/advance#config" target="_blank">官方文档</a>',
		'id' => 'baidu_share_config',
		'type' => 'textarea',
		'std' => '<script type="text/javascript">
  window._bd_share_config = {
    "common": {
      "bdText": "Art-Molec | 文艺分子 | 一个自由设计师的图片博客，专注图形图像的设计编辑。",
      "bdMini": "2",
      "bdMiniList": ["mshare", "tieba", "bdhome", "qzone", "tqq", "douban", "renren", "kaixin001", "huaban", "duitang", "youdao", "evernotecn", "linkedin", "fbook", "twi", "copy"],
      "bdPic": "/wp-content/themes/Art-Molec/images/logo.png",
      "bdStyle": "2",
      "bdSize": "16",
      "bdPopupOffsetLeft": "-210",
      "bdPopupOffsetTop": "6"
    },
    "share": {
      bdCustomStyle: "/wp-content/themes/Art-molec/css/baidushare.css",
    },
    "image": {
      "tag": "canshare",
      "viewType": "list",
      "viewList": ["weixin", "qzone", "tsina", "tqq", "renren", "duitang", "huaban", "douban", "tieba"],
      "viewText": "分享到：",
      "viewSize": "16"
    }
  };
</script>'
	),
	array(
		'title' => '==========工具栏布局==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '开启全站底栏',
		'desc' => '打开/关闭全站底部小工具栏。',
		'id' => 'site_footbar_toggle',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '开启全站左边栏？',
		'desc' => '打开/关闭全站左边小工具栏，首页不显示',
		'id' => 'show_left_sidebar',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '左边栏跟随滚动（需要打开左边栏）',
		'desc' => '输入需要跟随的小工具序号，英文逗号隔开。第一个序号为1，留空则关闭跟随。',
		'id' => 'scroll_fixed_left_sidebar',
		'type' => 'text',
		'std' => '1,2',
	),
	array(
		'name' => '开启全站右边栏',
		'desc' => '打开/关闭全站右边小工具栏，首页不显示。',
		'id' => 'show_right_sidebar',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '右边栏跟随滚动（需要打开右边栏）',
		'desc' => '输入需要跟随的小工具序号，英文逗号隔开。第一个序号为1，留空则关闭跟随。',
		'id' => 'scroll_fixed_right_sidebar',
		'type' => 'text',
		'std' => '1,2',
	),
	array(
		'title' => '==========其它==========',
		'type' => 'subtitle'
	),
	array(
		'name' => '前后篇链接',
		'desc' => '文章尾部的前后篇链接',
		'id' => 'content_footer_adjpost',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '打赏按钮',
		'desc' => '在文章尾部显示打赏按钮。',
		'id' => 'content_footer_donate',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '打赏二维码图片',
		'desc' => '微信或支付宝收款码，或拼成一张，图片宽度不超过300px。填入绝对/相对路径。',
		'id' => 'content_footer_donate_qr',
		'type' => 'text',
		'std' => ''
	),
	array(
		'type' => 'panelend'
	),
	//标签六
	array(
        'title' => '优化',
        'id'    => 'wordpress_syttem_optimize',
        'type'  => 'panelstart'
    ),
	array(
		'name' => '去除分类链接中的category前缀',
		'desc' => '勾选以后记得到设置->固定链接中重新保存一下。',
		'id' => 'no_category_url',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '清理修订版本和缓存',
		'desc' => '勾选->保存，将清理文章修订版本和_transient_缓存，清理完后自动关闭。',
		'id' => 'delete_revisions_caches',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '<h3>为管理后台加密</h3>',
		'desc' => '勾选以后在下面设置问题和答案，使用“wp-login.php?问题=答案”才能访问登陆页面。',
		'id' => 'secret_login_toggle',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '设置问题',
		'desc' => '不可以用中文。',
		'id' => 'secret_login_key1',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '设置答案',
		'desc' => '不可以用中文。',
		'id' => 'secret_login_key2',
		'type' => 'text',
		'std' => ''
	),
	array(
		'name' => '评论过滤：验证码',
		'desc' => '发表评论前必须输入验证码(一个简单的算式)。',
		'id' => 'comment_with_verify',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '评论过滤：必须输入中文',
		'desc' => '开启/关闭评论必须包含中文。',
		'id' => 'comment_must_chinese',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'name' => '评论过滤：要求最少输入多少个汉字',
		'desc' => '评论中不包含设定数量的中文汉字即为非法评论。',
		'id' => 'comment_chinese_num',
		'type' => 'number',
		'std' => '5'
	),
	array(
		'name' => '评论过滤：敏感词',
		'desc' => '勾选后在后台设置->讨论->评论黑名单中添加敏感词，将直接拒绝而不是移入回收站。',
		'id' => 'comment_sensitive_words',
		'type' => 'checkbox',
		'std' => ''
	),
	array(
		'type' => 'panelend'
	),
);
 /* 主题后台设置已完成，下面可以不用看了 */

// 添加清理数据库功能 开始
if( isset( $_POST['uninstall'] ) ){
	echo '<html><head><meta charset="utf-8">
			<style type="text/css">
				*{margin:0;padding:0}
				body{background:#f1f1f1}
				.uninstall-wrap{width:100%;max-width:980px;background:#fff;margin:30px auto;color:#666;font-size:14px;padding:30px}
				p {margin:15px 30px}
				.ok {color:#1abc9c}
				.fail {color:#ccc}
				a {color:#478bab;text-decoration:none}
				a:hover{color:#f85327}
			</style></head><body>';
	echo '<div class="uninstall-wrap">';
	foreach ( $options as $values ){
		if( delete_option( $values['id'] ) ){
			echo '<p class="ok">删除"' . $values['id'] . '" ......成功</p>';
		} else {
			echo '<p class="fail">"' . $values['id'] . '" 不存在！</p>';
		}
	}
	delete_option('art_molec_setting_setup');
	echo '<p>卸载完成，请到<a href="themes.php">主题</a>选项中删除主题文件，感谢您的使用。</p>';
	echo '<p>欢迎<a href="http://www.ixcrap.com">到这里吐槽</a>，指出本主题的不足之处，帮助我改进。下一版本希望你回来！</p>';
	echo '</div></body></html>';
	exit;
// 添加清理数据库功能 结束
} else {
			
function add_art_molec_setting() {
    global $options;
    if ($_GET['page'] == basename(__FILE__)) {
        if ('update' == $_REQUEST['action']) {
            foreach($options as $value) {
                if (isset($_REQUEST[$value['id']])) {
                    update_option($value['id'], $_REQUEST[$value['id']]);
                } else {
                    delete_option($value['id']);
                }
            }
            header('Location: admin.php?page=theme-options.php&update=true');
            die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                update_option($value['id'], $value['std']);
            }
            header('Location: admin.php?page=theme-options.php&reset=true');
            die;
        }
    }
    add_menu_page('主题选项', '主题选项', 'edit_theme_options', basename(__FILE__) , 'art_molec_options');
}
add_action('admin_menu', 'add_art_molec_setting');

function art_molec_options() {
    global $options;
    if ($_REQUEST['update']) echo '<div class="updated"><p><strong>设置已保存。</strong></p></div>';
    if ($_REQUEST['reset']) echo '<div class="updated"><p><strong>设置已重置。</strong></p></div>';
?>

<div class="wrap">
    <h2>主题选项</h2>
    <input placeholder="筛选主题选项…" type="search" id="theme-options-search" />
    <form method="post">
        <h2 class="nav-tab-wrapper">
<?php
$panelIndex = 0;
foreach ($options as $value ) {
    if ( $value['type'] == 'panelstart' ) echo '<a href="#' . $value['id'] . '" class="nav-tab' . ( $panelIndex == 0 ? ' nav-tab-active' : '' ) . '">' . $value['title'] . '</a>';
    $panelIndex++;
}
echo '<a href="#about_theme" class="nav-tab">关于主题</a>';

?>
</h2>
<!-- 开始建立选项类型 -->
<?php
$panelIndex = 0;
foreach ($options as $value) {
switch ( $value['type'] ) {
    case 'panelstart'://最高标签
        echo '<div class="panel" id="' . $value['id'] . '" ' . ( $panelIndex == 0 ? ' style="display:block"' : '' ) . '><table class="form-table">';
        $panelIndex++;
        break;
    case 'panelend':
        echo '</table></div>';
        break;
    case 'subtitle':
        echo '<tr><th colspan="2"><h3>' . $value['title'] . '</h3></th></tr>';
        break;
    case 'text':
?>
<tr>
    <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
    <td>
        <label>
        <input name="<?php echo $value['id']; ?>" class="regular-text" id="<?php echo $value['id']; ?>" type='text' value="<?php if ( !empty( get_option( $value['id'] ) ) ) { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?>" />
        <span class="description"><?php echo $value['desc']; ?></span>
        </label>
    </td>
</tr>
<?php
    break;
    case 'number':
?>
<tr>
    <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
    <td>
        <label>
        <input name="<?php echo $value['id']; ?>" class="small-text" id="<?php echo $value['id']; ?>" type="number" value="<?php if ( !empty(get_option( $value['id'] ) ) ) { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
        <span class="description"><?php echo $value['desc']; ?></span>
        </label>
    </td>
</tr>
<?php
    break;
    case 'password':
?>
<tr>
    <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
    <td>
        <label>
        <input name="<?php echo $value['id']; ?>" class="regular-text" id="<?php echo $value['id']; ?>" type="password" value="<?php if ( !empty(get_option( $value['id'] ) ) ) { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
        <span class="description"><?php echo $value['desc']; ?></span>
        </label>
    </td>
</tr>
<?php
    break;
    case 'textarea':
?>
<tr>
    <th><?php echo $value['name']; ?></th>
    <td>
        <p><label for="<?php echo $value['id']; ?>"><?php echo $value['desc']; ?></label></p>
        <p><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="5" cols="50" class="large-text code"><?php if ( !empty(get_option( $value['id'] ))) { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></p>
    </td>
</tr>
<?php
    break;
    case 'select':
?>
<tr>
    <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
    <td>
        <label>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) : ?>
                <option value="<?php echo $option; ?>" <?php selected( get_option( $value['id'] ), $option); ?>>
                    <?php echo $option; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <span class="description"><?php echo $value['desc']; ?></span>
        </label>
    </td>
</tr>

<?php
    break;
    case 'radio':
?>
<tr>
    <th><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></th>
    <td>
        <?php foreach ($value['options'] as $name => $option) : ?>
        <label>
            <input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php checked( get_option( $value['id'] ), $option); ?>>
            <?php echo $name; ?>
        </label>
        <?php endforeach; ?>
        <p><span class="description"><?php echo $value['desc']; ?></span></p>
    </td>
</tr>
 
<?php
    break;
    case 'checkbox':
?>
<tr>
    <th><?php echo $value['name']; ?></th>
    <td>
        <label>
            <input type='checkbox' name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="1" <?php echo checked(get_option($value['id']), 1); ?> />
            <span><?php echo $value['desc']; ?></span>
        </label>
    </td>
</tr>

<?php
    break;
    case 'checkboxs':
?>
<tr>
    <th><?php echo $value['name']; ?></th>
    <td>
        <?php $checkboxsValue = get_option( $value['id'] );
        if ( !is_array($checkboxsValue) ) $checkboxsValue = array();
        foreach ( $value['options'] as $id => $title ) : ?>
        <label>
            <input type="checkbox" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>[]" value="<?php echo $id; ?>" <?php checked( in_array($id, $checkboxsValue), true); ?>>
            <?php echo $title; ?>
        </label>
        <?php endforeach; ?>
        <span class="description"><?php echo $value['desc']; ?></span>
    </td>
</tr>
<?php
    break;
}
}
?>
<!-- 结束建立选项类型 -->
<div class="panel" id="about_theme">
<h2>其他事项说明</h2>
    <p>主题说明文档</p>
</div>
<p class="submit" style="float:left;margin:10px;padding:0">
    <input name="submit" type="submit" class="button button-primary" value="保存选项"/>
    <input type="hidden" name="action" value="update" />
</p>
</form>
<form method="post">
<p style="float:left;margin:10px;padding:0">
    <input name="reset" type="submit" class="button button-secondary" value="重置选项" onclick="return confirm('将主题设置还原到默认状态？本操作不可逆，确定还原？');"/>
    <input type="hidden" name="action" value="reset" />
</p>
</form>
<form method="post">
<p style="float:left;margin:10px;padding:0">
	<input name="uninstall" type="submit" class="button uninstall " value="卸载主题" onclick="return confirm('将彻底清除所有“ Art-Molec 主题”在数据库中留下的设置，还您一个干净的环境，不会影响到主题之外的其他数据。\n本操作不可逆。本主题一定很糟你才会想这样做？');" />
</p>
</form>
</div>
<style>.panel{display:none}.panel h3{margin:0;font-size:1.2em}#panel_update ul{list-style-type:disc}.nav-tab-wrapper{clear:both}.nav-tab{position:relative}.nav-tab i:before{position:absolute;top:-10px;right:-8px;display:inline-block;padding:2px;border-radius:50%;background:#e14d43;color:#fff;content:"\f463";vertical-align:text-bottom;font:400 18px/1 dashicons;speak:none}#theme-options-search{display:none;float:right;margin-top:-34px;width:280px;font-weight:300;font-size:16px;line-height:1.5}.updated+#theme-options-search{margin-top:-91px}.wrap.searching .nav-tab-wrapper a,.wrap.searching .panel tr,#attrselector{display:none}.wrap.searching .panel{display:block !important}#attrselector[attrselector*=ok]{display:block}.uninstall{background:#d4d4d4!important;color:#bfbfbf!important;text-shadow:1px 1px 0 #e3e3e3!important}.uninstall:hover{background:#f04242!important;color:#fff!important;text-shadow:0 0!important}.uninstall-wrap{clear:both}</style>
<style id="theme-options-filter"></style>
<div id="attrselector" attrselector="ok" ></div>
<script>
jQuery(function ($) {
    $(".nav-tab").click(function () {
        $(this).addClass("nav-tab-active").siblings().removeClass("nav-tab-active");
        $(".panel").hide();
        $($(this).attr("href")).show();
        return false;
    });

    var themeOptionsFilter = $("#theme-options-filter");
    themeOptionsFilter.text("ok");
    if ($("#attrselector").is(":visible") && themeOptionsFilter.text() != "") {
        $(".panel tr").each(function (el) {
            $(this).attr("data-searchtext", $(this).text().replace(/\r|\n/g, '').replace(/ +/g, ' ').toLowerCase());
        });

        var wrap = $(".wrap");
        $("#theme-options-search").show().on("input propertychange", function () {
            var text = $(this).val().replace(/^ +| +$/, "").toLowerCase();
            if (text != "") {
                wrap.addClass("searching");
                themeOptionsFilter.text(".wrap.searching .panel tr[data-searchtext*='" + text + "']{display:block}");
            } else {
                wrap.removeClass("searching");
                themeOptionsFilter.text("");
            };
        });
    };
});
</script>
<?php
}
//启用主题后自动跳转至选项页面
global $pagenow;
    if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
    {
        wp_redirect( admin_url( 'admin.php?page=theme-options.php' ) );
    exit;
}
function art_enqueue_pointer_script_style( $hook_suffix ) {
    $enqueue_pointer_script_style = false;
    $dismissed_pointers = explode( ',', get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
    if( !in_array( 'art_options_pointer', $dismissed_pointers ) ) {
        $enqueue_pointer_script_style = true;
        add_action( 'admin_print_footer_scripts', 'art_pointer_print_scripts' );
    }
    if( $enqueue_pointer_script_style ) {
        wp_enqueue_style( 'wp-pointer' );
        wp_enqueue_script( 'wp-pointer' );
    }
}
add_action( 'admin_enqueue_scripts', 'art_enqueue_pointer_script_style' );

function art_pointer_print_scripts() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        var $menuAppearance = $("#toplevel_page_theme-options");
        $menuAppearance.pointer({
            content: '<h3>恭喜，您的主题安装成功！</h3><p>该主题支持选项，请访问<a href="admin.php?page=theme-options.php">主题选项</a>页面进行配置。</p>',
            position: {
                edge: "left",
                align: "center"
            },
            close: function() {
                $.post(ajaxurl, {
                    pointer: "art_options_pointer",
                    action: "dismiss-wp-pointer"
                });
            }
        }).pointer("open").pointer("widget").find("a").eq(0).click(function() {
            var href = $(this).attr("href");
            $menuAppearance.pointer("close");
            setTimeout(function(){
                location.href = href;
            }, 700);
            return false;
        });

        $(window).on("resize scroll", function() {
            $menuAppearance.pointer("reposition");
        });
        $("#collapse-menu").click(function() {
            $menuAppearance.pointer("reposition");
        });
    });
    </script>

<?php
}}