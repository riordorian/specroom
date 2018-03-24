<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (strlen($arResult["PAGE_URL"]) > 0):

	?>
<div class="bookmarkers">
		<? if (is_array($arResult["BOOKMARKS"]) && count($arResult["BOOKMARKS"]) > 0): ?>	
			<?
			foreach($arResult["BOOKMARKS"] as $name => $arBookmark)
			{
				?><div class="icon"><?=$arBookmark["ICON"]?></div><?
			}
			?>
		<?endif;?>
	</div>
	<?
endif;
?>