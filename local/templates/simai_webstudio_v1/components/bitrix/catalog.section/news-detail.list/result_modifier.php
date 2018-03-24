<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arResult["SECTIONS"] = Array();
$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "GLOBAL_ACTIVE"=>"Y","ACTIVE"=>"Y");
$res = CIBlockSection::GetList(Array("left_margin"=>"asc"), $arFilter);
while($arr = $res->GetNext()):
	$arResult["SECTIONS"][$arr["ID"]] = $arr["NAME"];
endwhile;

foreach($arResult["ITEMS"] as $cell=>$arElement):
	$fid = is_array($arElement["DISPLAY_PROPERTIES"]["REAL_PICTURE"])?$arElement["DISPLAY_PROPERTIES"]["REAL_PICTURE"]["FILE_VALUE"]:($arElement["PREVIEW_PICTURE"]?$arElement["PREVIEW_PICTURE"]:$arElement["DETAIL_PICTURE"]);
    if ($fid > 0):
		$file = CFile::ResizeImageGet($fid, array('width'=>120, 'height'=>120), BX_RESIZE_IMAGE_EXACT);
		$arResult["ITEMS"][$cell]["PICTURE"] = $file;
		$arResult["ITEMS"][$cell]["PICTURE"]["old_src"] = $fid["SRC"];
    else:
        unset($arResult["ITEMS"][$cell]);
	endif;	
endforeach;
?>