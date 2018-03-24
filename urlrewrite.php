<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/portfolio/work/([a-z0-9_\\-]*)/([a-z0-9_\\-]*).html?(.+)#",
		"RULE" => "SECTION_CODE=\$1&CODE=\$2",
		"ID" => "",
		"PATH" => "/portfolio/work/detail.php",
	),
	array(
		"CONDITION" => "#^/service/([a-z0-9_\\-]*)/([a-z0-9_\\-]*).html?(.+)#",
		"RULE" => "SECTION_CODE=\$1&CODE=\$2",
		"ID" => "",
		"PATH" => "/service/detail.php",
	),
	array(
		"CONDITION" => "#^/portfolio/work/([A-Za-z0-9\\-\\_]*)/#",
		"RULE" => "SECTION_CODE=\$1",
		"ID" => "",
		"PATH" => "/portfolio/work/index.php",
	),
	array(
		"CONDITION" => "#^/about/news/([0-9]*).html?(.+)#",
		"RULE" => "ID=\$1",
		"ID" => "",
		"PATH" => "/about/news/detail.php",
	),
	array(
		"CONDITION" => "#^/service/([a-z0-9_\\-]*)/?(.+)#",
		"RULE" => "SECTION_CODE=\$1",
		"ID" => "",
		"PATH" => "/service/index.php",
	),
	array(
		"CONDITION" => "#^/portfolio/activity/([0-9]*)/#",
		"RULE" => "ACT_ID=\$1",
		"ID" => "",
		"PATH" => "/portfolio/activity/index.php",
	),
	array(
		"CONDITION" => "#^/about/news/([0-9]*)/?(.+)#",
		"RULE" => "section_id=\$1",
		"ID" => "",
		"PATH" => "/about/news/",
	),
	array(
		"CONDITION" => "#^/portfolio/client/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/portfolio/client/index.php",
	),
	array(
		"CONDITION" => "#^/services/idea/#",
		"RULE" => "",
		"ID" => "bitrix:idea",
		"PATH" => "/services/idea/index.php",
	),
	array(
		"CONDITION" => "#^/about/photo/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/about/photo/index.php",
	),
	array(
		"CONDITION" => "#^/about/blog/#",
		"RULE" => "",
		"ID" => "bitrix:blog",
		"PATH" => "/about/blog/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/service/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/service/index.php",
	),
	array(
		"CONDITION" => "#^/report/#",
		"RULE" => "",
		"ID" => "simai:support",
		"PATH" => "/report/index.php",
	),
	array(
		"CONDITION" => "#^/form/#",
		"RULE" => "",
		"ID" => "bitrix:form",
		"PATH" => "/form/test.php",
	),
	array(
		"CONDITION" => "#^/shop/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/shop/index.php",
	),
	array(
		"CONDITION" => "#^/faq/#",
		"RULE" => "",
		"ID" => "bitrix:support.faq",
		"PATH" => "/faq/index.php",
	),
);

?>