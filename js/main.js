	var __W_WIDTH;
	var __W_HEIGHT;
	var onLoading = false; // 用于AJAX判定
	var opened = false; // 用于展开按钮判定
	
	$(function(){
		__W_WIDTH = $(window).width();
		__W_HEIGHT = $(window).height();

		fillWindow(".index");
		searchFormVal();
		Auto_Setting();
		prettyPrint();

		/* 鼠标移入移出事件 －－－ 开始 */
		
		if(!navigator.userAgent.match(/mobile/i)){
			$(".gallery-thumb, .thumb, .stan-thumb").hover(function(e) {
				thumbCover(e);
			}, function() {
				thumbHidden();
			});
		}
		
		$(".thumb-cover").hover(function() {
			$(this).css({
				"opacity": "0.8",
				"visibility": "visible"
			});
		}, function() {
			$(this).css({
				"opacity": "0",
				"visibility": "hidden"
			});
		});
		
		if(!navigator.userAgent.match(/mobile/i)){
			$(".single-interact .bdsharebuttonbox").hover(
				function(){$("#bdshare-list").addClass("an-quick");},
				function(){$("#bdshare-list").removeClass("an-quick");}
			);
		}
		
		if(!navigator.userAgent.match(/mobile/i)){
			$(".single-interact .donate").hover(
				function(){$("#donate-qr").addClass("an-quick");},
				function(){$("#donate-qr").removeClass("an-quick");}
			);
		}
		
		/* 鼠标移入移出事件 －－－ 结束 */
		
		/* 点击事件 －－－ 开始 */
		$("#search-link, .open-search-screen, .search-button").click(function() {
			openSearch();
		});
		
		$(".close").click(function() {
			closeSearch();
		});
		
		$(".backtotop").click(function() {
			$("html,body").animate({
				scrollTop: "0px"
			}, 500);
		});
		
		$(".nav-button").click(function() {
			$(".navbar").toggleClass("navbar-height");
		});
		
		$(".share-button").click(function() {
			$("#header-bdshare").toggleClass("an-mh");
		});
		
		$(".footer-button").click(function() {
			$(".widget-wrap").animate({
				"right": "0px"
			}, 300);
		});
		
		$("#smiley-button").click(function() {
			$(".smiley-wrap").toggleClass("an-mh");
		});
		
		//导航菜单如果带有控制类("has-child-menu")，则点击失效，不打开链接而是显示子菜单
		$(".navbar>div>ul>li>a").click(function() {
			if ($(this).parents("li").hasClass("has-child-menu")) {
				$(this).siblings(".sub-menu").toggleClass("show");
				return false;
			} else {
				return true;
			}
		});
		
		$(".left-sidebar-toggle").click(function() {
			$(".left-sidebar").toggleClass("left-sidebar-move")
		});
		$(".right-sidebar-toggle").click(function() {
			$(".right-sidebar").toggleClass("right-sidebar-move")
		});
		
		$("body").click(function(e) {
			smallScreenCloseFloat(e)
		});
		
		//分类页展开按钮
		$(".open").click(function() {
			catAsideSlide($(this));
		});
		
		//文章页展开按钮
		$("#open").click(function() {
			singleAsideSlide($(this));
		});
		
		$(".arc-title").click(function() {
			var arCont = $(this).siblings(".arc-content");
			if (arCont.hasClass("open")) {
				arCont.animate({ maxHeight: "0" }, 100).removeClass("open")
			} else {
				arCont.animate({ maxHeight: "9999px" }, 300).addClass("open")
			}
		});
		
		$("#arc-all-open").click(function() {
			if ($(this).text() == "全部展开") {
				$(".arc-content").animate({ maxHeight: "9999px" }, 300).addClass("open");
				$(this).text("全部关闭")
			} else {
				$(".arc-content").animate({ maxHeight: "0" }, 300).removeClass("open");
				$(this).text("全部展开")
			}
		});
		
		$(".bdshare-button").click(function(){
			$("#bdshare-list").toggleClass("an-quick");
		});
		
		$(".donate-button").click(function(){
			$("#donate-qr").toggleClass("an-quick");
		});
		
		/* 点击事件 －－－ 结束 */
		
	}); // end for document.ready

	
	
	
	$(window).load(function(){
		
		indexBGslider( $("#bg-slider").children("div"), 10000 );
		indexBGslider( $(".index-desc-text"), 10000 );
		
		rollPub();
		subMenuClass();
		
		if( $("body").hasClass("single-format-image") ){
			ART__Gallery();
		}
		
		rowAutoHeihgt($(".skill"));
		
	});// end for window.load

	
	
	
	$(window).resize(function(){
		
		__W_WIDTH = $(window).width();
		__W_HEIGHT = $(window).height();
		
		fillWindow(".index");
		subMenuClass();
		
		if ($(".search-screen").width() > 0 && $(".search-screen").height() > 0) {
			fillWindow(".search-screen");
		}
		
		rowAutoHeihgt($(".skill"));
		
	});// end for window.resize

	
	
	
	$(window).scroll(function() {
		
		skillAnimate();
		indexPostAnimate();
		fixedSidebar();
		
		// 判断滚动偏移调用AJAX加载
		if ( $(document).scrollTop() + $(window).height() > $(document).height() - 100 && onLoading == false ) {
			loadAjax("#pagin", "#pagin a", "#ajaxloader", "#content", "已经到底了~", plusAjaxResult);
			onLoading = true;
		}
		
		// 显示回到顶部按钮
		if ($(window).scrollTop() > 300) {
			$(".backtotop").css("display", "block")
		} else {
			$(".backtotop").css("display", "none")
		}
		
	});// end for window.scroll
	

