<?
foreach($arResult["ITEMS"] as $key=>$arItem){
	if(!is_array($arItem["DISPLAY_PROPERTIES"]["PICTURE"])){
        unset($arResult["ITEMS"][$key]);
	}
    else{
        $arFileTmp = CFile::ResizeImageGet(
            $arItem["DISPLAY_PROPERTIES"]["PICTURE"]["FILE_VALUE"],
            array("width" => 339, "height" => 600),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            false
        );
        $arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
        $arResult["ITEMS"][$key]["PREVIEW_IMG"]= array(
            "SRC" => $arFileTmp["src"],
            "WIDTH" => IntVal($arSize[0]),
            "HEIGHT" => IntVal($arSize[1]),
        );
    }
}
?>