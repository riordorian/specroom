<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript">
$(function(){
$('#thumbs li').BlackAndWhite({
           hoverEffect: true
});
})
</script>
<h4 class="heading"><?=getMessage("SOME_WORKS")?></h4>
<div class="row">
    <section id="projects">
        <ul id="thumbs" class="portfolio">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
            <li class="item-thumbs span3 design" id="<?=$this->GetEditAreaId($arElement['ID'])?>" data-id="id-<?=$cell?>" data-type="web">
                <?if(is_array($arElement["PREVIEW_IMG"])):?>
                <img src="<?=$arElement["PREVIEW_IMG"]["SRC"]?>" alt="<?=$arElement["NAME"]?>">
                <?else:?>
                <img src="<?=SITE_TEMPLATE_PATH?>/img/works/thumbs/image-01.jpg" alt="<?=$arElement["NAME"]?>">
                <?endif?>
                <a style="position: absolute;top: 0;bottom:0; left: 0; right: 0;" title="<?=$arElement["NAME"]?>" href="<?=$arElement["DETAIL_PAGE_URL"]?>"></a>
            </li>
            <?if(($cell+1)%4==0):?>
            <li style="clear: both;">
             </li>
            <?endif?>
        <?endforeach?>
        </ul>
    </section>
</div>