/* 以下开始自定义方法 */	

/* 页面初始化设置 */
function Auto_Setting(){
	
	//正文高度不足时隐藏展开按钮 －－－ 分类页
	$(".scroll-height").map(function(){
		if ($(this).height() <= 560) {
			$(this).parents(".aside-excerpt").siblings(".more-link").find(".open").hide();
			$(this).siblings(".opacity").hide();
		}
	});
	
	//正文高度不足时隐藏展开按钮 －－－ 文章页
	if ( $(".aside-style").height() < 700 && $(".aside-style").length > 0 ) {
		$("#open").hide();
		$(".opacity").hide();
	}
	
	$(".wp-caption a img").attr("data-tag", "canshare");
	$(".wp-caption").removeAttr("style");
	$(".wp-caption").find("img").removeAttr("width height");
	$(".wp-caption").find("img").parent("a").attr("target", "_blank");
	
}

/* 
 * 设置某个元素布满浏览器视口
 * @param {obj} 指定要布满视口的对象，使用JQ选择器
 */
function fillWindow(obj){
	$(obj).css({"width": __W_WIDTH, "height": __W_HEIGHT});
}

/* 窗口滚动到一定位置时为首页简介模块加载动画 */
function skillAnimate() {
	var scroll = $(window).scrollTop();
	var obj = $(".skill");
	var i = 0;
	if (scroll > __W_HEIGHT / 2) {
		var animateTimer = setInterval(function() {
			if (obj.length > i) {
				obj.eq(i).addClass("an-skill");
				i++;
			} else {
				clearInterval(animateTimer);
			}
		}, 300);
	}
}

/* 窗口滚动到一定位置时为首页置顶文章模块加载动画 */
function indexPostAnimate() {
	var scroll = $(window).scrollTop();
	if( $(".sticky-wrap").length > 0 ){
		var top = $(".sticky-wrap").offset();
	}
	var obj = $(".index-post");
	var i = 0;
	if (scroll > top - __W_HEIGHT / 2) {
		var animateTimer = setInterval( function() {
			if (obj.length > i) {
				obj.eq(i).addClass("an-rotate");
				i++;
			} else {
				clearInterval(animateTimer);
			}
		}, 300);
	}
}

/*
 * 淡入淡出轮播图
 * @param {slider} JQ对象
 * @param {interval} 图片停留的时间 (ms)
 */
function indexBGslider(slider, interval){
	var i = 0;
	slider.eq(0).addClass("an-ss").siblings().addClass("an-hs");
	setInterval(function() {
		(slider.length > i + 1) ? i ++ : i = 0;
		slider.eq(i).addClass("an-ss").removeClass("an-hs").siblings().addClass("an-hs").removeClass("an-ss");
	}, interval);
}

/*
 * 控制同级子元素自适应等高
 * @param {obj} JQ对象
 * @var {oh} 缓存对象高度
 */
function rowAutoHeihgt(obj){
	obj.css("height", "auto");
	var oh = 0;
	obj.each(function(){
		if( $(this).height() > oh ){
			oh = $(this).height();
		}
	});
	obj.css("height", oh);
}

/* AJAX回调函数 为返回的对象绑定一些事件 */
function plusAjaxResult(result) {
	
	// 为缩略图绑定hover事件 @param {e} 当前鼠标指向对象
	if(!navigator.userAgent.match(/mobile/i)){
		result.find(".gallery-thumb, .thumb, .stan-thumb").on({
			mouseover: function(e) {
				thumbCover(e);
			},
			mouseout: function() {
				thumbHidden();
			}
		});
	}
	
	/*
	 * ( 请求返回的新对象用on('load')绑定事件无效 )
	 * ( 使用ready，在对象就绪后再执行函数有效 )
	 * @目的：遍历新载入的对象，判断高度不足时隐藏展开按钮
	 */
	result.find(".scroll-height").ready(function(){
		$(".scroll-height").map(function(){
			if ($(this).height() <= 560) {
				$(this).parents(".aside-excerpt").siblings(".more-link").find(".open").hide();
				$(this).siblings(".opacity").hide();
			}
		});
	});
	
	result.find(".open").on( "click", function(){
			catAsideSlide($(this));
	});
}

/*
 * AJAX加载下一页文章列表
 * @param {page} 分页导航对象
 * @param {url} 包含下一页链接的对象
 * @param {next} 在下一页需要提取的对象
 * @param {waitin} 本页中等待插入结果的对象
 * ---------以上参数均采用JQ选择器------------
 * @param {done} 没有更多结果时显示的文字
 * @param {callback} 调用函数处理返回的结果
 */
