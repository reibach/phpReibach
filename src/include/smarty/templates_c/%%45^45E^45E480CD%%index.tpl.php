<?php /* Smarty version 2.6.19, created on 2016-11-10 13:10:36
         compiled from index.tpl */ ?>
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
	href="login/suend.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Logout']; ?>
</a></td></tr>
<?php else: ?>
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="<?php echo $this->_tpl_vars['Logout']; ?>
"
	href="login/logout.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Logout']; ?>
</a></td></tr>
<?php endif; ?>
<tr><td align="left" class="phprechnung_menu_sel"><a accesskey="W" title="<?php echo $this->_tpl_vars['Startpage']; ?>
"
href="index.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Startpage']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="A" title="<?php echo $this->_tpl_vars['Addressbook']; ?>
"
href="addressbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Addressbook']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="P" title="<?php echo $this->_tpl_vars['Position']; ?>
"
href="position/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Position']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="O" title="<?php echo $this->_tpl_vars['Offer']; ?>
"
href="offer/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Offer']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="I" title="<?php echo $this->_tpl_vars['Invoice']; ?>
"
href="invoice/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Invoice']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="M" title="<?php echo $this->_tpl_vars['Payment']; ?>
"
href="payment/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Payment']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="C" title="<?php echo $this->_tpl_vars['Cashbook']; ?>
"
href="cashbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Cashbook']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="R" title="<?php echo $this->_tpl_vars['Reports']; ?>
"
href="reports/index.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Reports']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="S" title="<?php echo $this->_tpl_vars['Configuration']; ?>
"
href="configuration.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Configuration']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="Y" title="<?php echo $this->_tpl_vars['Syslog']; ?>
"
href="syslog/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Syslog']; ?>
</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a title="<?php echo $this->_tpl_vars['Programname']; ?>
 - <?php echo $this->_tpl_vars['License']; ?>
"
href="license.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['License']; ?>
</a></td></tr>
<?php if ($_SESSION['Username'] && ( $_SESSION['Username'] != $this->_tpl_vars['Root'] )): ?>
	<tr><td align="left" class="phprechnung_menu"><a accesskey="U" title="<?php echo $this->_tpl_vars['Superuser']; ?>
"
	href="login/sustart.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Superuser']; ?>
</a></td></tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['LOGINUPDATE'] != 1 || $this->_tpl_vars['TABLEUPDATE'] != 1): ?>
	<tr><td align="left" class="phprechnung_menu"><a title="Update"
	href="updatetable/index.php?<?php echo $this->_tpl_vars['Session']; ?>
">Update</a></td></tr>
<?php endif; ?>
</tbody></table></td>
<td id="td1_2" width="2%"></td><td class="phprechnung_tabelle" width="78%" valign="top" align="center">
<p align="center">
[&nbsp;<a class="ninfolink" href="http://www.loenshotel.de/phpRechnung/" target="_blank" title="Official phpRechnung Home Page">Official phpRechnung Home Page</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/tracker/?group_id=152251&amp;atid=783716" target="_blank" title="Reporting phpRechnung Bugs">Bugs</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/tracker/?group_id=152251&amp;atid=783717" target="_blank" title="Support Requests">Support</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/forum/?group_id=152251" target="_blank" title="phpRechnung Forum">Forum</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/mail/?group_id=152251" target="_blank" title="Mailing Lists">Lists</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/export/rss2_project.php?group_id=152251" target="_blank" title="Project RSS Feeds">RSS Feeds</a>&nbsp;]
</p>
<p>&nbsp;</p>
<h2><?php echo $this->_tpl_vars['Startpage']; ?>
</h2>
<p>&nbsp;</p>
<p align="center"><?php echo $this->_tpl_vars['Welcome']; ?>
 <?php echo $this->_tpl_vars['Programname']; ?>
</p>
<p>&nbsp;</p>
<?php if ($_SESSION['UserReminder'] && $_SESSION['UserReminder'] == 1): ?>
	<form action="reports/outstanding_accounts.php?<?php echo $this->_tpl_vars['Session']; ?>
" method="post">
	<input type="hidden" name="InvoiceReminder" value="1" />
	<input type="hidden" name="DateFrom" value="<?php echo $this->_tpl_vars['From_Date']; ?>
" />
	<input type="hidden" name="DateTill" value="<?php echo $this->_tpl_vars['Till_Date']; ?>
" />
	<p align="center"><input type="submit" class="button" title="<?php echo $this->_tpl_vars['OpenAccountMsg']; ?>
 <?php echo $this->_tpl_vars['OpenSince']; ?>
 <?php echo $this->_tpl_vars['Difference']; ?>
" value="<?php echo $this->_tpl_vars['OpenAccountMsg']; ?>
 <?php echo $this->_tpl_vars['OpenSince']; ?>
 <?php echo $this->_tpl_vars['Difference']; ?>
" /></p></form>
<?php endif; ?>
</td></tr>
<tr><td id="td2_20" width="20%"><br /></td><td id="td2_2" width="2%"></td>
<td width="78%" valign="top"><br /></td></tr></tbody></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>