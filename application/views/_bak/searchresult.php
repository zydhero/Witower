<?$this->view('header')?>
<!--{if 1==$cloudsearch}-->
<div class="l w-710 o-v p-b10 resoult_list">

	<!--{if $synonym}-->
	<div class="p-10 bor-ccc cre_search">
	"<span><?=$synonym['srctitle']?></span>"{lang synonymis}"<span class="red"><?=$synonym['desttitle']?></span>"{lang synonymTitle}<a class="link_blue m-lr8" href="{url doc-innerlink-$synonym['linktitle']}">{lang synonymClickhere}</a>{lang synonymDetail}
	</div>
	<!--{else}-->
	<!--{if $docnoexit}-->
	<div class="p-10 bor-ccc cre_search">
	<form name="createform" method="post" action="{url doc-create}">
		<dl class="ul_l_s">
			<dd class="create">{lang notExistTipLeft}<span style="color:red;"><strong><?=$title?></strong></span>{lang notExistTip}
				<input name="title" type="hidden" value="<?=$title?>"/>
				<input name="create" type="submit" value="{lang createDoc}" class="btn_inp v-m"/>
				<br />
				<!--{if $search_tip_switch=='1' }-->
				{lang searchConsultHudong} <a href="http://fun.hudong.com/edmclick.do?senderid=91&pici=19&nexturl=http://www.hudong.com/wiki/<?=$searchword?>" target="_blank"><?=$title?></a>
				<!--{/if}-->
			</dd>
		</dl>
	</form>
	</div>
	<!--{/if}-->
	<!--{/if}-->
	<div>
		<iframe id="frame_content"  name="frame_content" src='<!--<?=$iframesrc?>-->' style="width:705px;height:1200px;" scrolling='no'   frameborder="0" ></iframe>
	</div>
</div>
<!--{else}-->
<p class="azmsx w-950"><span class="col-h2 block bold">{lang letterOrderView}:</span><a href="{url list-letter-A}" >A</a> <a href="{url list-letter-B}" >B</a> <a href="{url list-letter-C}" >C</a> <a href="{url list-letter-D}" >D</a> <a href="{url list-letter-E}" >E</a> <a href="{url list-letter-F}" >F</a> <a href="{url list-letter-G}" >G</a> <a href="{url list-letter-H}" >H</a> <a href="{url list-letter-I}" >I</a> <a href="{url list-letter-J}" >J</a> <a href="{url list-letter-K}" >K</a> <a href="{url list-letter-L}" >L</a> <a href="{url list-letter-M}" >M</a> <a href="{url list-letter-N}" >N</a> <a href="{url list-letter-O}" >O</a> <a href="{url list-letter-P}" >P</a> <a href="{url list-letter-Q}" >Q</a> <a href="{url list-letter-R}" >R</a> <a href="{url list-letter-S}" >S</a> <a href="{url list-letter-T}" >T</a> <a href="{url list-letter-U}" >U</a> <a href="{url list-letter-V}" >V</a> <a href="{url list-letter-W}" >W</a> <a href="{url list-letter-X}" >X</a> <a href="{url list-letter-Y}" >Y</a> <a href="{url list-letter-Z}" >Z</a> <a href="{url list-letter-0}" >0</a> <a href="{url list-letter-1}" >1</a> <a href="{url list-letter-2}" >2</a> <a href="{url list-letter-3}" >3</a> <a href="{url list-letter-4}" >4</a> <a href="{url list-letter-5}" >5</a> <a href="{url list-letter-6}" >6</a> <a href="{url list-letter-7}" >7</a> <a href="{url list-letter-8}" >8</a> <a href="{url list-letter-9}" >9</a> <a href="index.php?list-letter-*" >{lang otherOrderView}</a> </p>
<!--{if 0==$cloudsearch}-->
<p class="a-r resoult_total"> {lang searchTip2} </p>
<!--{/if}-->
<div class="l w-710 o-v p-b10 resoult_list">

		<!--{if $synonym}-->
	<div class="p-10 bor-ccc cre_search">
	"<span><?=$synonym['srctitle']?></span>"{lang synonymis}"<span class="red"><?=$synonym['desttitle']?></span>"{lang synonymTitle}<a class="link_blue m-lr8" href="{url doc-innerlink-$synonym['linktitle']}">{lang synonymClickhere}</a>{lang synonymDetail}
	</div>
	<!--{else}-->
	<!--{if $docnoexit}-->
	<div class="p-10 bor-ccc cre_search">
	<form name="createform" method="post" action="{url doc-create}">
		<dl class="ul_l_s">
			<dd class="create">{lang notExistTipLeft}<span style="color:red;"><strong><?=$title?></strong></span>{lang notExistTip}
				<input name="title" type="hidden" value="<?=$title?>"/>
				<input name="create" type="submit" value="{lang createDoc}" class="btn_inp v-m"/>
				<br />
				<!--{if $search_tip_switch=='1' }-->
				{lang searchConsultHudong} <a href="http://fun.hudong.com/edmclick.do?senderid=91&pici=19&nexturl=http://www.hudong.com/wiki/<?=$searchword?>" target="_blank"><?=$title?></a>
				<!--{/if}-->
			</dd>
		</dl>
	</form>
	</div>
	<!--{/if}-->
	<!--{/if}-->
	<!--{if empty($list)}-->
	<dl class="col-dl">
		{lang searchTip}
	</dl>
	<!--{else}-->
	<div class="p-10 resoult_total h2 gray">
	<a href="{url search-kw-$keyword}" class="m-r8">{lang doc}</a>|
	<a href="{url search-tag-$keyword}" class="m-lr8" >{lang searchTag2}</a>
	</div>
	<!--{loop $list $key $doc}-->
	<dl class="col-dl">
		<dt class="h2"><a href="{url doc-view-$doc['did']}" target="_blank"><?=$doc['title']?></a></dt>
		<dd class="gray ">{lang creator}:<a href="{url user-space-$doc['authorid']}" target="_blank"><?=$doc['author']?></a>{lang createTime}:<?=$doc['time']?> </dd>
		<dd><span class="bold">{lang tag}:</span>
			<!--{loop $doc['tag'] $key $tag}-->
			<a href="{url search-tag-{eval echo rawurlencode($tag);}}" target="_self"><?=$tag?></a>
			<!--{/loop}-->
		</dd>
		<dd>
			<p><span class="bold">{lang summary}:</span><?=$doc['summary']?><a href="{url doc-view-$doc['did']}" >[{lang readFullText}] </a></p>
		</dd>
		<dd class="gray ">{lang edit}:<?=$doc['edits']?>{lang times}| {lang view}:<?=$doc['views']?>{lang times}</dd>
	</dl>
	<!--{/loop}-->
	<div id="fenye" class="m-t10 a-r"><?=$departstr?></div>
	<!--{/if}-->
</div>
<!--{/if}-->
<div class="r w-230">
	<div class="columns ad p-b8">
		<p class="a-c m-t10 col-p" > {lang moreDetail}<a href="http://www.hudong.com/wiki/{eval echo urlencode(<?=$searchtext?>)}?hf=hdwiki_so_www" target="_blank">{lang hudong}</a><br/>
			{lang moreDetail}<a href="http://www.google.cn/search?hl=zh-CN&newwindow=1&q={eval echo urlencode(<?=$searchtext?>)}&aq=f" target="_blank">{lang google}</a> </p>
	</div>
</div>
<div class="c-b"></div>
<?$this->view('footer')?> 