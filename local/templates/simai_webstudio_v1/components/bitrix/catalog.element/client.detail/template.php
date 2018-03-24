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
				<h2><?=getMessage("INFORMATION")?></h2>
				<ul class="unstyled">
					<?if(!empty($arResult["CATEGORY"])):
					   $arCategory=count($arResult["CATEGORY"]);
						?>
					<li><strong><?=getMessage("CATEGORY")?>:</strong> <?foreach($arResult["CATEGORY"] as $cell=>$arSection):?><a href="<?=$arSection["SECTION"]["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a><?=($arCategory>($cell+1) ? ", " : "");?><?endforeach?></li>
					<?endif?>
					<?if(is_array($arResult["DISPLAY_PROPERTIES"]["LINK"])):?>
					<li id="url_id"><strong><?=$arResult["DISPLAY_PROPERTIES"]["LINK"]["NAME"]?>:</strong> <?=$arResult["DISPLAY_PROPERTIES"]["LINK"]["DISPLAY_VALUE"]?></li>
					<?endif?>
				</ul>					
				<?if(is_array($arResult["LINKED_ELEMENTS"])):?>
					<h3><?=getMessage("WORKS")?></h3> 
					<ul>
					<?foreach($arResult["LINKED_ELEMENTS"] as $arWork):?><li><a href="<?=$arWork["DETAIL_PAGE_URL"]?>"><?=$arWork["NAME"]?></a><?endforeach?></li>
					</ul>
				<?endif?>                
			
				<?if($arResult["DETAIL_TEXT"] || $arResult["PREVIEW_TEXT"]):?>
				<div class="widget">
					<h3 class="widgetheading"><?=getMessage("DESCRIPTION")?></h3>
					<p>
						<?=$arResult["DETAIL_TEXT"]?$arResult["DETAIL_TEXT"]:$arResult["PREVIEW_TEXT"]?>
					</p>
				</div>
				<?endif?>
			</div>
         </article>
        <div style="clear: both;"></div>
    </div>
    <div class="span4">
        <aside class="right-sidebar">
            <div class="widget">
                <div class="flexslider">
                    <ul class="slides">
                        <?if(!empty($arResult["PREVIEW_IMG"])):?>
                            <?foreach($arResult["PREVIEW_IMG"] as $arImg):?>
                                <li style="display: block;"><img src="<?=$arImg["SRC"]?>" alt="<?=$arImg["DESCRIPTION"]?$arImg["DESCRIPTION"]:''?>"></li>
                            <?endforeach?>
                        <?else:?>
                        <li style="display: block;"><img src="<?=SITE_TEMPLATE_PATH?>/img/no-photo-big.jpg" alt="<?=$arResult["NAME"]?>"></li>
                        <?endif?>
                    </ul>
                    <?if(count($arResult["PREVIEW_IMG"])>1):?>
                        <ul class="flex-direction-nav"><li><a class="flex-prev" href="#"></a></li><li><a class="flex-next" href="#"></a></li></ul>
                    <?endif?>
                </div>
            </div>
        </aside>
    </div>
</div>