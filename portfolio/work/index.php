<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");?>    
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "filter.portfolio", array(
	"IBLOCK_TYPE" => "simai_content",
	"IBLOCK_ID" => "2",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"COUNT_ELEMENTS" => "Y",
	"TOP_DEPTH" => "1",
	"SECTION_FIELDS" => array(
		0 => "PICTURE",
		1 => "DETAIL_PICTURE",
		2 => "",
	),
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_URL" => "",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"ADD_SECTIONS_CHAIN" => "N",
	"CLIENTS_IB" => "1",
	"SECTION_CODE_ACTIVE" => trim($_REQUEST["SECTION_CODE"]),
	),
	false
);?>
<?
if(is_array($_GET["type"])):
    $GLOBALS["arrFilterSections"]["PROPERTY_CLIENT"]=$_GET["type"];
endif;
if(isset($_GET["sections"])):
	$GLOBALS["arrFilterSections"]["SECTION_ID"]=$_GET["sections"];
endif;
if(isset($_GET["years"])):
    $GLOBALS["arrFilterSections"][">=DATE_ACTIVE_FROM"]=urldecode($_GET["years"][0]);
    $GLOBALS["arrFilterSections"]["<DATE_ACTIVE_FROM"]=urldecode($_GET["years"][1]);
endif;
if($_REQUEST["ajax_mode"]):
	$APPLICATION->RestartBuffer();
endif;
$APPLICATION->IncludeComponent("bitrix:catalog.section", "portfolio.list", array(
	"IBLOCK_TYPE" => "simai_content",
	"IBLOCK_ID" => "2",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => $_REQUEST["SECTION_CODE"],
	"SECTION_USER_FIELDS" => array(
		0 => "UF_DIR",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "arrFilterSections",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"PAGE_ELEMENT_COUNT" => "6",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "ajax_admin",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_PAGE" => $_REQUEST["ajax_mode"],
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<?if($_REQUEST["ajax_mode"]):
	die();
endif;?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>