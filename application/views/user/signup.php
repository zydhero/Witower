<?$this->view('header')?>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript">
var g_is_ok_username=1, g_is_ok_passwd=1, g_is_ok_email=1, g_is_ok_code=1;
var g_submited = false;

function check_username(){
	$('#checkusername').fadeOut();
	var result=false;
	var username=$.trim($('#username').val());
	var length=bytes(username);
	if(length==0){
		g_is_ok_username=0;
		$('#checkusername').html('{lang loginTip1}').fadeIn();
		divDance('checkusername');
	}else if( length < 2 || length >255){
		$('#checkusername').html('<?=$loginTip2?>').fadeIn();
		divDance('checkusername');
		g_is_ok_username=0;
	}else{
		jQuery.ajax({
			url: "index.php?user-checkusername",
			cache: false,
			dataType: "xml",
			type:"post",
			//async:false, 
			data: { username: username ,type:2 },
			success: function(xml){
				var	message=xml.lastChild.firstChild.nodeValue;
				if(message!='OK'){
					$('#checkusername').html(message).fadeIn();
					divDance('checkusername');
					g_is_ok_username=0;
				}else{
					$('#checkusername').html("<font color='green'>OK</font>").fadeIn();
					result=true;
					g_is_ok_username=1;
					return result;
				}
			}
		});
	}
	//if(!result)$('#error').html(" ").fadeIn();
	return result;
}

function check_passwd(){
	$('#checkpasswd').fadeOut();
	var result=false;
	var passwd=$('#password').val();
	if( bytes(passwd) <1|| bytes(passwd)>32){
		$('#checkpasswd').html('{lang editPassTip1}').fadeIn();
		divDance('checkpasswd');
		g_is_ok_passwd=0;
	}else{
		$('#checkpasswd').html("<font color='green'>OK</font>").fadeIn();
		result=true;
		g_is_ok_passwd=1;
		return result;
	}
	//if(!result)$('#error').html(" ").fadeIn();
	return result;
}

function check_repasswd(){
	$('#checkrepasswd').fadeOut();
	var result=false;
	var repassword=$('#repassword').val();
	if( bytes(repassword) <1|| bytes(repassword)>32){
		$('#checkrepasswd').html('{lang editPassTip1}').fadeIn();
		divDance('checkrepasswd');
		g_is_ok_passwd=0;
	}else{
		if($('#password').val()==$('#repassword').val()){
			$('#checkrepasswd').html("<font color='green'>OK</font>").fadeIn();
			result=true;
			g_is_ok_passwd=1;
			return result;
		}else{
			$('#checkrepasswd').html('{lang editPassTip3}').fadeIn();
			divDance('checkrepasswd');
			g_is_ok_passwd=0;
		}
	}
	//if(!result)$('#error').html(" ").fadeIn();
	return result;
}

function check_email(email){
	$('#checkemail').fadeOut();
	var result=false;
	var email=$.trim($('#email').val());
	if (email=="" || !email.match(/^[\w\.\-]+@([\w\-]+\.)+[a-z]{2,4}$/ig)){
		g_is_ok_email=0;
		$('#checkemail').html('{lang getPassTip2}').fadeIn();
		divDance('checkemail');
	}else{
		jQuery.ajax({
			url: "index.php?user-checkemail",
			cache: false,
			dataType: "xml",
			//async:false, 
			type:"post",
			data: { email: email },
			success: function(xml){
				var	message=xml.lastChild.firstChild.nodeValue;
				if(message!='OK'){
					g_is_ok_email=0;
					$('#checkemail').html(message).fadeIn();
					divDance('checkemail');
				}else{
					g_is_ok_email=1;
					$('#checkemail').html("<font color='green'>OK</font>").fadeIn();
					result=true;
					return result;
				}
			}
		});
	}
	//if(!result)$('#error').html(" ").fadeIn();
	return result;
}

function check_code(){
	$('#checkcode').fadeOut();
	var result=false;
	var code=$.trim($('#code').val());
	jQuery.ajax({
			url: "index.php?user-checkcode",
			cache: false,
			dataType: "xml",
			type:"post",
			//async:false, 
			data: { code: code },
			success: function(xml){
				var	message=xml.lastChild.firstChild.nodeValue;
				if(message=='OK'){
					g_is_ok_code=1;
					$('#checkcode').html("<font color='green'>OK</font>").fadeIn();
					result=true;
					return result;
				}else{
					g_is_ok_code=0;
					$('#checkcode').html('{lang loginTip4}').fadeIn();
					divDance('checkcode');
				}
			}
	});
	return result;
}

