{include file="header.tpl"}
<body>
{include file="htable.tpl"}
<p align="center" class="redtxt"><b>{$FieldError}</b></p>
<div align="center">
<form action="new.php?{$Session}" method="post">
<input type="hidden" name="artgroupsID" value="{$artgroupsID}" />
<input type="hidden" name="page" value="{$page}" />
<input type="hidden" name="infoID" value="{$infoID}" />
<input type="hidden" name="CArtGroups" value="{$CArtGroups}" />
{if $infoID eq 9}
	<input type="hidden" name="Description_1" value="{$Description_1}" />
{/if}
<input type="hidden" name="mark" value="{$mark}" />
<input type="hidden" name="Order" value="{$Order}" />
<input type="hidden" name="Sort" value="{$Sort}" />
<input type="submit" class="button" title="{$BackMsg} - {$ArticleGroupsSub} - {$New}" value="{$BackMsg}" /></form>
</div>
{include file="footer.tpl"}
