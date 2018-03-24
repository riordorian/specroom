<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$countItems=count($arResult["ITEMS"]);
if($countItems<1)return;?>
<div class="row">
<section id="projects">
    <ul id="thumbs" class="portfolio">
        <?foreach($arResult["ITEMS"] as $cell=>$arElement):
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
        <li class="item-thumbs span1 design" id="<?=$this->GetEditAreaId($arElement['ID']);?>" >
            <?if(is_array($arElement["PICTURE"])):?>
                <a rel="group" class="fancybox" title="<?=$arResult["NAME"]?>" href="<?=$arElement["PICTURE"]["old_src"]?>"><img src="<?=$arElement["PICTURE"]["src"]?>" alt="<?=$arElement["NAME"]?>"></a>
            <?endif?>

         </li>
        <?endforeach?>

    </ul>
</section>
    <?=$arResult["NAV_STRING"]?>
</div>