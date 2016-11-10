<?php /* Smarty version 2.6.19, created on 2016-11-10 14:39:47
         compiled from syslog/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'syslog/list.tpl', 103, false),array('modifier', 'nl2br', 'syslog/list.tpl', 111, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "htable.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" summary="Tabelle 3"><tbody>
<tr><td id="td1_20" width="20%" valign="top">
<table border="0" width="80%" cellspacing="0" cellpadding="0" summary="Tabelle 4"><tbody>
<?php if ($_SESSION['SuperUser'] && ( $_SESSION['SuperUser'] == $this->_tpl_vars['Root'] )): ?>
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="<?php echo $this->_tpl_vars['Logout']; ?>
"
	href="../login/suend.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Logout']; ?>
</a></td></tr>
<?php else: ?>
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="<?php echo $this->_tpl_vars['Logout']; ?>
"
	href="../login/logout.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Logout']; ?>
</a></td></tr>
<?php endif; ?>
<tr><td align="left" class="phprechnung_menu"><a accesskey="W" title="<?php echo $this->_tpl_vars['Startpage']; ?>
"
href="../index.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Startpage']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="A" title="<?php echo $this->_tpl_vars['Addressbook']; ?>
"
href="../addressbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Addressbook']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="P" title="<?php echo $this->_tpl_vars['Position']; ?>
"
href="../position/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Position']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="O" title="<?php echo $this->_tpl_vars['Offer']; ?>
"
href="../offer/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Offer']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="I" title="<?php echo $this->_tpl_vars['Invoice']; ?>
"
href="../invoice/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Invoice']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="M" title="<?php echo $this->_tpl_vars['Payment']; ?>
"
href="../payment/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Payment']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="C" title="<?php echo $this->_tpl_vars['Cashbook']; ?>
"
href="../cashbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Cashbook']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="R" title="<?php echo $this->_tpl_vars['Reports']; ?>
"
href="../reports/index.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Reports']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="S" title="<?php echo $this->_tpl_vars['Configuration']; ?>
"
href="../configuration.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Configuration']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sel"><a accesskey="1" title="<?php echo $this->_tpl_vars['Syslog']; ?>
 - <?php echo $this->_tpl_vars['List']; ?>
"
href="list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Syslog']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sub"><a accesskey="2" title="<?php echo $this->_tpl_vars['Syslog']; ?>
 - <?php echo $this->_tpl_vars['Help']; ?>
"
href="help.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Help']; ?>
</a></td></tr>
<?php if ($_SESSION['Username'] && ( $_SESSION['Username'] != $this->_tpl_vars['Root'] )): ?>
	<tr><td align="left" class="phprechnung_menu"><a accesskey="U" title="<?php echo $this->_tpl_vars['Superuser']; ?>
"
	href="../login/sustart.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Superuser']; ?>
</a></td></tr>
<?php endif; ?>
</tbody></table></td>
<td id="td1_2" width="2%"></td><td width="78%" valign="top" align="center">
<table width="100%" class="phprechnung_tabelle" border="0" cellspacing="0" cellpadding="2" summary="Tabelle 1"><tbody>
<tr><td align="center" colspan="5"><h2><?php echo $this->_tpl_vars['Syslog']; ?>
 - <?php echo $this->_tpl_vars['List']; ?>
</h2></td></tr>
<tr><td>&nbsp;</td></tr>
<?php if ($this->_tpl_vars['MaxPages']): ?>
	<tr><td align="center" colspan="4">
	<?php if ($this->_tpl_vars['CurrentPage'] > 1): ?>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=1&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/first.png" title="<?php echo $this->_tpl_vars['FirstPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['FirstPageMsg']; ?>
" /></a>&nbsp;
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['PrevPage']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/prev.png" title="<?php echo $this->_tpl_vars['PrevPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['PrevPageMsg']; ?>
" /></a>&nbsp;
	<?php endif; ?>
	<?php echo $this->_tpl_vars['PageMsg']; ?>
&nbsp;<a title="<?php echo $this->_tpl_vars['PageMsg']; ?>
 <?php echo $this->_tpl_vars['CurrentPage']; ?>
 / <?php echo $this->_tpl_vars['MaxPages']; ?>
" class="ninfolink" href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['CurrentPage']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['CurrentPage']; ?>
</a>&nbsp;/&nbsp;<?php echo $this->_tpl_vars['MaxPages']; ?>
&nbsp;
	<?php if ($this->_tpl_vars['CurrentPage'] < $this->_tpl_vars['MaxPages']): ?>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['NextPage']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/next.png" title="<?php echo $this->_tpl_vars['NextPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['NextPageMsg']; ?>
" /></a>&nbsp;
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['MaxPages']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/last.png" title="<?php echo $this->_tpl_vars['LastPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['LastPageMsg']; ?>
" /></a>&nbsp;
	<?php endif; ?>
	</td></tr>
<?php endif; ?>
<tr><td></td></tr>
<tr class="mblueTD">
<td nowrap="nowrap" align="left"><?php echo $this->_tpl_vars['EntryNo']; ?>

<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=SYSLOGID&amp;Sort=ASC&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/up.png" title="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['EntryNo']; ?>
 ASC" alt="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['EntryNo']; ?>
 ASC" /></a>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=SYSLOGID&amp;Sort=DESC&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/down.png" title="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['EntryNo']; ?>
 DESC" alt="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['EntryNo']; ?>
 DESC" /></a>
</td>
<td nowrap="nowrap" align="left"><?php echo $this->_tpl_vars['Syslog_Created']; ?>

<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=CREATED&amp;Sort=ASC&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/up.png" title="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Created']; ?>
 ASC" alt="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Created']; ?>
 ASC" /></a>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=CREATED&amp;Sort=DESC&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/down.png" title="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Created']; ?>
 DESC" alt="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Created']; ?>
 DESC" /></a>
</td>
<td nowrap="nowrap" align="left"><?php echo $this->_tpl_vars['Syslog_Description']; ?>

<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=DESCRIPTION&amp;Sort=ASC&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/up.png" title="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Description']; ?>
 ASC" alt="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Description']; ?>
 ASC" /></a>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=DESCRIPTION&amp;Sort=DESC&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/down.png" title="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Description']; ?>
 DESC" alt="<?php echo $this->_tpl_vars['SortMsg']; ?>
 <?php echo $this->_tpl_vars['Syslog_Description']; ?>
 DESC" /></a>
</td>
<td nowrap="nowrap" align="right"><?php echo $this->_tpl_vars['Entrys']; ?>
:&nbsp;<?php echo $this->_tpl_vars['MaxRows']; ?>
&nbsp;
</td>
</tr>
<?php if ($this->_tpl_vars['MaxRows'] == 0): ?>
	<tr><td align="center" colspan="4" class="redtxt"><?php echo $this->_tpl_vars['NoEntry']; ?>
</td></tr>
<?php else: ?>
<?php $_from = $this->_tpl_vars['SyslogData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['syslog']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => "grayTD,wTD"), $this);?>
">
	<td valign="top" align="left"><a name="<?php echo $this->_tpl_vars['syslog']['SYSLOGID']; ?>
" title="<?php echo $this->_tpl_vars['AllInformation']; ?>
 <?php echo $this->_tpl_vars['EntryNo']; ?>
 <?php echo $this->_tpl_vars['syslog']['SYSLOGID']; ?>
 - <?php echo $this->_tpl_vars['syslog']['DESCRIPTION']; ?>
" class="ninfolink" href="info.php?syslogID=<?php echo $this->_tpl_vars['syslog']['SYSLOGID']; ?>
&amp;<?php echo $this->_tpl_vars['AddCurrentPage']; ?>
Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
">
	<?php if ($this->_tpl_vars['syslog']['SYSLOGID']): ?>
		<?php echo $this->_tpl_vars['syslog']['SYSLOGID']; ?>

	<?php else: ?>
		&nbsp;i&nbsp;
	<?php endif; ?></a></td>
	<td nowrap="nowrap" valign="top" align="left"><?php echo $this->_tpl_vars['syslog']['CREATED']; ?>
&nbsp;</td>
	<td valign="top" align="left" colspan="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['syslog']['DESCRIPTION'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<tr><td>&nbsp;</td></tr>
<?php if ($this->_tpl_vars['MaxPages'] && ( $this->_tpl_vars['PageRows'] >= $this->_tpl_vars['MultiBar'] )): ?>
	<tr><td align="center" colspan="4">
	<?php if ($this->_tpl_vars['CurrentPage'] > 1): ?>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=1&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/first.png" title="<?php echo $this->_tpl_vars['FirstPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['FirstPageMsg']; ?>
" /></a>&nbsp;
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['PrevPage']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/prev.png" title="<?php echo $this->_tpl_vars['PrevPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['PrevPageMsg']; ?>
" /></a>&nbsp;
	<?php endif; ?>
	<?php echo $this->_tpl_vars['PageMsg']; ?>
&nbsp;<a title="<?php echo $this->_tpl_vars['PageMsg']; ?>
 <?php echo $this->_tpl_vars['CurrentPage']; ?>
 / <?php echo $this->_tpl_vars['MaxPages']; ?>
" class="ninfolink" href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['CurrentPage']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['CurrentPage']; ?>
</a>&nbsp;/&nbsp;<?php echo $this->_tpl_vars['MaxPages']; ?>
&nbsp;
	<?php if ($this->_tpl_vars['CurrentPage'] < $this->_tpl_vars['MaxPages']): ?>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['NextPage']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/next.png" title="<?php echo $this->_tpl_vars['NextPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['NextPageMsg']; ?>
" /></a>&nbsp;
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>
?page=<?php echo $this->_tpl_vars['MaxPages']; ?>
&amp;Order=<?php echo $this->_tpl_vars['Order']; ?>
&amp;Sort=<?php echo $this->_tpl_vars['Sort']; ?>
&amp;<?php echo $this->_tpl_vars['Session']; ?>
"><img border="0" src="../images/last.png" title="<?php echo $this->_tpl_vars['LastPageMsg']; ?>
" alt="<?php echo $this->_tpl_vars['LastPageMsg']; ?>
" /></a>&nbsp;
	<?php endif; ?>
	</td></tr>
	<tr><td>&nbsp;</td></tr>
		<tr><td colspan="5"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "linkbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td></tr>
<?php endif; ?>
</tbody></table>
</td></tr>
<tr><td id="td2_20" width="20%"><br /></td><td id="td2_2" width="2%"></td>
<td width="78%" valign="top"><br /></td></tr></tbody></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>