<?$this->view('header')?>
<div class="w-950 hd_map"> <a href="{WIKI_URL}"><?=$setting[site_name]?></a> &gt;&gt;{lang belongToCate} &gt;&gt;<span id="catenavi">
  <!--{loop $navigation $key $category}-->
  <a href="{url category-view-$category['cid']}">{eval echo htmlspecialchars($category[name])} </a>&nbsp;&nbsp;
  <!--{/loop}-->
  </span> </div>
<div class="l w-710 o-v">
  <h1 class="title_thema"> <span id='doctitle'><?=$doc['doctitle']?></span>
    <label id='auditmsg'>
      <!--{if $doc['visible']=='0'}-->
      --{lang viewDocTip4}
      <!--{/if}-->
    </label>
    <label id='lockimage'>
      <!--{if $doc['locked']}-->
      <image src="style/default/lock.gif"/>
      <!--{/if}-->
    </label>
  </h1>
  <div class="subordinate">
    <p class="cate_open"> <span class="bold">{lang tag}:</span>
      <!--{if count($doc['tag'] )>0}-->
      <!--{loop $doc['tag'] $key $tag}-->
      <a href="{url search-tag-$tag}" name="tag"><?=$tag?></a>
      <!--{/loop}-->
      <!--{else}-->
      <span name="nonetag">{lang noneTag}</span>
      <!--{/if}-->
      <!--{if $doc_edit}-->
      <span class="w-110" onclick="Tag.box($doc['did'],this)"><a href="javascript:void(0);">{lang editDddTag}</a></span>
      <!--{/if}-->
      <!--{if $doc_editletter}-->
      <span class="w-110" onclick="Letter.box($doc['did'],this)"><a href="javascript:void(0);">{lang setdocFirstLetter}</a>
      <input type='hidden' id='fletter' value='$docletter'>
      </span>
      <!--{/if}-->
    </p>
    <span class="editteam"> <a href="javascript:void(0)" id="ding" onclick="vote(this)">{lang ding}[<span><?=$doc['votes']?></span>]</a> <a class="share_link" id="share_link">{lang share}</a> <a href="{url comment-view-$doc['did']}">{lang publishComment}(<?=$doc[comments]?>)</a> <a id="editImage" href="{url doc-edit-$doc['did']}"  class="edit_ct" onclick="return doc_is_locked()">{lang editDoc}</a>
    <label class="share_btn" id="share_btn" style="display:none">
      <input id="sitename" name="sitename" value="<?=$setting['site_name']?>" type="hidden">
      <input id="firstimg" name="firstimg" value="<?=$firstimg?>" type="hidden">
      
 <a href="javascript:void(0)" onclick="postToWb();return false;" style="background:url(http://v.t.qq.com/share/images/s/weiboicon16.png) no-repeat left 0px;">腾讯微博</a><script type="text/javascript">
	function postToWb(){
		var _t = encodeURI("<?=$doc['qq_title']?>");
		var _url = encodeURIComponent(document.location);
		var _appkey = encodeURI("aa6cb794b12c41c29d6490f4624b77a9");//你从腾讯获得的appkey
		var _pic = encodeURI("<?=$doc['pic_str']?>");//（例如：var _pic='图片url1|图片url2|图片url3....）
		var _site = '';//你的网站地址
		var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
		window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
	}
</script>

      
      
      
      <a href="#" class="kaixin001">{lang kaixin001}</a> <a href="#" class="renren">{lang renren}</a> <a href="#" class="sina_blog">{lang sina_blog}</a> </label>
    <script language="javascript"src='js/share.js'></script>
    </span> </div>
<div class="nav_model">
  <!--{if count($nav[1] )>0}-->
  <!--{loop $nav[1] $key $val}-->
  <?=$val['code']?>
  <!--{/loop}-->
  <!--{/if}-->
</div>
  <!--{if $editlock['locked']}-->
  <p id="lock" class="red bor-ccc lock_word">{lang viewDocTip5}<a href="{url user-space-$editlock['user']['uid']}">$editlock['user']['username']</a>{lang viewDocTip6}</p>
  <!--{/if}-->
  <!--{if $synonymdoc}-->
  <p class="red bor-ccc lock_word">"<?=$synonymdoc?>"{lang synonymis}"<?=$doc['doctitle']?>"{lang chineseDe}{lang synonym}</p>
  <!--{/if}-->
  <!--{if isset($advlist[3][1]) && isset($setting['advmode']) && '1'==$setting['advmode']}-->
  <div class="ad" id="advlist_3_1"> <?=$advlist[3][1][code]?> </div>
  <!--{elseif isset($advlist[3][1]) && (!isset($setting['advmode']) || !$setting['advmode'])}-->
  <div class="ad" id="advlist_3_1"> </div>
  <!--{/if}-->
  <div class="content_1 wordcut">
    <!--{loop $doc['sectionlist'] $key $section}-->
    <!--{if $section['flag'] == 1}-->
    <!--{if ($key==1)&&!empty($sectionlist)}-->
    <!--{if isset($advlist[3][2]) && isset($setting['advmode']) && '1'==$setting['advmode']}-->
    <div class="ad" > <span class="r" id="advlist_3_2"> <?=$advlist[3][2][code]?> </span> </div>
    <!--{elseif isset($advlist[3][2]) && (!isset($setting['advmode']) || !$setting['advmode'])}-->
    <div class="ad" > <span class="r" id="advlist_3_2"></span> </div>
    <!--{/if}-->
    <fieldset id="catalog">
      <legend><a name='section'>{lang catalog}</a></legend>
      <ul id="hidesection">
        <!--{loop $sectionlist $k $sec}-->
        <li 
        <!--{if $k>=4}-->
        style="display:none"
        <!--{/if}-->
        >&#8226; <a href="{url doc-view-$doc['did']}#<?=$sec['key']?>"><?=$sec['value']?></a>
        </li>
        <!--{/loop}-->
      </ul>
      <!--{if count($sectionlist) > 4}-->
      <p><a href="javascript:void(0);" onclick="partsection();"  id="partsection" style="display:none">[{lang showPart}]</a><a href="javascript:void(0);" onclick="fullsection();" id="fullsection">[{lang showAll}]</a></p>
      <!--{/if}-->
    </fieldset>
    <!--{/if}-->
    <h3><span class="texts"><?=$section['value']?></span><a name="<?=$key?>" href="{url doc-editsection-<?=$doc['did']?>-<?=$key?>}" >{lang editSection}</a><a href="{url doc-view-$doc['did']}#section">{lang backCatalog}</a></h3>
    <!--{else}-->
    <div class="content_topp"> <?=$section['value']?> </div>
    <!--{/if}-->
    <!--{/loop}-->
  </div>
  <div class="nav_model">
  <!--{if count($nav[2] )>0}-->
  <!--{loop $nav[2] $key $val}-->
  <?=$val['code']?>
  <!--{/loop}-->
  <!--{/if}-->
  </div>
  <!--{if count($referencelist)>0}-->
  <div>
    <dl class="reference" id="reference_view">
      <dt><!--{if $reference_add}--><a class="r h3"  href="javascript:reference_edit();">[{lang edit}]</a><!--{/if}-->{lang references}</dt>
      <!--{loop $referencelist $i $ref}-->
      <dd> <span>[{eval echo ($i+1)}].</span>&nbsp;&nbsp;<?=$ref['name']?> &nbsp;&nbsp;<span style="color:#666666"><?=$ref['url']?></span> </dd>
      <!--{/loop}-->
    </dl>
    

    <div id="reference" class="hd-box editor_left" style="display:none;" >
     <dl class="reference">
     <dt><!--<a class="r h3"  href="javascript:reference_view();">[完成]</a>{lang references}--></dt>
     </dl>
	<dl class="f8 reference" id="0" style="display:none;">
    <dd><span name="order">[0]</span>&nbsp;&nbsp;<span name='refrencename'></span> <span name="url" style="color:#666666"></span> <span name="edit" > <a href="javascript:;" onclick="docReference.edit(this);return false;">{lang edit}</a> 
			| <a name="remove" href="javascript:;" onclick="docReference.remove(this);return false;">{lang remove}</a></span> </dd>
	</dl>
	<!--{loop $referencelist $i $ref}-->
	<dl class="f8 reference" id="<?=$ref[id]?>">
		<dd><span name="order">[{eval echo ($i+1)}]</span>&nbsp;&nbsp;<span name='refrencename'><?=$ref[name]?></span> <span name="url" style="color:#666666"><?=$ref['url']?></span> <span name="edit" > <a href="javascript:;" onclick="docReference.edit(this);return false;">{lang edit}</a> 
			| <a name="remove" href="javascript:;" onclick="docReference.remove(this);return false;">{lang remove}</a></span> </dd>
	</dl>
	<!--{/loop}-->
	
	<ul id="edit_reference" class="ul_l_s add_reference" style="display:none;">
		<li class="mar-bottom-10"><strong>{lang name}:</strong>
			<input id="editrefrencename" type="text" class="inp_txt" size="60"/>
			<label class="red" id="refrencenamespan"></label>
		</li>
		<li class="size black mar-bottom-10"><strong>{lang url}:</strong>
			<input id="editrefrenceurl" type="text" class="inp_txt" size="60"/>
			<label class="red" id="refrenceurlspan"></label>
		</li>
		
		<li name="verifycode" class="size black mar-bottom-10" style="display:none"><strong>{lang verifyCode}:</strong>
			<input name="code" id="editrefrencecode" type="text" class="inp_txt" size="10" maxlength="4"/>
			<label name="img" style="display:none"><img id="verifycode2" src="./js/hdeditor/skins/spacer.gif"/> <a href="javascript:docReference.updateVerifyCode();">{lang codeNotClear}</a></label>
			<label name="tip"></label>
			<label class="red" id="refrencecodespan"></label>
		</li>
		<li>
			<div id="edit_reference1" class="ul_l_s" style="display:none;">
				
					<input type="button" class="btn_inp" onclick="docReference.save();return false;" value="{lang save}" id="save_1"  name="save_1"  />
				<!--<input type="button"  class="btn_inp" value="{lang save}" name="save_0" id="save_0"  style="display:none" />
					<a id="save_1" href="javascript:void(0);" onclick="docReference.save();return false;" style="border:1px red solid;">{lang save}</a>
					<span id="save_0" style="display:none">{lang save}</span>
					<a href="javascript:;" onclick="docReference.reset();return false;">{lang reset}</a>-->
					<input type="button" class="btn_inp" onclick="docReference.reset();return false;" name="reset" value="{lang reset}" />
			
			</div>
		</li>
	</ul>
  </div>
