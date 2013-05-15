<?$this->view('header')?>
<form id="form1" name="searchform" action="{url search-kw}" method="post">
<div class="m-t10 adv_search">
<span class="bold">{lang searchInfo}</span>
<ul class="m-t10">
<li><span>{lang searchKeyword}</span><input name="searchtext" type="text" value="<?=$keyword?>"/></li>
<li><span>{lang commentUser}</span><input name="author" type="text" /></li>
</ul>
</div>
 
<div class="m-t10 adv_search">
<span class="bold">{lang searchOption}</span>
<ul class="m-t10">
<li><span>{lang searchType}</span>
	<label><input name="searchtype" type="radio" value="title" <!--{if searchtype=='title'||$searchtype==''}-->checked="checked"<!--{/if}--> />{lang saveTitle}</label>
	<label><input name="searchtype" type="radio" value="content" <!--{if searchtype=='content'}-->checked="checked"<!--{/if}--> />{lang searchContent}</label>
	<label><input name="searchtype" type="radio" value="tag" <!--{if searchtype=='tag'}-->checked="checked"<!--{/if}--> />{lang tag}</label>
</li>
<li><span>{lang searchTime}</span>
				<select name="timelimited">
					<option value="0">{lang searchTimeTrip1}</option>
					<option value="86400">{lang searchTimeTrip2}</option>
					<option value="172800">{lang searchTimeTrip3}</option>
					<option value="432000">{lang searchTimeTrip4}</option>
					<option value="1296000">{lang searchTimeTrip5}</option>
					<option value="5184000">{lang searchTimeTrip6}</option>
					<option value="8640000">{lang searchTimeTrip7}</option>
					<option value="31536000">{lang searchTimeTrip8}</option>
				</select>
				
				<label><input name="withinbefore" value="within" type="radio" <!--{if $withinbefore=='within'||$searchtype==''}-->checked="checked"<!--{/if}--> />{lang searchTimeTrip9}</label>
				<label><input name="withinbefore" value="before" type="radio" <!--{if $withinbefore=='before'}-->checked="checked"<!--{/if}-->/>{lang searchTimeTrip10}</label>
</li>
<li><span>{lang searchSortord}</span><select name="ordertype">
							<option value="time">{lang searchSortordByTime}</option>
							<option value="comments">{lang commentTimes}</option>
							<option value="views">{lang viewTimes}</option>
						</select>
						<label><input name="ascdesc" type="radio" value="asc" <!--{if $ascdesc=='asc'}-->checked="checked"<!--{/if}--> />{lang searchSortordAsc}</label>
						<label><input name="ascdesc" type="radio" value="desc" <!--{if $ascdesc=='desc'||$ascdesc==''}-->checked="checked"<!--{/if}--> />{lang searchSortordDesc}</label>
</li>
<li><span>{lang searchRange}</span>
				<select name="categoryid[]" size="10"  multiple="multiple">
					<option selected="" value="all">{lang searchAllCategory}</option>
					<?=$categorytree?>
				</select>
</li>
<li><input name="full" type="submit" value="{lang searchInfo}" class="btn_inp" /></li>
</ul>
</div>
 
</form>

<div class="c-b"></div>
<?$this->view('footer')?>