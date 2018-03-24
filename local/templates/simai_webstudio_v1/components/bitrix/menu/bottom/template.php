<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>


				<?
				$previousLevel = 0;
				foreach($arResult as $arItem):?>

					<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
						<?=str_repeat("</ul></div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
					<?endif?>

					<?if ($arItem["IS_PARENT"]):?>

						<?if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <div class="span3">
                            <div class="widget">
							<h5 class="widgetheading"><?=$arItem["TEXT"]?></h5>
								<ul class="link-list">
						<?endif?>

					<?else:?>

						<?if ($arItem["PERMISSION"] > "D"):?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                    <div class="span3">
                                        <div class="widget">
                                 <h5 class="widgetheading"><?=$arItem["TEXT"]?></h5>
                                            </div>
                                            </div>
							<?else:?>
								<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>

						<?endif?>

					<?endif?>

					<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

				<?endforeach?>

				<?if ($previousLevel > 1)://close last item tags?>
					<?=str_repeat("</ul></div></div>", ($previousLevel-1) );?>
				<?endif?>


<?endif?>