</div>
<!--{/if}-->
<div class="fj_list m-t10"> <h3 
  <!--{if count($attachment)==0}-->
  style="display:none"
  <!--{/if}-->
  >{lang attachList}
  </h3>
  <dl style="display: none;">
    <dt><img class="fj_img"/><a></a><br/>
      <span class="l">
      <label> {lang attachDownloadNum}0</label>
      </span></dt>
    <dd></dd>
  </dl>
  <!--{if count($attachment)>0}-->
  <!--{if $attach_download}-->
  <!--{loop $attachment $attach}-->
  <dl id="$attach['id']">
    <dt><img class="fj_img" src="style/default/attachicons/<?=$attach['icon']?>.gif"/><a href="{url attachment-download-$attach['id']}" coin_down="<?=$attach['coindown']?>" attach_id = "<?=$attach['uid']?>" uid = "<?=$userid?>"  class="file_download"><?=$attach['filename']?></a><br/>
      <span class="l">
      <label class="mar-r8">({eval echo sprintf('%.2f',$attach['filesize']/1024)}k)</label>
      <label>{lang attachDownloadNum}<?=$attach['downloads']?></label>
      &nbsp;
      <label>{lang uploadCredit}<?=$attach['coindown']?></label>
      </span>
      <!--{if $attachment_remove && ($attach['uid']==$userid || $groupid==4) }-->
      [<a href="javascript:;" onclick="Attachment.remove(this, $attach['id'])">{lang remove}</a>]
      <!--{/if}-->
    </dt>
    <dd><?=$attach['description']?></dd>
  </dl>
  <!--{/loop}-->
  <!--{else}-->
  <p class="m-lr8 m-t8">{lang attachRefuseTrip}</p>
  <!--{/if}-->
  <!--{/if}-->
  <!--{if $setting['attachment_open'] && $attachment_upload}-->
  <div>
    <form id="attachment_upload" action="{url attachment-upload}" enctype="multipart/form-data" 
			method="post" target="upload" style="display:none" onsubmit="return Attachment.submit(this)">
      <input type="hidden" name="MAX_FILE_SIZE" value="{eval echo $setting['attachment_size']*1024 }" />
      <div>
        <input name="attachment[]" type="file" onkeydown="return false" onpaste="return false" autocomplete="off" onchange="Attachment.add(this)">
        {lang attachmentPrice}
        <input name="coin_download[]" class="coin_download" type="text" value="0" size="2" onchange="check_coin($(this))" />
        (0-
        <!--<?=$coin_download?>-->
        {lang creditRange})
        {lang attachDesc}
        <input name="attachmentdesc[]" type="text" class="attachmentdesc" size="20" maxlength="50" autocomplete="off"/>
        <a href="javascript:;" onclick="Attachment.unadd(this)" style="display:none">{lang remove}</a> </div>
      <br/>
      <input type="submit" value="{lang upload}" />
      <input type="hidden" value="<?=$doc['did']?>" name="did"/>
      <span>[{lang attachUpload}{lang attachSizeTrip} <?=$setting['attachment_size']?> KB]</span>
    </form>
    <a href="javascript:;" onclick="Attachment.upload(this)">{lang attachUpload}</a> <span id="attachment_error" style="color:red"></span> </div>
  <iframe name="upload" id="upload" style="display:none;" ></iframe>
  <!--{/if}-->
  <input type="hidden" name="coin_hidden" id="coin_hidden" value="<?=$coin?>"  />
</div>
<div class="bor_b-ccc m-t10 notes">
  <p class="l">→{lang viewDocTip7} <a class="font14" href="{url doc-edit-$doc['did']}">{lang editDoc}</a></p>
  <p class="r">
    <!--{if $neighbor['predoc']}-->
    {lang predoc}<a href="{url doc-view-$neighbor['predoc']['did']}"  class="m-lr8"><?=$neighbor['predoc']['title']?></a>
    <!--{/if}-->
    <!--{if $neighbor['nextdoc']}-->
    {lang nextdoc}<a href="{url doc-view-$neighbor['nextdoc']['did']}"  class="m-lr8"><?=$neighbor['nextdoc']['title']?></a>
    <!--{/if}-->
  </p>
</div>
<p class="useful_for_me"> <span>{lang viewDocTip9}</span> <a href="javascript:void(0)" onclick="vote(this)">
  <label id="votemsg">{lang viewDocTip10}</label>
  <b><?=$doc['votes']?></b></a> </p>
<div class="bor-ccc m-t10 bg-gray notes add">
  <p class="add_synonym">
    <label class="l w-550"><b>{lang synonym}</b>：
      <!--{if !empty($synonyms)}-->
      <span id="str">
      <!--{loop $synonyms $key $synonym}-->
      <a href="{url doc-innerlink-{eval echo urlencode($synonym['srctitle'])}}" name='synonym'><?=$synonym['srctitle']?></a>
      <!--{/loop}-->
      </span>
      <!--{else}-->
      <span name="nonesynonym">{lang noneSynonym}</span>
      <!--{/if}-->
    </label>
    <!--{if $synonym_audit}-->
    <span class="r w-110 cursor" onclick="Synonym.box($doc['did'],this)"><img src="style/default/add_synonym.gif"/><a href="javascript:void(0)" >{lang editDddSyn}</a></span>
    <!--{/if}-->
  </p>
