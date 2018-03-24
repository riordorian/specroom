<?
if(is_array($arResult["PREVIEW_PICTURE"])){
		$arFileTmp = CFile::ResizeImageGet(
		$arResult["PREVIEW_PICTURE"],
		array("width" => 1900, "height" => 5000),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		false
		);
		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
		$arResult["PREVIEW_IMG"]= array(
			"SRC" => $arFileTmp["src"],
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"DESCRIPTION" => $arResult["PREVIEW_PICTURE"]["DESCRIPTION"],
			"OLD_LINK" => $arResult["PREVIEW_PICTURE"]["SRC"],
		);
}
elseif(is_array($arResult["DETAIL_PICTURE"])){
	$arFileTmp = CFile::ResizeImageGet(
		$arResult["DETAIL_PICTURE"],
		array("width" => 1900, "height" => 5000),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		false
		);
		$arSize = getimagesize($_SERVER["DOCUMENT_ROOT"].$arFileTmp["src"]);
		$arResult["PREVIEW_IMG"]= array(
			"SRC" => $arFileTmp["src"],
			"WIDTH" => IntVal($arSize[0]),
			"HEIGHT" => IntVal($arSize[1]),
			"DESCRIPTION" => $arResult["DETAIL_PICTURE"]["DESCRIPTION"],
			"OLD_LINK" => $arResult["DETAIL_PICTURE"]["SRC"],
		);
}
?>