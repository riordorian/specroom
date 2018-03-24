<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!$arResult["DETAIL_TEXT"])return;
?>
<div class="row">
	<?if(is_array($arResult["PREVIEW_IMG"])):?>
	<img src="<?=$arResult["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arResult["NAME"]?>"/>
	<?endif?>
    <p><?=$arResult["DETAIL_TEXT"]?></p>
	<a href="#callManager" data-title="<?=getMessage("ORDER_SERVICE_BOLD")?>" data-comment="<?=getMessage("ORDER_SERVICE")?>: [<?=$arResult["NAME"]?>k" class="btn btn-green order_site" data-toggle="modal"><?=getMessage("ORDER_SERVICE")?></a>
</div>