<? use Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>


<?
if( empty($arResult['ITEMS']) ){
	return;
}

?><section id="projects">
	<ul class="portfolio row"><?
		foreach($arResult['ITEMS'] as $arItem){
			?><li class="item-thumbs span3 design" id="bx_1970176138_277" data-id="id-0" data-type="web">
				<a data-fancybox href="<?=$arItem['PREVIEW_TEXT']?>">
					<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" width="270" height="203">
					<p class="m-t-10"><?=$arItem['NAME']?></p>
				</a>
			</li><?
		}
	?></ul>
</section><?