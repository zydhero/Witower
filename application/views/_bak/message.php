<!--{if isset($ajax) }-->
{eval ob_end_clean();}
{eval ob_start();}
{eval @header("Expires: -1");}
{eval @header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);}
{eval @header("Pragma: no-cache");}
{eval @header("Content-type: application/xml; charset=$charset");}
{eval echo '<?xml version="1.0" encoding="'.$charset.'"?>';}
<root><![CDATA[<?=$message?>]]></root>
<!--{else}-->
<?$this->view('header')?>
<div class="success">
 	<dl>
 	<dt class="h2">{lang message_title}:</dt>
 	<dd><?=$message?></dd>
 	<!--{if $redirect == 'BACK'}-->
	<dd><a href="javascript:void(0);" onclick="history.back();return false;">{lang message_back}</a></dd>
	<!--{elseif $redirect}-->
	<dd>{lang messageTip}</dd>
	<script type="text/javascript">
	function redirect(url, time) {
		setTimeout("window.location='" + url + "'", time * 1000);
	}
	redirect('$redirect', 3);
	</script>
	<!--{/if}-->
 	</dl>
</div>
<?$this->view('footer')?>
<!--{/if}-->