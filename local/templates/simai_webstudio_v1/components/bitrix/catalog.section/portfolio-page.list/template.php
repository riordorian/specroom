<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$countItems=count($arResult["ITEMS"]);
if($countItems<1)return;?>
<div class="row">
<section id="projects">
    <ul id="thumbs" class="portfolio">
        <?foreach($arResult["ITEMS"] as $cell=>$arElement):
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
        <li class="item-thumbs span4 design" id="<?=$this->GetEditAreaId($arElement['ID']);?>" >
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
   </ul>
</section>
<?=$arResult["NAV_STRING"]?>
</div>