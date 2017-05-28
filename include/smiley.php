<?php 
$smilies_src = get_template_directory_uri() . '/images/smilies/';
$smilies_button = '
<span id="smilelink">
	<a onclick="javascript:grin(\'[img]输入图片地址[/img]\')" class="ppic" title="插入图片"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
	<a class="ppic" id="smiley-button"><i class="fa fa-meh-o" aria-hidden="true"></i></a>
	<span class="smiley-wrap">
		<a onclick="javascript:grin(\':?:\')"><img src="' . $smilies_src . 'icon_question.gif" title="疑问" alt="疑问" /></a>
		<a onclick="javascript:grin(\':razz:\')"><img src="' . $smilies_src . 'icon_razz.gif" title="吐舌" alt="吐舌" /></a>
		<a onclick="javascript:grin(\':sad:\')"><img src="' . $smilies_src . 'icon_sad.gif" title="沮丧" alt="沮丧" /></a>
		<a onclick="javascript:grin(\':evil:\')"><img src="' . $smilies_src . 'icon_evil.gif" title="魔鬼" alt="魔鬼" /></a>
		<a onclick="javascript:grin(\':!:\')"><img src="' . $smilies_src . 'icon_exclaim.gif" title="惊讶" alt="惊讶" /></a>
		<a onclick="javascript:grin(\':smile:\')"><img src="' . $smilies_src . 'icon_smile.gif" title="微笑" alt="微笑" /></a>
		<a onclick="javascript:grin(\':oops:\')"><img src="' . $smilies_src . 'icon_redface.gif" title="害羞" alt="害羞" /></a>
		<a onclick="javascript:grin(\':grin:\')"><img src="' . $smilies_src . 'icon_biggrin.gif" title="可爱" alt="可爱" /></a>
		<a onclick="javascript:grin(\':eek:\')"><img src="' . $smilies_src . 'icon_surprised.gif" title="汗" alt="汗" /></a>
		<a onclick="javascript:grin(\':shock:\')"><img src="' . $smilies_src . 'icon_eek.gif" title="可怕" alt="可怕" /></a>
		<a onclick="javascript:grin(\':???:\')"><img src="' . $smilies_src . 'icon_confused.gif" title="晕" alt="晕" /></a>
		<a onclick="javascript:grin(\':cool:\')"><img src="' . $smilies_src . 'icon_cool.gif" title="酷" alt="酷" /></a>
		<a onclick="javascript:grin(\':lol:\')"><img src="' . $smilies_src . 'icon_lol.gif" title="大笑" alt="大笑" /></a>
		<a onclick="javascript:grin(\':mad:\')"><img src="' . $smilies_src . 'icon_mad.gif" title="生气" alt="生气" /></a>
		<a onclick="javascript:grin(\':twisted:\')"><img src="' . $smilies_src . 'icon_twisted.gif" title="眯眼" alt="眯眼" /></a>
		<a onclick="javascript:grin(\':roll:\')"><img src="' . $smilies_src . 'icon_rolleyes.gif" title="萌萌哒" alt="萌萌哒" /></a>
		<a onclick="javascript:grin(\':wink:\')"><img src="' . $smilies_src . 'icon_wink.gif" title="勾引" alt="勾引" /></a>
		<a onclick="javascript:grin(\':idea:\')"><img src="' . $smilies_src . 'icon_idea.gif" title="色" alt="色" /></a>
		<a onclick="javascript:grin(\':arrow:\')"><img src="' . $smilies_src . 'icon_arrow.gif" title="亲" alt="亲" /></a>
		<a onclick="javascript:grin(\':neutral:\')"><img src="' . $smilies_src . 'icon_neutral.gif" title="骄傲" alt="骄傲" /></a>
		<a onclick="javascript:grin(\':cry:\')"><img src="' . $smilies_src . 'icon_cry.gif" title="哭" alt="哭" /></a>
		<a onclick="javascript:grin(\':mrgreen:\')"><img src="' . $smilies_src . 'icon_mrgreen.gif" title="坏笑" alt="坏笑" /></a>
	</span>
</span>';
return $smilies_button;