<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult["SECTIONS"])<1)return;
?>
<script type="text/javascript">
$(function(){
 $(".open_links_id").click(function(){
	$(this).prevAll(".pl-section").css("display","block").end().css("display","none");
 });
});
</script>
<div class="photogallery-list">
    <ul>
<?foreach($arResult["SECTIONS"] as $cell=>$arSection):
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
?>

    <li id="<?=$this->GetEditAreaId($arSection['ID'])?>">
        <h6><?=$arSection["NAME"]?> </h6>
        <?if($arResult["DESCRIPTION"]):?><p><?=$arResult["DESCRIPTION"]?></p><?endif?>
		<?if(is_array($arSection["SECTIONS"])):
		$arCount=count($arSection["SECTIONS"]);
		$i=1;
		foreach($arSection["SECTIONS"] as $arSect):
		$this->AddEditAction($arSect['ID'], $arSect['EDIT_LINK'], CIBlock::GetArrayByID($arSect["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSect['ID'], $arSect['DELETE_LINK'], CIBlock::GetArrayByID($arSect["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div <?if($i>3 && $arCount>5):?>style="display: none;"<?endif?>class="pl-section"><a href="<?=$arSect["SECTION_PAGE_URL"]?>"><?=$arSect["NAME"]?></a></div>
		<?
		$i++;
		endforeach;
		if($arCount>3 && $arCount>5):
		?>
		<a class="open_links_id" href="javascript:void(0);"><small>...<br/><?=getMessage("TITLE_ALL_SECTION")?><i class="icon-sort-down"></i></small></a>
		<?
		endif;
		endif?>
            <ul>
               <?foreach($arSection["ITEMS"] as $arItem):?>
                   <li><a title="<?=$arSection["NAME"]?>" class="fancybox" rel="group<?=$cell?>" href="<?=$arItem["PREVIEW_IMG"]["REAL_FILE_SRC"]?>"><img src="<?=$arItem["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arParams["SHOW_PHOTO_TITLE"]=="N"?"":$arElement["NAME"]?>"/></a></li>
                <?endforeach?>
            </ul>
    </li>
   <?endforeach?>
    </ul>
</div>