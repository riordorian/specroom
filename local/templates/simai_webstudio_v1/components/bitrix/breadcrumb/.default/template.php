<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string

__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/'.basename(__FILE__));

$curPage = $GLOBALS['APPLICATION']->GetCurPage($get_index_page=false);

if ($curPage != SITE_DIR)
{
	if (empty($arResult) || (!empty($arResult[count($arResult)-1]['LINK']) && $curPage != urldecode($arResult[count($arResult)-1]['LINK'])))
		$arResult[] = array('TITLE' =>  htmlspecialcharsback($GLOBALS['APPLICATION']->GetTitle(false, true)), 'LINK' => $curPage);
}

if(empty($arResult))
	return "";
	
$strReturn = '<ul class="breadcrumb">';
$strReturn .= '<li><a href="'.SITE_DIR.'" tilte="'.GetMessage('BREADCRUMB_MAIN').'"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a><i class="icon-angle-right"></i></li>';
	else
		$strReturn .= '<li class="active">'.$title.'</li>';
}

$strReturn .= '</ul>';

return $strReturn;
?>



<div class="row bread"><div class="span8">
        <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li><a href="#">Pages</a><i class="icon-angle-right"></i></li>
            <li class="active">About us</li>
        </ul>
    </div>
</div>