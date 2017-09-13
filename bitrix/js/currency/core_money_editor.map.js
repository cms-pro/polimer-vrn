{"version":3,"file":"core_money_editor.min.js","sources":["core_money_editor.js"],"names":["BX","namespace","listCurrency","message","Currency","Editor","param","this","input","callback","currency","value","ready","delegate","init","prototype","bind","proxy","valueEdit","unbind","clean","formatValue","setCurrency","getUnFormattedValue","getFormattedValue","callValueChangeCallback","cursorPos","getCaretPosition","originalValue","changeValue","length","setCaretPosition","apply","onCustomEvent","getBaseCurrencyId","key","hasOwnProperty","prop","getString","trimTrailingZeros","formattedValue","ch","replace","RegExp","baseValue","valueLength","charAt","regExp","decPointPosition","match","index","countDigit","i","symbolPosition","symbol","isDigit","indexOf","substr"],"mappings":"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"}