<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
if($arParams["POPUP"]):
	//only one float div per page
	if(defined("BX_SOCSERV_POPUP"))
		return;
	define("BX_SOCSERV_POPUP", true);
?>
<div style="display:none">
<div id="bx_auth_float" class="bx-auth-float">
<?endif?>
<script type="text/javascript">
$(function(){
	soc$=$("#bx_auth_serv");
	$("input[type='submit']",soc$).addClass("button btn btn-primary btn-small");
});
</script>
<?if(($arParams["~CURRENT_SERVICE"] <> '') && $arParams["~FOR_SPLIT"] != 'Y'):?>
<script type="text/javascript">
BX.ready(function(){BxShowAuthService('<?=CUtil::JSEscape($arParams["~CURRENT_SERVICE"])?>', '<?=$arParams["~SUFFIX"]?>')});
</script>
<?endif?>
<?
if($arParams["~FOR_SPLIT"] == 'Y'):?>
<ul id="soc_tab" class="nav nav-tabs">
<?foreach($arParams["~AUTH_SERVICES"] as $service):?>
	<?
	if(($arParams["~FOR_SPLIT"] == 'Y') && (is_array($service["FORM_HTML"])))
		$onClickEvent = $service["FORM_HTML"]["ON_CLICK"];
	else
		$onClickEvent = "onclick=\"BxShowAuthService('".$service['ID']."', '".$arParams['SUFFIX']."')\"";
	?>
	<li><a title="<?=htmlspecialcharsbx($service["NAME"])?>" data-toggle="tab" href="javascript:void(0)" <?=$onClickEvent?> id="bx_auth_href_<?=$arParams["SUFFIX"]?><?=$service["ID"]?>"><i class="bx-ss-icon <?=htmlspecialcharsbx($service["ICON"])?>"></i></a></li>
<?endforeach?>
</ul>
<?endif;?>
<div class="bx-auth">
	<form method="post" name="bx_auth_services<?=$arParams["SUFFIX"]?>" target="_top" action="<?=$arParams["AUTH_URL"]?>">
		<?if($arParams["~SHOW_TITLES"] != 'N'):?>
		<p><?=GetMessage("socserv_as_user")?></p>
		<?endif;?>
		<?if($arParams["~FOR_SPLIT"] != 'Y'):?>
		<ul id="soc_tab" class="nav nav-tabs">
<?foreach($arParams["~AUTH_SERVICES"] as $service):?>
			<li><a onclick="BxShowAuthService('<?=$service["ID"]?>', '<?=$arParams["SUFFIX"]?>')" title="<?=htmlspecialcharsbx($service["NAME"])?>" data-toggle="tab" href="#bx_auth_serv_<?=$arParams["SUFFIX"]?><?=$service["ID"]?>" id="bx_auth_href_<?=$arParams["SUFFIX"]?><?=$service["ID"]?>"><i class="bx-ss-icon tab-soc <?=htmlspecialcharsbx($service["ICON"])?>"></i></a></li>
<?endforeach?>
		</ul>
		<?endif;?>
		<div class="tab-content" id="bx_auth_serv<?=$arParams["SUFFIX"]?>">
<?foreach($arParams["~AUTH_SERVICES"] as $service):?>
			<?if(($arParams["~FOR_SPLIT"] != 'Y') || (!is_array($service["FORM_HTML"]))):?>
			<div class="tab-pane" id="bx_auth_serv_<?=$arParams["SUFFIX"]?><?=$service["ID"]?>"><?=$service["FORM_HTML"]?></div>
			<?endif;?>
<?endforeach?>
		</div>
<?foreach($arParams["~POST"] as $key => $value):?>
		<?if(!preg_match("|OPENID_IDENTITY|", $key)):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endif;?>
<?endforeach?>
		<input type="hidden" name="auth_service_id" value="" />
		<?//if(!$arParams["FORIE"]):?>
	</form>
	<?//endif;?>
</div>

<?if($arParams["POPUP"]):?>
</div>
</div>
<?endif?>