function loadAjax(page, url, next, waitin, done, callback) {
	var nextUrl = $(url).attr("href");
	if (nextUrl == undefined) {
		return false;
	}
	if (onLoading) {
		return false;
	} else {
		onLoading = true;
		$(page).show(0);
		$.ajax({
			type: "GET",
			url: nextUrl,
			beforeSent: function(xhr) {
				xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
			},
			success: function(data) {
				var result = $(data).find(next);
				nextUrl = $(data).find(url).attr("href");
				$(waitin).append(result);
				$(page).hide();
				callback(result);
				if (nextUrl != undefined) {
					$(url).attr("href", nextUrl);
					onLoading = false;
				} else {
					$(page).html(done).show(0);
					return false;
				}
			},
		});
	}
}

/* 分类页   文章列表缩略图鼠标移入变暗效果 */
function thumbCover(e) {
	var top = $(e.target).offset().top;
	var left = $(e.target).offset().left;
	var width = $(e.target).width();
	var height = $(e.target).height();
	var href = $(e.target).parents("a").attr("href");
	$(".thumb-cover").offset({
		"top": top,
		"left": left
	}).css({
		"opacity": "0.8",
		"visibility": "visible"
	}).width(width).height(height);
	$("#thumb-border").attr("href", href)
}

/* 分类页   文章列表缩略图鼠标移出恢复 */
function thumbHidden() {
	$(".thumb-cover").css({
		"opacity": "0",
		"visibility": "hidden"
	})
}

/*  头部滚动公告栏 */
function rollPub() {
	var i = 0;
	var pub = $("#roll-pub ul li");
	var size = pub.size();
	$(pub.parent()).append(pub.eq(0).clone());
	var timer = setInterval( function(){
		roll();
	}, 5000);
	function roll(){
		if (i < size - 1) {
			pub.parent().animate({
				"margin-top": -(pub.height() * (i + 1))
			}, 500);
			i++;
		} else {
			pub.parent().animate({
				"margin-top": -(pub.height() * (i + 1))
			}, 500, function() {
				i = 0;
				pub.parent().css("margin-top", "0");
			});
		}
	}
	pub.hover(function(){
		clearInterval(timer);
	}, function(){
		timer = setInterval( function(){
			roll();
		}, 5000);
	});
}

/* 开启和关闭搜索界面 */
function openSearch() {
	fillWindow(".search-screen");
	$(".search-screen").css("visibility", "visible");
}
function closeSearch() {
	$(".search-screen").width(0).height(0).css("visibility", "hidden");
}

/*  搜索框占位文本 */
function searchFormVal(){
	var val = $(".search-input-text").val();
	$(".search-input-text").blur(function() {
		$(this).attr("value", val);
	});
	$(".search-input-text").focus(function() {
		$(this).attr("value", "");
	});
}

/* 小窗口时为导航菜单添加控制类 */
function subMenuClass() {
	if ( __W_WIDTH < 960 || navigator.userAgent.match(/mobi/i) ) {
		$(".navbar>div>ul>li").has(".sub-menu").addClass("has-child-menu");
	} else {
		$(".navbar>div>ul>li").removeClass("has-child-menu");
	}
}

/* 关闭浮动窗口 */
function smallScreenCloseFloat(e) {
	if ( $(e.target).closest(".share-button").length == 0) {
		$("#header-bdshare").removeClass("an-mh");
	}
	if ( $(e.target).closest(".footer-button").length == 0) {
		$(".widget-wrap").animate({ "right": "-240px" }, 300);
	}
	if ( $(e.target).closest(".nav-button").length == 0) {
		$(".navbar").removeClass("navbar-height");
	}
	if ($(e.target).closest("#smiley-button").length == 0) {
		$(".smiley-wrap").removeClass("an-mh");
	}
	if ( $(e.target).closest(".has-child-menu").length == 0) {
		$(".sub-menu").removeClass("show");
	}
	if ( $(e.target).closest(".left-sidebar-toggle").length == 0) {
		$(".left-sidebar").removeClass("left-sidebar-move");
	}
	if ( $(e.target).closest(".right-sidebar-toggle").length == 0) {
		$(".right-sidebar").removeClass("right-sidebar-move");
	}
	if ( $(e.target).closest(".bdshare-button").length == 0) {
		$("#bdshare-list").removeClass("an-quick");
	}
	if ( $(e.target).closest(".donate-button").length == 0) {
		$("#donate-qr").removeClass("an-quick");
	}
}

/* 获取后台设置参数，创建边栏新对象 */
function scrollFixedSidebar() {
	if ($("meta[name=scroll_fixed_left_sidebar]").length > 0) {
		var index1 = $("meta[name=scroll_fixed_left_sidebar]").attr("content").split(",");
		$("body").append('<div id="fixed-left-sidebar" class="left-sidebar"></div>');
		for (var i = 0; i < index1.length; i++) {
			$("#fixed-left-sidebar").append($("#left-sidebar .left-sidebar-widget").eq(index1[i] - 1).clone());
		}
		$("#left-sidebar").hide();
	} else {
		return false;
	}
	if ($("meta[name=scroll_fixed_right_sidebar]").length > 0) {
		var index2 = $("meta[name=scroll_fixed_right_sidebar]").attr("content").split(",");
		$("body").append('<div id="fixed-right-sidebar" class="right-sidebar"></div>');
		for (var i = 0; i < index2.length; i++) {
			$("#fixed-right-sidebar").append($("#right-sidebar .right-sidebar-widget").eq(index2[i] - 1).clone());
		}
		$("#right-sidebar").hide();
	} else {
		return false;
	}
}

