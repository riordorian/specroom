<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="row">
    <div class="span12">
        <h4><?=getMessage("SOME_CLIENTS")?></h4>
        <ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
            <li id="<?=$this->GetEditAreaId($arElement['ID'])?>">
                <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
				<?if(is_array($arElement["PREVIEW_IMG"])):?>
                    <img src="<?=$arElement["PREVIEW_IMG"]["SRC"]?>" class="client-logo" alt="<?=$arElement["NAME"]?>" />
				<?else:?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/no-photo-medium.jpg" class="client-logo" alt="<?=$arElement["NAME"]?>" />
				<?endif?>
                </a>
            </li>
        <?endforeach?>


            </ul>
        </div>
</div>
