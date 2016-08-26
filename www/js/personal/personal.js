function inputChanged(element) {
    if(element === null){
        return;
    }
    var hf = element.hasAttribute("data-function");
    if (hf === true) {
        var f = element.getAttribute("data-function");
        //$("#jsmonitor").append(element.id + " ->"+  f + "<br />");
        
        if (f === "exportValue") {
            exportValue(element);
        }
        
        if (f === "importOptionsIfEmpty") {
            importOptionsIfEmpty(element);
        }
        
        if (f === "exportOptionsForUnknows") {
            exportOptionsForUnknows(element);
        }
        
        if (f === "checkAvailability") {
            checkAvailability(element);
        }
        
    }
    
    var hs = element.hasAttribute("data-script");
    if (hs === true) {
        
    }
}



