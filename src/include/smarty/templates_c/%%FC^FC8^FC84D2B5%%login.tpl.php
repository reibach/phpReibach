<?php /* Smarty version 2.6.19, created on 2016-11-10 14:38:46
         compiled from login/login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body onload="document.Login.Username.focus();">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "htable.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<p>&nbsp;</p>
<div align="center">
<form id="Login" name="Login" action="loginf.php?<?php echo $this->_tpl_vars['Session']; ?>
" method="post">
<table width="60%" border="0" class="phprechnung_tabelle_g" cellspacing="3" cellpadding="3" summary="Tabelle 2"><tbody>
<tr class="mblueTD"><td align="center" colspan="2"><?php echo $this->_tpl_vars['LoginMsg']; ?>
</td></tr>
<?php if ($_SESSION['logoutid'] && ( $_SESSION['logoutid'] == '3' )): ?>
	<tr><td align="center" colspan="2" class="redtxt"><?php echo $this->_tpl_vars['SessionEndMsg']; ?>
</td></tr>
<?php endif; ?>
<?php if ($_SESSION['logoutid'] && ( $_SESSION['logoutid'] == '2' )): ?>
	<tr><td align="center" colspan="2" class="redtxt"><?php echo $this->_tpl_vars['LoginErrMsg']; ?>
</td></tr>
<?php endif; ?>
<?php if ($_SESSION['logoutid'] && ( $_SESSION['logoutid'] == '1' )): ?>
	<tr><td align="center" colspan="2"><?php echo $this->_tpl_vars['LoginEndMsg']; ?>
</td></tr>
<?php endif; ?>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td align="right" width="40%"><?php echo $this->_tpl_vars['Username']; ?>
:</td><td align="left" width="60%"><input type="text" name="Username" size="30" /></td></tr>
<tr><td align="right" width="40%"><?php echo $this->_tpl_vars['Password']; ?>
:</td><td  align="left" width="60%"><input type="password" name="Password" size="30" /></td></tr>
<tr><td></td></tr>
<tr><td align="center"><input type="submit" class="button" title="<?php echo $this->_tpl_vars['Login']; ?>
" value="<?php echo $this->_tpl_vars['Login']; ?>
" /></td>
<td align="center"><input type="reset" class="button" title="<?php echo $this->_tpl_vars['Delete']; ?>
" value="<?php echo $this->_tpl_vars['Delete']; ?>
" /></td></tr>
<tr><td></td></tr>
</tbody></table></form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>