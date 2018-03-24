<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(count($arResult["ITEMS"])<1)return;
foreach($arResult["ITEMS"] as $arItem):
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
    ?>
    <article id="<?=$this->GetEditAreaId($arItem['ID'])?>">
    <div class="row">
        <div class="span8">
            <div class="post-image">
                <div class="post-heading">
                    <h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
                </div>
                <?if(is_array($arItem["PREVIEW_IMG"])):?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arItem["NAME"]?>"></a>
                <?endif?>
            </div>
            <p>
            <?=$arItem["PREVIEW_TEXT"]?truncateText(strip_tags($arItem["PREVIEW_TEXT"]),500):truncateText(strip_tags($arItem["DETAIL_TEXT"]),500)?>
            </p>
            <div class="bottom-article">
                <ul class="meta-post">
                   <?if($arItem["DISPLAY_ACTIVE_FROM"]):?><li><i class="icon-calendar"></i><a href="javascript:void(0);" style="cursor: default;"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></a></li><?endif?>
                   <?if($arItem["SHOW_COUNTER"]):?><li><i class="icon-user"></i><a href="javascript:void(0);" style="cursor: default;"><?=getMessage("WATCH")?>: <?=$arItem["SHOW_COUNTER"]?></a></li><?endif?>
                </ul>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="pull-right"><?=getMessage("CONTINUE_READING")?> <i class="icon-angle-right"></i></a>
            </div>
        </div>
    </div>
    </article>
<?endforeach;?>
<?=$arResult["NAV_STRING"]?>
