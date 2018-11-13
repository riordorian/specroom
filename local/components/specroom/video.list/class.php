<? use Bitrix\Iblock\SectionTable;
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class VideoList extends CBitrixComponent
{

	/**
	* подключает языковые файлы
	*/

	public function onIncludeComponentLang()
	{
		$this->includeComponentLang(basename(__FILE__));
		Loc::loadMessages(__FILE__);
	}   

	/**
	* Обработка входных параметров
	* 
	* @param mixed[] $arParams
	* @return mixed[] $arParams
	*/ 

	public function onPrepareComponentParams($arParams)
	{
		// время кэширования

		$arParams["CACHE_TIME"] = (int) $arParams["CACHE_TIME"];

		return $arParams;
	}



	/**
	* получение результатов
	* 
	* @return void
	*/

	protected function getResult()
	{
		$arResult = [];

		$rsElems = \CIBlockElement::GetList(
			[],
			[
				 'IBLOCK_ID' => SPECROOM_IBLOCK_ID_VIDEOS
			],
			false,
			false,
			['ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE']
		);

		while( $arElement = $rsElems->fetch() ){
			if( !empty($arElement['PREVIEW_PICTURE']) ){
				$arElement['PREVIEW_PICTURE'] = CFile::GetFileArray($arElement['PREVIEW_PICTURE']);
				$arPicture = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], ['width' => 270, 'height' => 203], BX_RESIZE_IMAGE_EXACT);
				$arElement['PREVIEW_PICTURE']['SRC'] = $arPicture['src'];
			}
			$arResult['ITEMS'][$arElement['ID']] = $arElement;
		}

		$this->arResult = $arResult;
	}

	/**
	* выполняет логику работы компонента
	* 
	* @return void
	*/

	public function executeComponent()
	{
		try
		{    
			if($this->StartResultCache($this->arParams["CACHE_TIME"])){ 
				$this->getResult();
				$this->includeComponentTemplate($this->page); 
			}

		}
		catch (Exception $e)
		{   
			ShowError($e->getMessage());
		}
	}
}