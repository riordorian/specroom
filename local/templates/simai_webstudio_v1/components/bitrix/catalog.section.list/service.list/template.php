<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if($arResult["DESCRIPTION"]):?>
<p><?=$arResult["DESCRIPTION"]?></p>
<?endif?>
<div class="photogallery-inner-list">
<ul>
	
	<?foreach($arResult["SECTIONS"] as $arSection):
	if($arParams["CURRENT_SECTION"]!=$arSection["ID"] && $arParams["CURRENT_SECTION_CODE"]!=$arSection["CODE"]):
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		?>
        <li id="<?=$this->GetEditAreaId($arSection['ID'])?>"><i class="icon-caret-right"></i><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></li>
    <?
	endif;
	endforeach?>
</ul>
</div>