/* 获取边栏新对象并随窗口滚动 */
function fixedSidebar(){
	var leftSide = $("#fixed-left-sidebar");
	var rightSide = $("#fixed-right-sidebar");
	var sidebarMaxHeight = Math.max( $("#left-sidebar").height(), $("#right-sidebar").height() );
	if ($(".widget-wrap").length > 0) {
		var outLine = $(".widget-wrap").offset().top - $(window).scrollTop()
	} else {
		var outLine = $("footer").offset().top - $(window).scrollTop();
	}
	if (__W_WIDTH > 959 && $(window).scrollTop() > sidebarMaxHeight) {
		if (leftSide.length > 0 || rightSide.length > 0) {
			if (leftSide.height() > outLine) {
				leftSide.css("top", outLine - leftSide.height());
			} else {
				leftSide.css("top", 0);
			}
			if (rightSide.height() > outLine) {
				rightSide.css("top", outLine - rightSide.height());
			} else {
				rightSide.css("top", 0);
			}
			return false;
		} else {
			scrollFixedSidebar();
		}
	} else {
		if (leftSide.length > 0) {
			leftSide.remove();
		}
		if (rightSide.length > 0) {
			rightSide.remove();
		}
		$("#left-sidebar,#right-sidebar").show();
	}
}

/* 分类页 aside文章形式卷展栏  @param {e} 使用JQ对象*/
function catAsideSlide(e){
	var parent = e.parents(".post-box").children(".aside-excerpt");
	var op = e.parents(".post-box").find(".opacity");
	if (parent.attr("open-status") == "false") {
		parent.animate({
			maxHeight: '9999px'
		}, 500, function() {
			parent.attr("open-status", "true");
		});
		op.hide(300)
	} else {
		parent.css("maxHeight", "560px", 0).attr("open-status", "false");
		op.show(0);
	}
	e.text(e.text() == "+ 展开全文" ? "- 关闭" : "+ 展开全文");
}

/* 文章页 aside文章形式卷展栏 */ 
function singleAsideSlide(e){
	if (opened == false) {
		$(".aside-style").animate({
			maxHeight: '9999px'
		}, 700);
		$(".opacity").hide(300);
		opened = true;
	} else {
		$(".aside-style").css("maxHeight", "700px");
		$(".opacity").show();
		opened = false;
	}
	e.text(e.text() == "+ 展开全文" ? "- 关闭" : "+ 展开全文");
}

/* 相册浏览器 文章形式为gallery时调用 */
function ART__Gallery(){
	var rollObj = $("#imgs").find(".wp-caption");
	var clickObj = $("#list-wrap").find("li");
	var infoObj = $(".gallery-info-wrap").find(".gallery-info-content");
	var e = 0;
	var listWrapWidth = 0;
	var galleryBtnClick = false;
	
	rollObj.eq(0).fadeIn(0);
	clickObj.eq(0).addClass("onactive");
	infoObj.eq(0).fadeIn(0);
	$("#gallery-all").text(rollObj.length);
	$(".gallery-btn").css("top", (rollObj.eq(0).find("img").height() / 2 - 30));

	for (var i = 0; i < $("#list-wrap li").length; i++) {
		listWrapWidth += $("#list-wrap li").eq(i).outerWidth();
	}
	$("#list-wrap").css("width", listWrapWidth + "px");
	
	clickObj.click(function() {
		thumbClick($(this).index());
		e = $(this).index();
	});

	$("#gallery-prev").click(function() {
		if (e <= 0) {
			e = clickObj.length - 1;
		} else {
			e--;
		}
		if (galleryBtnClick == false) {
			galleryBtnClick = true;
			thumbClick(e);
		}
	});
	
	$("#gallery-next").click(function() {
		if (e >= clickObj.length - 1) {
			e = 0;
		} else {
			e++;
		}
		if (galleryBtnClick == false) {
			galleryBtnClick = true;
			thumbClick(e);
		}
	});
	
	function thumbClick(roll) {
		
		clickObj.eq(roll).addClass("onactive").siblings().removeClass("onactive");
		rollObj.eq(roll).fadeIn(0).siblings(".wp-caption").fadeOut(0);
		infoObj.eq(roll).fadeIn(0).siblings(".gallery-info-content").fadeOut(0);
		$("#gallery-now").text(roll + 1);
		$(".gallery-btn").css("top", (rollObj.eq(roll).find("img").height() / 2 - 30));
		
		var po = clickObj.eq(roll).parents("#list-wrap").position();
		var clickPo = clickObj.eq(roll).position();
		var clickW = clickObj.eq(roll).outerWidth();
		var half = $(".gallery-thumb-container").outerWidth() / 2;
		var left = half - clickPo.left - clickW / 2;
		
		if (left < 0 && listWrapWidth > (half * 2) && (half * 2 - listWrapWidth - left) > 0) {
			left = -(listWrapWidth - half * 2 + 8);
		} else if (left > 0) {
			left = 0;
		}
		
		clickObj.eq(roll).parents("#list-wrap").animate({
			"left": left
		}, 300);
		
		galleryBtnClick = false;
	}
}

