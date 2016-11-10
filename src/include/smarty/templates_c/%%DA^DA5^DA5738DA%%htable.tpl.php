<?php /* Smarty version 2.6.19, created on 2016-11-10 13:10:36
         compiled from htable.tpl */ ?>
<table class="phprechnung_sp_oben" border="0" width="100%" cellspacing="0" cellpadding="0" summary="Tabelle 1"><tbody>
<tr><td align="left" width="22%">
<table border="0" width="80%" cellspacing="0" cellpadding="0" summary="Tabelle 2"><tbody>
<tr><td id="td_navi1" align="center"><a accesskey="W" href="<?php echo $this->_tpl_vars['Web']; ?>
/index.php?<?php echo $this->_tpl_vars['Session']; ?>
">
<img border="0" src="<?php echo $this->_tpl_vars['Web']; ?>
/images/phprechnung.png" title="<?php echo $this->_tpl_vars['Programname']; ?>
" alt="<?php echo $this->_tpl_vars['Programname']; ?>
" width="190" height="40" /></a></td>
<td id="td_navi2" align="center"><a accesskey="V" href="http://validator.w3.org/" target="_blank">
<img border="0" src="<?php echo $this->_tpl_vars['Web']; ?>
/images/valid-xhtml10-blue.png" title="Valid XHTML 1.0 Transitional" alt="Valid XHTML 1.0 Transitional" width="88" height="31" /></a>
</td></tr></tbody></table></td>
<td align="right" width="78%">
<?php if ($_SESSION['Username']): ?>
	<?php echo $this->_tpl_vars['Loggedin']; ?>
:&nbsp;[&nbsp;<a title="<?php echo $this->_tpl_vars['Loggedin']; ?>
: <?php echo $_SESSION['FullName']; ?>
 (<?php echo $_SESSION['Username']; ?>
) - <?php echo $this->_tpl_vars['Hostname']; ?>
 (<?php echo $this->_tpl_vars['IPAddress']; ?>
)" class="ninfolink" href="<?php echo $this->_tpl_vars['Web']; ?>
/user/info.php?userID=<?php echo $_SESSION['UserID']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $_SESSION['Username']; ?>
</a>&nbsp;],&nbsp;
<?php endif; ?><?php echo $this->_tpl_vars['Strftime']; ?>
</td></tr></tbody></table><br />