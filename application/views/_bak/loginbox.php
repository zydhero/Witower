<form name="box-login" action="{url user-login}" method="post" onsubmit="return boxLogin.check()">
<table width="260" border="0" align="center" valign="top">
  <tr>
    <td></td>
    <td colSpan="2" height="20" align="left"><span id="box-login-error"></span></td>
  </tr>
  <tr>
    <td width="50" height="30">{lang userName}</td>
    <td><input id="box-login-username" name="username" type="text" class="reg-inp" style="width:200px;" size="20" maxlength="<?=$maxlength?>" onblur="boxLogin.checkUserName()"/></td>
    <td></td>
  </tr>
  <tr>
    <td height="30">{lang password}</td>
    <td><input id="box-login-password" name="password" type="password" class="reg-inp" style="width:200px;" size="20" maxlength="32" onblur="boxLogin.checkPsssword()"/></td>
    <td></td>
  </tr>
<!--{if $checkcode != "3"}-->
  <tr>
    <td height="30">{lang verifyCode}</td>
    <td><input id="box-login-code" name="code" type="text" class="reg-inp" size="6" maxlength="4" />
	<img id="verifycode2" src=""/>
	<a href="javascript:changeverifycode();">{lang codeNotClear}</a>
	</td>
    <td></td>
  </tr>
<!--{/if}-->
  <tr>
    <td></td>
    <td height="40" align="left"><input type="submit" value=" {lang login} ">
      <a href="{url user-getpass}">{lang getPass}</a></td>
    <td></td>
  </tr>
  <tr>
    <td colSpan="3" height="30"><hr /></td>
  </tr>
  <tr>
    <td colSpan="3" height="20">{lang loginTip5} <a href="{url user-register}">{lang register}</a></td>
  </tr>
 </table>
</form>