/*
function docheck(){
	if(check_email() && check_username() && check_passwd() && check_repasswd()){
		if(!g_submited && g_is_ok_email && g_is_ok_username && g_is_ok_passwd && g_is_ok_code){
			if(! $('#agree').attr('checked')){
				$('#chkagree').html('{lang registerTip1}').fadeIn();
				return false;
			}
			<!--{if $checkcode != 3 }-->
				return check_code();
			<!--{/if}-->
			g_submited = true;
			return true;
		}else{
			return false;
		}
	}else{
		return  false;
	}
}
*/

function docheck() {
	var checkemail = $('#checkemail').html().indexOf("OK");
	var checkusername = $('#checkusername').html().indexOf("OK");
	var checkpasswd = $('#checkpasswd').html().indexOf("OK");
	var checkrepasswd = $('#checkrepasswd').html().indexOf("OK");
	if(!$('#agree').attr('checked')){
		$('#chkagree').html('{lang registerTip1}').fadeIn();
		return false;
	}
	if(checkemail>=0 && checkusername>=0 && checkpasswd>=0 && checkrepasswd>=0) {
		return true;
	}else{
		check_email();
		check_username();
		check_passwd();
		check_repasswd();
		if(!g_submited && g_is_ok_email && g_is_ok_username && g_is_ok_passwd && g_is_ok_code){
			if(! $('#agree').attr('checked')){
				$('#chkagree').html('{lang registerTip1}').fadeIn();
				return false;
			}
			<!--{if $checkcode != 3 }-->
				return check_code();
			<!--{/if}-->
			g_submited = true;
			return true;
		}else{
			return false;
		}
	}
}

function updateverifycode() {
	var img = "index.php?user-code-"+Math.random();
	$('#verifycode').attr("src",img);
}

</script>
<div class="page-register">
	<div class="title">
		<h1>注册</h1>
		<!--<span><img src="style/default/register-steps.png"></span>-->
	</div>
	<div class="main">
		<div id="left"><img src="style/default/register-banner.png"></div>
		<div id="right">
			<form id="registerform" method="post" action="<?=$formAction?>" onsubmit="return docheck();">
				<ul>
					<!--{if isset($forward) && $forward }-->
					<input name="forward"   type="hidden" value='<?=$forward?>' />
					<!--{/if}-->
					<!--{if (isset($error))}-->
					<!--li id="error" style="color:red"><?=$error?></li-->
					<!--{/if}-->
					<li><span>E-mail：</span><input name="email" tabindex="3" id="email"  type="text" class="inp_txt" onblur="check_email()"  maxlength="50" value="<?=$email?>"/><label id="checkemail">*{lang registerTip3}</label></li>
					<li><span>{lang userName}：</span><input name="username" tabindex="3"  id="username" type="text" maxlength="<?=$maxlength?>" class="inp_txt" onblur="check_username()" value="<?=$username?>"/><label id="checkusername">*{lang loginTip2}</label></li>
					<li><span>{lang password}：</span><input name="password" tabindex="4" id="password" type="password" class="inp_txt" onblur="check_passwd()" maxlength="32" /><label id="checkpasswd">*{lang editPassTip1}</label></li>
					<li><span>{lang renewPass}：</span><input name="repassword" tabindex="5" id="repassword" type="password" class="inp_txt" onblur="check_repasswd()" maxlength="32"/><label id="checkrepasswd"></label></li>
					<!--{if $checkcode != "3"}-->
					<!--li class="yzm">
						<span>{lang verifyCode}</span>
						<input name="code" tabindex="7" type="text" id="code"  maxlength="4" onblur="check_code()" />
						<label class="m-lr8"><img id="verifycode" src="{url user-code}" onclick="updateverifycode();" /></label>&nbsp;
						<a  href="javascript:updateverifycode();">{lang codeNotClear}</a>
						<label id="checkcode">&nbsp;</label>
					</li-->
					<!--{/if}-->
					<li><span></span><input name="agree" id="agree" type="checkbox"  checked="checked" />{lang registerTip4}"<a href="{url doc-innerlink-{eval echo urlencode('{lang registerTip5}')}}" target="_blank">{lang registerTip5}</a>" <!--label id="chkagree">&nbsp;</label--></li>
					<li><span></span><input type="hidden" id="fromuid" name="fromuid" value="<?=$fromuid?>"><input name="submit" tabindex="8" type="submit" value="{lang submit}" class="btn_inp btn-c" /><label><a href="index.php?user-login">已有账号，立即登录。</a></label></li>
				</ul>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript"> 
//$('#username').focus();
//$('#email').focus();
</script>
<div class="c-b"></div>
<?$this->view('footer')?>