<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">‡</button>
        <h4 id="myResetModalLabel"><?=getMessage("AUTH_FORGOT_TITLE")?></h4>
    </div>
    <div class="modal-body">
        <?ShowMessage($arParams["~AUTH_RESULT"]);?>
        <form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="form-horizontal">
            <?
            if (strlen($arResult["BACKURL"]) > 0)
            {
                ?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
            <?
            }
            ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="SEND_PWD">

            <div class="control-group">
                <label class="control-label" for="inputResetEmail"><?=GetMessage("AUTH_EMAIL")?></label>
                <div class="controls">
                    <input type="text" name="USER_EMAIL" maxlength="255" id="inputResetEmail" placeholder="<?=GetMessage("AUTH_EMAIL")?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputResetLogin"><?=GetMessage("AUTH_LOGIN")?></label>
                <div class="controls">
                    <input type="text" id="inputResetLogin" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="<?=GetMessage("AUTH_LOGIN")?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn"><?=GetMessage("AUTH_SEND")?></button>
                </div>
                <p class="aligncenter margintop20">
                    <?=getMessage("AUTH_FORGOT_PASSWORD_1")?>
                </p>
            </div>
        </form>
    </div>
</div>
