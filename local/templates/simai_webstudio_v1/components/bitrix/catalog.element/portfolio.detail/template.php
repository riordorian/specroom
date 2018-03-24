<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<script type="text/javascript">
    $(function(){
        $("#url_id a").attr("target","_blank");
    });
</script>

<div class="row">
    <div class="span8">
        <article>
            <div class="top-wrapper">
			<?if(is_array($arResult["DISPLAY_PROPERTIES"]["HTML"])):?>
				<?=$arResult["DISPLAY_PROPERTIES"]["HTML"]["~VALUE"]["TEXT"]?>
			<?else:?>
                <div class="flexslider">
                    <ul class="slides">
                        <?if(!empty($arResult["PREVIEW_IMG"])):?>
                            <?foreach($arResult["PREVIEW_IMG"] as $arImg):?>
                                <li><img src="<?=$arImg["SRC"]?>" alt="<?=$arImg["DESCRIPTION"]?$arImg["DESCRIPTION"]:''?>"></li>
                            <?endforeach?>
                        <?else:?>
                        <li><img src="<?=SITE_TEMPLATE_PATH?>/img/no-photo-big.jpg" alt="<?=$arResult["NAME"]?>"></li>
                        <?endif?>
                    </ul>
                    <?if(count($arResult["PREVIEW_IMG"])>1):?>
                        <ul class="flex-direction-nav"><li><a class="flex-prev" href="#"></a></li><li><a class="flex-next" href="#"></a></li></ul>
                    <?endif?>
                </div>
			<?endif?>
            </div>
        </article>
    </div>
    <div class="span4">
        <aside class="right-sidebar">
            <div class="widget">
                <h5 class="widgetheading"><?=getMessage("INFORMATION")?></h5>
                <ul class="folio-detail">
                    <?if(!empty($arResult["CLIENT"]["PREVIEW_PICTURE"])):?><li><a href="<?=$arResult["CLIENT"]["DETAIL_PAGE_URL"]?>"><img src="<?=$arResult["CLIENT"]["PREVIEW_PICTURE"]?>" alt="<?=$arResult["CLIENT"]["IBLOCK_SECTION_NAME"]?>"></a></li><?endif?>
					<?if(!empty($arResult["DATE_ACTIVE_FROM"])):?><li><label><?=getMessage("DATE")?> :</label> <?=$arResult["DATE_ACTIVE_FROM"]?></li><?endif?>
					<?if(is_array($arResult["DISPLAY_PROPERTIES"]["CLIENT"])):?><li><label><?=$arResult["DISPLAY_PROPERTIES"]["CLIENT"]["NAME"]?> :</label> <?=$arResult["DISPLAY_PROPERTIES"]["CLIENT"]["DISPLAY_VALUE"]?></li><?endif?>	
                    <?if(!empty($arResult["CLIENT"]) && !empty($arResult["CLIENT"]["SECTIONS"])):$arCategoryClient=count($arResult["CLIENT"]["SECTIONS"]);?><li id="url_id"><label><?=getMessage("CLIENT_CATEGORY")?> :</label> <?foreach($arResult["CLIENT"]["SECTIONS"] as $cell=>$arSect):?><a href="<?=$arSect["IBLOCK_SECTION_PAGE_URL"]?>"><?=$arSect["IBLOCK_SECTION_NAME"]?></a><?=($arCategoryClient>($cell+1) ? ", " : ". ");?><?endforeach?></li><?endif?>
					<?if(!empty($arResult["CATEGORY"])):
                       $arCategory=count($arResult["CATEGORY"]);
                        ?>
                    <li><label><?=getMessage("CATEGORY")?> :</label> <?foreach($arResult["CATEGORY"] as $cell=>$arSection):?><a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a><?=($arCategory>($cell+1) ? ", " : ". ");?><?endforeach?></li>
                    <?endif?>
                    <?if(is_array($arResult["DISPLAY_PROPERTIES"]["DATE_CREATE"])):?>
                    <li><label><?=$arResult["DISPLAY_PROPERTIES"]["DATE_CREATE"]["NAME"]?> :</label> <?=$arResult["DISPLAY_PROPERTIES"]["DATE_CREATE"]["DISPLAY_VALUE"]?></li>
                    <?endif?>
                    <?if(is_array($arResult["DISPLAY_PROPERTIES"]["LINK"])):?>
                    <li id="url_id"><label><?=$arResult["DISPLAY_PROPERTIES"]["LINK"]["NAME"]?> URL :</label> <?=$arResult["DISPLAY_PROPERTIES"]["LINK"]["DISPLAY_VALUE"]?></li>
                    <?endif?>
                </ul>
            </div>
            <?if($arResult["DETAIL_TEXT"] || $arResult["PREVIEW_TEXT"]):?>
            <div class="widget">
                <h5 class="widgetheading"><?=getMessage("DESCRIPTION")?></h5>
                <p>
                    <?=$arResult["DETAIL_TEXT"]?$arResult["DETAIL_TEXT"]:$arResult["PREVIEW_TEXT"]?>
                </p>
            </div>
            <?endif?>
            <a href="#callManager" data-title="<?=getMessage("CALL_MANAGER_STRONG")?>" data-comment="<?echo getMessage("CALL_MANAGER").': &laquo;'.$arResult["NAME"].'&raquo;'?>" class="btn btn-green btn-large order_site" data-toggle="modal"><?=getMessage("CALL_MANAGER")?></a>
        </aside>
    </div>
</div>