				<div class="article-content f-image w60  showsidebar">
					<?php breadcrumb_output(); ?>
					<div class="article-nav">
						<span class="prev-btn"><?php 
							previous_post_link('%link' , '<i class="fa fa-chevron-left" aria-hidden="true"></i> 上一篇' , 'true');
							?>
						</span>
						<span class="next-btn"><?php 
							next_post_link('%link' , '下一篇 <i class="fa fa-chevron-right" aria-hidden="true"></i>' , 'true');
							?>
						</span>
					</div>
					
					<div class="image-style clear single-content ff">
						<div class="slide-wrap" id="slide">
							<div class="imgs" id="imgs">
								<div class="gallery-btn" id="gallery-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
								<div class="gallery-btn" id="gallery-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
								<div class="gallery-counts">第<span id="gallery-now">1</span>/<span id="gallery-all">1</span>张</div>
								<?php 
									the_content();
								?>
							</div>
						</div>
					</div>