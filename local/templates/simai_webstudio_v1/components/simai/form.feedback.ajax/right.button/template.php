<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CAjax::Init();?>
<script type="text/javascript">
    $(function(){
	$("#jstextC").val("Y");
        BX.addCustomEvent('onAjaxSuccess',function(){
           $(function(){
                $("#callManager form .required input[type='text'],#callManager form .required textarea").each(function(){
                    value= $.trim($(this).val());
                    if(typeof value!=="undefined" && value!=""){
                        $(this).parents(".required").addClass("green");
                    }
                    else{
                        $(this).parents(".required").removeClass("green");
                    }
                });
            });
            $("#callManager form .required").keyup(function(){
                value= $.trim($(this).find("textarea,input[type='text']").val());
                if(typeof value!=="undefined" && value!=""){
                    $(this).addClass("green");
                }
                else{
                    $(this).removeClass("green");
                }
            });
        });
        $("#callManager form .required").keyup(function(){
            value= $.trim($(this).find("textarea,input[type='text']").val());
            if(typeof value!=="undefined" && value!=""){
                $(this).addClass("green");
            }
            else{
                $(this).removeClass("green");
            }
        });
    });
</script>
<div id="callManager" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="callManagerModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 id="callManagerModalLabel"><?=getMessage("CALL_TITLE")?></h4>
    </div>
<?=CAjax::GetForm('method="POST" class="form-horizontal"', $arResult["AJAX_ID"], '1')?>
<input type="hidden" name="ajax" value="y">
<input type="hidden" name="js" id="jstextC" value="N">
<div class="modal-body" id="<?=$arResult["AJAX_ID"]?>">
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

	<?foreach($arResult["FIELDS"] as $field_code => $field_name):?>
		<div class="control-group<?if (array_key_exists($field_code,$arResult["FIELDS_REQ"])):?> required<?endif;?>">
		<label for="PROP[<?=$field_code?>]" class="control-label"><?=$field_name?></label>
			<div class="controls">
				<?if (array_key_exists($field_code,$arResult["FIELDS_TXT"])):?>
					<textarea id="PROP[<?=$field_code?>]" placeholder="<?=$field_name?>" name="PROP[<?=$field_code?>]" rows="5" class="input-xlarge"><?=($arResult["OK"] ? "" : htmlspecialchars(strip_tags($_POST["PROP"][$field_code]),ENT_QUOTES))?></textarea>
				<?else:?>
					<input id="PROP[<?=$field_code?>]" placeholder="<?=$field_name?>" name="PROP[<?=$field_code?>]" type="text" value="<?=($arResult["OK"] ? "" : htmlspecialchars(strip_tags($_POST["PROP"][$field_code]),ENT_QUOTES))?>" class="input-large">
				<?endif?>
			</div>	
		</div>
	<?endforeach;?>
	
	
	<?if (isset($arResult["CAP_CODE"])):?>
		<div class="control-group">
			<div class="controls">
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialchars($arResult["CAP_CODE"])?>" width="180" height="40">
				<input type="hidden" name="CAPTCHA_SID" value="<?=htmlspecialchars($arResult["CAP_CODE"])?>">
			</div>
		</div>
		<div class="control-group required">
			<label class="control-label"><?=GetMessage("SIMAI_FORM_CAPTCHA_INPUT")?></label>
			<div class="controls">
					<input type="text" name="CAPTCHA_WORD" maxlength="50" value="">
			</div>
		</div>
	<?endif;?>
	
	<div class="control-group">	
		<div class="controls">
			<input type="submit" name="FB_SUBMIT_<?=$arResult["AJAX_ID"]?>" class="btn" value=" <?=GetMessage("SIMAI_FORM_SEND")?>">
		</div>
	</div>

<?if ($_POST["FB_SUBMIT_".$arResult["AJAX_ID"]] && $_POST["ajax"] == "y"):
	exit();
endif;?>	

</div>
</form>
</div>
<script>
function facechange (objName) {
if ( $(objName).css('display') == 'none' ) {
$(objName).animate({height: 'show'}, 400);
} else {
$(objName).animate({height: 'hide'}, 200);
}
}
</script>