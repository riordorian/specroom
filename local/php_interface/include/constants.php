<?

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\Loader;

/**
 * Class Constants - Class for all servers defining constants
 */
class Constants
{
	static $arDefined = false;

	public function __construct()
	{
		if( !Loader::includeModule('iblock') ){
			return;
		}

		static::defineIblocksConstants();
	}


	/**
	 * Define iblocks constants
	 *
	 * @param int $cacheTime
	 *
	 * @return bool
	 * @throws \Bitrix\Main\ArgumentException
	 */
	public static function defineIblocksConstants($cacheTime = 86400)
	{
		if( array_key_exists(__METHOD__, static::$arDefined) ) {
			return false;
		}

		$obCache = Cache::createInstance();
		$cacheId = md5(__METHOD__);
		if( $obCache->initCache($cacheTime, $cacheId, 'Obi') ) {
			$arIblocks = $obCache->getVars();
		}
		elseif( $obCache->startDataCache() ) {
			$arIblocks = array();

			$rsIblocks = IblockTable::getList(
				array(
					'filter' => array(
						'ACTIVE' => 'Y',
					)
				)
			);

			while ($iblock = $rsIblocks->fetch()) {
				$arIblocks[] = $iblock;
			}

			$obCache->endDataCache($arIblocks);
		}

		foreach ($arIblocks as $arIblock) {
			$arIblock['CODE'] = strtoupper(trim($arIblock['CODE']));
			if ($arIblock['CODE']) {
				$const = 'SPECROOM_IBLOCK_ID_' . $arIblock['CODE'];

				if (!defined($const)) {
					/**
					 * @ignore
					 */
					define($const, $arIblock['ID']);
				}
			}
		}

		self::$arDefined[__METHOD__] = true;
	}
}

new Constants();