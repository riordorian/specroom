<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?> 
<div>Телефон: <a href="tel:+74852685693" class="">+7 (4852) 68-56-93</a></div>
 
<div>E-mail:<a href="mailto:specroom@yandex.ru ">specroom@yandex.ru </a></div>
 
<div> 
  <br />
 </div>
 <?$APPLICATION->IncludeComponent("simai:form.feedback.ajax", "contact", array(
	"IBLOCK_TYPE" => "simai_service",
	"IBLOCK_ID" => "8",
	"EMAIL" => "specroom@yandex.ru ",
	"EMAIL_SUBJ" => "Новое обращение",
	"OK_MSG" => "Ваше сообщение успешно отправлено",
	"USE_CAPTCHA" => "N"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>