</div>
<div class="bor-ccc m-t10 notes bg-gray bookmark">
  <p><span class="bold">{lang favourite}: </span> <a title="Favorites" onclick="addfav();"><img src='style/default/bookmark/ie.gif' border='0' style="cursor:pointer;"></a> &nbsp;
    <script language="javascript"src='js/bookmark.js'></script>
    <!--{if !empty($userid)}-->
    <img id="doc_favorite" did="<?=$doc['did']?>" title="{lang keepToSpace}" alt="{lang keepToSpace}" src="style/default/bookmark/hudong.gif" style="cursor:pointer;">
    <!--{/if}-->
  </p>
  <!--{if isset($doclink)}-->
  <label class="m-t10 l" id="uniontitle"><?=$uniontitle?></label>
  <script type="text/javascript">
		$('#uniontitle').hide();
		$(document).ready(function(){
			$.get("index.php?hdapi-hduniontitle-"+<?=$doc['did']?>, function(data){
				if (data && data.indexOf('<html>')<0 && data.indexOf('href="null"')<0){
					$('#uniontitle').html(data).show();
					var a=$('#uniontitle').find("a[href*=innerlink]");
					if(a.size()){
						var href=a.attr("href");
						href = href.split("innerlink");
						a.attr("href", href[0]+"innerlink-"+encodeURI(a.text()));
					}
				}else{
					$('#uniontitle').hide();
				}
			});
		});
		</script>
  <!--{/if}-->
</div>
<!--{if $comment_add}-->
<!--{if isset($advlist[3][3]) && isset($setting['advmode']) && '1'==$setting['advmode']}-->
<br>
<div class="ad" id="advlist_3_3"> <?=$advlist[3][3][code]?> </div>
<!--{elseif isset($advlist[3][3]) && (!isset($setting['advmode']) || !$setting['advmode'])}-->
<div class="ad" id="advlist_3_3"></div>
<!--{/if}-->
<div class="columns comment">
  <h2 class="col-h2">{lang commentRelation}</h2>
  <a href="{url comment-view-$doc['did']}" target="_blank" class="more">{lang viewMore}&gt;&gt;</a>
  <form method="post" action="{url comment-add-$doc['did']}">
    <ul class="col-ul">
      <li>
        <textarea id="comment" name="comment" cols="95" rows="10" class="area"></textarea>
        <input id='anonymity' name="anonymity" type="checkbox" />
        {lang commentAnonymity}</li>
      <li class="yzm">
        <!--{if $setting['checkcode'] != "3"}-->
        <span>{lang verifyCode}: </span>
        <input name="code2" type="text" />
        <label class="m-lr8"><img id="verifycode" src="{url user-code}" onclick="updateverifycode();" /></label>
        <a href="javascript:updateverifycode();">{lang changeAnother}</a>
        <!--{/if}-->
        &nbsp;&nbsp;&nbsp;&nbsp;{lang shouldNotice}:{lang commentLongSize}</li>
      <li>
        <input name="submit" type="submit" value="{lang publishComment}" class="btn_inp"/>
      </li>
    </ul>
  </form>
</div>
<!--{/if}-->
</div>
<div class="r w-230">
<div class="nav_model">
  <!--{if count($nav[3] )>0}-->
  <!--{loop $nav[3] $key $val}-->
  <?=$val['code']?>
  <!--{/loop}-->
  <!--{/if}-->
</div>
  <!--{if isset($advlist[4][1]) && isset($setting['advmode']) && '1'==$setting['advmode']}-->
  <div class="ad" id="advlist_4_1"> <?=$advlist[4][1][code]?> </div>
  <!--{elseif isset($advlist[4][1]) && (!isset($setting['advmode']) || !$setting['advmode'])}-->
  <div class="ad" id="advlist_4_1"> </div>
  <!--{/if}-->
  <!--{if $audit}-->
  <div class="columns ctgl">
    <h2 class="col-h2">{lang docManage}</h2>
    <form method="post">
      <dl>
        <dt>{lang operate}</dt>
        <dd class="a-c">
          <input name="Button2" type="button" value="{lang rename}" class="m-lr8 btn_inp" onclick="doc_rename();" />
          <input id="editcategory" name="Button3" type="button" value="{lang editCate}" class="m-lr8 btn_inp" onClick="javascript:catevalue.ajax(0,this);"/>
        </dd>
        <dt>{lang state}</dt>
        <dd>
          <label class="l" ><a href='javascript:void(0);' onclick="lock('lock');">{lang lock}</a></label>
          <label class="r" ><a href='javascript:void(0);' onclick="lock('unlock');">{lang unlock}</a></label>
        </dd>
        <dd>
          <label class="l" ><a href='javascript:void(0);' onclick="recommend();">{lang recommend}</a></label>
          <label class="r" ><a href='javascript:void(0);' onclick="updatastatus(0);"> {lang CancelRecommend}</a></label>
        </dd>
        <dd>
          <label class="l" ><a href='javascript:void(0);' onclick="audit();">{lang audit}</a></label>
          <label class="r" ><a href='index.php?doc-remove-<?=$doc['did']?>' onclick="return remove()">{lang remove}</a></label>
        </dd>
      </dl>
    </form>
  </div>
  <!--{/if}-->
  <div class="columns ctxx">
    <h2 class="col-h2">{lang docMessage}</h2>
    <!--{if $author}-->
    <!--{if !isset($lasteditor) || (isset($lasteditor) && $lasteditor['uid']!=$author['uid'])}-->
    <dl class="col-dl twhp2">
      <dd><a href="{url user-space-$author['uid']}" target="_blank"  class="a-img1"> <img alt="<?=$author['username']?>" title="<?=$author['username']?>" src="<!--{if $author[image]}-->$author[image]<!--{else}-->style/default/user_l.jpg<!--{/if}-->" width="38px" height="38px" /> </a></dd>
      <dt><a href="{url user-space-$author['uid']}" target="_blank"><?=$author['username']?></a></dt>
      <dd><span style="color:<?=$author['color']?>" class="l m-r8"><?=$author['grouptitle']?></span> <span title="{lang userstars} <?=$author['stars']?>" class="l">
        <!--{for $i=0; $i<$author['userstars'][3]; $i++}-->
        <img src="style/default/star_level3.gif"/>
        <!--{/for}-->
        <!--{for $i=0; $i<$author['userstars'][2]; $i++}-->
        <img src="style/default/star_level2.gif"/>
        <!--{/for}-->
        <!--{for $i=0; $i<$author['userstars'][1]; $i++}-->
        <img src="style/default/star_level1.gif"/>
        <!--{/for}-->
        </span> </dd>
      <dd>{lang creator} <a onclick="javascript:Message.box('<?=$author[username]?>')"   href="javascript:void(0)">{lang sendmessage}</a> &nbsp;&nbsp;<img src="style/default/jb.gif" title="<?=$author['credit1']?>{lang gold}"></dd>
    </dl>
    <!--{/if}-->
    <!--{/if}-->
    <!--{if $author_removed}-->
    <dl class="col-dl twhp2">
      <dd><a class="a-img1"> <img alt="{lang haveDel}" src="style/default/user_l.jpg" width="38px" height="38px" /></a></dd>
      <dt>{lang userHaveDel}</dt>
      <dd>{lang creator}</dd>
    </dl>
    <!--{/if}-->
    <!--{if isset($lasteditor) }-->
    <dl class="col-dl twhp2">
      <dd><a href="{url user-space-$lasteditor['uid']}" target="_blank"  class="a-img1"> <img alt="<?=$lasteditor['username']?>" title="<?=$lasteditor['username']?>" src="<!--{if $lasteditor[image]}-->$lasteditor[image]<!--{else}-->style/default/user_l.jpg<!--{/if}-->" width="38px" height="38px" /> </a></dd>
      <dt><a href="{url user-space-$lasteditor['uid']}" target="_blank"><?=$lasteditor['username']?></a></dt>
      <dd><span class="l m-r8" style="color:<?=$lasteditor['color']?>" ><?=$lasteditor['grouptitle']?></span> <span title="{lang userstars} <?=$lasteditor['stars']?>" class="l">
        <!--{for $i=0; $i<$lasteditor['userstars'][3]; $i++}-->
        <img src="style/default/star_level3.gif"/>
        <!--{/for}-->
        <!--{for $i=0; $i<$lasteditor['userstars'][2]; $i++}-->
        <img src="style/default/star_level2.gif"/>
        <!--{/for}-->
        <!--{for $i=0; $i<$lasteditor['userstars'][1]; $i++}-->
        <img src="style/default/star_level1.gif"/>
        <!--{/for}-->
        </span> </dd>
      <dd>{lang recentEditor} <a onclick="javascript:Message.box('<?=$lasteditor[username]?>')"   href="javascript:void(0)">{lang sendmessage}</a> &nbsp;&nbsp;<img src="style/default/jb.gif" title="<?=$lasteditor['credit1']?>{lang gold}"></dd>
    </dl>
    <!--{/if}-->
    <!--{if $lasteditor_removed}-->
    <dl class="col-dl twhp2">
      <dd><a class="a-img1"> <img alt="{lang haveDel}" src="style/default/user_l.jpg" width="38px" height="38px" /></a></dd>
      <dt>{lang userHaveDel}</dt>
      <dd>{lang recentEditor}</dd>
    </dl>
    <!--{/if}-->
    <ul class="col-ul bor-ccc">
      <li>{lang viewTimes}: <?=$doc['views']?> {lang times}</li>
      <!--{if $doc['editions'] }-->
      <li>{lang editTimes}: <?=$doc['editions']?>{lang times} <a href="{url edition-list-$doc[did]}" target="_blank" class="m-l8">{lang edition}</a></li>
      <!--{/if}-->
      <li>{lang updateTime}: <?=$doc['lastedit']?></li>
    </ul>
  </div>
  <div class="columns">
    <h2 class="col-h2">{lang docRelation}</h2>
    <!--{if $relate}-->
    <a href="javascript:void(0)" onclick="relateddoc('block')" class="more">{lang add}</a>
    <!--{/if}-->
    <ul class="col-ul" id='related_doc' 
    <!--{if empty($relatelist)}-->
    style="display:none"
    <!--{/if}-->
    >
    <!--{loop $relatelist $key $relate}-->
    <li><a href="index.php?doc-innerlink-{eval echo urlencode($relate)}" target="_blank" title="<?=$relate?>"><?=$relate?></a></li>
    <!--{/loop}-->
    </ul>
  </div>
  <div id="block_right">{block:right/}</div>
  <!--{if isset($advlist[4][2]) && isset($setting['advmode']) && '1'==$setting['advmode']}-->
  <div class="ad" id="advlist_4_2"> <?=$advlist[4][2][code]?> </div>
  <!--{elseif isset($advlist[4][2]) && (!isset($setting['advmode']) || !$setting['advmode'])}-->
  <div class="ad" id="advlist_4_2"> </div>
  <!--{/if}-->
