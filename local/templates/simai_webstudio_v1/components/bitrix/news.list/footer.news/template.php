<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="footer-news-block row">
<div class="span12">
<h4><?=getMessage("TITLE_NEWS_BLOCK");?></h4>
</div>
	<?foreach($arResult["ITEMS"] as $cell=>$arElement):
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
      <div class="span6 news-block" id="<?=$this->GetEditAreaId($arElement['ID'])?>">
          <h6><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h6>
		  <?if($arElement["DISPLAY_ACTIVE_FROM"]):?>
		  <b class="nb-date"><?=$arElement["DISPLAY_ACTIVE_FROM"]?></b>
		  <?endif?>
		  <?if($arElement["PREVIEW_TEXT"]):?>
		  <p><?=truncateText(strip_tags($arElement["PREVIEW_TEXT"]),300)?></p>
		  <?elseif($arElement["DETAIL_TEXT"]):?>
		  <p><?=truncateText(strip_tags($arElement["DETAIL_TEXT"]),300)?></p>
		  <?endif?>
       </div>
     <?
	 endforeach?>
</div>