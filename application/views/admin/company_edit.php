<?$this->view('header')?>
<link rel="stylesheet" type="text/css" href="/style/bootstrap/typeahead.js-bootstrap.css">
<script type="text/javascript" src="/js/typeahead.min.js"></script>
<script type="text/javascript">
$(function(){
	
	$(':input[name="name"]').typeahead({
		remote: '/user/match/%QUERY',
		valueKey:'name'
	});
	
	$(':input').on('typeahead:selected',function(event,item){
		console.log('selected');
		$($(this).data('id-element')).val(item.id);
	})
	.on('change',function(event){
		if($(this).val()==='' && $(this).data('id-element')){
			$($(this).data('id-element')).val('');
		}
	});
	
});
</script>
<div id="content" class="page-company">
	<ul class="breadcrumb">
		<li>
			<strong><?=lang(uri_segment(1))?></strong>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="/<?=uri_segment(1)?>/finance">企业管理</a>
			<span class="divider">/</span>
		</li>
		<li>
			<?if(isset($company['id'])){?>编辑企业<?}else{?>添加企业<?}?>
		</li>
	</ul>
	<? $this->view(uri_segment(1).'/sidebar') ?>
	<div id="right">
		<div class="model">
			<div class="title"><h3><?if(isset($company['id'])){?>编辑企业<?}else{?>添加企业<?}?></h3></div>
			<div class="main">
				<div class="show_content">
					<?$this->view('alert')?>
					<form class="form-horizontal" method="post">
						<div class="control-group">
							<label class="control-label">用户</label>
							<div class="controls">
								<input type="text" name="name" value="<?=set_value('name',isset($company['name'])?$company['name']:NULL)?>" autocomplete="off" data-id-element="[name='id']"<?if(isset($company['name'])){?> class="uneditable-input"<?}?>>
								<input type="hidden" name="id" value="<?=set_value('id',$company['id'])?>">
								<span class="label label-important"><?=form_error('id')?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">企业描述</label>
							<div class="controls">
								<textarea name="description"><?=set_value('description',$company['description'])?></textarea>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button class="btn btn-primary" type="submit" name="submit">保存</button>
<?if($company['id']){?>
								<a href='/admin/finance?user=<?=$company['id']?>' class="btn">财务</a>
<?}?>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?$this->view('footer')?>