</div>
<div class="nav_model">
<!--{if count($nav[4] )>0}-->
<!--{loop $nav[4] $key $val}-->
<?=$val['code']?>
<!--{/loop}-->
<!--{/if}-->
</div>
<!--{if $setting['checkcode'] != "3"}-->
<script type="text/javascript">
function updateverifycode() {
	var img = "index.php?user-code-"+Math.random();
	$('#verifycode').attr("src",img);
}
</script>
<!--{/if}-->
<!--{if $audit}-->

<!--参考资料验证码-->
<script type="text/javascript">
function updatereferenceverifycode() {
	var img = "index.php?user-code-"+Math.random();
	$('#verifycode2').attr("src",img);
}
</script>


<script type="text/javascript">
var timeout_pop=0;
function doc_rename(){
	var title=$.trim($('#doctitle').html()).replace(/\s/g,'&nbsp;');
	var html="词条名称 :  <form action='' onsubmit='update_docname();return false;'><input id='newname' type='text' value='"+title+"' maxlength='80' height='40'><br><br>"+
	"<input name='renamesbumit' type='button' onclick='update_docname()' value='{lang submit}'>"+
	"<input name='cancel' type='button' onclick='closepop(\"rename\")' value='{lang cancel}'><br><br><label id='updatetitlenotice' style='height:20px;color:red'>&nbsp;</label></form>";
	$.dialog.box('rename', '重命名', html);
}
function update_docname(){
	clearTimeout(timeout_pop);
	if($.trim($('#newname').val())==''){
		$("#updatetitlenotice").html('名称不能为空');
		return;
	}
	$.post(
		"index.php?doc-changename",{did:$doc['did'],newname:$('#newname').val()},
		function(xml){
			var message=xml.lastChild.firstChild.nodeValue;
			if(message=='1'){
				$('#doctitle').html($('#newname').val());
				$.dialog.close('rename');
				return;
			}else if(message=='-2'){
				$("#updatetitlenotice").html('{lang viewDocTip2}');
			}else if(message=='-3'){
				$("#updatetitlenotice").html('{lang createDocTip15}');
			}else if(message=='-4'){
				$("#updatetitlenotice").html('名称不能为空');
			}else{
				$("#updatetitlenotice").html('{lang viewDocTip3}');
			}
		}
	);
}

function lock(type){
	clearTimeout(timeout_pop);
	$.post(
		"index.php?doc-"+type,{did:$doc['did']},
		function(xml){
			var	message=xml.lastChild.firstChild.nodeValue;
			if(message=='1'){
				if(type=='lock'){
					$('#lockimage').html(" &nbsp;<image src='style/default/lock.gif'>");
				}else{
					$('#lockimage').html("");
				}
				$.dialog.box('lock', '词条锁定', '已经成功锁定/解锁该词条');
			}else{
				$.dialog.box('lock', '词条锁定', '{lang viewDocTip3}');
			}
			timeout_pop=setTimeout("closepop('lock')",3000);
		}
	);
}

function recommend(){
	var html="词条状态 :  <select id='recommend_type' ><option value='1'>推荐词条</option><option value='2'>热门词条</option><option value='3'>精彩词条</option></select><br><br>"+
	"<input name='renamesbumit' type='button' onclick='updatastatus($(\"#recommend_type\").val())' value='{lang submit}'>"+
	"<input name='cancel' type='button' onclick='closepop(\"recommend\")' value='{lang cancel}'>";
	$.dialog.box('recommend', '推荐词条', html);
}

function updatastatus(type){
	clearTimeout(timeout_pop);
	$.post(
		"index.php?doc-setfocus",{did:$doc['did'],visible:$doc['visible'],doctype:type},
		function(xml){
			var	message=xml.lastChild.firstChild.nodeValue;
			if(message=='1'){
				$.dialog.box('recommend', '推荐词条', '已经成功设置词条状态');
			}else{
				$.dialog.box('recommend', '推荐词条', '{lang viewDocTip3}');
			}
			timeout_pop=setTimeout("closepop('recommend')",3000);
		}
	);
}

function audit(){
	clearTimeout(timeout_pop);
	$.post(
		"index.php?doc-audit",{did:$doc['did']},
		function(xml){
			var	message=xml.lastChild.firstChild.nodeValue;
			if(message=='1'){
				$('#auditmsg').html("");
				$.dialog.box('audit', '审核词条', '已经成功审核了词条');
			}else{
				$.dialog.box('audit', '审核词条', '{lang viewDocTip3}');
			}
			timeout_pop=setTimeout("closepop('audit')",3000);
		}
	);
}

function remove(){
	var url="index.php?doc-remove-<?=$doc['did']?>";
	return confirm("{lang editionTip6}")
}

