<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;


$aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
	"IBLOCK_TYPE_ID" => "simai",
	"IBLOCK_ID"=>"7",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	),
	false,
	Array('HIDE_ICONS' => 'Y')
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);

?>