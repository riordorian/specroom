<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
	<div class="form-search" >
	<form id="<?=$CONTAINER_ID?>" action="<?echo $arResult["FORM_ACTION"]?>">
		<input placeholder="<?=GetMessage("CT_BST_SEARCH_TEXT");?>" class="input-medium search-query" id="<?echo $INPUT_ID?>" type="text" name="q" value="" size="40" maxlength="50" autocomplete="off" />
        <input name="s" type="submit" class="btn btn-square btn-theme pcver" value="<?=GetMessage("CT_BST_SEARCH_BUTTON");?>" />
 <button name="s" type="submit" class="mobilever" value="<?=GetMessage("CT_BST_SEARCH_BUTTON");?>"><i class="icon-search"></i></button>

	</form>
	</div>
<?endif?>
<script type="text/javascript">
var jsControl = new JCTitleSearch({
	//'WAIT_IMAGE': '/bitrix/themes/.default/images/wait.gif',
	'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
	'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
	'INPUT_ID': '<?echo $INPUT_ID?>',
	'MIN_QUERY_LEN': 2
});
</script>