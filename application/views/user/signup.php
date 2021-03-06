<?$this->view('header')?>
	<div class="title">
		<h1>注册</h1>
	</div>
	<div class="main">
		<div id="left" class="span5"><img src="style/register-banner.png"></div>
		<div class="span7">
			<form id="registerform" method="post" class="form-horizontal">
				<input name="forward"   type="hidden" value='<?//=$forward?>' />
				<div class="control-group">
					<label class="control-label" for="email">E-mail：</label>
					<div class="controls">
						<input name="email" id="email" type="text" value="<?=set_value('email')?>" />
						<span class="label label-important"><?=form_error('email')?></span>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="username">用户名：</label>
					<div class="controls">
						<input name="username" id="username"  type="text" value="<?=set_value('username')?>" />
						<span class="label label-important"><?=form_error('username')?></span>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="password">密码：</label>
					<div class="controls">
						<input name="password" id="password"  type="password" />
						<span class="label label-important"><?=form_error('password')?></span>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="repassword">确认密码：</label>
					<div class="controls">
						<input name="repassword" id="repassword"  type="password" />
						<span class="label label-important"><?=form_error('repassword')?></span>
					</div>
				</div>				
				<div class="control-group">
					<label class="control-label" for="repassword">验证码：</label>
					<div class="controls">
						<input name="captcha" id="captcha"  type="text" style="width: 123px;" />
						<span><?=$captcha['image']?></span>
						<span class="label label-important"><?=form_error('captcha')?></span>
					</div>
				</div>				
				<div class="control-group">
					<div class="controls">
						<label class="checkbox" for="is-company">
							<input name="is_company" id="is-company" type="checkbox"<?=set_checkbox('is_company','on')?> />
							<span>注册为企业用户</span>
						</label>
					</div>
				</div>				
				<div class="hide company-forms">
					<div class="control-group">
						<label class="control-label">公司简介</label>
						<div class="controls">
							<textarea name="description" id="description" disabled="disabled"><?=set_value('description')?></textarea>
						</div>
					</div>				
					<div class="control-group">
						<label class="control-label">联系方式</label>
						<div class="controls">
							<input type="text" name="profiles[联系方式]" id="contact" disabled="disabled"><?=set_value('profiles[联系方式]')?></textarea>
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox" for="agree">
							<input name="agree" id="agree" type="checkbox"<?=set_checkbox('agree','on')?> />
							<span class="user-only-forms">同意"<a href="/wit/1" target="_blank">Witower智塔用户协议</a>"</span>
							<span class="company-forms hide">同意"<a href="/wit/2" target="_blank">Witower智塔企业用户协议</a>"</span>
							<span class="label label-important"><?=form_error('agree')?></span>
						</label>
					</div>
				</div>				
				<div class="control-group">
					<div class="controls">
						<button name="signup" type="submit" class="btn btn-primary">注册</button>
						<label class="checkbox inline"><a href="/login<?if($this->input->get()){?>?<?=http_build_query((array)$this->input->get())?><?}?>">已有账号，立即登录</a></label>
					</div>
				</div>				
			</form>
		</div>
	</div>
<div class="c-b"></div>
<script type="text/javascript">
$(function(){
	$('#is-company').on('change', function(){
		if($(this).is(':checked')){
			$('.company-forms').show().find(':input').prop('disabled',false);
			$('.user-only-forms').hide();
		}
		else{
			$('.company-forms').hide().find(':input').prop('disabled',true);
			$('.user-only-forms').show();
		}
	});
});
</script>
<?$this->view('footer')?>
