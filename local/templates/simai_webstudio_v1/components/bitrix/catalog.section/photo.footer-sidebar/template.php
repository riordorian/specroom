<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="widget">
    <?if($arParams["NAME_BLOCK"]):?>
    <h5 class="widgetheading"><?=$arParams["NAME_BLOCK"]?></h5>
    <?endif?>
    <div class="flickr_badge">
	<?foreach($arResult["ITEMS"] as $cell=>$arElement):
		if(is_array($arElement["PREVIEW_IMG"])):
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
      <div class="flickr_badge_image" id="flickr_badge_image<?=$cell?>">
          <a class="fancybox" rel="gallery" title="" href="<?=$arElement["PREVIEW_IMG"]["OLD_SRC"]?>"><img id="<?=$this->GetEditAreaId($arElement['ID'])?>" src="<?=$arElement["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arParams["SHOW_PHOTO_TITLE"]=="N"?"":$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" height="<?=$arElement["PREVIEW_IMG"]["HEIGHT"]?>" width="<?=$arElement["PREVIEW_IMG"]["WIDTH"]?>"></a>
       </div>
     <?
		endif;
	 endforeach?>
    </div>
	
    <div class="clear">
	<a href="/about/photo/"><?=GetMessage("CT_BCS_ALL_PHOTO")?></a>
    </div>
</div>