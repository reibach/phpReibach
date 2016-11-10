<?php /* Smarty version 2.6.19, created on 2016-11-10 14:39:47
         compiled from linkbar.tpl */ ?>
<?php if ($_SESSION['SuperUser'] && ( $_SESSION['SuperUser'] == $this->_tpl_vars['Root'] )): ?>
	<p id="top10" align="center">
	[&nbsp;<a accesskey="A" class="nmenulink" title="<?php echo $this->_tpl_vars['Addressbook']; ?>
" href="../addressbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Addressbook']; ?>
</a>
	|&nbsp;&nbsp;<a accesskey="P" class="nmenulink" title="<?php echo $this->_tpl_vars['Position']; ?>
" href="../position/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Position']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="O" class="nmenulink" title="<?php echo $this->_tpl_vars['Offer']; ?>
" href="../offer/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Offer']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="I" class="nmenulink" title="<?php echo $this->_tpl_vars['Invoice']; ?>
" href="../invoice/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Invoice']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="M" class="nmenulink" title="<?php echo $this->_tpl_vars['Payment']; ?>
" href="../payment/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Payment']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="C" class="nmenulink" title="<?php echo $this->_tpl_vars['Cashbook']; ?>
" href="../cashbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Cashbook']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="R" class="nmenulink" title="<?php echo $this->_tpl_vars['Reports']; ?>
" href="../reports/index.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Reports']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="L" class="nmenulink" title="<?php echo $this->_tpl_vars['Logout']; ?>
" href="../login/suend.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Logout']; ?>
</a>&nbsp;]</p>
<?php else: ?>
	<p id="top10" align="center">
	[&nbsp;<a accesskey="A" class="nmenulink" title="<?php echo $this->_tpl_vars['Addressbook']; ?>
" href="../addressbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Addressbook']; ?>
</a>
	|&nbsp;&nbsp;<a accesskey="P" class="nmenulink" title="<?php echo $this->_tpl_vars['Position']; ?>
" href="../position/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Position']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="O" class="nmenulink" title="<?php echo $this->_tpl_vars['Offer']; ?>
" href="../offer/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Offer']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="I" class="nmenulink" title="<?php echo $this->_tpl_vars['Invoice']; ?>
" href="../invoice/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Invoice']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="M" class="nmenulink" title="<?php echo $this->_tpl_vars['Payment']; ?>
" href="../payment/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Payment']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="C" class="nmenulink" title="<?php echo $this->_tpl_vars['Cashbook']; ?>
" href="../cashbook/list.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Cashbook']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="R" class="nmenulink" title="<?php echo $this->_tpl_vars['Reports']; ?>
" href="../reports/index.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Reports']; ?>
</a>&nbsp;
	|&nbsp;&nbsp;<a accesskey="L" class="nmenulink" title="<?php echo $this->_tpl_vars['Logout']; ?>
" href="../login/logout.php?<?php echo $this->_tpl_vars['Session']; ?>
"><?php echo $this->_tpl_vars['Logout']; ?>
</a>&nbsp;]</p>
<?php endif; ?>