<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>


<?if(!empty($arResult["ERROR_MESSAGE"])){?>
	<div class="popup" id="<?=$arParams["IBLOCK_TYPE"].$arParams["IBLOCK_ID"].'ERROR'?>" style="display: block;left: 33%;min-width: 500px;">
		<a href="#" class="close">&nbsp;</a>
		<div class="title"></div>
		<div class="subtitle">
			<?
			foreach ($arResult["ERROR_MESSAGE"] as $v)
				ShowError($v);
			?>
		</div>
	</div>
<?}?>

<?if(strlen($arResult["OK_MESSAGE"]) > 0){?>
	<div class="popup" id="<?=$arParams["IBLOCK_TYPE"].$arParams["IBLOCK_ID"].'OK'?>" style="display: block;left: 33%;min-width: 500px;">
		<a href="#" class="close">&nbsp;</a>
		<div class="title"></div>
		<div class="subtitle">
			<div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
		</div>
	</div>
<?}?>


<div class="popup" id="order-product" style="left: 33%;min-width: 500px;">
	<a href="#" class="close">&nbsp;</a>
	<div class="title">Товар под заказ</div>
	<div class="subtitle">Укажите ваши данные и наши менеджеры свяжуться с вами для оформления заказа</div>
	<form action="<?=POST_FORM_ACTION_URI?>" method="POST" enctype="multipart/form-data">
		<?=bitrix_sessid_post()?>
		<fieldset>

			<? foreach($arResult['USER_FIELD'] as $field):?>

				<?if($field['PROPERTY_TYPE'] == "S"):?>

					<span class="line cl">
     					<span class="label"><?=$field['NAME']?></span>
     					<span class="value"><input type="text" name="<?=$field['CODE']?>" value="<?=$arResult[$field['CODE']]?>"/></span>
     				</span>



				<? elseif($field['PROPERTY_TYPE'] == "L"):?>
				<div class="rule">
						<input type="checkbox" class="fio" name="<?=$field['CODE']?>" value="Y" checked>
				<span>
					Я прочитал правила
					<a href="#" class="show-popup" data-id="<?=$arParams["IBLOCK_TYPE"].$arParams["IBLOCK_ID"]?>">Правила</a>
					и даю свое согласие на обработку персональных данных
				</span>
				</div>
				<? endif; ?>

			<? endforeach; ?>

			<?if($arParams["USE_CAPTCHA"] == "Y"):?>
				<div class="mf-captcha">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
					<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
					<input type="text" name="captcha_word" size="30" maxlength="50" value="">
				</div>
			<?endif;?>


			<span class="line submit">
				<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
				<input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
			</span>


		</fieldset>
	</form>
</div>


<div class="popup" id="<?=$arParams["IBLOCK_TYPE"].$arParams["IBLOCK_ID"]?>" style="display: none;left: 33%">
	<a href="#" class="close">&nbsp;</a>
	<div class="title"></div>
	<div class="subtitle">
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/include/rule.php"
			)
		);?>
	</div>
</div>