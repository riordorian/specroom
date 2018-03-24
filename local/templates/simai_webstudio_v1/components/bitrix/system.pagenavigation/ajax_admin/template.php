<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false) || $arResult["NavPageNomer"] >= $arResult["NavPageCount"] )
		return;
}?>
<span id="for_ajax_pagenavigation_id<?=$arResult["NavPageNomer"]?>">
<?$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
if($arResult["bDescPageNumbering"] === true):
	if ($arResult["NavPageNomer"] > 1):
?>
		<a style="display: none;" class="modern-page-next" onclick="BX.ajax.insertToNode('<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>&ajax_mode=Y', 'for_ajax_pagenavigation_id<?=$arResult["NavPageNomer"]?>', true); return false;" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_next")?></a>
<?
	endif; 

else:
	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
?>
		<a style="display: none;" class="modern-page-next" onclick="BX.ajax.insertToNode('<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>&ajax_mode=Y', 'for_ajax_pagenavigation_id<?=$arResult["NavPageNomer"]?>', true); return false;" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_next")?></a>
    <?
	endif;
endif;
?>
</span>
