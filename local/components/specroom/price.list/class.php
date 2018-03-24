<? use Bitrix\Iblock\SectionTable;
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class PriceList extends CBitrixComponent
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
		$arParentSection = reset(SectionTable::getList([
			'filter' => [
				'IBLOCK_ID' => SPECROOM_IBLOCK_ID_SIMAI_SERVICE,
				'DEPTH_LEVEL' => 1,
				'CODE' => $this->arParams['SECTION_CODE']
			],
			'select' => ['ID', 'NAME', 'CODE']
		])->fetchAll());

		if( !empty($arParentSection) ){
			$rsSections = SectionTable::getList([
				'filter' => [
					'IBLOCK_ID' => SPECROOM_IBLOCK_ID_SIMAI_SERVICE,
					'DEPTH_LEVEL' => 2,
					'IBLOCK_SECTION_ID' => $arParentSection['ID']
				]
			]);
			
			if( $rsSections->getSelectedRowsCount() == 0 ){
				$this->arResult = $arResult;
				return;
			}
			
			
			while($arSection = $rsSections->fetch()){
				$arResult[$arSection['ID']] = $arSection;
			}

		    $rsElems = \CIBlockElement::GetList(
	            [],
			    [
			         'SECTION_ID' => array_keys($arResult)
			    ],
                false,
	            false,
	            ['ID', 'NAME', 'PROPERTY_DURATION', 'PROPERTY_PRICE', 'IBLOCK_SECTION_ID']
		    );

		    if( $rsElems->SelectedRowsCount() == 0 ){
				$this->arResult = $arResult;
				return;
		    }

		    while( $arElement = $rsElems->fetch() ){
				$arResult[$arElement['IBLOCK_SECTION_ID']]['ITEMS'][$arElement['ID']] = $arElement;
		    }

		    $this->arResult = $arResult;
		}
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
?>