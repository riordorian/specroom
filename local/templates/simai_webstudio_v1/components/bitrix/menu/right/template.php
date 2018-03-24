<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
		<nav>
			<ul class="cat">
				<?
				$previousLevel = 0;
				foreach($arResult as $arItem):?>

					<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
						<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
					<?endif?>

					<?if ($arItem["IS_PARENT"]):?>

						<?if ($arItem["DEPTH_LEVEL"] == 1):?>
							<li class="dropdown<?if ($arItem["SELECTED"]):?> active<?endif?>"><i class="icon-angle-right"></i><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?> <i class="icon-angle-down"></i></a>
								<ul class="dropdown-menu">
						<?endif?>

					<?else:?>

						<?if ($arItem["PERMISSION"] > "D"):?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"><i class="icon-angle-right"></i><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?else:?>
								<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>

						<?endif?>

					<?endif?>

					<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

				<?endforeach?>

				<?if ($previousLevel > 1)://close last item tags?>
					<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
				<?endif?>
			</ul>
		</nav>
<?endif?>


