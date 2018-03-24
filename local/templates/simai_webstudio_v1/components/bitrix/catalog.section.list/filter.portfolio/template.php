<?
$arResult["SELECT"]["SECTIONS"]=array();
$arResult["SELECT"]["TYPE"]=array();
$arResult["SELECT"]["YEARS"]=array();
$arResult["MESSAGE"]["CLEAR"]=getMessage("CLEAR_FILTER");
$arResult["MESSAGE"]["FILTER_LIST"]=getMessage("FILTER_LIST");
$arResult["MESSAGE"]["FILTER_NAME_SECTIONS"]=getMessage("FILTER_NAME_SECTIONS");
$arResult["MESSAGE"]["FILTER_NAME_TYPE"]=getMessage("FILTER_NAME_TYPE");
$arResult["MESSAGE"]["FILTER_NAME_YEARS"]=getMessage("FILTER_NAME_YEARS");
$arItem=array();
foreach($arResult["SECTIONS"] as $arSection){
    if($arSection["CODE"]==$arParams["SECTION_CODE_ACTIVE"]){
        $arResult["SELECT"]["SECTIONS"]["DISABLED"]=$arSection["NAME"];
        break;
    }
    $arItem["NAME"]=$arSection["NAME"];
    $arItem["VALUE"]="sections=".$arSection["ID"];
    $arResult["SELECT"]["SECTIONS"]["ITEMS"][]=$arItem;
}
$arResult["SELECT"]["SECTIONS"]["NAME"]=getMessage("ALL_YEARS");
$arItem=array();
$arSelect = Array("ACTIVE_FROM");
$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","!ACTIVE_FROM"=>false);
$res = CIBlockElement::GetList(Array("active_from"=>"desc"), $arFilter, false,false,$arSelect);
while($ob = $res->GetNext())
{
    if($ob["ACTIVE_FROM"]){
        $ob["ACTIVE_FROM"]=FormatDateFromDB($ob["ACTIVE_FROM"],'Y');
        $arItem[]=$ob["ACTIVE_FROM"];
    }
}
$arResult["SELECT"]["YEARS"]["ITEMS"]=$arItem;
$arItem=array();
$arResult["SELECT"]["YEARS"]["NAME"]=getMessage("ALL_YEARS");
rsort($arResult["SELECT"]["YEARS"]["ITEMS"]);
$arResult["SELECT"]["YEARS"]["ITEMS"]=array_unique($arResult["SELECT"]["YEARS"]["ITEMS"]);
foreach($arResult["SELECT"]["YEARS"]["ITEMS"] as $key=>$arYear){
    $arItem[$key]["NAME"]=$arYear;
    $formatSite=CSite::GetDateFormat("SHORT");
    $new=$DB->FormatDate("01.01.".$arYear,"DD.MM.YYYY",$formatSite);
    $newTo=$DB->FormatDate("01.01.".intVal($arYear+1),"DD.MM.YYYY",$formatSite);
    $stmp=MakeTimeStamp($new,$formatSite);
    $stmpTo=MakeTimeStamp($newTo,$formatSite);
    $arItem[$key]["VALUE"]="years[]=".urlencode(ConvertTimeStamp($stmp,"FULL"))."&years[]=".urlencode(ConvertTimeStamp($stmpTo,"FULL"));
}
$arResult["SELECT"]["YEARS"]["ITEMS"]=$arItem;
$arItem=array();
$arSelect = Array("ID","IBLOCK_SECTION_ID");
$arFilter = Array("IBLOCK_ID"=>$arParams["CLIENTS_IB"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false,false,$arSelect);
while($ob = $res->GetNext())
{
    if($ob["IBLOCK_SECTION_ID"])$arItem[$ob["IBLOCK_SECTION_ID"]][]=$ob["ID"];
}
$ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["CLIENTS_IB"],"GLOBAL_ACTIVE"=>"Y","ACTIVE"=>"Y"),false);
while($res=$ar_result->GetNext()){
    if(is_array($arItem[$res["ID"]])){
        $arSect["NAME"]=$res["NAME"];
        $i=1;
        $arStr="";
        foreach($arItem[$res["ID"]] as $arVal){
            if($i){
                $arStr.="type[]=".$arVal;
                $i=0;
            }
            else
            {
                $arStr.="&type[]=".$arVal;
            }
        }
        $arSect["VALUE"]=$arStr;
        $arResult["SELECT"]["TYPE"]["ITEMS"][]=$arSect;
    }
}
if(!empty($arResult["SELECT"]["TYPE"]["ITEMS"])){
    $arResult["SELECT"]["TYPE"]["NAME"]=getMessage("ALL_YEARS");
}
if(!empty($arResult["SELECT"]["SECTIONS"]["ITEMS"]) || !empty($arResult["SELECT"]["YEARS"]["ITEMS"]) || !empty($arResult["SELECT"]["TYPE"]["ITEMS"])){
    $cp = $this->__component;
    if (is_object($cp))
    {
        $cp->SetResultCacheKeys(array('SELECT','MESSAGE'));
    }
}
?>