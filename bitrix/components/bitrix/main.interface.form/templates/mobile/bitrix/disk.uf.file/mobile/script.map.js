{"version":3,"file":"script.min.js","sources":["script.js"],"names":["window","repo","BX","namespace","Disk","UFMobile","UF","params","this","dialogName","CID","controlName","container","bind","proxy","click","handleAppFile","delegate","showDiskDialog","handleDiskFile","urls","location","protocol","host","message","agent","Uploader","getInstance","id","streams","allowUpload","uploadFormData","uploadMethod","uploadFileUrl","showImage","sortItems","input","dropZone","placeHolder","queueFields","thumb","tagName","className","fields","template","preview","width","height","init","prototype","upload","folder","getAttach","getFile","e","PreventDefault","show","buttons","title","callback","app","takePhoto","quality","source","correctOrientation","targetWidth","targetHeight","destinationType","Camera","DestinationType","DATA_URL","platform","push","BXMobileApp","UI","ActionSheet","image","dataBlob","UploaderUtils","dataURLToBlob","name","date","format","onChange","values","_onFileIsCreated","onFileIsCreated","_onFileIsBound","onFileIsBound","_onFileIsAppended","onFileIsAppended","_onUploadStart","onUploadStart","_onUploadProgress","onUploadProgress","_onUploadDone","onUploadDone","_onUploadError","onUploadError","addCustomEvent","length","ar1","ar2","ii","findChild","innerHTML","getAttribute","replace","onAttach","file","size","getFormattedSize","item","bindFile","node","getItem","addClass","progress","result","removeClass","n","findChildByClassName","inp","create","attrs","type","value","appendChild","onCustomEvent","hasClass","del","hasAttribute","setAttribute","deleteFile","openFile","remove","url","indexOf","Document","open","UFMobileView","bindNode","proxy_context","nameNode","console","log","add","findChildren","addView","getByName","hasOwnProperty"],"mappings":"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"}