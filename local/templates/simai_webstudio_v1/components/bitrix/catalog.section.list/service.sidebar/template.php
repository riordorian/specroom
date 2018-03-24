<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult["SECTIONS"])<1)return;
?>
<div class="widget">
    <h5 class="widgetheading"><?=getMessage("CATEGORY")?></h5>
<ul class="cat">
	
	<?foreach($arResult["SECTIONS"] as $arSection):
	if($arParams["CURRENT_SECTION"]!=$arSection["ID"] && $arParams["CURRENT_SECTION_CODE"]!=$arSection["CODE"]):
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		?>
        <li id="<?=$this->GetEditAreaId($arSection['ID'])?>"><i class="icon-angle-right"></i><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
    <?
	endif;
	endforeach?>
</ul>
</div>