function closepop(name){
	$.dialog.close(name);
}

	var catevalue = {
		input:null,
		scids:new Array(),
		scnames:new Array(),
		ajax:function(cateid, E){
			if(arguments.length==2){
				this.clear();
				$.ajax({
					url: 'index.php?doc-hdgetcat',data: {did:<?=$doc['did']?>},cache: false,dataType: "xml",type:"post",async:false, 
					success: function(xml){
						var message=xml.lastChild.firstChild.nodeValue;
						if(message!=''){
							eval(message);
						}
					}
				});
			}
			if(!cateid)cateid=0;
			$.ajax({
				url: 'index.php?category-ajax-'+cateid,cache: false,dataType: "xml",type:"get",
				success: function(xml){
					var message=xml.lastChild.firstChild.nodeValue;
					
					if($('#dialog_category:visible').size()){
						$.dialog.content('flsx', '<div id="flsx" class="chose_cate">'+message+'</div>');
						catevalue.selectCategory();
					}else{
						$.dialog({
							id:'flsx',
							title:'{lang editCate}',
							content: '<div id="flsx" class="chose_cate">'+message+'</div>',
							height:450,
							width:680,
							position:'c',
							resizable:0,
							resetTime:0,
							onOk:function(){
								catevalue.ok();
							},
							callback:function(){
								catevalue.selectCategory();
							},
							styleContent:{'text-align':'left', 'overflow-y':'scroll', 'padding-right':'0', height:'380px'},
							styleOk:{'font-size':'14px','line-height':'20px', 'padding':'2px 6px 1px','margin-right':'3px'}
						});
					}
				}
			});
		},
		
		cateOk:function(id,title,handle){
			var point;
			if(handle){
				this.scids.push(id);
				this.scnames.push(title);				
			}else{
				for(i=0;i<this.scids.length;i++){
					if(this.scids[i]==id){
						point=i;
					}
				}
				this.scids.splice(point,1);
				this.scnames.splice(point,1);
			}
			catevalue.pushCategory()
		},
		
		pushCategory:function(){
			$('#category').val(this.scids.toString());
			$('#scnames').text(this.scnames.toString());
		},
		
		getCatUrl:function(){
			var catstring='';
			for(i=0;i<this.scids.length;i++){
				catstring=catstring+'<a target="_blank" href="<?=$setting['seo_prefix']?>category-view-'+this.scids[i]+'">'+this.scnames[i]+'</a>,';
			}
			catstring=catstring.substring(0, catstring.length-1);   
			return catstring;
		},
		
		selectCategory:function(){
			var cb=$(":checkbox");
			catevalue.pushCategory();
			for(i=0;i<cb.length;i++){
				if(catevalue.inArray(cb[i].id, this.scids)){
					cb[i].checked = true; 
				}
			}		
		},
		
		inArray:function(stringToSearch, arrayToSearch) {
			for (s = 0; s <arrayToSearch.length; s++) {
				if (stringToSearch == arrayToSearch[s]) {			 
					 return true;
				}
			}
			return false;
		},
		
		removeCateTree:function(){
			closepop('flsx');
			this.clear();
		},
		
		ok:function(){
			if(changecategory(this.scids.toString())){
				closepop('flsx')
			}
		},
		
		init:function(){
			if('<?=$category[cid]?>'!=''){
				this.scids.push(<?=$category[cid]?>);
				this.scnames.push('{eval htmlspecialchars(string::haddslashes($category[name]),1)}');
			}
		},
		
		clear:function(){
			this.scids.length=0;
			this.scnames.length=0;	
		}
		
	}
	
	function changecategory(cats){
		if(!cats){
			$('#scnames').fadeOut();
			$('#scnames').html('&nbsp;&nbsp;分类不允许为空').fadeIn();
			return false;
		}
		$.ajax({
			url: "index.php?doc-changecategory",data: {did:$doc['did'],newcategory:cats},cache: false,dataType: "xml",type:"post",async:false,
			success: function(xml){
				var	message=xml.lastChild.firstChild.nodeValue;
				if(message!='0'){
					$('#catenavi').html(message);
				}
			}
		});
		return true;
	}
	function openclose(obj){
		var patrn=/close.gif$/;
		var s=obj.src;
		var id=obj.id;
		if(patrn.test(s)){
			obj.src='style/default/open.gif';
			var t=$('#'+id).find("dd");
			t.show();
		}else{
			obj.src='style/default/close.gif';
			var t=$('#'+id).find("dd");
			t.hide();
		}
	}
</script>
<!--{/if}-->
<!--{if $synonym_audit}-->
<script type="text/javascript">
	
	var Synonym = {
		E:null,
		did: 0,
		srctitles: '',
		tags:null,
		box : function(did, E){
			this.E = $(E).parent();
			this.did = did;
			var html = '<form onsubmit="Synonym.send(this);return false;"><table border="0" width="300" class="send_massage" style="margin-left:18px">'
			+'<tr><td height="25"><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td><td align=left><input  name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td></tr>'
			+'<tr><td height="25"><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td><td align=left><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td></tr>'
			+'<tr><td height="25"><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td><td align=left><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td></tr>'
			+'<tr><td height="25"><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td><td align=left><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td></tr>'
			+'<tr><td height="25"><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td><td align=left><input name="srctitles[]" type="text" class="inp_txt" maxlength="100" size="20"/></td></tr>'
			+'<tr><td height="25" colspan=2><span id="synonymTip"></span><br /><input type="hidden" name="desttitle" value="<?=$doc[title]?>" /><input type="hidden" name="destdid" value="<?=$doc[did]?>" />'
			+'<input id="synonymSubmit" type="submit" value="'+Lang.Submit+'" /></td></tr></table></form>';
			$.dialog.box('synonym','编辑同义词', html);
			var srctitles='',srctitless='',a = $(E).parent().find("a[name=synonym]");
			this.tags = a;
			a.each(function(i){
				srctitles += $(this).text();
			});
			this.srctitles = $.trim(srctitles);
			var synonymInputs = $("input[name='srctitles[]']");
			a.each(function(i){
				synonymInputs[i].value=$(this).text();
			});
			$("#synonymSubmit").attr('disabled', false).val(Lang.Submit);
			return false;
		},
		
		send: function(form){
			var title=$("#doctitle").text();
			var formData = $(form).serialize();
			formData += "&submit=ajax";
			var synonymInputs = $("input[name='srctitles[]']");
			var inputsrc='';
			synonymInputs.each(function(i){
				if($.trim($(this).val())!='')
					inputsrc += $(this).val();
			});
			this.inputsrc = $.trim(inputsrc);
			//检查是否已修改
			if (this.srctitles == this.inputsrc){
				$.dialog.close('synonym');
				return;
			}

			$("#synonymSubmit").attr('disabled', true).val(Lang.Submiting);
			$.post("index.php?synonym-savesynonym", formData, function(data, status){

				$("#synonymSubmit").attr('disabled', false).val(Lang.Submit);
				if (status == 'success'){
					if(data==0){
						$("#synonymTip").html('没有添加任何同义词！');
					}else if(data==-1){
						$("#synonymTip").html("参数错误");
					}else if(data==-2){
						$("#synonymTip").html('同义词本身不能指向自己');
					}else if(data==-3){
						$("#synonymTip").html('有不允许创建的字符');
					}else if(data==-4){
						$("#synonymTip").html('已经被别的同义词指向。');
					}else if(data==-5){
						$("#synonymTip").html('已经指向其他同义词,请勿重复指向');
					}else if(data==-6){
						$("#synonymTip").html('已经被别的同义词指向。');
					}else if(data=='empty'){ //如果返回 empty,表示已清空所有同义词
						Synonym.change('');
						$.dialog.close('synonym');
					} else { //否则，按返回的数据更新页面上显示的同义词
						Synonym.change(data);
						$("#synonymTip").html('');
						$.dialog.close('synonym');
						return;
					}
				}
			});
		},
		
		change: function(newData){
			var html='';
			html = newData+html;
			if(html){
				if (this.tags.size() > 0){
					$(this.tags[0]).before(html);
					this.tags.remove();
				}else{
					this.E.find("span[name=nonesynonym]").before(html);
					this.E.find("span[name=nonesynonym]").remove();
				}
			}else{
				html='<span name="nonesynonym">暂无同义词</span>';
				this.E.find("a[name=synonym]:first").before(html);
				this.E.find("a[name=synonym]").remove();
			}
			$.dialog.close('synonym');
		}
	}
