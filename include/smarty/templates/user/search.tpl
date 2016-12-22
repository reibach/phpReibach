{*
	search.tpl

	phpRechnung - is easy-to-use Web-based multilingual accounting software.
	Copyright (C) 2001 - 2010 Edy Corak < edy at loenshotel dot de >

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
<body onload="document.Search.FullName_1.focus();">
{include file="htable.tpl"}
<table border="0" width="100%" cellspacing="0" cellpadding="0" summary="Tabelle 3">
<tr><td id="td1_20" width="20%" valign="top">
{* Menubar start *}
<table border="0" width="80%" cellspacing="0" cellpadding="0" summary="Tabelle 4">
{if $smarty.session.SuperUser and ( $smarty.session.SuperUser eq $Root )}
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="{$Logout}"
	href="../login/suend.php?{$Session}">{$Logout}</a></td></tr>
{else}
	<tr><td align="center" class="phprechnung_menu"><a accesskey="L" title="{$Logout}"
	href="../login/logout.php?{$Session}">{$Logout}</a></td></tr>
{/if}
<tr><td align="left" class="phprechnung_menu"><a accesskey="W" title="{$Startpage}"
href="../index.php?{$Session}">{$Startpage}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="A" title="{$Addressbook}"
href="../addressbook/list.php?{$Session}">{$Addressbook}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="P" title="{$Position}"
href="../position/list.php?{$Session}">{$Position}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="O" title="{$Offer}"
href="../offer/list.php?{$Session}">{$Offer}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="I" title="{$Invoice}"
href="../invoice/list.php?{$Session}">{$Invoice}</a></td></tr>
<!--
<tr><td align="left" class="phprechnung_menu"><a accesskey="M" title="{$Payment}"
href="../payment/list.php?{$Session}">{$Payment}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="C" title="{$Cashbook}"
href="../cashbook/list.php?{$Session}">{$Cashbook}</a></td></tr>
<tr><td align="left" class="phprechnung_menu"><a accesskey="R" title="{$Reports}"
href="../reports/index.php?{$Session}">{$Reports}</a></td></tr>
-->

<tr><td align="left" class="phprechnung_menu"><a accesskey="S" title="{$Configuration}"
href="../configuration.php?{$Session}">{$Configuration}</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sub"><a accesskey="1" title="{$Useradministration} - {$List}"
href="list.php?{$Session}">{$Useradministration}</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sub"><a accesskey="2" title="{$Useradministration} - {$New}"
href="new.php?{$Session}">{$New}</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sel"><a accesskey="3" title="{$Useradministration} - {$Search}"
href="search.php?{$Session}">{$Search}</a></td></tr>
<tr><td align="left" class="phprechnung_menu_sub"><a accesskey="4" title="{$Useradministration} - {$Help}"
href="help.php?{$Session}">{$Help}</a></td></tr>
{if $smarty.session.Username and ( $smarty.session.Username != $Root )}
	<tr><td align="left" class="phprechnung_menu"><a accesskey="U" title="{$Superuser}"
	href="../login/sustart.php?{$Session}">{$Superuser}</a></td></tr>
{/if}
</table></td>
{* Menubar end *}
<td id="td1_2" width="2%"></td><td width="78%" valign="top" align="center">
{* Display User information *}
<form id="Search" name="Search" action="searchlist.php?{$Session}#{$userID}" method="post">
<table width="80%" border="0" class="phprechnung_tabelle" cellspacing="3" cellpadding="3" summary="Tabelle 2">
<tr>
	<td valign="middle" align="left" colspan="2">
	[&nbsp;<a title="{$BackMsg} - {$Useradministration} - {$List}" class="ninfolink" href="list.php?page={$page}&amp;Order={$Order}&amp;Sort={$Sort}&amp;{$Session}">{$BackMsg}</a>&nbsp;]
	</td>
</tr>
<tr><td align="center" colspan="2"><h2>{$Useradministration} - {$Search}</h2></td></tr>
<tr><td></td></tr>
<tr><td valign="middle" align="right" width="40%">{$User_Active}:</td><td class="dbTxt" valign="middle" align="left" width="60%">
<select class="choice200" name="UserActive_1" title="{$User_Active}">
<optgroup label="{$User_Active}" title="{$User_Active}">
<option title="{$Select_All}" value="">{$Select_All}</option>
{foreach item=user_active from=$choice_yes_no}
	{foreach key=key item=item from=$user_active}
		<option label="{$item}" title="{$item}" value="{$key}">{$item}</option>
	{/foreach}
{/foreach}
</optgroup></select>
</td></tr>
<tr><td valign="middle" align="right" width="40%">{$Full_Name}:</td><td class="dbTxt" valign="middle" align="left" width="60%"><input title="{$Full_Name}" type="text" name="FullName_1" size="30" value="" /></td></tr>
<tr><td valign="middle" align="right" width="40%">{$User_Name}:</td><td class="dbTxt" valign="middle" align="left" width="60%"><input title="{$User_Name}" type="text" name="UserName_1" size="30" value="" /></td></tr>
<tr><td valign="middle" align="right" width="40%">{$User_Group}:</td><td class="dbTxt" valign="middle" align="left" width="60%">
<select class="choice200" name="UserGroup_1" title="{$User_Group}">
<optgroup label="{$User_Group}" title="{$User_Group}">
<option title="{$Select_All}" value="">{$Select_All}</option>
{foreach item=group from=$choose_group}
	{foreach key=key item=item from=$group}
		<option label="{$item}" title="{$item}" value="{$key}">{$item}</option>
	{/foreach}
{/foreach}
</optgroup></select>
</td></tr>
<tr><td valign="middle" align="right" width="40%">{$Language}:</td><td class="dbTxt" valign="middle" align="left" width="60%">
<select name="UserLanguage_1" class="choice200" title="{$Language}">
<optgroup label="{$Language}" title="{$Language}">
<option title="{$Select_All}" value="">{$Select_All}</option>
{foreach item=lang from=$choose_language}
	{foreach key=key item=item from=$lang}
		<option label="{$item}" title="{$item}" value="{$key}">{$item}</option>
	{/foreach}
{/foreach}
</optgroup>
</select>
</td></tr>
<tr><td></td></tr>
<tr><td valign="top" align="center" colspan="2">
<input type="hidden" name="page" value="{$page}" />
<input type="hidden" name="infoID" value="{$infoID}" />
<input type="hidden" name="Order" value="{$Order}" />
<input type="hidden" name="Sort" value="{$Sort}" />
<input type="submit" class="button" title="{$Search}" value="{$Search}" /></td></tr>
</table>
</form>
</td></tr>
<tr><td id="td2_20" width="20%"><br /></td><td id="td2_2" width="2%"></td>
<td width="78%" valign="top"><br /></td></tr></table>
{include file="footer.tpl"}
