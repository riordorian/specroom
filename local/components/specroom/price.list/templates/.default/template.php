<? use Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<? if( !empty($arResult) ){
    $arElems = array_column($arResult, 'ITEMS');
    if( empty($arElems) ){
        return;
    }

    ?><section class="price-rebuild" >
		<h4 class="heading"><strong><?=Loc::getMessage('TITLE')?></strong></h4>


		<div role="tabpanel" class="tab-pane active show" id="iphone" aria-expanded="true">
			<ul class="nav nav-tabs prices" role="tablist"><?
				$i = 0;
				foreach($arResult as $arSection){
					?><li class="nav-item <?=$i == 0 ? 'active' : ''?>">
						<a class="nav-link device-link" href="#<?=$arSection['CODE']?>" role="tab" data-toggle="tab" data-object-id="9">
							<span class="base"><?=$arSection['NAME']?></span>
						</a>
					</li><?
					$i++;
				}
			?></ul>
			<div class="tab-content device-content"><?
				$i = 0;
				foreach($arResult as $arSection){
					?><div role="tabpanel" class="tab-pane <?=$i == 0 ? 'active' : ''?>" id="<?=$arSection['CODE']?>">
						<table class="price-table short">
							<tbody>
							<tr>
								<td>
									<span class="desktop hidden-xs"><?=Loc::getMessage('SERVICE_NAME')?></span>
									<span class="mobile text"><?=Loc::getMessage('SERVICE_NAME_2')?> <?=$arSection['NAME']?> </span>
								</td>
								<td><?=Loc::getMessage('DURATION')?></td>
								<td style="mobile-center">
									<span class="desktop text hidden-xs"><?=Loc::getMessage('PRICE_DESKTOP')?></span>
									<span class="hidden-lg hidden-md hidden-sm"><?=Loc::getMessage('PRICE_MOBILE')?></span>
								</td>
							</tr><?
							foreach($arSection['ITEMS'] as $arItem){
								?><tr>
									<td><?=$arItem['NAME']?></td>
									<td><?=$arItem['PROPERTY_DURATION_VALUE']?></td>
									<td><?=$arItem['PROPERTY_PRICE_VALUE']?></td>
								</tr><?
							}
						?></table>
					</div><?
					$i++;
				}
			?></div>
		</div>
		<p><a href="/service/"><?=Loc::getMessage('FULL_PRICE')?></a></p>
	</section><?
}