</script>
<!--{/if}-->
<!--{if $doc_edit}-->
<script type="text/javascript">
var Tag = {
	E:null,
	did: 0,
	tagtext: '',
	tags:null,
	box : function(did, E){
		this.E = $(E).parent();
		this.did = did;
		var html = '<form onsubmit="Tag.send();return false;"><table border="0" width="400" class="send_massage">'
		+'<tr><td height="40"><input id="tagSubject" type="text" class="inp_txt" maxlength="200" size="50"/></td></tr>'
		+'<tr><td height="40">'+Lang.EditTagTip+'</td></tr>'
		+'<tr><td height="40"><input id="tagSubmit" type="submit" value="'+Lang.Submit+'" />'
		+'<span id="tagTip"></span></td></tr></table></form>';
		
		$.dialog.box('tag', Lang.EditTag, html);
		
		var tagtext='',a = $(E).parent().find("a[name=tag]");
		this.tags = a;
		a.each(function(i){
			tagtext += $(this).text() + '; ';
		});
		this.tagtext = $.trim(tagtext);
		$("#tagSubject").val(tagtext);
		$("#tagSubject").focus();
		$("#tagSubmit").attr('disabled', false).val(Lang.Submit);

		return false;
	},
	
	send: function(){
		var params = {'submit':'ajax', 'tagtext':'', 'did':this.did};
		params.tagtext = $.trim($("#tagSubject").val());
		if (this.tagtext == params.tagtext){
			$.dialog.close('tag');
			return;
		}
		params.tagtext = params.tagtext.replace(new RegExp(Lang.Fenhao+'|,|'+Lang.Douhao, "g"), ";").replace(/ /g,';').replace(/;;+/g,';');
		var taglist=hdunique(params.tagtext.split(';'));
		var tags='';
		for(var i=0;i<taglist.length;i++){
			if($.trim(taglist[i])){
				tags +=taglist[i]+';'
			}
		}
		params.tagtext=tags;
		this.tagtext = tags;
		$("#tagSubmit").attr('disabled', true).val(Lang.Submiting);
		$.post("index.php?doc-edit-"+Math.random(), params, function(data, status){
			$("#tagSubmit").attr('disabled', false).val(Lang.Submit);
			if (status == 'success'){
				if (data == 'OK'){
					Tag.change();
					$("#tagTip").html('');
					$.dialog.close('tag');
				} else {
					alert(Lang.EditTagError);
				}
			} else {
				alert(Lang.EditTagError);
			}
		});
	},
	
	change: function(){
		var html='', taglist = this.tagtext.split(';');
		taglist=hdunique(taglist);
		for (var i=taglist.length-1; i>=0; i--){
			if ('' === taglist[i]) continue;
			html = '<a href="index.php?search-tag-'+encodeURI(taglist[i])+'" name="tag">'+taglist[i]+'</a> '+html;
		}
		if(html){
			if (this.tags.size() > 0){
				$(this.tags[0]).before(html);
				this.tags.remove();
			}else{
				this.E.find("span[name=nonetag]").before(html);
				this.E.find("span[name=nonetag]").remove();
			}
		}else{
				html='<span name="nonetag">暂无标签</span>';
				this.E.find("a[name=tag]:first").before(html);
				this.E.find("a[name=tag]").remove();
		}
	}
}
</script>
<!--{/if}-->
<!--{if $relate}-->
<script type="text/javascript">
	function relateddoc(display){
		for(i=0;i<10;i++){
			$("#related_"+(i+1)).val('');
		}
		var html ='<form onsubmit="addrelatedoc();return false;"><ul class="p-ul" style="line-height:25px">'
		+'<li><input name="Text2" type="text" class="inp_txt" id="related_1"/>&nbsp;&nbsp;<input name="Text2" type="text"  class="inp_txt" id="related_2"/></li>'
		+'<li><input name="Text2" type="text" class="inp_txt" id="related_3"/>&nbsp;&nbsp;<input name="Text2" type="text"  class="inp_txt" id="related_4"/></li>'
		+'<li><input name="Text2" type="text" class="inp_txt" id="related_5"/>&nbsp;&nbsp;<input name="Text2" type="text"  class="inp_txt" id="related_6"/></li>'
		+'<li><input name="Text2" type="text" class="inp_txt" id="related_7"/>&nbsp;&nbsp;<input name="Text2" type="text"  class="inp_txt" id="related_8"/></li>'
		+'<li><input name="Text2" type="text" class="inp_txt" id="related_9"/>&nbsp;&nbsp;<input name="Text2" type="text"  class="inp_txt" id="related_10"/></li>'
		+'<li onclick="addrelatedoc();"><input name="Button1" type="submit" value="保存"  class="btn_inp" /></li></ul></form>';
		$.dialog.box('relatedoc','编辑相关词条', html);
		var dialog=$.dialog.get('relatedoc');
		dialog.find(':text').attr('maxlength', 80);
		$("#related_doc a").each(function(i){
			$("#related_"+(i+1)).val($(this).text());
		});
	}
	
	function addrelatedoc(){
		var relatedata = '';
		var relatedhtml = '';
		var arraydoc=[];
		for(i=0;i<10;i++){
			if($.trim($("#related_"+(i+1)).val())){
				relatedata+=$.trim($("#related_"+(i+1)).val())+';';
			}
		}
		arraydoc=relatedata.split(";");
		var unique_doc=hdunique(arraydoc);
		for(i=0;i<unique_doc.length;i++){
			if($.trim(unique_doc[i])){
				relatedhtml+='<li><a href="index.php?doc-innerlink-'+encodeURI(unique_doc[i])+'" target="_blank" title="<?=$relate?>">'+(unique_doc[i])+'</a></li>';
			}
		}
		var title=$("#doctitle").text();
		title=$.trim(title).replace(/\s/g,'&nbsp;');
		$.ajax({
			url: "index.php?doc-addrelatedoc",data: {did:$doc['did'],title:title,relatename:relatedata},cache: false,dataType: "xml",type:"post",async:false, 
			success: function(xml){
				var	message=xml.lastChild.firstChild.nodeValue;
				if(message=='1'){
					$('#related_doc').html(relatedhtml);
					$('#related_doc').css("display",'block');
					$.dialog.close('relatedoc');return;
				}else if(message=='2'){
					alert('{lang viewDocTip12}');
				}else{
					alert('{lang viewDocTip3}');
				}
			}
		});
	}
