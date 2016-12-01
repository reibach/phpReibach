{*
	license.tpl

	phpRechnung - is easy-to-use Web-based multilingual accounting software.
	Copyright (C) 2001 - 2008 Edy Corak < phprechnung at ecorak dot net >

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*}
{include file="header.tpl"}
<body>
{include file="htable.tpl"}
<table border="0" width="100%" cellspacing="0" cellpadding="0" summary="Tabelle 3"><tbody>
<tr><td id="td1_20" width="20%" valign="top">
{* Menubar start *}
<table border="0" width="80%" cellspacing="0" cellpadding="0" summary="Tabelle 4"><tbody>
{if $smarty.session.SuperUser and ( $smarty.session.SuperUser eq $Root )}
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="{$Logout}"
	href="login/suend.php?{$Session}">{$Logout}</a></td></tr>
{else}
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="{$Logout}"
	href="login/logout.php?{$Session}">{$Logout}</a></td></tr>
{/if}
<tr><td align="left" class="phprechnung_menu"><a accesskey="W" title="{$Startpage}"
href="index.php?{$Session}">{$Startpage}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="A" title="{$Addressbook}"
href="addressbook/list.php?{$Session}">{$Addressbook}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="P" title="{$Position}"
href="position/list.php?{$Session}">{$Position}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="O" title="{$Offer}"
href="offer/list.php?{$Session}">{$Offer}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="I" title="{$Invoice}"
href="invoice/list.php?{$Session}">{$Invoice}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="M" title="{$Payment}"
href="payment/list.php?{$Session}">{$Payment}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="C" title="{$Cashbook}"
href="cashbook/list.php?{$Session}">{$Cashbook}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="R" title="{$Reports}"
href="reports/index.php?{$Session}">{$Reports}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="S" title="{$Configuration}"
href="configuration.php?{$Session}">{$Configuration}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="Y" title="{$Syslog}"
href="syslog/list.php?{$Session}">{$Syslog}</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sel"><a title="{$Programname} - {$About}"
href="about.php?{$Session}">{$About}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a title="{$Programname} - {$License}"
href="license.php?{$Session}">{$License}</a></td></tr>


{if $smarty.session.Username and ( $smarty.session.Username != $Root )}
	<tr><td align="left" class="phprechnung_menu"><a accesskey="U" title="{$Superuser}"
	href="login/sustart.php?{$Session}">{$Superuser}</a></td></tr>
{/if}
</tbody></table></td>
{* Menubar end *}
<td id="td1_2" width="2%"></td><td class="phprechnung_tabelle" width="78%" valign="top" align="center">
<!-- 2DO: Alle Infos zur Software sollten an anderer Stelle plaziert werden und nicht den Blick auf das Wesentliche verstellen //-->
<p align="center">
[&nbsp;<a class="ninfolink" href="https://www.loenshotel.de/phpRechnung/" target="_blank" title="Official phpRechnung Home Page">Official phpRechnung Home Page</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/tracker/?group_id=152251&amp;atid=783716" target="_blank" title="Reporting phpRechnung Bugs">Bugs</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/tracker/?group_id=152251&amp;atid=783717" target="_blank" title="Support Requests">Support</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/forum/?group_id=152251" target="_blank" title="phpRechnung Forum">Forum</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/mail/?group_id=152251" target="_blank" title="Mailing Lists">Lists</a>&nbsp;]&nbsp;
[&nbsp;<a class="ninfolink" href="http://sourceforge.net/export/rss2_project.php?group_id=152251" target="_blank" title="Project RSS Feeds">RSS Feeds</a>&nbsp;]
</p>
	
<h2>{$Programname} - {$About}</h2>
<table width="100%" border="0" class="wTD" cellpadding="3" cellspacing="3" summary="Tabelle 5"><tbody>
<tr><td>&nbsp;</td></tr>
<tr><td align="left" colspan="2">
<br />
.. diese Software 
<p>entstanden auf phpRechnung...</p>
<p>Weitere Infos finden sich unter <a href="http://reibach.federa.de" target="_blank">reibach.federa.de</a></p>
</td></tr>
<tr><td>&nbsp;</td></tr>
</tbody></table>
</td></tr>
<tr><td id="td2_20" width="20%"><br /></td><td id="td2_2" width="2%"></td>
<td width="78%" valign="top"><br /></td></tr></tbody></table>
{include file="footer.tpl"}
