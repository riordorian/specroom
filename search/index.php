<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск по сайту");?>
<?$APPLICATION->IncludeComponent("bitrix:search.page", "main", Array(
	"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
	"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
	"CHECK_DATES" => "N",	// Искать только в активных по дате документах
	"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
	"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
	"FILTER_NAME" => "",	// Дополнительный фильтр
	"arrFILTER" => "",	// Ограничение области поиска
	"SHOW_WHERE" => "Y",	// Показывать выпадающий список "Где искать"
	"arrWHERE" => "",	// Значения для выпадающего списка "Где искать"
	"SHOW_WHEN" => "N",	// Показывать фильтр по датам
	"PAGE_RESULT_COUNT" => "50",	// Количество результатов на странице
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"DISPLAY_TOP_PAGER" => "Y",	// Выводить над результатами
	"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под результатами
	"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
	"PAGER_SHOW_ALWAYS" => "Y",	// Выводить всегда
	"PAGER_TEMPLATE" => "",	// Название шаблона
	"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
	"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
	"SHOW_ITEM_TAGS" => "Y",	// Показывать теги документа
	"TAGS_INHERIT" => "Y",	// Сужать область поиска
	"SHOW_ITEM_DATE_CHANGE" => "Y",	// Показывать дату изменения документа
	"SHOW_ORDER_BY" => "Y",	// Показывать сортировку
	"SHOW_TAGS_CLOUD" => "N",	// Показывать облако тегов
	"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	),
	false
);?><?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>