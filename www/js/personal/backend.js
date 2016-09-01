
function exportValueForUnknows(element){
    var exportTo = document.getElementById(element.getAttribute("data-export"));
    
    var type_input = document.getElementById(element.getAttribute("data-export").replace("sku_id", "sku_type"));
    var brand_input = document.getElementById(element.getAttribute("data-export").replace("sku_id", "sku_brand"));
    
    var url = element.getAttribute("data-action") + 
            "/?brand=" + $(brand_input).val() + 
            "&type=" + $(type_input).val();
    generateOptions(exportTo, url);
}


