<?if(!isset($arResult["SELECT"]))return;
?>
<script type="text/javascript">
    $(function(){
        $("#filter-portfolio select").change(function(){
            value=$(this).find("option:selected").val();
            if(typeof value!=="undefined"){
                document.location.href=value;
            }
        }).ready(function(){$(this).find("option[data-removed='Y']").not(":selected").remove().end().filter(":selected").next("option").remove();});
    });
</script>
<div id="filter-portfolio">
<?
$arFilter="";
foreach($arResult["SELECT"] as $key=>$arSelect):
if(!isset($arSelect["DISABLED"])):
    if($_GET[toLower($key)] && is_array($_GET[toLower($key)])){
        $arStr="";
        $i=1;
        foreach($_GET[toLower($key)] as $arVal){
            if($i){
                $arStr.=toLower($key)."[]=".$arVal;
                $i=0;
            }
            else
            {
                $arStr.="&".toLower($key)."[]=".$arVal;
            }
        }
        $filter=1;
    }
    elseif($_GET[toLower($key)]){
        $arStr=toLower($key)."=".$_GET[toLower($key)];
        $filter=1;
    }

?>
<select <?if(isset($arStr)):?>style="color: #cb1103;border-color: #cb1103;"<?endif?> name="<?=toLower($key)?>">
    <option selected="" data-removed="Y" value=""><?=$arResult["MESSAGE"]["FILTER_NAME_".$key]?></option>
    <option value="<?=$APPLICATION->GetCurPageParam("", array(toLower($key)))?>"><?=$arSelect["NAME"]?></option>
    <?foreach($arSelect["ITEMS"] as $arItem):?>
        <option <?if(isset($arStr) && $arStr==urldecode($arItem["VALUE"])):$arFilter.=($arFilter?", ":" ").$arItem["NAME"];?>selected=""<?endif?> value="<?=$APPLICATION->GetCurPageParam($arItem["VALUE"], array(toLower($key)))?>"><?=$arItem["NAME"]?></option>
    <?endforeach?>
</select>
<?
$arKey[]=toLower($key);
else:
?>
    <select disabled="" style="color: #cb1103;border-color: #cb1103;" name="<?=toLower($key)?>">
        <option value=""><?=$arSelect["DISABLED"]?></option>
    </select>
<?endif;
unset($arStr);
endforeach?>
    <?if(isset($filter)):?>
        <a style="float:right;" href="<?=$APPLICATION->GetCurPageParam("", $arKey)?>" class="btn btn-square btn-theme"><?=$arResult["MESSAGE"]["CLEAR"]?></a>
        <div style="height: 10px;"></div>
        <div class="alert">
            <button type="button" class="close" data-dismiss="alert">‡</button>
            <strong><?=$arResult["MESSAGE"]["FILTER_LIST"]?>:</strong> <?=$arFilter?>
        </div>
    <?endif?>
    <div style="height: 20px;"></div>
</div>