</script>
<!--{/if}-->
<!--{if $setting['attachment_open'] && $attachment_upload}-->
<script type="text/javascript">
String.prototype.Len=function(){
	var j = 0;
	var charset = 'UTF-8'=='{WIKI_CHARSET}' ? 3 :2;
	for(var i=0;i<this.length;i++){
		if(this.charCodeAt(i) > 255) {
			j = j + charset;
		}else{
			j++
		}
	}
	return j;
}
<!--{if $attachment_type == '*'}-->
var attachment_type = '';
<!--{else}-->
var attachment_type = /\.(<?=$attachment_type?>)$/i;
<!--{/if}-->
var Attachment = {
	upload: function(el){
		$(el).hide();
		$(el).parent().find('form').show();
		$("div.fj_list").find("h3").show();
	},
	
	add: function(el){
		var value = $(el).val();
		if (!value) return false;
		if(value.Len() > 100){
			alert('{lang attachNameLength}');
		    $(el).before('<input name="attachment[]" type="file" onkeydown="return false" onpaste="return false" autocomplete="off" onchange="Attachment.add(this)">').remove();
			return false;
		}
		if (attachment_type && !attachment_type.test(value)){
			alert("{lang attachTypeError}");
		    $(el).before('<input name="attachment[]" type="file" onkeydown="return false" onpaste="return false" autocomplete="off" onchange="Attachment.add(this)">').remove();
			return false;
		}
		var div = $(el).parent('div');
		/*var isSelect = div.parent('form').find("input[type=file][value='"+value+"']").size();
		var isUpload = div.parents("div.fj_list").find("a:contains('"+this.getname(value)+"')").size();
		if (isSelect > 1 || isUpload>=1) {
			alert("{lang attachDuplicate}");
			$(el).before('<input name="attachment[]" type="file" onkeydown="return false" onpaste="return false" autocomplete="off" onchange="Attachment.add(this)">').remove();
			return false;
		}*/
		
		if (div.parent('form').find("input[type=file]:last").val() == ''){
			return false;
		}
		
		var ndiv = div.clone();
		ndiv.find("input").val('');
		ndiv.find("input.coin_download").val(0);
		div.after(ndiv).find('a').show();
		$("#attachment_error").hide();
	},
	
	getname: function(filename){
		var re = /[^\/\\]+$/i;
		var pos = filename.search(re);
		return (pos > -1) ? filename.substr(pos) : false;
	},
	
	addok: function(upload_success_files){
		var form = $("#attachment_upload");
		var files = form.find("input[type=file]");
		var descs = form.find(".attachmentdesc");
		var len= files.size();
		var dl, name, desc, icon;
		var div = form.parent("div");
		for(i=0; i<len; i++){
			name = this.getname(files.get(i).value);
			
			if (/\.(doc|docx|xls|xlsx|ppt|pptx|mdb|accdb)$/i.test(name)){
				icon = 'msoffice';
			}else if (/\.(jpg|jpeg|bmp|gif|ico|png)$/i.test(name)){
				icon = 'image';
			}else if (/\.(pdf|rar|zip|swf|txt|wav)$/i.test(name)){
				icon = name.substr(name.length-3);
			}else {
				icon = 'common';
			}
			desc = descs.get(i).value;
			if (!name) continue;
			dl = form.parents("div.fj_list").find("dl:first").clone();
			dl.find("a").text(name);
			dl.find("img").attr("src","style/default/attachicons/"+icon+".gif");
			dl.find("dd").text(desc);
			if (upload_success_files.indexOf(name)==-1){
				$(files.get(i)).parent("div").remove();
				continue;
			}
			dl.show();
			div.before(dl);
		}
		//$("#attachment_error").hide();
	},
	
	error: function(err){
		$("#attachment_error").show().append('<br>'+err);
	},
	
	unadd: function(el){
		$(el).parent('div').remove();
	},
	
	remove: function(el, id){
		$.get("index.php?attachment-remove-"+id, function(data, state){
			if (state == 'success'){
				data = $.trim(data);
				if (data == 'OK'){
					var dl = $(el).parents("dl[id='"+id+"']");
					dl.remove();
				}else{
					alert("{lang delpmserror}");
				}
			}else{
				alert("{lang delpmserror}");
			}
		})
	},
	
	submit: function(form){
		var file = $(form).find("input[type=file]:first");
		if (file.val() == ''){
			alert("{lang attachIsEmpty}");
			return false;
		}
		$("#attachment_error").hide().html('');
	}
}
</script>
<!--{/if}-->
<script type="text/javascript">
	function partsection(){
		$('#fullsection').css('display','block');
		$('#partsection').css('display','none');
		$("#hidesection > li:gt(3)").css('display','none');
	}
	function fullsection(){
		$('#fullsection').css('display','none');
		$('#partsection').css('display','block');
		$("#hidesection > li:gt(3)").css('display','block');
	}
	function addfav(){
		var title=$("#doctitle").text();
		if (window.ActiveXObject){
			 window.external.AddFavorite('{WIKI_URL}/index.php?doc-view-<?=$doc[did]?>', title+'-<?=$setting[site_name]?>')
		} else {
			window.sidebar.addPanel(title+'-<?=$setting[site_name]?>', '{WIKI_URL}/index.php?doc-view-<?=$doc[did]?>' , "");
		}
	}
	function vote(el){
		$.ajax({
			url: "index.php?doc-vote",
			data: {did:"$doc['did']"},
			cache: false,
			dataType: "xml",
			type:"post",
			success: function(xml){
				var	message=xml.lastChild.firstChild.nodeValue;
				if(message=='1'){
					var votes=parseInt($("#votemsg + b").html())+1;
					$("#votemsg + b").html(votes);
					$('#votemsg').html('{lang viewDocTip10}');
					$("#ding span").html(votes);
					
					$.get("index.php?hdapi-hdautosns-ding-<?=$doc['did']?>");
				}else{
					$('#votemsg').html('{lang viewDocTip11}');
					if($(el).attr('id') == 'ding'){
						$.dialog.box('jqdialogtip', '提示', '{lang viewDocTip11}');
					}
				}
			}
		});
	}
	
	function hdunique(arrayName){
		var newArray=new Array();
		label:for(var i=0; i<arrayName.length;i++ ){  
			for(var j=0; j<newArray.length;j++ ){
				if(newArray[j]==arrayName[i]) 
					continue label;
				}
				newArray[newArray.length] = arrayName[i];
			}
		return newArray;
	}
	
	function scrollToTop(){
		var body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body');
		body.animate({scrollTop:0},500);
	}
	
	$(window).ready(function(){
		$.dialog({
			id:'scrolltotop',
			skin:"noborder",
			position:'rb',
			move:false,
			effects:'',
			fixed:1,
			height:100,
			width:50,
			closeImg:0,
			minScrollTop:100,
			overlay:0,
			content:'<img title="回顶部" style="cursor:pointer" src="{WIKI_URL}/style/default/up.png" style="width:23px; height:66px" onclick="scrollToTop()"/>'
		});
	});

	var clock_doc_locked=0;
	function doc_is_locked(){
		if($.trim($('#lockimage').html())!=""){
			$.dialog.box('fobbiden', '禁止编辑', '<b>{lang viewDocTip8}</b>');
			clearTimeout(clock_doc_locked);
			clock_doc_locked=setTimeout(function(){
				$.dialog.close('fobbiden');
			},1500);
			return false;
		}
	}
	
	function innerlink(title){
		location.href='{WIKI_URL}/index.php?doc-innerlink-'+encodeURI(title);
	}
	
	//内链不存在时的颜色，可以使用突出的红色 red 或和普通文本一样的黑色 #000000，或者其他您喜欢的颜色等等。默认为红色。
	var innerlink_no_exist_color='red';
	$("a[href^='javascript:innerlink']").each(function(){
		var a=$(this), title=a.text();
		if(title.indexOf('"') > -1){
			title = title.replace('"', '\\"');
		}
		a.attr('title', '词条“'+title+'”不存在，点击可创建')
			.addClass('link_doc_no').attr('href', 'javascript:innerlink("'+title+'")').removeAttr("target");
	});
	
	$(document).ready(function(){
		$("#doc_favorite").click(function(){
			var did = $(this).attr('did');
			var result = '';
			$.post("{url user-addfavorite}",  {did:did},function(data){
				switch (data) {
					case '1' :
						result = '词条成功被收藏至个人中心！';
						break;
					case '2' :
						result = '此词条已经被收藏！';
						break;
					case '3' :
						result = '指定词条不存在或者已经被删除！';
						break;
					default :
						result = '参数错误!';
						break;
				}
				$.dialog.box('user_addfavorite', '收藏词条', result);
			});
		})
		
		$(".file_download").click(function(){
			var coin_down = $(this).attr("coin_down");
			var attach_id = $(this).attr("attach_id");
			var uid = $(this).attr("uid");
			var coin_hidden = $("#coin_hidden").val();
			coin = coin_hidden - coin_down;
			if(attach_id != uid && coin < 0) {
				$.dialog.box('coin_down', '附件下载', '金币不足！');
				return false;
			} else {
				$("#coin_hidden").val(coin);
			}
		})
	})
	
	function check_coin(coinObj){
		var coin = coinObj.val();
		var preg =/^[0-9_]*$/;
		var coin_down = <!--<?=$coin_download?>-->;
		coin = $.trim(coin);
		if(preg.test(coin)){
			if(coin < 0) {
				coin = 0;
			}
			if(coin > coin_down ) {
				coin = coin_down;
			}
		} else {
			coin = 0;
		}
		
		coinObj.val(coin);
	}
