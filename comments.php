<?php 
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))   
        wp_die( '<p><strong>错误</strong>：请不要直接访问此页面！<a href="http://ixcrap.com">Art-Molec</a></p>', '非法访问', array( 'response' => 200, 'back_link' => true) );
?>
<section class="comments">
	<?php 
		if( is_user_logged_in() ){echo '<style>.comment-form-comment{width:95%}</style>';}
	?>
	<div class="comments-wrap w60 bf showsidebar">
		<?php 
			if(comments_open()){
				$args = array( 
					'label_submit' => '发表',
					'submit_field' => art_rewrite_submit_field(),
				);
			comment_form($args); 
		?>
			<div class="clear place"></div>
		<?php 
			if(have_comments()){ 
				echo '<h3 class="comment-list-title"><i class="fa fa-comments" aria-hidden="true"></i> ';
				echo '<a href="#comments" name="comments">本文收到' . $post -> comment_count . '条评论：</a></h3>';
				echo '<ul class=comment-list>';
				$comm_list = array(
					'style' => 'ul',
					'avatar_size' => '64',
					'max_depth' => '3'
				);
				wp_list_comments($comm_list);
				echo '</ul>';
				echo '<div class="comment-pagin">';
				$pagins = array(
					'prev_text' => '<i class="fa fa-caret-left" aria-hidden="true"></i>',
					'next_text' => '<i class="fa fa-caret-right" aria-hidden="true"></i>'
				);
				paginate_comments_links($pagins);
				echo '</div>';
			}else { //have_comments()
				echo '<h3 class="aligncenter">还没有评论，快来坐沙发吧~</h3>';
			}
		} else { //comments_open()
			echo '<h3 class="aligncenter">对不起，评论已经关闭！</h3>';
		}
		?>
	</div>
</section>