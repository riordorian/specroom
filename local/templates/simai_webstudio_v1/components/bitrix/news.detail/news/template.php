<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//echo"<pre>";print_r($arResult);echo"</pre>";
?>
<article>
    <div class="row">
        <div class="span8">
            <?if(is_array($arResult["PREVIEW_IMG"]) && !empty($arResult["PREVIEW_IMG"])):?>
                <div class="flexslider">
                    <ul class="slides">
                            <?foreach($arResult["PREVIEW_IMG"] as $arImg):?>
                                <li><img src="<?=$arImg["SRC"]?>" alt="<?=$arResult["NAME"]?>"></li>
                            <?endforeach?>
                     </ul>
                    <?if(count($arResult["PREVIEW_IMG"])>1):?>
                        <ol class="flex-control-nav flex-control-paging">
                            <?foreach($arResult["PREVIEW_IMG"] as $key=>$arImg):?>
                                <li><a><?=$key+1?></a></li>
                            <?endforeach?>
                        </ol>
                        <ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next" href="#">Next</a></li></ul>
                    <?endif?>
                </div>
            <?endif?>
            <p>
                <?=$arResult["DETAIL_TEXT"]?$arResult["DETAIL_TEXT"]:$arResult["PREVIEW_TEXT"]?>
            </p>
            <div class="bottom-article">
                <ul class="meta-post">
                    <?if($arResult["DISPLAY_ACTIVE_FROM"]):?><li><i class="icon-calendar"></i><a href="javascript:void(0);" style="cursor: default;"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></a></li><?endif?>
                    <?if($arResult["SHOW_COUNTER"]):?><li><i class="icon-user"></i><a href="javascript:void(0);" style="cursor: default;"><?=getMessage("WATCH")?>: <?=$arResult["SHOW_COUNTER"]?></a></li><?endif?>
                </ul>
            </div>
        </div>
    </div>
</article>