/* 评论表情 */
function grin(tag) {
	var myField;
	tag = ' ' + tag + ' ';
	if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
		myField = document.getElementById('comment');
	} else {
		return false;
	}
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		var cursorPos = endPos;
		myField.value = myField.value.substring(0, startPos)
					  + tag
					  + myField.value.substring(endPos, myField.value.length);
		cursorPos += tag.length;
		myField.focus();
		myField.selectionStart = cursorPos;
		myField.selectionEnd = cursorPos;
	}
	else {
		myField.value += tag;
		myField.focus();
	}
}
	
/* 代码高亮 来自云落 http://googlo.me */
!function(){var q=null;window.PR_SHOULD_USE_CONTINUATION=!0;
(function(){function S(a){function d(e){var b=e.charCodeAt(0);if(b!==92)return b;var a=e.charAt(1);return(b=r[a])?b:"0"<=a&&a<="7"?parseInt(e.substring(1),8):a==="u"||a==="x"?parseInt(e.substring(2),16):e.charCodeAt(1)}function g(e){if(e<32)return(e<16?"\\x0":"\\x")+e.toString(16);e=String.fromCharCode(e);return e==="\\"||e==="-"||e==="]"||e==="^"?"\\"+e:e}function b(e){var b=e.substring(1,e.length-1).match(/\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\S\s]|[^\\]/g),e=[],a=
b[0]==="^",c=["["];a&&c.push("^");for(var a=a?1:0,f=b.length;a<f;++a){var h=b[a];if(/\\[bdsw]/i.test(h))c.push(h);else{var h=d(h),l;a+2<f&&"-"===b[a+1]?(l=d(b[a+2]),a+=2):l=h;e.push([h,l]);l<65||h>122||(l<65||h>90||e.push([Math.max(65,h)|32,Math.min(l,90)|32]),l<97||h>122||e.push([Math.max(97,h)&-33,Math.min(l,122)&-33]))}}e.sort(function(e,a){return e[0]-a[0]||a[1]-e[1]});b=[];f=[];for(a=0;a<e.length;++a)h=e[a],h[0]<=f[1]+1?f[1]=Math.max(f[1],h[1]):b.push(f=h);for(a=0;a<b.length;++a)h=b[a],c.push(g(h[0])),
h[1]>h[0]&&(h[1]+1>h[0]&&c.push("-"),c.push(g(h[1])));c.push("]");return c.join("")}function s(e){for(var a=e.source.match(/\[(?:[^\\\]]|\\[\S\s])*]|\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\\d+|\\[^\dux]|\(\?[!:=]|[()^]|[^()[\\^]+/g),c=a.length,d=[],f=0,h=0;f<c;++f){var l=a[f];l==="("?++h:"\\"===l.charAt(0)&&(l=+l.substring(1))&&(l<=h?d[l]=-1:a[f]=g(l))}for(f=1;f<d.length;++f)-1===d[f]&&(d[f]=++x);for(h=f=0;f<c;++f)l=a[f],l==="("?(++h,d[h]||(a[f]="(?:")):"\\"===l.charAt(0)&&(l=+l.substring(1))&&l<=h&&
(a[f]="\\"+d[l]);for(f=0;f<c;++f)"^"===a[f]&&"^"!==a[f+1]&&(a[f]="");if(e.ignoreCase&&m)for(f=0;f<c;++f)l=a[f],e=l.charAt(0),l.length>=2&&e==="["?a[f]=b(l):e!=="\\"&&(a[f]=l.replace(/[A-Za-z]/g,function(a){a=a.charCodeAt(0);return"["+String.fromCharCode(a&-33,a|32)+"]"}));return a.join("")}for(var x=0,m=!1,j=!1,k=0,c=a.length;k<c;++k){var i=a[k];if(i.ignoreCase)j=!0;else if(/[a-z]/i.test(i.source.replace(/\\u[\da-f]{4}|\\x[\da-f]{2}|\\[^UXux]/gi,""))){m=!0;j=!1;break}}for(var r={b:8,t:9,n:10,v:11,
f:12,r:13},n=[],k=0,c=a.length;k<c;++k){i=a[k];if(i.global||i.multiline)throw Error(""+i);n.push("(?:"+s(i)+")")}return RegExp(n.join("|"),j?"gi":"g")}function T(a,d){function g(a){var c=a.nodeType;if(c==1){if(!b.test(a.className)){for(c=a.firstChild;c;c=c.nextSibling)g(c);c=a.nodeName.toLowerCase();if("br"===c||"li"===c)s[j]="\n",m[j<<1]=x++,m[j++<<1|1]=a}}else if(c==3||c==4)c=a.nodeValue,c.length&&(c=d?c.replace(/\r\n?/g,"\n"):c.replace(/[\t\n\r ]+/g," "),s[j]=c,m[j<<1]=x,x+=c.length,m[j++<<1|1]=
a)}var b=/(?:^|\s)nocode(?:\s|$)/,s=[],x=0,m=[],j=0;g(a);return{a:s.join("").replace(/\n$/,""),d:m}}function H(a,d,g,b){d&&(a={a:d,e:a},g(a),b.push.apply(b,a.g))}function U(a){for(var d=void 0,g=a.firstChild;g;g=g.nextSibling)var b=g.nodeType,d=b===1?d?a:g:b===3?V.test(g.nodeValue)?a:d:d;return d===a?void 0:d}function C(a,d){function g(a){for(var j=a.e,k=[j,"pln"],c=0,i=a.a.match(s)||[],r={},n=0,e=i.length;n<e;++n){var z=i[n],w=r[z],t=void 0,f;if(typeof w==="string")f=!1;else{var h=b[z.charAt(0)];
if(h)t=z.match(h[1]),w=h[0];else{for(f=0;f<x;++f)if(h=d[f],t=z.match(h[1])){w=h[0];break}t||(w="pln")}if((f=w.length>=5&&"lang-"===w.substring(0,5))&&!(t&&typeof t[1]==="string"))f=!1,w="src";f||(r[z]=w)}h=c;c+=z.length;if(f){f=t[1];var l=z.indexOf(f),B=l+f.length;t[2]&&(B=z.length-t[2].length,l=B-f.length);w=w.substring(5);H(j+h,z.substring(0,l),g,k);H(j+h+l,f,I(w,f),k);H(j+h+B,z.substring(B),g,k)}else k.push(j+h,w)}a.g=k}var b={},s;(function(){for(var g=a.concat(d),j=[],k={},c=0,i=g.length;c<i;++c){var r=
g[c],n=r[3];if(n)for(var e=n.length;--e>=0;)b[n.charAt(e)]=r;r=r[1];n=""+r;k.hasOwnProperty(n)||(j.push(r),k[n]=q)}j.push(/[\S\s]/);s=S(j)})();var x=d.length;return g}function v(a){var d=[],g=[];a.tripleQuotedStrings?d.push(["str",/^(?:'''(?:[^'\\]|\\[\S\s]|''?(?=[^']))*(?:'''|$)|"""(?:[^"\\]|\\[\S\s]|""?(?=[^"]))*(?:"""|$)|'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$))/,q,"'\""]):a.multiLineStrings?d.push(["str",/^(?:'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$)|`(?:[^\\`]|\\[\S\s])*(?:`|$))/,
q,"'\"`"]):d.push(["str",/^(?:'(?:[^\n\r'\\]|\\.)*(?:'|$)|"(?:[^\n\r"\\]|\\.)*(?:"|$))/,q,"\"'"]);a.verbatimStrings&&g.push(["str",/^@"(?:[^"]|"")*(?:"|$)/,q]);var b=a.hashComments;b&&(a.cStyleComments?(b>1?d.push(["com",/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,q,"#"]):d.push(["com",/^#(?:(?:define|e(?:l|nd)if|else|error|ifn?def|include|line|pragma|undef|warning)\b|[^\n\r]*)/,q,"#"]),g.push(["str",/^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h(?:h|pp|\+\+)?|[a-z]\w*)>/,q])):d.push(["com",
/^#[^\n\r]*/,q,"#"]));a.cStyleComments&&(g.push(["com",/^\/\/[^\n\r]*/,q]),g.push(["com",/^\/\*[\S\s]*?(?:\*\/|$)/,q]));if(b=a.regexLiterals){var s=(b=b>1?"":"\n\r")?".":"[\\S\\s]";g.push(["lang-regex",RegExp("^(?:^^\\.?|[+-]|[!=]=?=?|\\#|%=?|&&?=?|\\(|\\*=?|[+\\-]=|->|\\/=?|::?|<<?=?|>>?>?=?|,|;|\\?|@|\\[|~|{|\\^\\^?=?|\\|\\|?=?|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\\s*("+("/(?=[^/*"+b+"])(?:[^/\\x5B\\x5C"+b+"]|\\x5C"+s+"|\\x5B(?:[^\\x5C\\x5D"+b+"]|\\x5C"+
s+")*(?:\\x5D|$))+/")+")")])}(b=a.types)&&g.push(["typ",b]);b=(""+a.keywords).replace(/^ | $/g,"");b.length&&g.push(["kwd",RegExp("^(?:"+b.replace(/[\s,]+/g,"|")+")\\b"),q]);d.push(["pln",/^\s+/,q," \r\n\t\u00a0"]);b="^.[^\\s\\w.$@'\"`/\\\\]*";a.regexLiterals&&(b+="(?!s*/)");g.push(["lit",/^@[$_a-z][\w$@]*/i,q],["typ",/^(?:[@_]?[A-Z]+[a-z][\w$@]*|\w+_t\b)/,q],["pln",/^[$_a-z][\w$@]*/i,q],["lit",/^(?:0x[\da-f]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+-]?\d+)?)[a-z]*/i,q,"0123456789"],["pln",/^\\[\S\s]?/,
q],["pun",RegExp(b),q]);return C(d,g)}function J(a,d,g){function b(a){var c=a.nodeType;if(c==1&&!x.test(a.className))if("br"===a.nodeName)s(a),a.parentNode&&a.parentNode.removeChild(a);else for(a=a.firstChild;a;a=a.nextSibling)b(a);else if((c==3||c==4)&&g){var d=a.nodeValue,i=d.match(m);if(i)c=d.substring(0,i.index),a.nodeValue=c,(d=d.substring(i.index+i[0].length))&&a.parentNode.insertBefore(j.createTextNode(d),a.nextSibling),s(a),c||a.parentNode.removeChild(a)}}function s(a){function b(a,c){var d=
c?a.cloneNode(!1):a,e=a.parentNode;if(e){var e=b(e,1),g=a.nextSibling;e.appendChild(d);for(var i=g;i;i=g)g=i.nextSibling,e.appendChild(i)}return d}for(;!a.nextSibling;)if(a=a.parentNode,!a)return;for(var a=b(a.nextSibling,0),d;(d=a.parentNode)&&d.nodeType===1;)a=d;c.push(a)}for(var x=/(?:^|\s)nocode(?:\s|$)/,m=/\r\n?|\n/,j=a.ownerDocument,k=j.createElement("li");a.firstChild;)k.appendChild(a.firstChild);for(var c=[k],i=0;i<c.length;++i)b(c[i]);d===(d|0)&&c[0].setAttribute("value",d);var r=j.createElement("ol");
r.className="linenums";for(var d=Math.max(0,d-1|0)||0,i=0,n=c.length;i<n;++i)k=c[i],k.className="L"+(i+d)%10,k.firstChild||k.appendChild(j.createTextNode("\u00a0")),r.appendChild(k);a.appendChild(r)}function p(a,d){for(var g=d.length;--g>=0;){var b=d[g];F.hasOwnProperty(b)?D.console&&console.warn("cannot override language handler %s",b):F[b]=a}}function I(a,d){if(!a||!F.hasOwnProperty(a))a=/^\s*</.test(d)?"default-markup":"default-code";return F[a]}function K(a){var d=a.h;try{var g=T(a.c,a.i),b=g.a;
a.a=b;a.d=g.d;a.e=0;I(d,b)(a);var s=/\bMSIE\s(\d+)/.exec(navigator.userAgent),s=s&&+s[1]<=8,d=/\n/g,x=a.a,m=x.length,g=0,j=a.d,k=j.length,b=0,c=a.g,i=c.length,r=0;c[i]=m;var n,e;for(e=n=0;e<i;)c[e]!==c[e+2]?(c[n++]=c[e++],c[n++]=c[e++]):e+=2;i=n;for(e=n=0;e<i;){for(var p=c[e],w=c[e+1],t=e+2;t+2<=i&&c[t+1]===w;)t+=2;c[n++]=p;c[n++]=w;e=t}c.length=n;var f=a.c,h;if(f)h=f.style.display,f.style.display="none";try{for(;b<k;){var l=j[b+2]||m,B=c[r+2]||m,t=Math.min(l,B),A=j[b+1],G;if(A.nodeType!==1&&(G=x.substring(g,
t))){s&&(G=G.replace(d,"\r"));A.nodeValue=G;var L=A.ownerDocument,o=L.createElement("span");o.className=c[r+1];var v=A.parentNode;v.replaceChild(o,A);o.appendChild(A);g<l&&(j[b+1]=A=L.createTextNode(x.substring(t,l)),v.insertBefore(A,o.nextSibling))}g=t;g>=l&&(b+=2);g>=B&&(r+=2)}}finally{if(f)f.style.display=h}}catch(u){D.console&&console.log(u&&u.stack||u)}}var D=window,y=["break,continue,do,else,for,if,return,while,count"],E=[[y,"auto,case,char,const,default,double,enum,extern,float,goto,inline,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"],
"catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"],M=[E,"alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,delegate,dynamic_cast,explicit,export,friend,generic,late_check,mutable,namespace,nullptr,property,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],N=[E,"abstract,assert,boolean,byte,extends,final,finally,implements,import,instanceof,interface,null,native,package,strictfp,super,synchronized,throws,transient"],
O=[N,"as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,foreach,from,group,implicit,in,internal,into,is,let,lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var,virtual,where"],E=[E,"debugger,eval,export,function,get,null,set,undefined,var,with,Infinity,NaN"],P=[y,"and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],
Q=[y,"alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],W=[y,"as,assert,const,copy,drop,enum,extern,fail,false,fn,impl,let,log,loop,match,mod,move,mut,priv,pub,pure,ref,self,static,struct,true,trait,type,unsafe,use"],y=[y,"case,done,elif,esac,eval,fi,function,in,local,set,then,until"],R=/^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)\b/,
V=/\S/,X=v({keywords:[M,O,E,"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",P,Q,y],hashComments:!0,cStyleComments:!0,multiLineStrings:!0,regexLiterals:!0}),F={};p(X,["default-code"]);p(C([],[["pln",/^[^<?]+/],["dec",/^<!\w[^>]*(?:>|$)/],["com",/^<\!--[\S\s]*?(?:--\>|$)/],["lang-",/^<\?([\S\s]+?)(?:\?>|$)/],["lang-",/^<%([\S\s]+?)(?:%>|$)/],["pun",/^(?:<[%?]|[%?]>)/],["lang-",
/^<xmp\b[^>]*>([\S\s]+?)<\/xmp\b[^>]*>/i],["lang-js",/^<script\b[^>]*>([\S\s]*?)(<\/script\b[^>]*>)/i],["lang-css",/^<style\b[^>]*>([\S\s]*?)(<\/style\b[^>]*>)/i],["lang-in.tag",/^(<\/?[a-z][^<>]*>)/i]]),["default-markup","htm","html","mxml","xhtml","xml","xsl"]);p(C([["pln",/^\s+/,q," \t\r\n"],["atv",/^(?:"[^"]*"?|'[^']*'?)/,q,"\"'"]],[["tag",/^^<\/?[a-z](?:[\w-.:]*\w)?|\/?>$/i],["atn",/^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],["lang-uq.val",/^=\s*([^\s"'>]*(?:[^\s"'/>]|\/(?=\s)))/],["pun",/^[/<->]+/],
["lang-js",/^on\w+\s*=\s*"([^"]+)"/i],["lang-js",/^on\w+\s*=\s*'([^']+)'/i],["lang-js",/^on\w+\s*=\s*([^\s"'>]+)/i],["lang-css",/^style\s*=\s*"([^"]+)"/i],["lang-css",/^style\s*=\s*'([^']+)'/i],["lang-css",/^style\s*=\s*([^\s"'>]+)/i]]),["in.tag"]);p(C([],[["atv",/^[\S\s]+/]]),["uq.val"]);p(v({keywords:M,hashComments:!0,cStyleComments:!0,types:R}),["c","cc","cpp","cxx","cyc","m"]);p(v({keywords:"null,true,false"}),["json"]);p(v({keywords:O,hashComments:!0,cStyleComments:!0,verbatimStrings:!0,types:R}),
["cs"]);p(v({keywords:N,cStyleComments:!0}),["java"]);p(v({keywords:y,hashComments:!0,multiLineStrings:!0}),["bash","bsh","csh","sh"]);p(v({keywords:P,hashComments:!0,multiLineStrings:!0,tripleQuotedStrings:!0}),["cv","py","python"]);p(v({keywords:"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",hashComments:!0,multiLineStrings:!0,regexLiterals:2}),["perl","pl","pm"]);p(v({keywords:Q,
hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["rb","ruby"]);p(v({keywords:E,cStyleComments:!0,regexLiterals:!0}),["javascript","js"]);p(v({keywords:"all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,throw,true,try,unless,until,when,while,yes",hashComments:3,cStyleComments:!0,multilineStrings:!0,tripleQuotedStrings:!0,regexLiterals:!0}),["coffee"]);p(v({keywords:W,cStyleComments:!0,multilineStrings:!0}),["rc","rs","rust"]);
p(C([],[["str",/^[\S\s]+/]]),["regex"]);var Y=D.PR={createSimpleLexer:C,registerLangHandler:p,sourceDecorator:v,PR_ATTRIB_NAME:"atn",PR_ATTRIB_VALUE:"atv",PR_COMMENT:"com",PR_DECLARATION:"dec",PR_KEYWORD:"kwd",PR_LITERAL:"lit",PR_NOCODE:"nocode",PR_PLAIN:"pln",PR_PUNCTUATION:"pun",PR_SOURCE:"src",PR_STRING:"str",PR_TAG:"tag",PR_TYPE:"typ",prettyPrintOne:D.prettyPrintOne=function(a,d,g){var b=document.createElement("div");b.innerHTML="<pre>"+a+"</pre>";b=b.firstChild;g&&J(b,g,!0);K({h:d,j:g,c:b,i:1});
return b.innerHTML},prettyPrint:D.prettyPrint=function(a,d){function g(){for(var b=D.PR_SHOULD_USE_CONTINUATION?c.now()+250:Infinity;i<p.length&&c.now()<b;i++){for(var d=p[i],j=h,k=d;k=k.previousSibling;){var m=k.nodeType,o=(m===7||m===8)&&k.nodeValue;if(o?!/^\??prettify\b/.test(o):m!==3||/\S/.test(k.nodeValue))break;if(o){j={};o.replace(/\b(\w+)=([\w%+\-.:]+)/g,function(a,b,c){j[b]=c});break}}k=d.className;if((j!==h||e.test(k))&&!v.test(k)){m=!1;for(o=d.parentNode;o;o=o.parentNode)if(f.test(o.tagName)&&
o.className&&e.test(o.className)){m=!0;break}if(!m){d.className+=" prettyprinted";m=j.lang;if(!m){var m=k.match(n),y;if(!m&&(y=U(d))&&t.test(y.tagName))m=y.className.match(n);m&&(m=m[1])}if(w.test(d.tagName))o=1;else var o=d.currentStyle,u=s.defaultView,o=(o=o?o.whiteSpace:u&&u.getComputedStyle?u.getComputedStyle(d,q).getPropertyValue("white-space"):0)&&"pre"===o.substring(0,3);u=j.linenums;if(!(u=u==="true"||+u))u=(u=k.match(/\blinenums\b(?::(\d+))?/))?u[1]&&u[1].length?+u[1]:!0:!1;u&&J(d,u,o);r=
{h:m,c:d,j:u,i:o};K(r)}}}i<p.length?setTimeout(g,250):"function"===typeof a&&a()}for(var b=d||document.body,s=b.ownerDocument||document,b=[b.getElementsByTagName("pre"),b.getElementsByTagName("code"),b.getElementsByTagName("xmp")],p=[],m=0;m<b.length;++m)for(var j=0,k=b[m].length;j<k;++j)p.push(b[m][j]);var b=q,c=Date;c.now||(c={now:function(){return+new Date}});var i=0,r,n=/\blang(?:uage)?-([\w.]+)(?!\S)/,e=/\bprettyprint\b/,v=/\bprettyprinted\b/,w=/pre|xmp/i,t=/^code$/i,f=/^(?:pre|code|xmp)$/i,
h={};g()}};typeof define==="function"&&define.amd&&define("google-code-prettify",[],function(){return Y})})();}()