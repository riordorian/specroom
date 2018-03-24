<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//echo"<pre>";print_r($arResult);echo"</pre>";
$countItems=count($arResult["ITEMS"]);
if($countItems<1 && empty($arResult["SECTIONS"]))return;?>
<?if($arParams["AJAX_PAGE"]!="Y"):?>
<script type="text/javascript">
P P $(function(){
P P P P if($(window).scrollTop()+$(window).height()+50>$("footer").offset().top){
P P P P P P $(".modern-page-next").parent().append('<img alt="" style="clear: both;display: block;margin:30px 0 0 30px;" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif">').end().trigger("click");
 P P 

}
});
P P $(window).scroll(function(){
P P P P if($(window).scrollTop()+$(window).height()>$("footer").offset().top)
P P P P {
P P P P P P $(".modern-page-next").parent().append('<img alt="" style="clear: both;display: block;margin:30px 0 0 30px;" src="<?=SITE_TEMPLATE_PATH?>/img/ajax-loader.gif">').end().trigger("click").remove();
P P P 
}
P P });
</script>
<?if(!empty($arResult["SECTIONS"])):?>
<div class="photogallery-inner-list">
 <ul>
 <?foreach($arResult["SECTIONS"] as $arSection):?>
 <li class="pil-top"><h6><?=$arSection["NAME"]?></h6>
 <?if(is_array($arSection["ITEMS"])):?>
			<ul>
               <?foreach($arSection["ITEMS"] as $arItem):?>
                   <li><a title="<?=$arSection["NAME"]?>" class="fancybox" rel="group<?=$cell?>" href="<?=$arItem["PREVIEW_IMG"]["REAL_FILE_SRC"]?>"><img src="<?=$arItem["PREVIEW_IMG"]["SRC"]?>" width="<?=$arItem["PREVIEW_IMG"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_IMG"]["HEIGHT"]?>" alt="<?=$arParams["SHOW_PHOTO_TITLE"]=="N"?"":$arElement["NAME"]?>"/></a></li>
                <?endforeach?>
            </ul>
<?endif?>
 </li>
 <?endforeach?>
 </ul>
</div>
<?endif?>
<div class="row">
<section id="projects">



<div class="am-container pictures" id="am-container" style="width:100%;margin:0px auto;">
<?endif?>
        <?foreach($arResult["ITEMS"] as $cell=>$arElement):
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
       
            <?if(is_array($arElement["PICTURE"])):?>
              <a rel="group" class="fancybox" title="<?=$arResult["NAME"]?>" href="<?=$arElement["PICTURE"]["old_src"]?>"><img src="<?=$arElement["PICTURE"]["SRC"]?>" width="<?=$arElement["PICTURE"]["WIDTH"]?>" height="<?=$arElement["PICTURE"]["HEIGHT"]?>" alt="<?=$arParams["SHOW_PHOTO_TITLE"]=="N"?"":$arElement["NAME"]?>"></a>
            <?endif?>

      
        <?endforeach?>
		<?=$arResult["NAV_STRING"]?>
		<?if($arParams["AJAX_PAGE"]=="Y")exit();?>
</div>
        
        


</section>

</div>