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
elseif(is_array($arResult["PREVIEW_PICTURE"])){
		$arFileTmp = CFile::ResizeImageGet(
			$arResult["PREVIEW_PICTURE"],
			array("width" => 762, "height" => 5000),
			BX_RESIZE_IMAGE_PROPORTIONAL,
			false
		);
		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
		$arResult["PREVIEW_IMG"][]= array(
			"SRC" => $arFileTmp["src"],
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"DESCRIPTION" => $arResult["PREVIEW_PICTURE"]["DESCRIPTION"],
			"OLD_LINK" => $arResult["PREVIEW_PICTURE"]["SRC"],
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