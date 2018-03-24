<?
if(is_array($arResult["DISPLAY_PROPERTIES"]["DATE_CREATE"])){
    $stmp = MakeTimeStamp($arResult["DISPLAY_PROPERTIES"]["DATE_CREATE"]["VALUE"],"DD.MM.YYYY HH:MI:SS");
    $arResult["DISPLAY_PROPERTIES"]["DATE_CREATE"]["DISPLAY_VALUE"]=FormatDate("d F, Y",$stmp);
}
$arResult["CATEGORY"]=array();
$db_old_groups = CIBlockElement::GetElementGroups($arResult["ID"], true);
while($ar_group = $db_old_groups->Fetch()){
    $ar_new_groups[] = $ar_group["ID"];
}
if(!empty($ar_new_groups)){
    $ar_result=CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ID"=>$ar_new_groups),false, Array("ID","NAME"));
    while($res=$ar_result->GetNext()){$arResult["CATEGORY"][]=$res;}

}

if(!empty($arResult["PROPERTIES"]["CLIENT"]["VALUE"])){
	$arResult["CLIENT"]=array();
	$res = CIBlockElement::GetByID($arResult["PROPERTIES"]["CLIENT"]["VALUE"]);
	if($ar_res = $res->GetNext()){
		$arResult["CLIENT"]["NAME"] = $ar_res["NAME"];
		$arResult["CLIENT"]["DETAIL_PAGE_URL"] = $ar_res["DETAIL_PAGE_URL"];
	  	$sec_res = CIBlockElement::GetElementGroups($arResult["PROPERTIES"]["CLIENT"]["VALUE"],true);
        $i=1;
			while($ar_sec_res = $sec_res->GetNext()){
				$arResult["CLIENT"]["SECTIONS"][$i]["IBLOCK_SECTION_NAME"] = $ar_sec_res['NAME'];
				$arResult["CLIENT"]["SECTIONS"][$i]["IBLOCK_SECTION_PAGE_URL"] = $ar_sec_res['SECTION_PAGE_URL'];
			$i++;
            }
		if(!empty($ar_res["PREVIEW_PICTURE"]))
			$arResult["CLIENT"]["PREVIEW_PICTURE"]= CFile::GetPath($ar_res["PREVIEW_PICTURE"]);
	}
}

$arResult["PREVIEW_IMG"]=array();
if(is_array($arResult["DETAIL_PICTURE"])){
			$arFileTmp = CFile::ResizeImageGet(
			$arResult["DETAIL_PICTURE"],
			array("width" => 762, "height" => 5000),
			BX_RESIZE_IMAGE_PROPORTIONAL,
			false
		);
		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
		$arResult["PREVIEW_IMG"][]= array(
			"SRC" => $arFileTmp["src"],
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"DESCRIPTION" => $arResult["DETAIL_PICTURE"]["DESCRIPTION"],
			"OLD_LINK" => $arResult["DETAIL_PICTURE"]["SRC"],
		);
}
if(is_array($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"])){
if(is_array($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"][0])){
foreach($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"] as $key=>$arItem){
			$arFileTmp = CFile::ResizeImageGet(
			$arItem,
			array("width" => 762, "height" => 5000),
			BX_RESIZE_IMAGE_PROPORTIONAL,
			false
		);
		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
		$arResult["PREVIEW_IMG"][$key]= array(
			"SRC" => $arFileTmp["src"],
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"DESCRIPTION" => $arItem["DESCRIPTION"],
			"OLD_LINK" => $arItem["SRC"],
		);
}
}
else{
		$arFileTmp = CFile::ResizeImageGet(
		$arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"],
		array("width" => 762, "height" => 5000),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		false
		);
		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
		$arResult["PREVIEW_IMG"][]= array(
			"SRC" => $arFileTmp["src"],
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"DESCRIPTION" => $arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"]["DESCRIPTION"],
			"OLD_LINK" => $arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"]["SRC"],
		);
}
}
?>