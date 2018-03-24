<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
?> <?$APPLICATION->IncludeComponent("bitrix:catalog.element", "portfolio.detail", array(
	"IBLOCK_TYPE" => "simai_content",
	"IBLOCK_ID" => "2",
	"ELEMENT_ID" => $_REQUEST["ID"],
	"ELEMENT_CODE" => $_REQUEST["CODE"],
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"PROPERTY_CODE" => array(
		0 => "CLIENT",
		1 => "LINK",
		2 => "DATE_CREATE",
		3 => "HTML",
		4 => "GALLERY",
		5 => "PANORAM",
		6 => "CREATORS",
		7 => "MORE_PHOTO",
		8 => "",
	),
	"OFFERS_LIMIT" => "0",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"ADD_SECTIONS_CHAIN" => "Y",
	"USE_ELEMENT_COUNTER" => "Y",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"LINK_IBLOCK_TYPE" => "",
	"LINK_IBLOCK_ID" => "",
	"LINK_PROPERTY_SID" => "",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#"
	),
	false
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>