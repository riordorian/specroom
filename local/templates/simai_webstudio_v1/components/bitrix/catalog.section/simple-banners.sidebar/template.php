<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult["ITEMS"])<1)return;
?>
  <script>     
  $(function(){
	$(".banner-elements a[href^='http://']").attr("target","_blank")
  });
  </script>     
<?foreach($arResult["ITEMS"] as $cell=>$arElement):
$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
	<?if($arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["CONTENT_TYPE"] != "application/x-shockwave-flash"):?>
		<?if(is_array($arElement["DISPLAY_PROPERTIES"]["LINK"])):?>
			<div style="padding: 0 0 15px;" class="banner-elements"><a href="<?=$arElement["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"><img id="<?=$this->GetEditAreaId($arElement["ID"])?>" src="<?=$arElement["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arElement["NAME"]?>"></a></div>
		<?else:?>
			<div style="padding: 0 0 15px;" class="banner-elements"><img id="<?=$this->GetEditAreaId($arElement["ID"])?>" src="<?=$arElement["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arElement["NAME"]?>"></div>
		<?endif?>
	<?else:?>	
		<object 
			width="<?=$arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["WIDTH"]?>" 
			height="<?=$arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["HEIGHT"]?>" 
			codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000">
			<param value="<?=$arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>" name="movie">
			<param value="high" name="quality">
			<param value="#FFFFFF" name="bgcolor">
			<param value="transparent" name="wmode">
			<embed width="<?=$arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["WIDTH"]?>" height="<?=$arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["HEIGHT"]?>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="banner" wmode="transparent" bgcolor="#FFFFFF" quality="high" src="<?=$arElement["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>">
		</object>
	<?endif?>
<?endforeach?>
