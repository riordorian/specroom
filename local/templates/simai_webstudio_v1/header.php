<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?$APPLICATION->ShowHead();?>
    <?
	include_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/framework/framework.php";
	include_once $_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/wizard_template_options.php";
    
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/modernizr.custom.79639.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/custom.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/optionspanel.js');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/colorpicker/js/colorpicker.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.BlackAndWhite.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.flexslider.js');

    $APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH.'/colorpicker/css/colorpicker.css');
	$APPLICATION->SetAdditionalCss(SITE_TEMPLATE_PATH.'/css/framework.css');
    $APPLICATION->AddHeadString('<link rel="shortcut icon" type="image/x-icon" href="'.SITE_TEMPLATE_PATH.'/favicon.ico" />');

    $APPLICATION->AddHeadString('
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript" />
<![endif]-->');
?>
<link rel="stylesheet/less" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/settings.less">
<script src="<?=SITE_TEMPLATE_PATH?>/js/less-1.3.3.min.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?$APPLICATION->ShowTitle();?></title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
    $(function () {
        $("[rel='tooltip']").tooltip({html: true});
        $(".modal-body").css("max-height",parseInt($(window).height()*0.6,10));
        $("a[href='#callManager']").on("click",function(){
            if($(this).hasClass("order_site")){
                comment=$(this).attr("data-comment");
                title=$(this).attr("data-title");
                if(typeof comment!=="undefined"){
                    $($(this).attr("href")+" textarea").val(comment);
                }
				if(typeof title!=="undefined"){
                    $("#callManagerModalLabel").html(title);
                }
				
            }
            else{
                    title=$(this).attr("data-title");
					if(typeof title!=="undefined"){
                    $("#callManagerModalLabel").html(title);
					}
					$($(this).attr("href")+" textarea").val("");
            }
        });
    });
</script>
<script>
$(function () {
$('#dp3').datepicker({
autoclose: true
}
);
$('#dp4').datepicker({
autoclose: true
});

  });

</script><link id="t-colors" href="<?=SITE_TEMPLATE_PATH?>/skins/<?=$wizard_template_current["skin"]?>.css" rel="stylesheet" />
<!-- boxed bg -->
<link id="bodybg" href="<?=SITE_TEMPLATE_PATH?>/bodybg/<?=$wizard_template_current["bodybg"]?>.css" rel="stylesheet" type="text/css" /><?

$APPLICATION->IncludeFile('/include/ym.php', [], []);

?></head>
<body class="def<?if ($wizard_template_current["width"] == "boxed"):?> boxid<?endif;?>">
<?$APPLICATION->ShowPanel()?>
<div id="wrapper"<?if ($wizard_template_current["width"] == "boxed"):?> class="boxed"<?endif;?>>
	<header>
	<div class="container">
		<div class="row">
			<div class="span3">
				<div class="logo">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."include/company_logo.php",
							"AREA_FILE_RECURSIVE" => "N",
							"EDIT_MODE" => "html",
						),
						false,
						Array('HIDE_ICONS' => 'N')
					);?>
				</div>
			</div>
			<div class="span5">
				<div class="phone center">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR."include/company_phone.php",
							"AREA_FILE_RECURSIVE" => "N",
							"EDIT_MODE" => "html",
						),
						false,
						Array('HIDE_ICONS' => 'N')
					);?>
				</div>
			</div>
			<div class="span4">
				<div class="navbar navbar-static-top">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"horizontal.multilevel", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "section",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "horizontal.multilevel"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
				</div>
			</div>
		</div>
	</div>
	</header>
	<!-- end header -->
    <?
    if($_SERVER["PHP_SELF"] == SITE_DIR."index.php"):?>
     <?$APPLICATION->IncludeComponent("bitrix:catalog.section", "mainbanners.slider", array(
	"IBLOCK_TYPE" => "simai_service",
	"IBLOCK_ID" => "9",
	"SECTION_ID" => "",
	"SECTION_CODE" => "mainpage",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"PAGE_ELEMENT_COUNT" => "30",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "LINK",
		1 => "PICTURE",
		2 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "/personal/basket.php",
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
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "Y",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "Y",
	"QUANTITY_FLOAT" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Баннеры",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
    <?else:?>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="inner-heading">
                            <h1><?$APPLICATION->ShowTitle();?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<section id="inner-breadcrumb">
		    <div class="container">
				<div class="row bread">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", array(
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "-"
						),
						false,
						Array('HIDE_ICONS' => 'Y')
					);?>
				</div>
			</div>
		</section>
    <?endif?>
	<section id="content">
        <?if($_SERVER["PHP_SELF"] == SITE_DIR."about/contact.php"):?>
            <div class="map">
	            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad03298551208ceac8a0d7d8769daa879cf2bb0af3e26b19fd7e41fb2d4fd7f71&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        <?endif?>
	<div class="container">
		<?
        if($_SERVER["PHP_SELF"] == SITE_DIR."index.php"):?>
        <div class="row">
            <div class="span12">
                <div class="row">
            <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "",
                "AREA_FILE_RECURSIVE" => "",
                "EDIT_MODE" => "",
                "EDIT_TEMPLATE" => "",
                "PATH" => SITE_DIR."include/works.php"),
                false);?>
		</div>
		</div>
		</div>
		<div class="row hidden-xs">
			<div class="span12">
				<div class="solidline">
				</div>
			</div>
		</div>
        <?endif;?>
		<!-- end divider -->
		<!-- Portfolio Projects -->
		<div class="row">
<?if($APPLICATION->GetProperty("SHOW_COLUMN")=="L"):?>
    <div class="span4">
        <aside class="left-sidebar">
        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
                "AREA_FILE_SHOW" => "sect",
                "AREA_FILE_SUFFIX" => "inc",
                "AREA_FILE_RECURSIVE" => "Y",
                "EDIT_MODE" => "",
                "EDIT_TEMPLATE" => ""),
            false);?>
        </aside>
    </div>
<?endif?>
<?if($APPLICATION->GetProperty("SHOW_COLUMN")=="R" || $APPLICATION->GetProperty("SHOW_COLUMN")=="L"):?>
    <div class="span8">
<?else:?>
    <div class="span12">
<?endif?>

