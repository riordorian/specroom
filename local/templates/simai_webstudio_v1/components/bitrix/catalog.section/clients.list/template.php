<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$countItems=count($arResult["ITEMS"]);
if($countItems<1)return;?>
<?if($arParams["AJAX_PAGE"]!="Y"):?>
<script type="text/javascript">
    $(function(){
        if($(window).scrollTop()+$(window).height()+50>$("footer").offset().top){
            $(".modern-page-next").parent().append('<li class="item-thumbs span4" style="text-align: center;"><img alt="" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif"></li><li class="item-thumbs span4" style="text-align: center;"><img alt="" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif"></li><li class="item-thumbs span4" style="text-align: center;"><img alt="" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif"></li>').end().trigger("click");
        }

    });
    $(window).scroll(function(){
        if($(window).scrollTop()+$(window).height()>$("footer").offset().top)
        {
            $(".modern-page-next").parent().append('<li class="item-thumbs span4" style="text-align: center;"><img alt="" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif"></li><li class="item-thumbs span4" style="text-align: center;"><img alt="" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif"></li><li class="item-thumbs span4" style="text-align: center;"><img alt="" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif"></li>').end().trigger("click").remove();
        }
    });
</script>
<div class="row">
<section id="projects">
    <ul id="thumbs" class="portfolio">
<?endif?>
        <?foreach($arResult["ITEMS"] as $cell=>$arElement):
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
        <li class="item-thumbs span4 design" id="<?=$this->GetEditAreaId($arElement['ID']);?>" >
            <div style="position: absolute;left: 0;right: 0;top: 0;bottom: 0;border: 4px solid #e4e4e4;z-index: 0;"></div>
            <a class="hover-wrap overlay-portfolio" href="<?=$arElement['DETAIL_PAGE_URL']?>"><span><?=$arElement["NAME"]?></span>
            <?if(isset($arResult["SECTIONS"][$arElement['IBLOCK_SECTION_ID']])):?>
                <p><?=$arResult["SECTIONS"][$arElement['IBLOCK_SECTION_ID']]?></p>
            <?endif?>
            </a>
            <?if(is_array($arElement['PREVIEW_PICTURE'])):?>
            <a class="hover-wrap zoom-portfolio fancybox" title="<?=$arResult["SECTIONS"][$arElement['IBLOCK_SECTION_ID']]?>" href="<?=$arElement['PREVIEW_PICTURE']["SRC"]?>"><i class="icon-zoom-in"></i></a>
            <?endif?>
            <?if(is_array($arElement["PICTURE"])):?>
            <img src="<?=$arElement["PICTURE"]["src"]?>" alt="<?=$arElement["NAME"]?>">
            <?else:?>
            <img style="display: block;" src="<?=SITE_TEMPLATE_PATH?>/img/no-photo-medium.jpg" alt="<?=$arElement["NAME"]?>">
            <?endif?>

         </li>
        <?endforeach?>
        <?=$arResult["NAV_STRING"]?>
        <?if($arParams["AJAX_PAGE"]=="Y")exit();?>
    </ul>
</section>
</div>