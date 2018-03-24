<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$countItems=count($arResult["ITEMS"]);
if($countItems<1 && !$arResult["DESCRIPTION"])return;?>
<div class="row">
<?if($arResult["DESCRIPTION"]):?>
<p><?=$arResult["DESCRIPTION"]?></p>
<?endif?>
<?if($countItems>0):?>
<h6><?=getMessage("TITLE_LIST_SERVICE")?></h6>
    <?foreach($arResult["ITEMS"] as $cell=>$arElement):
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
        <div id="<?=$this->GetEditAreaId($arElement['ID']);?>" class="service-element"><i class="icon-caret-right"></i><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></div>
    <?endforeach?>
<?endif?>
</div>
 <?=$arResult["NAV_STRING"]?>