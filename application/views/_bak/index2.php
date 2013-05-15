<?$this->view('header')?>
<script type="text/javascript">
$(document).ready(function(){
	$("#tpbk img,#tjct img").each(function(i){
		var w = this.width;
		var h = this.height;
		if(w > 100 || h > 75){
			if(w/h>4/3){
				this.style.width = "100px"
			}else{
				this.style.height = "75px"
			}
		}
	});
	
	$("input[name*='searchtext']") .focus();
});
</script>

<div class="l w-710 o-v">

	<div class="l w-270">
    	<div id="block_ctop1">{block:ctop1/}</div>
	</div>
	<div class="w-430 r">
    	<div id="block_ctop2">{block:ctop2/}</div>
	</div>

<!--ad start -->

<!--{if isset($advlist[2]) && isset($setting[advmode]) && '1'==$setting[advmode]}-->
<div class="ad" id="advlist_2">
<?=$advlist[2][code]?>
</div>
<!--{elseif isset($advlist[2]) && (!isset($setting[advmode]) || !$setting[advmode])}-->
<div class="ad" id="advlist_2">
</div>
<!--{/if}-->

<!--ad end -->	
</div>
<div class="r w-230">
	<div id="block_right">{block:right/}</div>
</div>
<div class="l w-710 o-v">
	<div class="l w-270">
    	<div id="block_cbottoml">{block:cbottoml/}</div>
	</div>
	<div class="w-430 r">
    	<div id="block_cbottomr">{block:cbottomr/}</div>
	</div>
</div>


<div class="c-b"></div>

<div id="block_bottom">{block:bottom/}</div>

<?$this->view('footer')?>