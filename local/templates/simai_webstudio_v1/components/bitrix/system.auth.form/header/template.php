<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arResult["FORM_TYPE"] == "login"):?>
    <div class="headnav">
        <ul>
            <li><i style="font-size:12px" class="icon-user icc"></i><a id="register_button_id" href="#mySignup" data-toggle="modal"><?=getMessage("AUTH_REGISTER");?></a></li>
            <li><a id="login_button_id" href="#mySignin" data-toggle="modal"><?=getMessage("AUTH_LOGIN_BUTTON")?></a></li>
        </ul>
    </div>
    <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">‡</button>
            <h4 id="mySigninModalLabel"><?=getMessage("LOGIN_ACCAUNT");?></h4>
        </div>
        <div class="modal-body">
            <?
            if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']):
                if($_POST["TYPE"]=="AUTH")ShowMessage($arResult['ERROR_MESSAGE']);
                ?>
                <script type="text/javascript">
                    $(function(){
                        <?if($_POST["TYPE"]=="REGISTRATION"):?>
                        $("#body_register_id").prepend('<p><font style="color: red;"><?=$arResult['ERROR_MESSAGE']['MESSAGE']?></font></p>');
                        $("#register_button_id").trigger("click");
                         <?else:?>
                        $("#login_button_id").trigger("click");
                        <?endif?>

                    })
                </script>
            <?
            endif;
            ?>
            <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="form-horizontal">
                <?if($arResult["BACKURL"] <> ''):?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <?endif?>
                <?foreach ($arResult["POST"] as $key => $value):?>
                    <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                <?endforeach?>
                <input type="hidden" name="AUTH_FORM" value="Y" />
                <input type="hidden" name="TYPE" value="AUTH" />
                <div class="control-group">
                    <label class="control-label" for="inputText"><?=GetMessage("AUTH_LOGIN")?></label>
                    <div class="controls">
                        <input type="text" id="inputText" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" size="17" placeholder="<?=GetMessage("AUTH_LOGIN")?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputSigninPassword"><?=GetMessage("AUTH_PASSWORD")?></label>
                    <div class="controls">
                        <input type="password" name="USER_PASSWORD" maxlength="50" size="17" id="inputSigninPassword" placeholder="<?=GetMessage("AUTH_PASSWORD")?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputSigninRemember"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
                    <div class="controls">
                        <input type="checkbox" id="USER_REMEMBER_frm" id="inputSigninRemember" name="USER_REMEMBER" value="Y" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn"><?=GetMessage("AUTH_LOGIN_BUTTON")?></button>
                    </div>
                    <p class="aligncenter margintop20">
                        <?=getMessage("AUTH_FORGOT_PASSWORD_2")?> <a href="#myReset" id="forgot_button_id" data-dismiss="modal" aria-hidden="true" data-toggle="modal"><?=getMessage("AUTH_FORGOT_PASSWORD_SHORT")?></a>
                    </p>
                </div>
            </form>
			<?if($arResult["AUTH_SERVICES"]):?>
        <div class="control-group">
            <table>
                <tr>
                    <td colspan="2">
                        <?
                        $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                            array(
                                "AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
                                "SUFFIX"=>"form",
                            ),
                            $component,
                            array("HIDE_ICONS"=>"Y")
                        );
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <?
        $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
            array(
                "AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
                "AUTH_URL"=>$arResult["AUTH_URL"],
                "POST"=>$arResult["POST"],
                "POPUP"=>"Y",
                "SUFFIX"=>"form",
            ),
            $component,
            array("HIDE_ICONS"=>"Y")
        );
        ?>
    <?endif?>

        </div>
    </div>
    
<?
//if($arResult["FORM_TYPE"] == "login")
else:
?>
    <div class="headnav">
        <form action="<?=$arResult["AUTH_URL"]?>">
        <ul>
            <li><i style=" font-size:12px" class="icon-user icc"></i> <a id="umenu" rel="popover" title="<?=GetMessage("AUTH_PROFILE")?>">

<?=($arResult["USER_NAME"]?$arResult["USER_NAME"]:$arResult["USER_LOGIN"])?></a>


</li>
            <li><input type="hidden" name="logout" value="yes" />
                    <input type="submit" class="btn btn-inverse" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" /></li>
        </ul>
            </form>
    </div>
<?endif?>
<?if($arParams["URL_PERSONAL"] || $arParams["URL_BASKET"] || $arParams["URL_ORDER"] || $arParams["URL_SUBSCRIBE"]):?>
<div id="popover_content_wrapper" style="display:none;"><nav>
<ul class="list">
<?if($arParams["URL_PERSONAL"]):?>
<li><i class="icon-angle-right"></i><a href="<?=$arParams["URL_PERSONAL"]?>"><?=getMessage("URL_PERSONAL")?></a></li>
<?endif;?>
<?if($arParams["URL_BASKET"]):?>
<li><i class="icon-angle-right"></i><a href="<?=$arParams["URL_BASKET"]?>"><?=getMessage("URL_BASKET")?></a></li>
<?endif;?>
<?if($arParams["URL_ORDER"]):?>
<li><i class="icon-angle-right"></i><a href="<?=$arParams["URL_ORDER"]?>"><?=getMessage("URL_ORDER")?></a></li>
<?endif;?>
<?if($arParams["URL_SUBSCRIBE"]):?>
<li><i class="icon-angle-right"></i><a href="<?=$arParams["URL_SUBSCRIBE"]?>"><?=getMessage("URL_SUBSCRIBE")?></a></li>
<?endif;?>
</ul>
</nav></div>
<?endif?>
<script>
$('#umenu').popover({placement:'bottom',
html : true, 
content: function() {
      return $('#popover_content_wrapper').html();
    }



});

$('body').on('click', function (e) {
    $('#umenu').each(function () {
        //the 'is' for buttons that triggers popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});
</script>
