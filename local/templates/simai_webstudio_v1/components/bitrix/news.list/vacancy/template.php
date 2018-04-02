<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult["ITEMS"])<1)return;
?>
<div class="accordion-vacancy" id="accordion2">
    <?foreach($arResult["ITEMS"] as $key=>$arItem):
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div id="<?=$this->GetEditAreaId($arItem['ID'])?>" class="accordion-group">
        <div class="accordion-heading">
            <div class="block-heading">
              <h6><?=$arItem["NAME"]?></h6>
              <?=$arItem["PREVIEW_TEXT"]?>
            </div>
		<?if(is_array($arItem["PROPERTIES"]["SPECIALITY_DEMAND"]) || is_array($arItem["PROPERTIES"]["SPECIALITY_REQUEST"]) || is_array($arItem["PROPERTIES"]["RESPONSIBILITY"])):?>
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?=$key?>"><i class="icon-circled icon-32 icon-arrow-down"></i></a>
		<?endif?>
        </div>
		<?if(is_array($arItem["PROPERTIES"]["SPECIALITY_DEMAND"]) || is_array($arItem["PROPERTIES"]["SPECIALITY_REQUEST"]) || is_array($arItem["PROPERTIES"]["RESPONSIBILITY"])):?>
        <div id="collapse<?=$key?>" class="accordion-body collapse">
            <div class="accordion-inner">
                      <?if ($arItem["PROPERTIES"]["SPECIALITY_DEMAND"]["~VALUE"]["TEXT"]) :?>
                        <div class="special">

                            <div class="sp-name"><?=GetMessage("SPECIALITY_DEMAND")?>:</div>
                            <?=htmlspecialchars_decode($arItem["PROPERTIES"]["SPECIALITY_DEMAND"]["~VALUE"]["TEXT"])?>
                        </div>
                    <?endif;?>

                    <?if ($arItem["PROPERTIES"]["SPECIALITY_REQUEST"]["~VALUE"]["TEXT"]) :?>
                        <div class="special">
                            <div class="sp-name"><?=GetMessage("SPECIALITY_REQUEST")?>:</div>
                            <?=htmlspecialchars_decode($arItem["PROPERTIES"]["SPECIALITY_REQUEST"]["~VALUE"]["TEXT"])?>
                        </div>
                    <?endif;?>

                    <?if ($arItem["PROPERTIES"]["RESPONSIBILITY"]["~VALUE"]["TEXT"]) :?>
                        <div class="special">
                            <div class="sp-name"><?=GetMessage("RESPONSIBILITY")?>:</div>
                            <?=htmlspecialchars_decode($arItem["PROPERTIES"]["RESPONSIBILITY"]["~VALUE"]["TEXT"])?>
                        </div>
                    <?endif;?>
	            <?if ($arItem["PROPERTIES"]["CONDITIONS"]["~VALUE"]["TEXT"]) :?>
                        <div class="special">
                            <div class="sp-name"><?=GetMessage("CONDITIONS")?>:</div>
                            <?=htmlspecialchars_decode($arItem["PROPERTIES"]["CONDITIONS"]["~VALUE"]["TEXT"])?>
                        </div>
                    <?endif;?>

            </div>
        </div>
		<?endif?>
    </div>
    <?endforeach;?>
</div>