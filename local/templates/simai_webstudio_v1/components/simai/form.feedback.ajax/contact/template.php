<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CAjax::Init();?>
<script type="text/javascript">
    $(function(){
        $("#body_contacts_form_id > div").each(function(){
            placeholder=$(this).attr("data-placeholder");
            if(typeof placeholder!=="undefined"){
                $(this).children().attr("placeholder",placeholder);
            }
        })
		$("#jstext").val("Y");
    });
</script>
<div class="contacts-form validateformparent">

        <h4><?=getMessage("FORM_CONTACT_FORM")?></h4>
<?=CAjax::GetForm('method="POST"', $arResult["AJAX_ID"], '1')?>
<input type="hidden" name="ajax" value="y">
<input type="hidden" name="js" id="jstext" value="N">
<div id="<?=$arResult["AJAX_ID"]?>">
<?if ($_POST["FB_SUBMIT_".$arResult["AJAX_ID"]] && $_POST["ajax"] == "y"):
	$APPLICATION->RestartBuffer();
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
endif;?>

<?if (count($arResult["ERRORS"]) > 0):?>
	<div class="alert alert-error">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
		<p>- <?=implode("<br>- ",$arResult["ERRORS"])?></p>
	</div>
<?elseif ($arResult["OK"]):?>
	<div class="alert alert-success">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <?=$arParams["OK_MSG"]?>
	</div>
<?endif;?>
<div class="row">
	<?foreach($arResult["FIELDS"] as $field_code => $field_name):?>
				<?if (array_key_exists($field_code,$arResult["FIELDS_TXT"])):?>
				<div class="margintop10 field span<?if($APPLICATION->GetProperty("SHOW_COLUMN")=="R" || $APPLICATION->GetProperty("SHOW_COLUMN")=="L"):?>8<?else:?>12<?endif?>">
					<textarea class="inputtextarea" cols="45" rows="5" id="PROP[<?=$field_code?>]" placeholder="<?if(array_key_exists($field_code,$arResult["FIELDS_REQ"])):?>* <?endif;?><?=$field_name?>" name="PROP[<?=$field_code?>]"><?=($arResult["OK"] ? "" : htmlspecialchars(strip_tags($_POST["PROP"][$field_code]),ENT_QUOTES))?></textarea>
				</div>
				<?else:?>
				<div class="span4 field">
					<input id="PROP[<?=$field_code?>]" placeholder="<?if(array_key_exists($field_code,$arResult["FIELDS_REQ"])):?>* <?endif;?><?=$field_name?>" name="PROP[<?=$field_code?>]" type="text" value="<?=($arResult["OK"] ? "" : htmlspecialchars(strip_tags($_POST["PROP"][$field_code]),ENT_QUOTES))?>" class="inputtext">
				</div>
				<?endif?>
	<?endforeach;?>
	
	
	<?if (isset($arResult["CAP_CODE"])):?>
			<div class="span4 field">
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialchars($arResult["CAP_CODE"])?>" width="180" height="40">
				<input type="hidden" name="CAPTCHA_SID" value="<?=htmlspecialchars($arResult["CAP_CODE"])?>">
			</div>
		<div class="span4 field">
					<input type="text" placeholder="* <?=GetMessage("SIMAI_FORM_CAPTCHA_INPUT")?>" name="CAPTCHA_WORD" maxlength="50" value="">
		</div>
	<?endif;?>
	
</div>
<p>
			<input type="submit" name="FB_SUBMIT_<?=$arResult["AJAX_ID"]?>" class="btn btn-theme margintop10 pull-left" value=" <?=GetMessage("SIMAI_FORM_SEND")?>">
<span class="pull-right margintop20">* - <?=GetMessage("SIMAI_FORM_MANDATORY")?></span>
</p>
<?if ($_POST["FB_SUBMIT_".$arResult["AJAX_ID"]] && $_POST["ajax"] == "y"):
	exit();
endif;?>	

</div>
</form>
</div>