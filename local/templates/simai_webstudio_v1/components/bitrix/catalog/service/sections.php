<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($APPLICATION->GetProperty("show_right_column")!="Y"):?>
<div class="row">
<div class="span8">
<?endif?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"service.list",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"]
	),
	$component
);
?>
<?if($APPLICATION->GetProperty("show_right_column")!="Y"):?>
</div>
<div class="span4">
<aside class="right-sidebar">

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"service.sidebar",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"CURRENT_SECTION"=>$arResult["VARIABLES"]["SECTION_ID"],
		"CURRENT_SECTION_CODE"=>$arResult["VARIABLES"]["SECTION_CODE"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"]
	),
	$component
);
?>
</aside>
</div>
</div>
<?endif?>