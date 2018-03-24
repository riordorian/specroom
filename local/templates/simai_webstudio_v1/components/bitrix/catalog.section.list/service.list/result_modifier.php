<?
$res = CIBlock::GetByID($arParams["IBLOCK_ID"]);
if($ar_res = $res->GetNext())$arResult["DESCRIPTION"]=$ar_res["DESCRIPTION"];
?>
