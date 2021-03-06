<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
if($arResult["ITEMS"]):
?>
<div class="h2"><?=$arParams['PAGER_TITLE']?></div>
<div class="slider_product_show_all slider_product" id="mp__product__action">

	<?foreach($arResult["ITEMS"] as $arItem): ?>
	<div>
		<div class="product">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="display: block;height: 120px">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" style="max-height: 110px;margin: 0 auto;" class="img">
			</a>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
			<div class="price">
				<span><?=price($arItem['ID']);?></span> &#8381;/<?=$arItem['PROPERTIES']['CML2_BASE_UNIT']['VALUE'];?>
			</div>
			<?if(!price($arItem['ID'])){
				print '<span class="noprice" style="font-size: 11px;margin: 17px 0">Цену уточняйте у менеджера</span>';
			}?>
			
			<? if((float)price($arItem['ID'])): ?>
				<a href="javascript:void(0)" onclick="addToBasket2(<?=$arItem['ID']?>,1,this);" class="cart">В корзину</a>
			<? else: ?>
				<a href="javascript:void(0)" class="cart show-popup" data-id="order-product">под заказ</a>
			<? endif; ?>
		</div>
	</div>
	<? endforeach; ?>


</div><!-- end::slider_product -->
<? endif; ?>
