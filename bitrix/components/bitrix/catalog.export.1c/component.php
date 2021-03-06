<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(CModule::IncludeModule('iblock'))
{
	class CIBlockCMLExportPackage extends \CIBlockCMLExport
	{
		function StartExport()
		{
			fwrite($this->fp, "<"."?xml version=\"1.0\" encoding=\"".LANG_CHARSET."\"?".">\n");
			fwrite($this->fp, "<".GetMessage("IBLOCK_XML2_COMMERCE_INFO")." ".GetMessage("IBLOCK_XML2_SCHEMA_VERSION")."=\"2.021\" ".GetMessage("IBLOCK_XML2_TIMESTAMP")."=\"".date("Y-m-d")."T".date("H:i:s")."\" ".GetMessage("IBLOCK_XML2_PARAMS_PACKAGE")."=\"#PARAMS_PACKAGE_LAST_NUMBER#\"".">\n");
		}

		function exportElementFields($arElement, $SECTION_MAP)
		{
			fwrite($this->fp, "\t\t\t\t<".GetMessage("IBLOCK_XML2_NAME").">".htmlspecialcharsbx($arElement["NAME"])."</".GetMessage("IBLOCK_XML2_NAME").">\n");

			$arSections = array();
			$rsSections = CIBlockElement::GetElementGroups($arElement["ID"], true);
			while($arSection = $rsSections->Fetch())
				if(array_key_exists($arSection["ID"], $SECTION_MAP))
					$arSections[] = $SECTION_MAP[$arSection["ID"]];

			fwrite($this->fp, "\t\t\t\t<".GetMessage("IBLOCK_XML2_GROUPS").">\n");
			foreach($arSections as $xml_id)
				fwrite($this->fp, "\t\t\t\t\t<".GetMessage("IBLOCK_XML2_ID").">".htmlspecialcharsbx($xml_id)."</".GetMessage("IBLOCK_XML2_ID").">\n");
			fwrite($this->fp, "\t\t\t\t</".GetMessage("IBLOCK_XML2_GROUPS").">\n");

			fwrite($this->fp, $this->formatXMLNode(4, GetMessage("IBLOCK_XML2_PICTURE"), $this->ExportFile($arElement["DETAIL_PICTURE"])));

			if($arElement["IBLOCK_ID"]>0)
			{
				$arProps = $this->preparePropertiesValues($arElement, array("CODE"=>"MORE_PHOTO"));
				if(count($arProps)>0)
				{
					foreach($arProps as $pid => $arProp)
					{
						foreach($arProp["VALUES"] as $arValue)
						{
							$value = $arValue["VALUE"];
							if(is_array($value) || strlen($value))
							{
								$this->preparePropertyValue($arProp, $arValue, $value, $bSerialized);
								fwrite($this->fp, $this->formatXMLNode(4, GetMessage("IBLOCK_XML2_PICTURE"), $value));
							}
						}
					}
				}
			}
		}

		function aliasXmlId($xml_id)
		{
			return "\t\t\t\t<".GetMessage("IBLOCK_XML2_ID_SITE_1C").">".htmlspecialcharsbx($xml_id)."</".GetMessage("IBLOCK_XML2_ID_SITE_1C").">\n";
		}

		function preparePropertyValue($arProp, $arValue, &$value, &$bSerialized)
		{
			if($arProp["PROPERTY_TYPE"]=="L")
			{
				$value = CIBlockPropertyEnum::GetByID($arValue["VALUE_ENUM_ID"]);
				$value = $value["XML_ID"];
			}
			elseif($arProp["PROPERTY_TYPE"]=="F")
			{
				$value = $this->ExportFile($value);
			}
		}

		function ExportProperties(&$PROPERTY_MAP)
		{
			$PROPERTY_MAP = array();

			fwrite($this->fp, "\t\t<".GetMessage("IBLOCK_XML2_PROPERTIES").">\n");

			$arFilter = array(
				"IBLOCK_ID" => $this->arIBlock["ID"],
				"ACTIVE" => "Y",
			);
			$arSort = array(
				"sort" => "asc",
			);

			$obProp = new CIBlockProperty();
			$rsProp = $obProp->GetList($arSort, $arFilter);
			while($arProp = $rsProp->Fetch())
			{
				if($arProp["XML_ID"] == 'CML2_LINK')
					continue;

				$isPropertyEnum = false;
				$isExternal = false;

				fwrite($this->fp, "\t\t\t<".GetMessage("IBLOCK_XML2_PROPERTY").">\n");

				$xml_id = $this->GetPropertyXML_ID($this->arIBlock["ID"], $arProp["NAME"], $arProp["ID"], $arProp["XML_ID"]);
				$PROPERTY_MAP[$arProp["ID"]] = $xml_id;
				$PROPERTY_MAP["~".$arProp["ID"]] = $arProp["NAME"];
				fwrite($this->fp, $this->formatXMLNode(4, GetMessage("IBLOCK_XML2_ID"), $xml_id));

				fwrite($this->fp, $this->formatXMLNode(4, GetMessage("IBLOCK_XML2_NAME"), $arProp["NAME"]));
				fwrite($this->fp, $this->formatXMLNode(4, GetMessage("IBLOCK_XML2_MULTIPLE"), ($arProp["MULTIPLE"]=="Y"? "true": "false")));
				fwrite($this->fp, $this->formatXMLNode(4, ($this->next_step["catalog"]? GetMessage("IBLOCK_XML2_FOR_OFFERS"):GetMessage("IBLOCK_XML2_FOR_CATALOG")) , "true"));


				if($arProp["PROPERTY_TYPE"] == \Bitrix\Iblock\PropertyTable::TYPE_LIST)
					$isPropertyEnum = true;

				if($arProp["PROPERTY_TYPE"] == \Bitrix\Iblock\PropertyTable::TYPE_STRING && $arProp['USER_TYPE'] == "directory")
				{
					$isPropertyEnum = true;
					$isExternal = true;
				}

				$typeValue = GetMessage("IBLOCK_XML2_TYPE_STRING");
				if($arProp["PROPERTY_TYPE"] == \Bitrix\Iblock\PropertyTable::TYPE_LIST || $isExternal)
					$typeValue = GetMessage("IBLOCK_XML2_TYPE_LIST");
				elseif($arProp["PROPERTY_TYPE"] ==  \Bitrix\Iblock\PropertyTable::TYPE_NUMBER)
					$typeValue = GetMessage("IBLOCK_XML2_TYPE_NUMBER");
				elseif($arProp["PROPERTY_TYPE"] == \Bitrix\Iblock\PropertyTable::TYPE_STRING)
				{
					if($arProp["USER_TYPE"] == "Date")
						$typeValue = GetMessage("IBLOCK_XML2_USER_TYPE_DATE");
					elseif($arProp["USER_TYPE"] == "DateTime")
						$typeValue = GetMessage("IBLOCK_XML2_USER_TYPE_DATETIME");
				}

				fwrite($this->fp, $this->formatXMLNode(4, GetMessage("IBLOCK_XML2_VALUES_TYPE"), $typeValue));

				if($isPropertyEnum)
				{
					fwrite($this->fp, "\t\t\t\t<".GetMessage("IBLOCK_XML2_EXTERNAL").">".($isExternal? "true":"false")."</".GetMessage("IBLOCK_XML2_EXTERNAL").">\n");
					fwrite($this->fp, "\t\t\t\t<".GetMessage("IBLOCK_XML2_CHOICE_VALUES").">\n");
					if($isExternal)
					{
						$arEnumValue = $this->ExportPropertyDirectory($arProp);
						if(is_array($arEnumValue))
						{
							foreach($arEnumValue as $enumValue)
							{
								fwrite($this->fp, $this->formatXMLNode(5, GetMessage("IBLOCK_XML2_CHOICE"), array(
									GetMessage("IBLOCK_XML2_VALUE_ID") => $enumValue["UF_XML_ID"],
									GetMessage("IBLOCK_XML2_VALUE") => $enumValue["UF_NAME"],
									GetMessage("IBLOCK_XML2_SORT") => $enumValue["UF_SORT"],
									GetMessage("IBLOCK_XML2_PICTURE") => ($enumValue["UF_FILE"]>0 ? $this->ExportFile($enumValue["UF_FILE"]):''),
									GetMessage("IBLOCK_XML2_LINK") => $enumValue["UF_LINK"],
									GetMessage("IBLOCK_XML2_BY_DEFAULT") => $enumValue["UF_DEF"],
									GetMessage("IBLOCK_XML2_DESCRIPTION") => $enumValue["UF_DESCRIPTION"],
									GetMessage("IBLOCK_XML2_FULL_DESCRIPTION") => $enumValue["UF_FULL_DESCRIPTION"]
								)));
							}
						}
					}
					else
					{
						$rsEnum = CIBlockProperty::GetPropertyEnum($arProp["ID"]);
						while($arEnum = $rsEnum->Fetch())
						{
							fwrite($this->fp, $this->formatXMLNode(5, GetMessage("IBLOCK_XML2_VALUE"), $arEnum["VALUE"]));
							fwrite($this->fp,
								"\t\t\t\t\t<".GetMessage("IBLOCK_XML2_CHOICE").">\n"
								.$this->formatXMLNode(6, GetMessage("IBLOCK_XML2_ID"), $arEnum["XML_ID"])
								.$this->formatXMLNode(6, GetMessage("IBLOCK_XML2_VALUE"), $arEnum["VALUE"])
								.$this->formatXMLNode(6, GetMessage("IBLOCK_XML2_BY_DEFAULT"), ($arEnum["DEF"]=="Y"? "true": "false"))
								.$this->formatXMLNode(6, GetMessage("IBLOCK_XML2_SORT"), intval($arEnum["SORT"]))
								."\t\t\t\t\t</".GetMessage("IBLOCK_XML2_CHOICE").">\n"
							);
						}
					}
					fwrite($this->fp, "\t\t\t\t</".GetMessage("IBLOCK_XML2_CHOICE_VALUES").">\n");
				}

				fwrite($this->fp, "\t\t\t</".GetMessage("IBLOCK_XML2_PROPERTY").">\n");
			}
			fwrite($this->fp, "\t\t</".GetMessage("IBLOCK_XML2_PROPERTIES").">\n");
		}

		function ExportPropertyDirectory($arProperty)
		{
			if (!CModule::IncludeModule('highloadblock'))
				return true;

			$rsProperty = CIBlockProperty::GetList(array(), array("ID"=>$arProperty["ID"]));
			$arProperty = $rsProperty->Fetch();
			if (!$arProperty)
				return true;

			$tableName = '';
			if(strlen($arProperty["USER_TYPE_SETTINGS"]["TABLE_NAME"])>0)
				$tableName = $arProperty["USER_TYPE_SETTINGS"]["TABLE_NAME"];

			if(strlen($tableName)==0)
				return true;

			$hlblock = Bitrix\Highloadblock\HighloadBlockTable::getList(array(
				"filter" => array(
					"=TABLE_NAME" => $tableName,
				)))->fetch();

			$entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
			$entity_data_class = $entity->getDataClass();

			$arEnumValue = array();
			$rsData = $entity_data_class::getList(array(
				"select" => array('*'),
			));
			while($arData = $rsData->fetch())
			{
				$arEnumValue[] = $arData;
			}

			return $arEnumValue;
		}

		function preparePropertiesValues($arElement, $arFilter=array("ACTIVE"=>"Y"))
		{
			$arProp = parent::preparePropertiesValues($arElement, $arFilter);

			$PROPERTY_MAP_EXCLUDE = self::getExcludePropertyCode();

			$arFilter = array(
				"IBLOCK_ID" => $arElement['IBLOCK_ID'],
				"ACTIVE" => "Y"
			);

			$obProp = new CIBlockProperty();
			$rsProp = $obProp->GetList(array(), $arFilter);
			while($property = $rsProp->Fetch())
			{
				if(in_array($property["XML_ID"], $PROPERTY_MAP_EXCLUDE['XML_ID']))
				{
					if(isset($arProp[$property['ID']]))
						unset($arProp[$property['ID']]);
				}
			}

			return $arProp;
		}

		function getExcludePropertyCode()
		{
			return array('XML_ID'=>array('CML2_LINK'));
		}
	}
}

