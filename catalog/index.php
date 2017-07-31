<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>

<?
if(empty($_REQUEST['PAGE_ELEMENT_COUNT'])){
	$_REQUEST['PAGE_ELEMENT_COUNT'] = 20;
}
if(empty($_REQUEST['ELEMENT_SORT_FIELD'])){
	$_REQUEST['ELEMENT_SORT_FIELD'] = "shows";
	$_REQUEST['ELEMENT_SORT_ORDER'] = "desc";
}
if($_REQUEST['ELEMENT_SORT_FIELD'] == "CATALOG_AVAILABLE" OR $_REQUEST['ELEMENT_SORT_FIELD'] == "shows"){
	$_REQUEST['ELEMENT_SORT_ORDER'] = "desc";
}

?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"catalog", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPONENT_TEMPLATE" => "catalog",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "H",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "USTANOVOCHNYY_DIAMETR_MM",
			1 => "YEMKOST_GIDROAKKUMULYATORA_L",
			2 => "TEPLOVAYA_OTDACHA_ODNOY_SEKTSII_VT",
			3 => "PROIZVODITELNOST_M3_CH",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "OTAPLIVAEMOE_POMESHCHENIE_M_KUB",
			7 => "CML2_MANUFACTURER",
			8 => "CML2_TRAITS",
			9 => "CML2_TAXES",
			10 => "CML2_ATTRIBUTES",
			11 => "CML2_BAR_CODE",
			12 => "MAKS_GLUBINA_POGRUZHENIYA_M",
			13 => "RAZMER_PROFILYA_MM",
			14 => "NEOBKHODIMOST_OBSLUZHIVANIYA_ZIMOY",
			15 => "NAIMENOVANIE_SAYT02",
			16 => "UROVEN_SHUMA_DB",
			17 => "ALTERNATOR_",
			18 => "VOZMOZHNOE_PODKLYUCHENIE",
			19 => "GLUBINA_PROPILA_STAL_DREVESINA_MM",
			20 => "KOLEROVKA",
			21 => "VES_KG",
			22 => "TSVET",
			23 => "VNUTRENNIY_BAK",
			24 => "DIAPAZON_ZAKREPLYAEMYKH_SVERL_MM",
			25 => "NOMINALNYY_RASKHOD_M3_CHAS",
			26 => "VES_SNEGOVOGO_POKROVA_KG_KV_M",
			27 => "TOLSHCHINA_IZOLYATSII",
			28 => "RASKHOD_PRI_RABOTE_SHPATELEM_6KH6_MM_KG_KV_M",
			29 => "MAKS_RASKHOD_TOPLIVA_L_CHAS",
			30 => "DIAMETR_PODKL_KONTURA_OTOPLENIYA_DYUYM",
			31 => "EMKOST_SEKTSII_L",
			32 => "YEMKOST_AKKUMULYATORA_A_CH",
			33 => "ENERGIYA_UDARA_DZH",
			34 => "PROIZVODITEL",
			35 => "DIAMETR_USLOVNOGO_PROKHODA_MM",
			36 => "SVAROCHNYY_TOK_MIN_A",
			37 => "DIAMETR_DISKA_KRUGA_MM",
			38 => "TIP_PATRONA",
			39 => "TOLSHCHINA_SLOYA_MM",
			40 => "RAZMER_YACHEEK_FILTRA_MKM",
			41 => "GRUZOPODEMNOST_KG",
			42 => "PRIMENENIE",
			43 => "DIAPAZON_IZMERENIYA_DAVLENIYA_BAR",
			44 => "MAKSIMALNAYA_TEMPERATURA_S",
			45 => "MAKS_DIAM_SVERLENIYA_STAL_DREVESINA_BETON_MM",
			46 => "SHIRINA_MM",
			47 => "VID_IZDELIYA",
			48 => "MOROZOSTOYKOST",
			49 => "VREMYA_ZARYADKI_AKKUMULYATORA_CH",
			50 => "VYSOTA_MM",
			51 => "DIAPAZON_VKHODNOGO_NAPRYAZHENIYA_V",
			52 => "DIAMETR_PODKL_KONTURA_GORYACHEY_VODY_DYUYM",
			53 => "DIAMETR_VKHODNOGO_OTVERSTIYA_DYUYM",
			54 => "PROCHNOST_STSEPLENIYA",
			55 => "TEPLOSTOYKOST_S_NE_MENEE",
			56 => "TIP_POKRYTIYA_VERKH_NIZ",
			57 => "MAKS_KRUTYASHCHIY_MOMENT_N_M",
			58 => "VYSOTA_VSASYVANIYA_M",
			59 => "MEZHOSEVOE_RASSTOYANIE_MM",
			60 => "DIAMETR_PODKL_DYMOKHODA_MM",
			61 => "RABOCHEE_DAVLENIE_ATM",
			62 => "RAZMERY_SEKTSII_V_X_G_X_SH_MM",
			63 => "VNESHNIY_DIAMETR_V_MM_STALNYE_MEDNYE_TRUBY",
			64 => "MEZHPOVEROCHNYY_INTERVAL_LET",
			65 => "VREMYA_VYSYKHANIYA",
			66 => "SVAROCHNYY_TOK_MAX_A",
			67 => "TOLSHCHINA_PROFILYA_MM",
			68 => "TEMPERATURA_TEPLONOSITELYA_C",
			69 => "GARANTIYA_NA_VNUTRENNIY_BAK",
			70 => "ULTRAFIOLETOVAYA_ZASHCHITA",
			71 => "RASKHOD_NA_ODIN_SLOY",
			72 => "NAPRYAZHENIE_AKKUMULYATORA_V",
			73 => "RAZMERY_MM",
			74 => "TEMPERATURA_VOZGARANIYA_C",
			75 => "PROIZVODITELNOST_L_MIN",
			76 => "PRISOEDINENIE_DYUYM",
			77 => "DIAMETR_NASOSNOY_CHASTI_DYUYM",
			78 => "TIP_KAMERY_SGORANIYA",
			79 => "NAZNACHENIE",
			80 => "OBEM_MASLYANOGO_BAKA_L",
			81 => "TIP",
			82 => "POVERKHNOST",
			83 => "RASKHOD_TOPLIVA_G_KVTCH",
			84 => "KLASS_TOCHNOSTI",
			85 => "DEFORMATSIONNAYA_TEPLOSTOYKOST_C",
			86 => "CHASTOTA_UDAROV_UDAR_MIN",
			87 => "NAIMENOVANIE_SAYT01",
			88 => "TOLSHCHINA_STENKI_MM",
			89 => "UDERZHIVAEMYY_VES_KG_KV_M",
			90 => "TIP_AKKUMULYATORA",
			91 => "RASKHOD_MASLA_G_KVTCH",
			92 => "PODKLYUCHENIE_DYUYM",
			93 => "TEPLOOBMENNIK_",
			94 => "NOMINALNYY_TOK_A",
			95 => "MINIMALNYY_IZMERYAEMYY_RASKHOD_QMIN_M3_CH",
			96 => "ISPOLNENIE",
			97 => "GLUBINA_PROPILA_POD_UGLOM_90_45_MM",
			98 => "MOSHCHNOST_KVT",
			99 => "SVETOPRONITSAEMOST",
			100 => "CHASTOTA_KHODOV_KHOD_MIN",
			101 => "STEPEN_BLESKA",
			102 => "TEMPERATURA_PEREKACHIVAEMOY_ZHIDKOSTI_S",
			103 => "VREMYA_VYSYKHANIYA_CH",
			104 => "PROGRAMMIROVANIE",
			105 => "TIP_ROZZHIGA",
			106 => "MINIMALNYY_RADIUS_IZGIBA_DLYA_AROK_MM",
			107 => "SROK_EKSPLUATATSII_",
			108 => "TIP_POKRYTIYA",
			109 => "DYUYMY_STALNYE_MEDNYE_TRUBY",
			110 => "TSVET_1",
			111 => "GLUBINA_MM",
			112 => "GARANTIYA",
			113 => "NAIMENOVANIE_SAYT03",
			114 => "CHASTOTA_VRASHCHENIYA_OB_MIN",
			115 => "ZHIZNESPOSOBNOST_RASTVORA",
			116 => "VREMYA_UKLADKI_PLITKI_MIN",
			117 => "OBEM_DVIGATELYA_KUB_SM",
			118 => "MAKSIMALNYY_IZMERYAEMYY_RASKHOD_QMAKS_M3_CH",
			119 => "RASKHOD_PRI_10_MM_KG_KV_M",
			120 => "DIAMETR_LESKI_MM",
			121 => "MASSA_KG_KV_M_NE_MENEE",
			122 => "ENERGOPOTREBLENIE_NA_KV_M_VT_CH",
			123 => "NAPOR_M_VOD_ST_",
			124 => "UDELNYY_VES_KG_KV_M",
			125 => "RABOCHAYA_SREDA",
			126 => "REGULIROVKA_KRUTYASHCHEGO_MOMENTA",
			127 => "RABOCHEE_DAVLENIE",
			128 => "MOSHCHNOST_VT",
			129 => "NAPRYAZHENIE_SETI_V",
			130 => "TIP_POVERKHNOSTI",
			131 => "VREMYA_DO_PESHEGO_KHOZHDENIYA_CH",
			132 => "DIAMETR_PODKL_GAZOPROVODA_DYUYM",
			133 => "DIAMETR_MM",
			134 => "YEMKOST_TOPLIVNOGO_BAKA_L",
			135 => "REKOMENDUEMYY_DIAMETR_BURENIYA_MM",
			136 => "KARKAS",
			137 => "RASSTOYANIE_MEZHDU_RYEBRAMI_ZHYESTKOSTI_MM",
			138 => "TIP_KOTLA",
			139 => "DAVLENIE_BAR",
			140 => "MAKSIMALNOE_DAVLENIE_BAR",
			141 => "DIAMETR_TRUBY_DYUYM",
			142 => "DIAPAZON_IZMERENIYA_TEMPERATURY_S",
			143 => "DLINA_OBORUDOVANIYA_MM",
			144 => "USL_PROKHOD_V_MM_STALNYE_MEDNYE_TRUBY",
			145 => "VREMYA_KORREKTIROVKI_PLITKI_MIN",
			146 => "OBYEM_L",
			147 => "MAKS_DIAM_SVERLENIYA_BUROM_MM",
			148 => "RABOCHAYA_TEMPERATURA_C",
			149 => "DLINA_KABELYA_M",
			150 => "VREMYA_NAGREVA_NA_45_C_MIN",
			151 => "VODA",
			152 => "TIP_POLIROVKI",
			153 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => $_REQUEST["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_FIELD2" => "shows",
		"ELEMENT_SORT_ORDER" => $_REQUEST["ELEMENT_SORT_ORDER"],
		"ELEMENT_SORT_ORDER2" => "asc",
		"FILTER_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"FILTER_NAME" => "",
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DETAIL_TEXT",
			2 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "CML2_BASE_UNIT",
			2 => "CML2_MANUFACTURER",
			3 => "CML2_TRAITS",
			4 => "CML2_TAXES",
			5 => "CML2_ATTRIBUTES",
			6 => "CML2_BAR_CODE",
			7 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "SITE",
			1 => "РОЗНИЦА",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "USTANOVOCHNYY_DIAMETR_MM",
			1 => "YEMKOST_GIDROAKKUMULYATORA_L",
			2 => "TEPLOVAYA_OTDACHA_ODNOY_SEKTSII_VT",
			3 => "PROIZVODITELNOST_M3_CH",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "OTAPLIVAEMOE_POMESHCHENIE_M_KUB",
			7 => "CML2_MANUFACTURER",
			8 => "CML2_TRAITS",
			9 => "CML2_TAXES",
			10 => "CML2_ATTRIBUTES",
			11 => "CML2_BAR_CODE",
			12 => "MAKS_GLUBINA_POGRUZHENIYA_M",
			13 => "RAZMER_PROFILYA_MM",
			14 => "NEOBKHODIMOST_OBSLUZHIVANIYA_ZIMOY",
			15 => "NAIMENOVANIE_SAYT02",
			16 => "UROVEN_SHUMA_DB",
			17 => "ALTERNATOR_",
			18 => "VOZMOZHNOE_PODKLYUCHENIE",
			19 => "GLUBINA_PROPILA_STAL_DREVESINA_MM",
			20 => "KOLEROVKA",
			21 => "VES_KG",
			22 => "TSVET",
			23 => "VNUTRENNIY_BAK",
			24 => "DIAPAZON_ZAKREPLYAEMYKH_SVERL_MM",
			25 => "NOMINALNYY_RASKHOD_M3_CHAS",
			26 => "VES_SNEGOVOGO_POKROVA_KG_KV_M",
			27 => "TOLSHCHINA_IZOLYATSII",
			28 => "RASKHOD_PRI_RABOTE_SHPATELEM_6KH6_MM_KG_KV_M",
			29 => "MAKS_RASKHOD_TOPLIVA_L_CHAS",
			30 => "DIAMETR_PODKL_KONTURA_OTOPLENIYA_DYUYM",
			31 => "EMKOST_SEKTSII_L",
			32 => "YEMKOST_AKKUMULYATORA_A_CH",
			33 => "ENERGIYA_UDARA_DZH",
			34 => "PROIZVODITEL",
			35 => "DIAMETR_USLOVNOGO_PROKHODA_MM",
			36 => "SVAROCHNYY_TOK_MIN_A",
			37 => "DIAMETR_DISKA_KRUGA_MM",
			38 => "TIP_PATRONA",
			39 => "TOLSHCHINA_SLOYA_MM",
			40 => "RAZMER_YACHEEK_FILTRA_MKM",
			41 => "GRUZOPODEMNOST_KG",
			42 => "PRIMENENIE",
			43 => "DIAPAZON_IZMERENIYA_DAVLENIYA_BAR",
			44 => "MAKSIMALNAYA_TEMPERATURA_S",
			45 => "MAKS_DIAM_SVERLENIYA_STAL_DREVESINA_BETON_MM",
			46 => "SHIRINA_MM",
			47 => "VID_IZDELIYA",
			48 => "MOROZOSTOYKOST",
			49 => "VREMYA_ZARYADKI_AKKUMULYATORA_CH",
			50 => "VYSOTA_MM",
			51 => "DIAPAZON_VKHODNOGO_NAPRYAZHENIYA_V",
			52 => "DIAMETR_PODKL_KONTURA_GORYACHEY_VODY_DYUYM",
			53 => "DIAMETR_VKHODNOGO_OTVERSTIYA_DYUYM",
			54 => "PROCHNOST_STSEPLENIYA",
			55 => "TEPLOSTOYKOST_S_NE_MENEE",
			56 => "TIP_POKRYTIYA_VERKH_NIZ",
			57 => "MAKS_KRUTYASHCHIY_MOMENT_N_M",
			58 => "VYSOTA_VSASYVANIYA_M",
			59 => "MEZHOSEVOE_RASSTOYANIE_MM",
			60 => "DIAMETR_PODKL_DYMOKHODA_MM",
			61 => "RABOCHEE_DAVLENIE_ATM",
			62 => "RAZMERY_SEKTSII_V_X_G_X_SH_MM",
			63 => "VNESHNIY_DIAMETR_V_MM_STALNYE_MEDNYE_TRUBY",
			64 => "MEZHPOVEROCHNYY_INTERVAL_LET",
			65 => "VREMYA_VYSYKHANIYA",
			66 => "SVAROCHNYY_TOK_MAX_A",
			67 => "TOLSHCHINA_PROFILYA_MM",
			68 => "TEMPERATURA_TEPLONOSITELYA_C",
			69 => "GARANTIYA_NA_VNUTRENNIY_BAK",
			70 => "ULTRAFIOLETOVAYA_ZASHCHITA",
			71 => "RASKHOD_NA_ODIN_SLOY",
			72 => "NAPRYAZHENIE_AKKUMULYATORA_V",
			73 => "RAZMERY_MM",
			74 => "TEMPERATURA_VOZGARANIYA_C",
			75 => "PROIZVODITELNOST_L_MIN",
			76 => "PRISOEDINENIE_DYUYM",
			77 => "DIAMETR_NASOSNOY_CHASTI_DYUYM",
			78 => "TIP_KAMERY_SGORANIYA",
			79 => "NAZNACHENIE",
			80 => "OBEM_MASLYANOGO_BAKA_L",
			81 => "TIP",
			82 => "POVERKHNOST",
			83 => "RASKHOD_TOPLIVA_G_KVTCH",
			84 => "KLASS_TOCHNOSTI",
			85 => "DEFORMATSIONNAYA_TEPLOSTOYKOST_C",
			86 => "CHASTOTA_UDAROV_UDAR_MIN",
			87 => "NAIMENOVANIE_SAYT01",
			88 => "TOLSHCHINA_STENKI_MM",
			89 => "UDERZHIVAEMYY_VES_KG_KV_M",
			90 => "TIP_AKKUMULYATORA",
			91 => "RASKHOD_MASLA_G_KVTCH",
			92 => "PODKLYUCHENIE_DYUYM",
			93 => "TEPLOOBMENNIK_",
			94 => "NOMINALNYY_TOK_A",
			95 => "MINIMALNYY_IZMERYAEMYY_RASKHOD_QMIN_M3_CH",
			96 => "ISPOLNENIE",
			97 => "GLUBINA_PROPILA_POD_UGLOM_90_45_MM",
			98 => "MOSHCHNOST_KVT",
			99 => "SVETOPRONITSAEMOST",
			100 => "CHASTOTA_KHODOV_KHOD_MIN",
			101 => "STEPEN_BLESKA",
			102 => "TEMPERATURA_PEREKACHIVAEMOY_ZHIDKOSTI_S",
			103 => "VREMYA_VYSYKHANIYA_CH",
			104 => "PROGRAMMIROVANIE",
			105 => "TIP_ROZZHIGA",
			106 => "MINIMALNYY_RADIUS_IZGIBA_DLYA_AROK_MM",
			107 => "SROK_EKSPLUATATSII_",
			108 => "TIP_POKRYTIYA",
			109 => "DYUYMY_STALNYE_MEDNYE_TRUBY",
			110 => "TSVET_1",
			111 => "GLUBINA_MM",
			112 => "GARANTIYA",
			113 => "NAIMENOVANIE_SAYT03",
			114 => "CHASTOTA_VRASHCHENIYA_OB_MIN",
			115 => "ZHIZNESPOSOBNOST_RASTVORA",
			116 => "VREMYA_UKLADKI_PLITKI_MIN",
			117 => "OBEM_DVIGATELYA_KUB_SM",
			118 => "MAKSIMALNYY_IZMERYAEMYY_RASKHOD_QMAKS_M3_CH",
			119 => "RASKHOD_PRI_10_MM_KG_KV_M",
			120 => "DIAMETR_LESKI_MM",
			121 => "MASSA_KG_KV_M_NE_MENEE",
			122 => "ENERGOPOTREBLENIE_NA_KV_M_VT_CH",
			123 => "NAPOR_M_VOD_ST_",
			124 => "UDELNYY_VES_KG_KV_M",
			125 => "RABOCHAYA_SREDA",
			126 => "REGULIROVKA_KRUTYASHCHEGO_MOMENTA",
			127 => "RABOCHEE_DAVLENIE",
			128 => "MOSHCHNOST_VT",
			129 => "NAPRYAZHENIE_SETI_V",
			130 => "TIP_POVERKHNOSTI",
			131 => "VREMYA_DO_PESHEGO_KHOZHDENIYA_CH",
			132 => "DIAMETR_PODKL_GAZOPROVODA_DYUYM",
			133 => "DIAMETR_MM",
			134 => "YEMKOST_TOPLIVNOGO_BAKA_L",
			135 => "REKOMENDUEMYY_DIAMETR_BURENIYA_MM",
			136 => "KARKAS",
			137 => "RASSTOYANIE_MEZHDU_RYEBRAMI_ZHYESTKOSTI_MM",
			138 => "TIP_KOTLA",
			139 => "DAVLENIE_BAR",
			140 => "MAKSIMALNOE_DAVLENIE_BAR",
			141 => "DIAMETR_TRUBY_DYUYM",
			142 => "DIAPAZON_IZMERENIYA_TEMPERATURY_S",
			143 => "DLINA_OBORUDOVANIYA_MM",
			144 => "USL_PROKHOD_V_MM_STALNYE_MEDNYE_TRUBY",
			145 => "VREMYA_KORREKTIROVKI_PLITKI_MIN",
			146 => "OBYEM_L",
			147 => "MAKS_DIAM_SVERLENIYA_BUROM_MM",
			148 => "RABOCHAYA_TEMPERATURA_C",
			149 => "DLINA_KABELYA_M",
			150 => "VREMYA_NAGREVA_NA_45_C_MIN",
			151 => "VODA",
			152 => "TIP_POLIROVKI",
			153 => "",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "N",
		"INSTANT_RELOAD" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "UF_BROWSER_TITLE",
		"LIST_META_DESCRIPTION" => "UF_META_DESCRIPTION",
		"LIST_META_KEYWORDS" => "UF_KEYWORDS",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "5",
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "USTANOVOCHNYY_DIAMETR_MM",
			1 => "YEMKOST_GIDROAKKUMULYATORA_L",
			2 => "TEPLOVAYA_OTDACHA_ODNOY_SEKTSII_VT",
			3 => "PROIZVODITELNOST_M3_CH",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "OTAPLIVAEMOE_POMESHCHENIE_M_KUB",
			7 => "CML2_MANUFACTURER",
			8 => "CML2_TRAITS",
			9 => "CML2_TAXES",
			10 => "CML2_ATTRIBUTES",
			11 => "CML2_BAR_CODE",
			12 => "MAKS_GLUBINA_POGRUZHENIYA_M",
			13 => "RAZMER_PROFILYA_MM",
			14 => "NEOBKHODIMOST_OBSLUZHIVANIYA_ZIMOY",
			15 => "NAIMENOVANIE_SAYT02",
			16 => "UROVEN_SHUMA_DB",
			17 => "ALTERNATOR_",
			18 => "VOZMOZHNOE_PODKLYUCHENIE",
			19 => "GLUBINA_PROPILA_STAL_DREVESINA_MM",
			20 => "KOLEROVKA",
			21 => "VES_KG",
			22 => "TSVET",
			23 => "VNUTRENNIY_BAK",
			24 => "DIAPAZON_ZAKREPLYAEMYKH_SVERL_MM",
			25 => "NOMINALNYY_RASKHOD_M3_CHAS",
			26 => "VES_SNEGOVOGO_POKROVA_KG_KV_M",
			27 => "TOLSHCHINA_IZOLYATSII",
			28 => "RASKHOD_PRI_RABOTE_SHPATELEM_6KH6_MM_KG_KV_M",
			29 => "MAKS_RASKHOD_TOPLIVA_L_CHAS",
			30 => "DIAMETR_PODKL_KONTURA_OTOPLENIYA_DYUYM",
			31 => "EMKOST_SEKTSII_L",
			32 => "YEMKOST_AKKUMULYATORA_A_CH",
			33 => "ENERGIYA_UDARA_DZH",
			34 => "PROIZVODITEL",
			35 => "DIAMETR_USLOVNOGO_PROKHODA_MM",
			36 => "SVAROCHNYY_TOK_MIN_A",
			37 => "DIAMETR_DISKA_KRUGA_MM",
			38 => "TIP_PATRONA",
			39 => "TOLSHCHINA_SLOYA_MM",
			40 => "RAZMER_YACHEEK_FILTRA_MKM",
			41 => "GRUZOPODEMNOST_KG",
			42 => "PRIMENENIE",
			43 => "DIAPAZON_IZMERENIYA_DAVLENIYA_BAR",
			44 => "MAKSIMALNAYA_TEMPERATURA_S",
			45 => "MAKS_DIAM_SVERLENIYA_STAL_DREVESINA_BETON_MM",
			46 => "SHIRINA_MM",
			47 => "VID_IZDELIYA",
			48 => "MOROZOSTOYKOST",
			49 => "VREMYA_ZARYADKI_AKKUMULYATORA_CH",
			50 => "VYSOTA_MM",
			51 => "DIAPAZON_VKHODNOGO_NAPRYAZHENIYA_V",
			52 => "DIAMETR_PODKL_KONTURA_GORYACHEY_VODY_DYUYM",
			53 => "DIAMETR_VKHODNOGO_OTVERSTIYA_DYUYM",
			54 => "PROCHNOST_STSEPLENIYA",
			55 => "TEPLOSTOYKOST_S_NE_MENEE",
			56 => "TIP_POKRYTIYA_VERKH_NIZ",
			57 => "MAKS_KRUTYASHCHIY_MOMENT_N_M",
			58 => "VYSOTA_VSASYVANIYA_M",
			59 => "MEZHOSEVOE_RASSTOYANIE_MM",
			60 => "DIAMETR_PODKL_DYMOKHODA_MM",
			61 => "RABOCHEE_DAVLENIE_ATM",
			62 => "RAZMERY_SEKTSII_V_X_G_X_SH_MM",
			63 => "VNESHNIY_DIAMETR_V_MM_STALNYE_MEDNYE_TRUBY",
			64 => "MEZHPOVEROCHNYY_INTERVAL_LET",
			65 => "VREMYA_VYSYKHANIYA",
			66 => "SVAROCHNYY_TOK_MAX_A",
			67 => "TOLSHCHINA_PROFILYA_MM",
			68 => "TEMPERATURA_TEPLONOSITELYA_C",
			69 => "GARANTIYA_NA_VNUTRENNIY_BAK",
			70 => "ULTRAFIOLETOVAYA_ZASHCHITA",
			71 => "RASKHOD_NA_ODIN_SLOY",
			72 => "NAPRYAZHENIE_AKKUMULYATORA_V",
			73 => "RAZMERY_MM",
			74 => "TEMPERATURA_VOZGARANIYA_C",
			75 => "PROIZVODITELNOST_L_MIN",
			76 => "PRISOEDINENIE_DYUYM",
			77 => "DIAMETR_NASOSNOY_CHASTI_DYUYM",
			78 => "TIP_KAMERY_SGORANIYA",
			79 => "NAZNACHENIE",
			80 => "OBEM_MASLYANOGO_BAKA_L",
			81 => "TIP",
			82 => "POVERKHNOST",
			83 => "RASKHOD_TOPLIVA_G_KVTCH",
			84 => "KLASS_TOCHNOSTI",
			85 => "DEFORMATSIONNAYA_TEPLOSTOYKOST_C",
			86 => "CHASTOTA_UDAROV_UDAR_MIN",
			87 => "NAIMENOVANIE_SAYT01",
			88 => "TOLSHCHINA_STENKI_MM",
			89 => "UDERZHIVAEMYY_VES_KG_KV_M",
			90 => "TIP_AKKUMULYATORA",
			91 => "RASKHOD_MASLA_G_KVTCH",
			92 => "PODKLYUCHENIE_DYUYM",
			93 => "TEPLOOBMENNIK_",
			94 => "NOMINALNYY_TOK_A",
			95 => "MINIMALNYY_IZMERYAEMYY_RASKHOD_QMIN_M3_CH",
			96 => "ISPOLNENIE",
			97 => "GLUBINA_PROPILA_POD_UGLOM_90_45_MM",
			98 => "MOSHCHNOST_KVT",
			99 => "SVETOPRONITSAEMOST",
			100 => "CHASTOTA_KHODOV_KHOD_MIN",
			101 => "STEPEN_BLESKA",
			102 => "TEMPERATURA_PEREKACHIVAEMOY_ZHIDKOSTI_S",
			103 => "VREMYA_VYSYKHANIYA_CH",
			104 => "PROGRAMMIROVANIE",
			105 => "TIP_ROZZHIGA",
			106 => "MINIMALNYY_RADIUS_IZGIBA_DLYA_AROK_MM",
			107 => "SROK_EKSPLUATATSII_",
			108 => "TIP_POKRYTIYA",
			109 => "DYUYMY_STALNYE_MEDNYE_TRUBY",
			110 => "TSVET_1",
			111 => "GLUBINA_MM",
			112 => "GARANTIYA",
			113 => "NAIMENOVANIE_SAYT03",
			114 => "CHASTOTA_VRASHCHENIYA_OB_MIN",
			115 => "ZHIZNESPOSOBNOST_RASTVORA",
			116 => "VREMYA_UKLADKI_PLITKI_MIN",
			117 => "OBEM_DVIGATELYA_KUB_SM",
			118 => "MAKSIMALNYY_IZMERYAEMYY_RASKHOD_QMAKS_M3_CH",
			119 => "RASKHOD_PRI_10_MM_KG_KV_M",
			120 => "DIAMETR_LESKI_MM",
			121 => "MASSA_KG_KV_M_NE_MENEE",
			122 => "ENERGOPOTREBLENIE_NA_KV_M_VT_CH",
			123 => "NAPOR_M_VOD_ST_",
			124 => "UDELNYY_VES_KG_KV_M",
			125 => "RABOCHAYA_SREDA",
			126 => "REGULIROVKA_KRUTYASHCHEGO_MOMENTA",
			127 => "RABOCHEE_DAVLENIE",
			128 => "MOSHCHNOST_VT",
			129 => "NAPRYAZHENIE_SETI_V",
			130 => "TIP_POVERKHNOSTI",
			131 => "VREMYA_DO_PESHEGO_KHOZHDENIYA_CH",
			132 => "DIAMETR_PODKL_GAZOPROVODA_DYUYM",
			133 => "DIAMETR_MM",
			134 => "YEMKOST_TOPLIVNOGO_BAKA_L",
			135 => "REKOMENDUEMYY_DIAMETR_BURENIYA_MM",
			136 => "KARKAS",
			137 => "RASSTOYANIE_MEZHDU_RYEBRAMI_ZHYESTKOSTI_MM",
			138 => "TIP_KOTLA",
			139 => "DAVLENIE_BAR",
			140 => "MAKSIMALNOE_DAVLENIE_BAR",
			141 => "DIAMETR_TRUBY_DYUYM",
			142 => "DIAPAZON_IZMERENIYA_TEMPERATURY_S",
			143 => "DLINA_OBORUDOVANIYA_MM",
			144 => "USL_PROKHOD_V_MM_STALNYE_MEDNYE_TRUBY",
			145 => "VREMYA_KORREKTIROVKI_PLITKI_MIN",
			146 => "OBYEM_L",
			147 => "MAKS_DIAM_SVERLENIYA_BUROM_MM",
			148 => "RABOCHAYA_TEMPERATURA_C",
			149 => "DLINA_KABELYA_M",
			150 => "VREMYA_NAGREVA_NA_45_C_MIN",
			151 => "VODA",
			152 => "TIP_POLIROVKI",
			153 => "",
		),
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_CART_PROPERTIES" => array(
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => array(
		),
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => $_REQUEST["PAGE_ELEMENT_COUNT"],
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "SITE",
			1 => "РОЗНИЦА",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_ADD_TO_BASKET_ACTION" => "BUY",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "1",
		"SEF_FOLDER" => "/catalog/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_SHOW" => "Y",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"TEMPLATE_THEME" => "site",
		"TOP_ADD_TO_BASKET_ACTION" => "BUY",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_VIEW_MODE" => "SECTION",
		"USE_ALSO_BUY" => "N",
		"USE_BIG_DATA" => "N",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "N",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
		"USE_GIFTS_SECTION" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "Y",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "N",
		"USE_STORE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"COMPATIBLE_MODE" => "Y",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"COMPARE_PROPERTY_CODE" => array(
			0 => "USTANOVOCHNYY_DIAMETR_MM",
			1 => "YEMKOST_GIDROAKKUMULYATORA_L",
			2 => "TEPLOVAYA_OTDACHA_ODNOY_SEKTSII_VT",
			3 => "PROIZVODITELNOST_M3_CH",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "FORUM_MESSAGE_CNT",
			7 => "OTAPLIVAEMOE_POMESHCHENIE_M_KUB",
			8 => "CML2_MANUFACTURER",
			9 => "CML2_TRAITS",
			10 => "CML2_TAXES",
			11 => "FORUM_TOPIC_ID",
			12 => "CML2_ATTRIBUTES",
			13 => "CML2_BAR_CODE",
			14 => "MAKS_GLUBINA_POGRUZHENIYA_M",
			15 => "RAZMER_PROFILYA_MM",
			16 => "NEOBKHODIMOST_OBSLUZHIVANIYA_ZIMOY",
			17 => "NAIMENOVANIE_SAYT02",
			18 => "UROVEN_SHUMA_DB",
			19 => "ALTERNATOR_",
			20 => "VOZMOZHNOE_PODKLYUCHENIE",
			21 => "GLUBINA_PROPILA_STAL_DREVESINA_MM",
			22 => "KOLEROVKA",
			23 => "VES_KG",
			24 => "TSVET",
			25 => "VNUTRENNIY_BAK",
			26 => "DIAPAZON_ZAKREPLYAEMYKH_SVERL_MM",
			27 => "NOMINALNYY_RASKHOD_M3_CHAS",
			28 => "VES_SNEGOVOGO_POKROVA_KG_KV_M",
			29 => "TOLSHCHINA_IZOLYATSII",
			30 => "RASKHOD_PRI_RABOTE_SHPATELEM_6KH6_MM_KG_KV_M",
			31 => "MAKS_RASKHOD_TOPLIVA_L_CHAS",
			32 => "DIAMETR_PODKL_KONTURA_OTOPLENIYA_DYUYM",
			33 => "EMKOST_SEKTSII_L",
			34 => "YEMKOST_AKKUMULYATORA_A_CH",
			35 => "ENERGIYA_UDARA_DZH",
			36 => "PROIZVODITEL",
			37 => "DIAMETR_USLOVNOGO_PROKHODA_MM",
			38 => "SVAROCHNYY_TOK_MIN_A",
			39 => "DIAMETR_DISKA_KRUGA_MM",
			40 => "TIP_PATRONA",
			41 => "TOLSHCHINA_SLOYA_MM",
			42 => "RAZMER_YACHEEK_FILTRA_MKM",
			43 => "GRUZOPODEMNOST_KG",
			44 => "PRIMENENIE",
			45 => "DIAPAZON_IZMERENIYA_DAVLENIYA_BAR",
			46 => "MAKSIMALNAYA_TEMPERATURA_S",
			47 => "MAKS_DIAM_SVERLENIYA_STAL_DREVESINA_BETON_MM",
			48 => "SHIRINA_MM",
			49 => "VID_IZDELIYA",
			50 => "MOROZOSTOYKOST",
			51 => "VREMYA_ZARYADKI_AKKUMULYATORA_CH",
			52 => "VYSOTA_MM",
			53 => "DIAPAZON_VKHODNOGO_NAPRYAZHENIYA_V",
			54 => "DIAMETR_PODKL_KONTURA_GORYACHEY_VODY_DYUYM",
			55 => "DIAMETR_VKHODNOGO_OTVERSTIYA_DYUYM",
			56 => "PROCHNOST_STSEPLENIYA",
			57 => "TEPLOSTOYKOST_S_NE_MENEE",
			58 => "TIP_POKRYTIYA_VERKH_NIZ",
			59 => "MAKS_KRUTYASHCHIY_MOMENT_N_M",
			60 => "VYSOTA_VSASYVANIYA_M",
			61 => "MEZHOSEVOE_RASSTOYANIE_MM",
			62 => "DIAMETR_PODKL_DYMOKHODA_MM",
			63 => "RABOCHEE_DAVLENIE_ATM",
			64 => "RAZMERY_SEKTSII_V_X_G_X_SH_MM",
			65 => "VNESHNIY_DIAMETR_V_MM_STALNYE_MEDNYE_TRUBY",
			66 => "MEZHPOVEROCHNYY_INTERVAL_LET",
			67 => "VREMYA_VYSYKHANIYA",
			68 => "SVAROCHNYY_TOK_MAX_A",
			69 => "TOLSHCHINA_PROFILYA_MM",
			70 => "TEMPERATURA_TEPLONOSITELYA_C",
			71 => "GARANTIYA_NA_VNUTRENNIY_BAK",
			72 => "ULTRAFIOLETOVAYA_ZASHCHITA",
			73 => "RASKHOD_NA_ODIN_SLOY",
			74 => "NAPRYAZHENIE_AKKUMULYATORA_V",
			75 => "RAZMERY_MM",
			76 => "TEMPERATURA_VOZGARANIYA_C",
			77 => "PROIZVODITELNOST_L_MIN",
			78 => "PRISOEDINENIE_DYUYM",
			79 => "DIAMETR_NASOSNOY_CHASTI_DYUYM",
			80 => "TIP_KAMERY_SGORANIYA",
			81 => "NAZNACHENIE",
			82 => "OBEM_MASLYANOGO_BAKA_L",
			83 => "TIP",
			84 => "POVERKHNOST",
			85 => "RASKHOD_TOPLIVA_G_KVTCH",
			86 => "KLASS_TOCHNOSTI",
			87 => "DEFORMATSIONNAYA_TEPLOSTOYKOST_C",
			88 => "CHASTOTA_UDAROV_UDAR_MIN",
			89 => "NAIMENOVANIE_SAYT01",
			90 => "TOLSHCHINA_STENKI_MM",
			91 => "UDERZHIVAEMYY_VES_KG_KV_M",
			92 => "TIP_AKKUMULYATORA",
			93 => "RASKHOD_MASLA_G_KVTCH",
			94 => "PODKLYUCHENIE_DYUYM",
			95 => "TEPLOOBMENNIK_",
			96 => "NOMINALNYY_TOK_A",
			97 => "MINIMALNYY_IZMERYAEMYY_RASKHOD_QMIN_M3_CH",
			98 => "ISPOLNENIE",
			99 => "GLUBINA_PROPILA_POD_UGLOM_90_45_MM",
			100 => "MOSHCHNOST_KVT",
			101 => "SVETOPRONITSAEMOST",
			102 => "CHASTOTA_KHODOV_KHOD_MIN",
			103 => "STEPEN_BLESKA",
			104 => "TEMPERATURA_PEREKACHIVAEMOY_ZHIDKOSTI_S",
			105 => "VREMYA_VYSYKHANIYA_CH",
			106 => "PROGRAMMIROVANIE",
			107 => "TIP_ROZZHIGA",
			108 => "MINIMALNYY_RADIUS_IZGIBA_DLYA_AROK_MM",
			109 => "SROK_EKSPLUATATSII_",
			110 => "TIP_POKRYTIYA",
			111 => "DYUYMY_STALNYE_MEDNYE_TRUBY",
			112 => "TSVET_1",
			113 => "GLUBINA_MM",
			114 => "GARANTIYA",
			115 => "NAIMENOVANIE_SAYT03",
			116 => "CHASTOTA_VRASHCHENIYA_OB_MIN",
			117 => "ZHIZNESPOSOBNOST_RASTVORA",
			118 => "VREMYA_UKLADKI_PLITKI_MIN",
			119 => "OBEM_DVIGATELYA_KUB_SM",
			120 => "MAKSIMALNYY_IZMERYAEMYY_RASKHOD_QMAKS_M3_CH",
			121 => "RASKHOD_PRI_10_MM_KG_KV_M",
			122 => "DIAMETR_LESKI_MM",
			123 => "MASSA_KG_KV_M_NE_MENEE",
			124 => "ENERGOPOTREBLENIE_NA_KV_M_VT_CH",
			125 => "NAPOR_M_VOD_ST_",
			126 => "UDELNYY_VES_KG_KV_M",
			127 => "RABOCHAYA_SREDA",
			128 => "REGULIROVKA_KRUTYASHCHEGO_MOMENTA",
			129 => "RABOCHEE_DAVLENIE",
			130 => "MOSHCHNOST_VT",
			131 => "NAPRYAZHENIE_SETI_V",
			132 => "TIP_POVERKHNOSTI",
			133 => "VREMYA_DO_PESHEGO_KHOZHDENIYA_CH",
			134 => "DIAMETR_PODKL_GAZOPROVODA_DYUYM",
			135 => "DIAMETR_MM",
			136 => "YEMKOST_TOPLIVNOGO_BAKA_L",
			137 => "REKOMENDUEMYY_DIAMETR_BURENIYA_MM",
			138 => "KARKAS",
			139 => "RASSTOYANIE_MEZHDU_RYEBRAMI_ZHYESTKOSTI_MM",
			140 => "TIP_KOTLA",
			141 => "DAVLENIE_BAR",
			142 => "MAKSIMALNOE_DAVLENIE_BAR",
			143 => "DIAMETR_TRUBY_DYUYM",
			144 => "DIAPAZON_IZMERENIYA_TEMPERATURY_S",
			145 => "DLINA_OBORUDOVANIYA_MM",
			146 => "USL_PROKHOD_V_MM_STALNYE_MEDNYE_TRUBY",
			147 => "VREMYA_KORREKTIROVKI_PLITKI_MIN",
			148 => "OBYEM_L",
			149 => "MAKS_DIAM_SVERLENIYA_BUROM_MM",
			150 => "RABOCHAYA_TEMPERATURA_C",
			151 => "DLINA_KABELYA_M",
			152 => "VREMYA_NAGREVA_NA_45_C_MIN",
			153 => "VODA",
			154 => "TIP_POLIROVKI",
			155 => "",
		),
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPARE_POSITION" => "top left",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "/catalog/",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare/",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		)
	),
	false
);?>

<? if($APPLICATION -> GetCurDir() == '/catalog/'):?>
<div class="catalog-sections-text" style="margin-top: 60px">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => "/include/catalog-text.php"
		)
	);?>
</div>
<? endif; ?>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>