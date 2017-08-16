{"version":3,"file":"script.min.js","sources":["script.js"],"names":["window","SBPEFullForm","this","lazyLoad","ajaxUrl","inited","loaded","container","containerMicro","containerMicroInner","clickDisabled","lastWait","animationStartHeight","instance","getInstance","prototype","init","params","get","_this","offsetHeight","showWait","BX","ajax","method","dataType","url","data","action","sessid","bitrix_sessid","onsuccess","delegate","result","closeWait","success","processAjaxBlock","PROPS","callback","onfailure","style","display","block","callbackExternal","htmlWasInserted","scriptsLoaded","processCSS","insertHTML","processExternalJS","processInlineJS","type","isArray","CSS","length","load","appendChild","create","html","CONTENT","JS","processRequestData","scriptsRunFirst","node","obMsg","bxmsg","document","body","props","id","background","border","position","zIndex","width","height","setTimeout","adjustWait","arContainerPos","pos","div_top","top","GetDocElement","scrollTop","right","left","parseInt","offsetWidth","parentNode","i","len","util","deleteFromArray","removeChild","cleanNode","tasksTaskEvent","taskId","showTaskPopup","createTaskPopup","PopupWindow","autoHide","offsetLeft","offsetTop","overlay","lightShadow","closeIcon","draggable","restrict","closeByEsc","contentColor","contentNoPaddings","buttons","content","attrs","className","events","onAfterPopupShow","proxy","setTaskPopupContent","children","message","setButtons","PopupWindowButton","text","click","destroy","taskLink","replace","Bitrix24","PageSlider","open","onPopupClose","WindowManager","GetZIndex","show","contentNode","containerNode","SBPETabs","tabs","bodies","active","animation","menu","menuItems","changePostFormTab","iblock","tabsObj","setActive","_createOnclick","name","onclick","btn","btnText","innerHTML","isNotEmptyString","evalGlobal","popupWindow","close","tabContainer","arTabs","findChildren","tag","arrow","getAttribute","push","tabId","ii","hasOwnProperty","isDomNode","previousTab","setAttribute","bind","onCustomEvent","form","value","addCustomEvent","jj","needAnimation","isTaskTabLoaded","startAnimation","removeClass","adjust","tabPosTab","bottom","leftStart","widthStart","easing","duration","start","finish","transition","makeEaseInOut","transitions","quart","step","state","complete","addClass","animate","nodeFile","nodeDocs","hasValuesFile","hasValuesDocs","messageBody","childNodes","values1","findChild","values2","rows","indexOf","webdavValues","isElementNode","hasClass","SBPEBinded","eventNode","wdObj","dialogName","urlUpload","agent","uploadFileUrl","controllerInit","endAnimation","restoreMoreMenu","stop","overflowY","opacity","makeEaseOut","cssText","collapse","showMoreMenu","PopupMenu","angle","itemCnt","getLists","tabsDefault","menuItemsListsDefault","menuItemsLists","getMenuItems","createOnclickLists","getMenuItemsDefault","concat","showMoreMenuLists","siteId","bitrix_processes","k","lists","data-name","NAME","data-picture","PICTURE","data-description","DESCRIPTION","data-picture-small","PICTURE_SMALL","data-code","CODE","iblockId","ID","permissions","admin","data-key","data-onclick","error","contentContainer","getTaskForm","componentParameters","GROUP_ID","PATH_TO_USER_TASKS","PATH_TO_USER_TASKS_TASK","PATH_TO_GROUP_TASKS","PATH_TO_GROUP_TASKS_TASK","PATH_TO_USER_PROFILE","PATH_TO_GROUP","PATH_TO_USER_TASKS_PROJECTS_OVERVIEW","PATH_TO_USER_TASKS_TEMPLATES","PATH_TO_USER_TEMPLATES_TEMPLATE","ENABLE_FOOTER","TEMPLATE_CONTROLLER_ID","ENABLE_FORM","BACKURL","Tasks","Util","Query","runOnce","parameters","COMPONENT_PARAMETERS","then","isSuccess","getData","Error","reason","documentElement","container_id","Math","random","htmlspecialchars","menuBindElement","spanIcon","spanDataPicture","spanDataPictureDefault","BXfpGratSelectCallback","item","BXfpGratMedalSelectCallback","BXfpMedalSelectCallback","prefix","data-id","e","SocNetLogDestination","deleteItem","PreventDefault","mouseover","mouseout","BXfpSetLinkName","formName","tagInputName","tagLink1","tagLink2","SocNetGratSelector","obWindowCloseIcon","sendEvent","obCallback","gratsContentElement","itemSelectedImageItem","itemSelectedInput","searchTimeout","obDepartmentEnable","obSonetgroupsEnable","obLastEnable","obWindowClass","obPathToAjax","obDepartmentLoad","obDepartmentSelectDisable","obItems","obItemsLast","obItemsSelected","obElementSearchInput","obElementBindMainPopup","obElementBindSearchPopup","arParams","openDialog","arGratsItems","arGrats","title","selectItem","code","arGratsRows","rownum","bindOptions","forceBindPosition","onPopupShow","onPopupDestroy","closeDialog","offset","setAngle","gratSpan","BlogPostAutoSave","autoSaveRestoreMethod","initRestore","formId","titleID","tags","TAGS","bindLHEEvents","_ob","Init","ob","DISABLE_STANDARD_NOTIFY","form_data","trim","Restore","textNode","href","insertBefore","__onchange","formTags","addTag","tagsArea","BXSocNetLogDestinationFormName","formParams","reinit","formID","SocnetBlogPostInit","editorID","showTitle","submitted","autoSave","handler","LHEPostForm","getHandler","editor","getEditor","restoreAutosave","saveChanges","bShowTitleCopy","nodeBlock","stv","focus","hide","userOptions","save","SaveContent","submit","onHandlerInited","obj","OnAfterShowLHE","div","OnAfterHideLHE","onEditorInited","f","intId","needToReparse","controller","closure","a","b","insertFile","closure2","c","deleteFile","remove","controlID","addFile","checkFile","cursor","GetContent","RegExp","join","SetContent","Focus","p","ready","browser","IsIE","showTitlePlaceholderBlur","apply"],"mappings":"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"}