final class export
{
	const UNDEFINED = 0;
	const PACKAGE = 1;

	const ONEC_MODULE_VERSION_DEFAULT = 1;
	const ONEC_MODULE_VERSION_2 = 2;

	protected $moduleVersion = '';
	protected $packageMode = false;
	protected $package = null;
	protected $nextStep = array();
	protected $step = array();
	protected $currentsList = array();

	public function __construct($moduleVersion, $nextStep, $step)
	{
		$this->moduleVersion = $moduleVersion;
		$this->nextStep = $nextStep;
		$this->step = $step;
	}

	/**
	 * @param string $minVerion
	 * @param null|string $maxVersion
	 * @return bool
	 */
	public function versionCompare($minVerion, $maxVersion = null)
	{

		if(version_compare($this->getModuleVersion(), $minVerion)>=0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * @return string
	 */
	public function getModuleVersion()
	{
		return $this->moduleVersion;
	}

	/**
	 * @param bool $packageMode
	 */
	public function setPackageMode($packageMode)
	{
		$this->packageMode = $packageMode;
	}
	/**
	 * @return bool
	 */
	public function isPackageMode()
	{
		return $this->packageMode;
	}

	/**
	 * @param int $tipeId
	 * @return CIBlockCMLExport|CIBlockCMLExportPackage
	 */
	public static function create($tipeId)
	{
		if(export::PACKAGE == $tipeId)
			return new CIBlockCMLExportPackage();
		else
			return new CIBlockCMLExport();
	}

	/**
	 * @param int $package
	 */
	public function setPackage($package)
	{
		$this->package = intval($package);
	}

	/**
	 * @return null
	 */
	public function getPackage()
	{
		return $this->package;
	}

	/**
	 * @return array
	 */
	public function getNextStep()
	{
		if($this->isPackageMode())
			$result = $this->getPackage()>0 ? array('LAST_ID'=>$this->getPackage()) : array();
		else
			$result = $this->nextStep;

		return $result;
	}

	/**
	 * @return array
	 */
	public function getStep()
	{
		return $this->step;
	}

	/**
	 * @param $currents
	 */
	public function loadCurrents($currents)
	{
		if($this->isPackageMode())
			$this->currentsList = $currents;
		else
			$this->currentsList = array($currents);
	}

	/**
	 * @return array
	 */
	public function getCurrentsList()
	{
		return $this->currentsList;
	}

	/**
	 * @param $package
	 * @param $value
	 */
	public function setCurrent($package, $value)
	{
		$this->currentsList[$package] = $value;
	}

	/**
	 * @param int $package
	 * @return mixed
	 */
	public function getCurrent($package = 0)
	{
		return $this->currentsList[$package];
	}

	/**
	 * @return int|mixed
	 */
	public function getSummCurrent()
	{
		$currents = $this->getCurrentsList();

		if($this->isPackageMode())
		{
			$summ = 0;
			$lastPackage = false;
			foreach($currents as $k=>$v)
			{
				if($lastPackage)
					break;
				if($k == $this->getPackage())
					$lastPackage = true;

				$summ += $v;
			}
			$result = $summ;
		}
		else
			$result = $this->getCurrent();

		return $result;
	}

	/**
	 * @param $count
	 */
	public function saveCurrent($count)
	{
		if($this->isPackageMode())
			$this->setCurrent($this->getPackage(), $count);
		else
			$this->setCurrent(0, $this->getCurrent() + $count);
	}

	/**
	 * @param $content
	 * @param null $number
	 * @return mixed
	 */
	public function prepareContents($content, $number = null)
	{
		if($this->isPackageMode())
			return str_replace("#PARAMS_PACKAGE_LAST_NUMBER#", intval($number), $content);
		else
			return $content;
	}
}
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

$arParams["INTERVAL"] = intval($arParams["INTERVAL"]);

$arParams["ELEMENTS_PER_STEP"] = intval($arParams["ELEMENTS_PER_STEP"]);
if($arParams["ELEMENTS_PER_STEP"] < 0)
	$arParams["ELEMENTS_PER_STEP"] = 0;

if(!is_array($arParams["GROUP_PERMISSIONS"]))
	$arParams["GROUP_PERMISSIONS"] = array(1);

$arParams["USE_ZIP"] = $arParams["USE_ZIP"]!="N";

if($arParams["INTERVAL"] <= 0)
	@set_time_limit(0);

$start_time = time();

$bUSER_HAVE_ACCESS = false;
if(isset($GLOBALS["USER"]) && is_object($GLOBALS["USER"]))
{
	$bUSER_HAVE_ACCESS = $GLOBALS["USER"]->IsAdmin();
	if(!$bUSER_HAVE_ACCESS)
	{
		$arUserGroupArray = $GLOBALS["USER"]->GetUserGroupArray();
		foreach($arParams["GROUP_PERMISSIONS"] as $PERM)
		{
			if(in_array($PERM, $arUserGroupArray))
			{
				$bUSER_HAVE_ACCESS = true;
				break;
			}
		}
	}
}

$bDesignMode = $GLOBALS["APPLICATION"]->GetShowIncludeAreas()
	&& !isset($_GET["mode"])
	&& is_object($GLOBALS["USER"])
	&& $GLOBALS["USER"]->IsAdmin()
;

if(!$bDesignMode)
{
	if(!isset($_GET["mode"]))
		return;
	if(isset($_SERVER["HTTP_REFERER"]))
		return;
	$APPLICATION->RestartBuffer();
	header("Pragma: no-cache");
}

$DIR_NAME = "";

ob_start();

if($_GET["mode"] == "checkauth" && $USER->IsAuthorized())
{
	if(
		(COption::GetOptionString("main", "use_session_id_ttl", "N") == "Y")
		&& (COption::GetOptionInt("main", "session_id_ttl", 0) > 0)
		&& !defined("BX_SESSION_ID_CHANGE")
	)
	{
		echo "failure\n",GetMessage("CC_BCE1_ERROR_SESSION_ID_CHANGE");
	}
	else
	{
		echo "success\n";
		echo session_name()."\n";
		echo session_id() ."\n";
	}
}
elseif(!$USER->IsAuthorized())
{
	echo "failure\n",GetMessage("CC_BCE1_ERROR_AUTHORIZE");
}
elseif(!$bUSER_HAVE_ACCESS)
{
	echo "failure\n",GetMessage("CC_BCE1_PERMISSION_DENIED");
}
elseif(!CModule::IncludeModule('iblock'))
{
	echo "failure\n",GetMessage("CC_BCE1_ERROR_IBLOCK_MODULE");
}
elseif(!CModule::IncludeModule('catalog'))
{
	echo "failure\n",GetMessage("CC_BCE1_ERROR_CATALOG_MODULE");
}
else
{
	if($_GET["mode"]=="init")
	{
		$_SESSION["BX_CML2_EXPORT"] = array(
			"zip" => $arParams["USE_ZIP"] && function_exists("zip_open"),
			"step" => 1,
			"package" => array(),
			"exportType" => (isset($_GET["outputType"]) && $_GET["outputType"] == "package" ? export::PACKAGE : export::UNDEFINED),
			"moduleVersion" => (isset($_GET["moduleVersion"]) && $_GET["moduleVersion"]<>''? $_GET["moduleVersion"] : export::ONEC_MODULE_VERSION_DEFAULT),
			"next_step" => array(),
			"SECTION_MAP" => array(),
			"PROPERTY_MAP" => false,
			"PRICES_MAP" => false,
		);
		echo "zip=".($_SESSION["BX_CML2_EXPORT"]["zip"]? "yes": "no")."\n";
	}
	elseif($_GET["mode"] == "query")
	{
		$start_time = time();
		if($fp = fopen("php://output", "ab"))
		{
			$export = new export(
				$_SESSION["BX_CML2_EXPORT"]["moduleVersion"],
				$_SESSION["BX_CML2_EXPORT"]["next_step"],
				$_SESSION["BX_CML2_EXPORT"]["step"]
			);

			if($export->versionCompare(export::ONEC_MODULE_VERSION_2))
			{
				$export->setPackageMode($_SESSION["BX_CML2_EXPORT"]["exportType"] == export::PACKAGE);
			}

			if($export->isPackageMode())
				$obExport = export::create(export::PACKAGE);
			else
				$obExport = export::create(export::UNDEFINED);

			if($export->isPackageMode())
				$export->setPackage($_GET["package"]);

			if($_SESSION["BX_CML2_EXPORT"]["step"] === 1)
			{
				if($obExport->Init(
					$fp,
					$arParams["IBLOCK_ID"],
					$export->getNextStep(),
					false,
					$work_dir = false,
					$file_dir = false,
					$bCheckPermissions = false
				))
				{
					$_SESSION["BX_CML2_EXPORT"]["total"] = CIBlockElement::GetList(array(), array("IBLOCK_ID"=> $arParams["IBLOCK_ID"], "ACTIVE" => "Y"), array());
					$_SESSION["BX_CML2_EXPORT"]["current"] = 0;
					$_SESSION["BX_CML2_EXPORT"]["package"][$export->getStep()]["current"] = array();
					echo GetMessage("CC_BCE1_PROGRESS_PRODUCT", array("#TOTAL#" => $_SESSION["BX_CML2_EXPORT"]["total"], "#COUNT#" => 0));

					$obExport->NotCatalog();
					$obExport->ExportFileAsURL();

					ob_start();
					$obExport->StartExport();
					$obExport->StartExportMetadata();
					$obExport->ExportProperties($_SESSION["BX_CML2_EXPORT"]["PROPERTY_MAP"]);
					$obExport->ExportSections(
						$_SESSION["BX_CML2_EXPORT"]["SECTION_MAP"],
						0,
						0
					);
					$obExport->EndExportMetadata();
					$obExport->EndExport();
					$c = ob_get_contents();
					ob_end_clean();

					echo $export->prepareContents($c, $obExport->next_step["LAST_ID"]);

					$_SESSION["BX_CML2_EXPORT"]["next_step"] = $obExport->next_step;
					$_SESSION["BX_CML2_EXPORT"]["step"] = 2;
				}
				else
				{
					echo "failure\n",GetMessage("CC_BCE1_ERROR_INIT");
				}
			}
			elseif($_SESSION["BX_CML2_EXPORT"]["step"] === 2)
			{
				if($obExport->Init(
					$fp,
					$arParams["IBLOCK_ID"],
					$export->getNextStep(),
					false,
					$work_dir = false,
					$file_dir = false,
					$bCheckPermissions = false
				))
				{
					$obExport->NotCatalog();
					$obExport->ExportFileAsURL();
					ob_start();
					$obExport->StartExport();
					$obExport->StartExportCatalog();
					$result = $obExport->ExportElements(
						$_SESSION["BX_CML2_EXPORT"]["PROPERTY_MAP"],
						$_SESSION["BX_CML2_EXPORT"]["SECTION_MAP"],
						$start_time,
						$arParams["INTERVAL"],
						$arParams["ELEMENTS_PER_STEP"]
					);

					if($result)
					{
						if($export->isPackageMode())
							$currentList = $_SESSION["BX_CML2_EXPORT"]["package"][$export->getStep()]["current"];
						else
							$currentList = $_SESSION["BX_CML2_EXPORT"]["current"];

						$export->loadCurrents($currentList);

						$export->saveCurrent($result);

						$current = $export->getSummCurrent();
						$obExport->EndExportCatalog();
						$obExport->EndExport();
						$c = ob_get_contents();
						ob_end_clean();
						echo GetMessage("CC_BCE1_PROGRESS_PRODUCT", array(
							"#TOTAL#" => $_SESSION["BX_CML2_EXPORT"]["total"],
							"#COUNT#" => $current,
						));

						echo $export->prepareContents($c, $obExport->next_step["LAST_ID"]);

						$_SESSION["BX_CML2_EXPORT"]["next_step"] = $obExport->next_step;

						if($export->isPackageMode())
							$_SESSION["BX_CML2_EXPORT"]["package"][$export->getStep()]["current"] = $export->getCurrentsList();
						else
							$_SESSION["BX_CML2_EXPORT"]["current"] = $export->getCurrent();
					}
					else
					{
						ob_end_clean();

						$packageList = $_SESSION["BX_CML2_EXPORT"]["package"];
						$exportType = $_SESSION["BX_CML2_EXPORT"]["exportType"];
						$moduleVersion = $_SESSION["BX_CML2_EXPORT"]["moduleVersion"];

						$_SESSION["BX_CML2_EXPORT"] = array(
							"zip" => $arParams["USE_ZIP"] && function_exists("zip_open"),
							"step" => 3,
							"package" => $packageList,
							"exportType" => $exportType,
							"moduleVersion" => $moduleVersion,
							"next_step" => array(),
							"SECTION_MAP" => array(),
							"PROPERTY_MAP" => false,
							"PRICES_MAP" => false,
						);

						$export = new export(
							$_SESSION["BX_CML2_EXPORT"]["moduleVersion"],
							$_SESSION["BX_CML2_EXPORT"]["next_step"],
							$_SESSION["BX_CML2_EXPORT"]["step"]
						);

						if($export->versionCompare(export::ONEC_MODULE_VERSION_2))
						{
							$export->setPackageMode($_SESSION["BX_CML2_EXPORT"]["exportType"] == export::PACKAGE);
						}

						if($export->isPackageMode())
							$export->setPackage(0);
					}
				}
			}

			$arCatalog = false;
			if($_SESSION["BX_CML2_EXPORT"]["step"] === 3)
				$arCatalog = CCatalog::GetSkuInfoByProductID($arParams["IBLOCK_ID"]);

			if($export->isPackageMode())
				$obExport = export::create(export::PACKAGE);
			else
				$obExport = export::create(export::UNDEFINED);

			if(
				$_SESSION["BX_CML2_EXPORT"]["step"] === 3
				&& $obExport->Init(
					$fp,
					is_array($arCatalog)? $arCatalog["IBLOCK_ID"]: $arParams["IBLOCK_ID"],
					$export->getNextStep(),
					false,
					$work_dir = false,
					$file_dir = false,
					$bCheckPermissions = false,
					is_array($arCatalog)? $arCatalog["PRODUCT_IBLOCK_ID"]: false
				)
			)
			{
				if(!array_key_exists("total", $_SESSION["BX_CML2_EXPORT"]))
				{
					$_SESSION["BX_CML2_EXPORT"]["total"] = CIBlockElement::GetList(array(), array("IBLOCK_ID"=> is_array($arCatalog)? $arCatalog["IBLOCK_ID"]: $arParams["IBLOCK_ID"], "ACTIVE" => "Y"), array());
					$_SESSION["BX_CML2_EXPORT"]["current"] = 0;
					$_SESSION["BX_CML2_EXPORT"]["package"][$export->getStep()]["current"] = array();
				}
				if($export->isPackageMode())
					$obExport->ExportFileAsURL();

				ob_start();
				$obExport->StartExport();

				if($export->versionCompare(export::ONEC_MODULE_VERSION_2))
				{
					$obExport->StartExportMetadata();
					ob_start();
					$obExport->ExportSections(
						$_SESSION["BX_CML2_EXPORT"]["SECTION_MAP"],
						0,
						0
					);
					ob_end_clean();
					$obExport->ExportProperties($_SESSION["BX_CML2_EXPORT"]["PROPERTY_MAP"]);
					$obExport->EndExportMetadata();
				}
				else
				{
					ob_start();
					$obExport->StartExportMetadata();
					$obExport->ExportProperties($_SESSION["BX_CML2_EXPORT"]["PROPERTY_MAP"]);
					$obExport->ExportSections(
						$_SESSION["BX_CML2_EXPORT"]["SECTION_MAP"],
						0,
						0
					);
					$obExport->EndExportMetadata();
					ob_end_clean();
				}


				$obExport->StartExportCatalog();
				$result = $obExport->ExportElements(
					$_SESSION["BX_CML2_EXPORT"]["PROPERTY_MAP"],
					$_SESSION["BX_CML2_EXPORT"]["SECTION_MAP"],
					$start_time,
					$arParams["INTERVAL"],
					$arParams["ELEMENTS_PER_STEP"]
				);

				if($result)
				{
					if($export->isPackageMode())
						$currentList = $_SESSION["BX_CML2_EXPORT"]["package"][$export->getStep()]["current"];
					else
						$currentList = $_SESSION["BX_CML2_EXPORT"]["current"];

					$export->loadCurrents($currentList);
					$export->saveCurrent($result);

					$obExport->EndExportCatalog();
					$obExport->EndExport();
					$c = ob_get_contents();
					ob_end_clean();

					echo $export->prepareContents($c, $obExport->next_step["LAST_ID"]);

					$_SESSION["BX_CML2_EXPORT"]["next_step"] = $obExport->next_step;
/*
					if($export->isPackageMode())
						$_SESSION["BX_CML2_EXPORT"]["package"][$export->getStep()]["current"] = $export->getCurrentsList();
					else
						$_SESSION["BX_CML2_EXPORT"]["current"] = $export->getCurrent();*/
				}
				else
				{
					ob_end_clean();
					$_SESSION["BX_CML2_EXPORT"] = array(
						"zip" => $arParams["USE_ZIP"] && function_exists("zip_open"),
						"step" => 4,
						"package" => array(),
						"exportType" => export::UNDEFINED,
						"next_step" => array(),
						"SECTION_MAP" => array(),
						"PROPERTY_MAP" => false,
						"PRICES_MAP" => false,
					);
				}
			}

			if(
				$_SESSION["BX_CML2_EXPORT"]["step"] === 4
			)
			{
				echo "finished=yes\n";
			}
		}
	}
	else
	{
		echo "failure\n",GetMessage("CC_BCE1_ERROR_UNKNOWN_COMMAND");
	}
}

$contents = ob_get_contents();
ob_end_clean();

if(!$bDesignMode)
{
	header("Content-Type: text/html; charset=".LANG_CHARSET);
	echo $contents;
	die();
}
else
{
	$this->IncludeComponentLang(".parameters.php");
	if(
		(COption::GetOptionString("main", "use_session_id_ttl", "N") == "Y")
		&& (COption::GetOptionInt("main", "session_id_ttl", 0) > 0)
		&& !defined("BX_SESSION_ID_CHANGE")
	)
		ShowError(GetMessage("CC_BCE1_ERROR_SESSION_ID_CHANGE"));
	?><table class="data-table">
	<tr><td><?echo GetMessage("CC_BCE1_IBLOCK_ID")?></td><td><?echo $arParams["IBLOCK_ID"]?></td></tr>
	<tr><td><?echo GetMessage("CC_BCE1_INTERVAL")?></td><td><?echo $arParams["INTERVAL"]?></td></tr>
	<tr><td><?echo GetMessage("CC_BCE1_ELEMENTS_PER_STEP")?></td><td><?echo $arParams["ELEMENTS_PER_STEP"]?></td></tr>
	<tr><td><?echo GetMessage("CC_BCE1_USE_ZIP")?></td><td><?echo $arParams["USE_ZIP"]? GetMessage("MAIN_YES"): GetMessage("MAIN_NO")?></td></tr>
	</table>
	<?
}
?>