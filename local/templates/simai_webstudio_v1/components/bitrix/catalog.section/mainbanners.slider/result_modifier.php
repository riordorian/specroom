<?
foreach($arResult["ITEMS"] as $key=>$arItem){
	if(!is_array($arItem["DISPLAY_PROPERTIES"]["PICTURE"])){
        unset($arResult["ITEMS"][$key]);
	}
    else{
        $arFileTmp = CFile::ResizeImageGet(
            $arItem["DISPLAY_PROPERTIES"]["PICTURE"]["FILE_VALUE"],
            array("width" => 2800, "height" => 600),
            BX_RESIZE_IMAGE_EXACT,
            false
        );
        $arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
        $arResult["ITEMS"][$key]["PREVIEW_IMG"]= array(
            "SRC" => $arFileTmp["src"],
            "WIDTH" => IntVal($arSize[0]),
            "HEIGHT" => IntVal($arSize[1]),
        );
    $explode=explode(" ",$arItem["NAME"]);
    $str="";
        for($i=0;$i<=count($explode);$i++){
            if($i==0){
                $str.="<strong>".$explode[$i]."</strong> ";
            }
            else{
                $str.=" ".$explode[$i];
                }
        }
        $arResult["ITEMS"][$key]["NEW_NAME"]=$str;
    }
}
?>