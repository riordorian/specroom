<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"photogallery.sections",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"NUM_ELEMENTS" => $arParams["NUM_ELEMENTS"],
		"WIDTH_PREVIEW" => $arParams["WIDTH_PREVIEW"],
		"SHOW_PHOTO_TITLE" => $arParams["SHOW_PHOTO_TITLE"],
		"SIZE_PREVIEW" => $arParams["SIZE_PREVIEW"]
	),
	$component
);
?>