<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->IncludeComponent(
	"bitrix:rss.out",
	"",
	Array(
		"IBLOCK_TYPE" => "simai_content",
		"IBLOCK_ID" => "4",
		"NUM_NEWS" => 10,
		"NUM_DAYS" => 120,
		"YANDEX" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 3600,
		"DETAIL_URL" => "",
	),
	$component
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>