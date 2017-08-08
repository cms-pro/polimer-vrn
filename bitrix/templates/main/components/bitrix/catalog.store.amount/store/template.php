<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

	<div class="tab-row cl head">
		<div class="tab-cell">Адрес \ Телефон</div>
		<div class="tab-cell">Наличие</div>
		<div class="tab-cell">Забрать</div>
		<div class="tab-cell">Режим работы</div>
	</div>


<?foreach($arResult["STORES"] as $pid => $arProperty):?>
	<div class="tab-row cl">
		<div class="tab-cell">
			 <?=$arProperty["TITLE"]?><span><?=$arProperty["PHONE"]?></span>email:<a href="#"><?=$arProperty["EMAIL"]?></a></div>
		<div class="tab-cell">
			<div class="mtn">Наличие</div>

            <div class="qbar cl">
			<!--Условия остатка на складе-->
				<? $str_count = '';?>
				<? if($arProperty["AMOUNT"] => 50):
					$str_count = 'Много';
					?>
				   <span class="green"></span>
				   <span class="green"></span>
				   <span class="green"></span>
				   <span class="green"></span>
				   <span class="green"></span>
				<? elseif($arProperty["AMOUNT"] =< 10):
					$str_count = 'Мало';
					?>
					<span class="red"></span>
					<span class="red"></span>
				<? elseif($arProperty["AMOUNT"] < 50):
					$str_count = 'Достаточно';
					?>
					<span class="yellow"></span>
					<span class="yellow"></span>
					<span class="yellow"></span>
				<? endif; ?>
			<!--Условия остатка на складе END-->

            </div>
            <div class="q"><?=$str_count;?></div>

		</div>
		<div class="tab-cell">
			<div class="mtn">Забрать</div>
			<div class="when">Сегодня</div>
			<div class="time"></div>
		</div>
		<div class="tab-cell"><div class="mtn">Режим работы</div><?=$arProperty["SCHEDULE"]?></div>
	</div>

	<?endforeach;?>






<?if (isset($arResult["IS_SKU"]) && $arResult["IS_SKU"] == 1):?>
	<script type="text/javascript">
		var obStoreAmount = new JCCatalogStoreSKU(<? echo CUtil::PhpToJSObject($arResult['JS'], false, true, true); ?>);
	</script>
	<?
endif;?>