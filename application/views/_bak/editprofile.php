<?$this->view('header')?>
<style type="text/css">
#calendar { border: 1px solid #C1C1C1; background: #FFF; margin-bottom: 0.8em;}
#calendar td { padding: 2px; font-weight: bold;}
#calendar_week td { height: 2em; line-height: 2em; border-bottom: 1px solid #E2E2E2;}
#hourminute td {padding: 4px 2px; border-top: 1px solid #E2E2E2;}
	.calendar_expire, .calendar_expire a:link, .calendar_expire a:visited {	color: #535353; font-weight: normal; }
	.calendar_default, .calendar_default a:link, .calendar_default a:visited { color: #535353;}
	.calendar_checked, .calendar_checked a:link, .calendar_checked a:visited { color: #DD0000; font-weight: bold;}
	td.calendar_checked, span.calendar_checked{ background: #E2E2E2;}
	.calendar_today, .calendar_today a:link, .calendar_today a:visited { color: #535353; font-weight: bold; }
#calendar_header td{ width: 30px; height: 20px; border-bottom: 1px solid #E2E2E2; font-weight: normal; }
#calendar_year { display: none;	line-height: 130%; background: #FFF; position: absolute; z-index: 10; }
	#calendar_year .col { float: left; background: #FFF; margin-left: 1px; border: 1px solid #E2E2E2; padding: 4px; }
#calendar_month { display: none; background: #FFF; line-height: 130%; border: 1px solid #DDD; padding: 4px; position: absolute; z-index: 11; }
</style>

<div id="append_parent"></div>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript">
function docheck(){
	var signature=$.trim($('#signature').val());
	if(signature.length > 500){
		alert('{lang editProfiletoolong}');
		return false;
	}
	var gender=( $('#gender').attr("checked")==true )?0:1;
	$.post(
		"index.php?user-editprofile",
		{gender:gender, birthday:$('#birthday').val(),location:$('#location').val(), signature:$('#signature').val(),submit:'true' },
		function(xml){
			$.dialog.box('tips', '{lang selfManage}', '{lang editProfileTip1}');
			setTimeout("$.dialog.close('tips')",1000);
		}
	);
	return false;
}
	function expand(id){
		if(id=='usermanage'){
			$("ul#usermanage").toggle(); 
		}else{
			$('ul#userpms').toggle();
		}
	}
</script>
<div class="hd_map">
	<a href="{WIKI_URL}"><?=$setting['site_name']?></a> &gt; <a href="{url user-profile}">{lang selfManage}</a> &gt; {lang editProfile}</div>
	
<div class="r w-710 o-v m-t10 p-b10 gl_manage_main">
	<h2 class="h3 bold">{lang editProfile}</h2>
	<form  name="profileform" method="post" action="{url user-editprofile}" onsubmit="return docheck();">
	<ul class="col-ul">
		<li><span>{lang userName}:</span>$user['username']</li>
		<li><span>{lang gender}:</span><input name="gender" id="gender" type="radio" value="0" {if !$user[gender]}checked="checked"{/if} /> {lang female} &nbsp; &nbsp; <input name="gender" type="radio" value="1" {if $user[gender]}checked="checked"{/if}/>{lang male}</li>
		<li><span>{lang birthday}:</span> <input  name="birthday"  id="birthday" type="text" class="reg-inp" value="$birthday"  onclick="showcalendar(event, this);" /></li>
		<li><span>{lang location}:</span><input name="location"  id="location" type="text" class="reg-inp" value="<?=$user['location']?>" maxlength="30"/></li>
		<li><span>{lang signature}:</span><textarea name="signature" id="signature" cols="60" rows="10">$user[signature]</textarea><br/>{lang editProfileTip3}</li>
		<li><input name="submit" type="submit" value="{lang submit}"  class="btn-submit"  /></li>
	</ul>
	</form>
</div>

<div class="l w-230">
<div class="m-t10 p-b10 sidebar gl_manage">
	<h2 class="col-h2"><span onclick="expand('usermanage');">{lang profile}</span></h2>	
	<ul id="usermanage">
		<li><a href="{url user-profile}" target="_self"><img alt="" src="style/default/gl_manage/grzl.gif" />{lang profile}</a></li>
		<li><a href="{url user-editprofile}" target="_self" class="on" ><img src="style/default/gl_manage/grzl_set.gif"/>{lang editProfile}</a></li>
		<li><a href="{url user-editpass}" target="_self"><img src="style/default/gl_manage/change_pw.gif"/>{lang editPass}</a></li>
		<li><a href="{url user-editimage}" target="_self"><img src="style/default/gl_manage/grzl_set.gif" />{lang editImage}</a></li>
		<li><a href="{url doc-managesave}" target="_self"><img src="style/default/gl_manage/ctbccgx.gif"/>{lang manageSave}</a></li>
		<li><a href="{url user-invite}" target="_self"><img src="style/default/gl_manage/invite.png"/>{lang regInvite}</a></li>
	</ul>
	<h2 class="col-h2"><span onclick="expand('userpms');">{lang shortmessage}</span></h2>		
	<ul id="userpms">
		<li><a href="{url pms-box-inbox}" target="_self"><img alt="" src="style/default/gl_manage/sjx.gif" />{lang inbox}</a></li>
		<li><a href="{url pms-box-outbox}" target="_self" ><img src="style/default/gl_manage/fjx.gif"/>{lang outbox}</a></li>
		<li><a href="{url pms-sendmessage}" target="_self" ><img src="style/default/gl_manage/fdxx.gif"/>{lang sendmessage}</a></li>
		<li><a href="{url pms-box-drafts}" target="_self"><img src="style/default/gl_manage/cgx.gif" />{lang draft}</a></li>
		<li><a href="{url pms-blacklist}" target="_self"><img src="style/default/gl_manage/hllb.gif"/>{lang blacklist}</a></li>
	</ul>
</div>
</div>
<div class="c-b"></div>
<?$this->view('footer')?>