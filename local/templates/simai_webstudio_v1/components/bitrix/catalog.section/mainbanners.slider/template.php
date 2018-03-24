<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult["ITEMS"])<1)return;
?>
<section id="featured">
    <div id="nivo-slider">
        <div class="nivo-slider">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
<?if(is_array($arElement["DISPLAY_PROPERTIES"]["LINK"])):?><a href="<?=$arElement["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"><?endif?><img src="<?=$arElement["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arElement["NAME"]?>" <?if($arElement["PREVIEW_TEXT"]):?>title="#caption-<?=$cell?>"<?endif?> /><?if(is_array($arElement["DISPLAY_PROPERTIES"]["LINK"])):?></a><?endif?>
		<?endforeach?>
        </div>
       
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		  <?if($arElement["PREVIEW_TEXT"]):?>
			<div class="nivo-caption" id="caption-<?=$cell?>">
					<h2><?=$arElement["NEW_NAME"]?$arElement["NEW_NAME"]:$arElement["NAME"]?></h2>                            
					<p><?=$arElement["PREVIEW_TEXT"];?></p>
					 <?if(is_array($arElement["DISPLAY_PROPERTIES"]["LINK"])):?>
					<a href="<?=$arElement["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" class="btn btn-theme"><?=$arElement["DISPLAY_PROPERTIES"]["LINK"]["DESCRIPTION"]?$arElement["DISPLAY_PROPERTIES"]["LINK"]["DESCRIPTION"]:getMessage("READ_MORE")?></a>
					<?endif?>
			</div>
		  <?endif?>
		<?endforeach?>
	</div>
</section>