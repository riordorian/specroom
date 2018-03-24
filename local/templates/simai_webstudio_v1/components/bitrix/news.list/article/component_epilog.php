<?

if(is_array($arResult["SECTION"])){
 $arResult["SECTION"]=array_pop($arResult["SECTION"]["PATH"]);
 if(is_string($arResult["SECTION"]["NAME"])){
 global $APPLICATION;
		$APPLICATION->SetTitle($arResult["SECTION"]["NAME"]);
	}
}
?>