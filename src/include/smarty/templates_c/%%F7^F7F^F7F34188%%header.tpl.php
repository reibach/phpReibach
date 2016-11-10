<?php /* Smarty version 2.6.19, created on 2016-11-10 13:10:36
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'header.tpl', 27, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo $_SESSION['Charset']; ?>
" <?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="expires" content="Sat, 01 Mar 2003 00:00:00 GMT" />
<meta http-equiv="last-modified" content="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%a, %d %b %Y %H:%M:%S GMT") : smarty_modifier_date_format($_tmp, "%a, %d %b %Y %H:%M:%S GMT")); ?>
" />
<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate" />
<meta http-equiv="cache-control" content="post-check=0, pre-check=0" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="content-type" content="text/html; charset=<?php echo $_SESSION['Charset']; ?>
" />
<meta name="author" content="Edy Corak" />
<title><?php echo $this->_tpl_vars['Programname']; ?>
 - <?php echo $this->_tpl_vars['Title']; ?>
</title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['Web']; ?>
/include/phprechnung.css" title="phpRechnung Default Style" media="print,screen" />
<link rel="icon" href="<?php echo $this->_tpl_vars['Web']; ?>
/images/favicon.png" type="image/png" />
<?php echo '

'; ?>

</head>