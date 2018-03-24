<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);?>
</div>
<?if($APPLICATION->GetProperty("SHOW_COLUMN")=="R"):?>
    <div class="span4">
        <aside class="right-sidebar">
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

</section>
<footer>
	<div class="container">
		<div class="row">
			<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
	"ROOT_MENU_TYPE" => "bottom",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "36000000",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "2",
	"CHILD_MENU_TYPE" => "section",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
			<div class="span3 footer-map">
				<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad03298551208ceac8a0d7d8769daa879cf2bb0af3e26b19fd7e41fb2d4fd7f71&amp;width=100%25&amp;height=170&amp;lang=ru_RU&amp;scroll=true"></script>
			</div>
			<div class="span3">
				<div class="widget">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
					    "AREA_FILE_SHOW" => "file",
					    "AREA_FILE_SUFFIX" => "",
					    "AREA_FILE_RECURSIVE" => "",
					    "EDIT_MODE" => "",
					    "EDIT_TEMPLATE" => "",
					    "PATH" => SITE_DIR."include/contacts.php"),
					    false);?>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="span12">
					<div class="copyright">
						<p class="center">

                                <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
	"AREA_FILE_SHOW" => "file",
	"PATH" => SITE_DIR."include/copyright.php",
	"EDIT_TEMPLATE" => ""
	),
	false
);?>

						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
<?
if($_SERVER["PHP_SELF"] != SITE_DIR."about/contact.php"):?>
<?$APPLICATION->IncludeComponent("simai:form.feedback.ajax", "right.button", array(
	"IBLOCK_TYPE" => "simai_service",
	"IBLOCK_ID" => "8",
	"EMAIL" => "specroom@yandex.ru ",
	"EMAIL_SUBJ" => GetMessage("FOOTER_NEW_MSG"),
	"OK_MSG" => GetMessage("FOOTER_MSG_SENDED"),
	"USE_CAPTCHA" => "N"
	),
	false
);?>
<?endif?>

</body>
</html>