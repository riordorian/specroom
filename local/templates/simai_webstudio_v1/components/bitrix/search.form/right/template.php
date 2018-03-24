<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="widget">
<form class="form-search" action="<?=$arResult["FORM_ACTION"]?>">
<?if($arParams["USE_SUGGEST"] === "Y"):?><?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"",
				array(
					"NAME" => "q",
					"VALUE" => "",
					"INPUT_SIZE" => 15,
					"DROPDOWN_SIZE" => 10,
				),
				$component, array("HIDE_ICONS" => "Y")
			);?><?else:?><input placeholder="<?=getMessage("INSERT_QUERY")?>" class="input-medium search-query" type="text" name="q" value="" size="15" maxlength="50" /><?endif;?>
		<input class="btn btn-square btn-theme" name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" />

</form>
</div>