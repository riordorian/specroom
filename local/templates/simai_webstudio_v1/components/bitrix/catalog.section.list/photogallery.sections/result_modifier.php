<?
$arParams["NUM_ELEMENTS"]=(intVal($arParams["NUM_ELEMENTS"])?intVal($arParams["NUM_ELEMENTS"]):5);
$arParams["WIDTH_PREVIEW"]=(intVal($arParams["WIDTH_PREVIEW"])?intVal($arParams["WIDTH_PREVIEW"]):(intVal($arParams["SIZE_PREVIEW"])?intVal($arParams["SIZE_PREVIEW"]):100));
$arParams["HEIGHT_PREVIEW"]=(intVal($arParams["HEIGHT_PREVIEW"])?intVal($arParams["HEIGHT_PREVIEW"]):(intVal($arParams["SIZE_PREVIEW"])?intVal($arParams["SIZE_PREVIEW"]):100));
$arParams["ELEMENT_SORT_FIELD"]=(intVal($arParams["ELEMENT_SORT_FIELD"])?intVal($arParams["ELEMENT_SORT_FIELD"]):"sort");
$arParams["ELEMENT_SORT_ORDER"]=(intVal($arParams["ELEMENT_SORT_ORDER"])?intVal($arParams["ELEMENT_SORT_ORDER"]):"asc");
$CURRENT_DEPTH=1;
$arKey=0;
foreach($arResult["SECTIONS"] as $key=>$arSection){
 if($arSection["DEPTH_LEVEL"]>=$CURRENT_DEPTH && $arSection["DEPTH_LEVEL"]>1){
 if(!$arKey)$arKey=$key-1;
 $arResult["SECTIONS"][$arKey]["SECTIONS"][]=$arSection;
 $CURRENT_DEPTH=$arSection["DEPTH_LEVEL"];
 unset($arResult["SECTIONS"][$key]);
 }
 elseif($arSection["DEPTH_LEVEL"]<$CURRENT_DEPTH){
  $arKey=0;
  $CURRENT_DEPTH=$arSection["DEPTH_LEVEL"];
 }
}
foreach($arResult["SECTIONS"] as $key=>$arSection){
	$arSelect = Array("ID","NAME","PROPERTY_REAL_PICTURE");
    $arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "SECTION_ACTIVE"=>"Y", "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","SECTION_ID"=>$arSection["ID"],"INCLUDE_SUBSECTIONS"=>"Y");
    $res = CIBlockElement::GetList(Array($arParams["ELEMENT_SORT_FIELD"]=>$arParams["ELEMENT_SORT_ORDER"]),$arFilter, false,array("nTopCount" =>$arParams["NUM_ELEMENTS"]),$arSelect);
    while($ob = $res->GetNext())
    {
        if($ob["PROPERTY_REAL_PICTURE_VALUE"]){
            $arFileTmp = CFile::ResizeImageGet(
                $ob["PROPERTY_REAL_PICTURE_VALUE"],
                array("width" => $arParams["WIDTH_PREVIEW"], "height" => $arParams["HEIGHT_PREVIEW"]),
                BX_RESIZE_IMAGE_EXACT,
                false
            );
            $arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
            $ob["PREVIEW_IMG"]= array(
                "SRC" => $arFileTmp["src"],
                "WIDTH" => IntVal($arSize[0]),
                "HEIGHT" => IntVal($arSize[1]),
                "REAL_FILE_SRC" => CFile::GetPath($ob["PROPERTY_REAL_PICTURE_VALUE"])
            );
            $arResult["SECTIONS"][$key]["ITEMS"][]=$ob;
        }

    }
}
?>