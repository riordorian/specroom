<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">‡</button>
        <h4 id="mySignupModalLabel"><?=getMessage("CREATE_ACCOUNT");?></h4>
    </div>
    <div id="body_register_id" class="modal-body">
        <?
        ShowMessage($arParams["~AUTH_RESULT"]);
        ?>
        <form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" class="form-horizontal">
            <?
            if (strlen($arResult["BACKURL"]) > 0)
            {
                ?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
            <?
            }
            ?>
            <input type="hidden" name="AUTH_FORM" value="Y" />
            <input type="hidden" name="TYPE" value="REGISTRATION" />
            <div class="control-group">
                <label class="control-label" for="inputName"><?=getMessage("AUTH_NAME")?></label>
                <div class="controls">
                    <input type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" id="inputName" placeholder="<?=getMessage("AUTH_NAME")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLastName"><?=getMessage("AUTH_LAST_NAME")?></label>
                <div class="controls">
                    <input type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" id="inputLastName" placeholder="<?=getMessage("AUTH_LAST_NAME")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLogin"><?=getMessage("AUTH_LOGIN_MIN")?><span class="starrequired">*</span></label>
                <div class="controls">
                    <input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" id="inputLogin" placeholder="<?=getMessage("AUTH_LOGIN_MIN")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail"><?=getMessage("AUTH_EMAIL")?><span class="starrequired">*</span></label>
                <div class="controls">
                    <input type="text"  name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" id="inputEmail" placeholder="<?=getMessage("AUTH_EMAIL")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputSignupPassword"><?=GetMessage("AUTH_PASSWORD_REQ")?><span class="starrequired">*</span></label>
                <div class="controls">
                    <input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" id="inputSignupPassword" placeholder="<?=GetMessage("AUTH_PASSWORD_REQ")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputSignupPassword2"><?=GetMessage("AUTH_CONFIRM")?><span class="starrequired">*</span></label>
                <div class="controls">
                    <input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" id="inputSignupPassword2" placeholder="<?=GetMessage("AUTH_CONFIRM")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputCaptcha"><?=GetMessage("CAPTCHA_REGF_PROMT")?><span class="starrequired">*</span></label>
                <div class="controls">
                    <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="220" height="49" alt="CAPTCHA" />
                    <div style="height: 20px;"></div>
                    <input type="text" name="captcha_word" id="inputCaptcha" maxlength="50" value="" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn"><?=GetMessage("AUTH_REGISTER")?></button>
                </div>
                <p class="aligncenter margintop20">
                    <?=getMessage("HAVE_ACCOUNT")?>? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal"><?=getMessage("SING_IN")?></a>
                </p>
            </div>
        </form>
    </div>
</div>