<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>
	<table class="title-search-result">
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>

				<?if($i == 0 && $arCategory["TITLE"]):?>
					<tr><th>&nbsp;<?echo $arCategory["TITLE"]?></th></tr>
				<?endif?>

				<?if($category_id === "all"):?>
                    <tr><td class="title-search-all"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td></tr>
				<?elseif(isset($arItem["ICON"])):?>
                    <tr><td class="title-search-item"><i class="icon-angle-right"></i><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td></tr>
				<?else:?>
                    <tr><td class="title-search-more"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td></tr>
				<?endif;?>
			<?endforeach;?>
		<?endforeach;?>
	</table><div class="title-search-fader"></div>
<?endif;
//echo "<pre>",htmlspecialcharsbx(print_r($arResult,1)),"</pre>";
?>