</script>
<script type="text/javascript">
	var Letter = {
		E:null,
		did: 0,
		letters:'',
		box : function(did, E){
			this.E = $(E).parent();
			this.did = did;
			var html = '<form onsubmit="Letter.send();return false;"><table border="0" width="400" class="send_massage">'
			+'<tr><td height="40">词条首字母：<input id="first_letter" type="text" class="inp_txt" maxlength="1" size="10"/></td></tr>'
			+'<tr><td height="40"><input id="letterSubmit" type="submit" value="'+Lang.Submit+'" />'
			+'<span id="tagTip"></span></td></tr></table></form>';
			$.dialog.box('firstletter', '设置词条首字母', html);
			$("#letterSubmit").attr('disabled', false).val(Lang.Submit);
			letters=$("#fletter").val();
			document.getElementById("first_letter").value=letters;//document.getElementById("fletter").value;
			return false;
		},						
		send: function(){
			$.post(
				"index.php?doc-editletter",{did:<?=$doc['did']?>,first_letter:$('#first_letter').val()},
				function(xml){
					var message=xml.lastChild.firstChild.nodeValue;
					if(message=='1'){
						alert('设置成功');
						newletter=$('#first_letter').val();
						document.getElementById("fletter").value = newletter;
						$.dialog.close('firstletter');
					}
					if(message=='-1'){
						alert('您必须输入a-z的英文字母,不区分大小写');
					}
				}
			);
		}
	}
</script>
<!--参考资料设置 开始-->
<script type="text/javascript">
var g_docid = "$doc['did']";
var docReference = {
	editid:0,
	verify_code:0,
	text_name:"请填入参考资料的名称，可以是书籍、文献，或网站的名称。（必填）",
	text_url:"请填写详细网址，以 http:// 开头",
	
	init: function(){
		var self = this;
		$('div#reference dd span[name=edit]').css('visibility', 'hidden');
		
		$("#editrefrencename").focus(function(){
			if(this.value == self.text_name){
				this.value='';
				this.style.color='#333';
			}
		});
		
		$("#editrefrenceurl").focus(function(){
			if(this.value == self.text_url){
				this.value='';
				this.style.color='#333';
			}
		});
		
		$.get('index.php?reference-add-checkable-'+Math.random(), function(data, state){
			if ('OK' == data || 'CODE' == data){
				$("#edit_reference").show();
				$("#edit_reference1").show();
				$("div#reference dd").mouseover(function(){
					$(this).find('span[name=edit]').css('visibility', '');
				});
				
				$("div#reference dd").mouseout(function(){
					$(this).find('span[name=edit]').css('visibility', 'hidden');
				});
				
				if('CODE' == data){
					self.setVerifyCode();
					self.verify_code = 1;
					$("div#reference li[name=verifycode]").show();
				}
			}else{
				if( !$("div#reference dl.f8:visible").size() ){
					$("div#reference").hide();
				}
			}
		});
		return this;
	},
	
	reset: function(){
		var self = this;
		$("#editrefrencename").val(this.text_name).css('color', '#999');
		$("#editrefrenceurl").val(this.text_url).css('color', '#999');
		self.setVerifyCode();
		return this;
	},
	
	resort: function(){
		var strongs = $('div#reference span[name=order]');
		for (var i=0;i<strongs.length; i++){
			$(strongs.get(i)).html("["+(i)+"]");
		}
	},
	
	check: function(){
		var self=this, name,url, code="";
		$("#refrencenamespan").html('');
		$("#refrenceurlspan").html('');
		$("#refrencecodespan").html('');
		
		name = $.trim($("#editrefrencename").val());
		url = $.trim($("#editrefrenceurl").val());
		code = $.trim($("#editrefrencecode").val());
		
		if ('' == name || this.text_name == name){
			$("#refrencenamespan").html('参考资料名称为必填项');
			return false;
		}
		
		if (url == this.text_url){
			url = '';
		}
		if (url && !/^https?:\/\//i.test(url)){
			$("#refrenceurlspan").html('参考资料URL必需为以 http:// 或 https:// 开头的网址');
			return false;
		}
		
		if(self.verify_code && !code){
			$("#refrencecodespan").html('请输入验证码');
			return false;
		}
		
		if(self.verify_code && code.length != 4){
			$("#refrencecodespan").html('验证码需要输入4个字符');
			return false;
		}
		
		return {name:name, url:url, code:code};
	},
	
	save: function(){
		var self=this, value = this.check();
		if (value == false) return;
			
		if (this.editid == 0){
			this.add(value);
		}else{
			var name = value.name, url = value.url, code=value.code;
			
			//$("#save_1").hide();
			//$("#save_0").show();
			$("#save_1").show();
			$.ajax({
				url:'index.php?reference-add',
				data:{'data[id]':self.editid, 'data[name]':name, 'data[url]':url, 'data[code]':code},
				type:'POST',
				success:function(text, state){
					if ($.trim(text) == '1'){
						var dl = $('div#reference dl[id='+self.editid+']');
						dl.find('span[name=refrencename]').html(name);
						dl.find('span[name=url]').html(url);
						self.editid = 0;
						self.resort();
						self.reset();
					}else if( 'code.error' == text ){
						$("#refrencecodespan").html('验证码错误');
					}else{
						alert('提示：参考资料修改失败！');
					}
				},
				complete:function(XMLHttpRequest, state){
					if (state != 'success'){
						alert('提示：参考资料修改失败！');
					}
					//$("#save_0").hide();
					$("#save_1").show();
				}
			});
		}
	},
	
	add: function(value){
		var name = value.name, url = value.url, code=value.code, self=this;
		
		//$("#save_1").hide();
		//$("#save_0").show();
		$("#save_1").show();
		$.ajax({
			url:'index.php?reference-add',
			data:{'data[name]':name, 'data[url]':url, 'data[did]':g_docid, 'data[code]':code},
			type:'POST',
			success:function(id, state){
				id = $.trim(id);
				if (/[1-9]+/.test(id)){
					var dl = $('div#reference dl[id=0]').clone(true);
					dl.attr('id', id).show();
					dl.find('span[name=refrencename]').html(name);
					dl.find('span[name=url]').html(url);
					
					$('div#reference ul').before(dl);
					self.resort();
					self.reset();
				}else if( 'code.error' == id ){
					$("#refrencecodespan").html('验证码错误');
				}else{
					alert('提示：参考资料添加失败！');
				}
			},
			complete:function(XMLHttpRequest, state){
				if (state != 'success'){
					alert('提示：参考资料添加失败！');
				}
				//$("#save_0").hide();
				$("#save_1").show();
			}
		});
	},
	
	edit: function(el){
		if (typeof el != 'object') return;
		var dl = $(el).parents('dl');
		this.editid = dl.attr('id');
		var name, url;
		name = $(dl).find('span[name=refrencename]').html();
		url = $(dl).find('span[name=url]').html();
		
		$("#editrefrencename").val(name).css('color', '#333');
		$("#editrefrenceurl").val(url).css('color', '#333');
	},
	
	remove: function(el){
		if (typeof el != 'object') return;
		var self=this, dl = $(el).parents('dl');
		$(el).attr('onclick', '');
		var id = dl.attr('id');
		$.ajax({
			url:'index.php?reference-remove-'+id,
			success:function(text, state){
				text = $.trim(text);
				if (text != '0'){
					
					$(dl).remove();
					self.resort();
					self.reset();
				}else{
					alert('提示：参考资料删除失败！');
					$(el).attr('onclick', 'docReference.remove(this)');
				}
			},
			complete:function(XMLHttpRequest, state){
				if (state != 'success'){
					alert('提示：参考资料删除失败！');
					$(el).attr('onclick', 'docReference.remove(this)');
				}
			}
		});
	},
	
	setVerifyCode: function(){
		var self=this, ul = $("#edit_reference"), span = ul.find("label[name=img]");
		ul.find("label[name=tip]").html("[点击输入框显示验证码]").show();
		span.hide();
		$("#editrefrencecode").val('');
		ul.find("input[name=code]").one('focus', function(){
			self.updateVerifyCode();
			span.show();
			ul.find("label[name=tip]").hide();
		});
	},
	
	updateVerifyCode: function(){
		$('#verifycode2').attr('src', "index.php?user-code-"+Math.random());
	}
}

function reference_edit(){ 
	$("#reference_view").hide();
	$("#reference").show();
    docReference.init().reset();
}

function reference_view(){ 
    $("#reference").hide();
	$("#reference_view").show();
}
</script>
<!--参考资料设置 结束-->
<script type="text/javascript" src="js/openremoveimage.js"></script>

<?$this->view('footer')?>