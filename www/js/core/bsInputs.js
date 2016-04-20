/* global lang, moment */

function prepareBSInputs() {
    prepareDateTime();
    prepareChosen();
    repareChosen();
    prepareWysihtml5();
    
}

function prepareWysihtml5(){
    var inputs = document.getElementsByClassName("wysihtml");
    for (var i = 0; i < inputs.length; i++) {
        $(inputs[i]).wysihtml5({toolbar: {
                "fa": true,
            "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
            "emphasis": true, //Italics, bold, etc. Default true
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
            "html": false, //Button which allows you to edit the generated HTML. Default false
            "link": true, //Button to insert a link. Default true
            "image": false, //Button to insert an image. Default true,
            "color": false //Button to change color of font  
        }});
    }
}

function repareChosenHeight(id){
    var chosen = getChildrenByClass(document.getElementById(id), "chosen-choices");
    var height = $(chosen).outerHeight();
    if(height !== null){
        $("#" + id).css("margin-bottom", $(chosen).outerHeight() - $("#" + id).height() + 15);
    }
    
}

function repareChosen(){
    var chosens = document.getElementsByClassName("chosen-container-multi");
    for (var i = 0; i < chosens.length; i++) {
        repareChosenHeight(chosens[i].id);
    }
    //$("#jsmonitor").text(chosens.length);
}


function prepareChosen(){
    var selects = document.getElementsByClassName("chosen-select");
    var id;
    for (var i = 0; i < selects.length; i++) {
        id = selects[i].id;
        if (document.getElementById(id + "_chosen") === null && selects[i].tagName === 'SELECT') {
            $("#" + id).chosen().change(function () {
                repareChosenHeight(this.id + "_chosen");
                inputChanged(this);
            });
        }
    }
    /*
    var config = {
        '.chosen-select': {no_results_text: "No results!"},
        //'.chosen-select-deselect': {allow_single_deselect: true},
        //'.chosen-select-no-single': {disable_search_threshold: 5},
        //'.chosen-select-no-results': {no_results_text: 'No results found!'},
        //'.chosen-select-width': {width: "100%"}
        
    };
    for (var selector in config) {
            $(selector).chosen(config[selector]).change(function () {
                repareChosenHeight(this.id + "_chosen");
                inputChanged(this);
            });
    }
    */
}

function splitDate(date){
    if(null !== date && date !== ""){
        //$("#jsmonitor").append("date: " + date + " ?<br />");
        date = date.replace(" ", "-");
        date = date.replace(":", "-");
        var parts = date.split("-");
        var year = parts[0];
        var month = parts[1] - 1;
        var day = parts[2];
        var hour = parts[3];
        var min = parts[4];
        date = moment([year, month, day, hour, min, 50, 125]);
        date.format("MMMM Do YYYY, h:mm:ss a");
        if(moment(date).isValid() === false){
            date = "";
        }
    }else{
        date = "";
    }
    //$("#jsmonitor").append("date: " + date + "<br />");
    return date;
}

function prepareDateTime(){
    var groups = getInputGroupDate();
    var id, input, value, format;
    if (null !== groups) {
        for (var i = 0; i < groups.length; i++) {
            input = document.getElementById(groups[i]).getElementsByTagName("INPUT")[0];
            format = input.getAttribute("data-formatime");
            value = splitDate(input.getAttribute("value"));
            input.removeAttribute("value");
            //$("#jsmonitor").append(groups[i] + " value : " + value + "<br />");
            id = "#" + groups[i];
            $(id).datetimepicker({
                locale: lang, format: format, defaultDate: value, stepping: 5, sideBySide: true
            });
        }
        for (i = 0; i < groups.length; i++) {
            id = "#" + groups[i];
            //$("#jsmonitor").append(i + ", " + id + "<br />");
            $(id).on("dp.change", function (e) {
                var input = $(this).children( "input" );
                var datalink = $(input).attr("data-link");
                if (undefined !== datalink) {
                    var idb = "#" + datalink;
                    var range = $(input).attr("data-range");
                    //$("#jsmonitor").append("range : " + range + "<br />");
                    if (range === "min") {
                        $(idb).data("DateTimePicker").minDate(e.date);
                    } else if (range === "max") {
                        $(idb).data("DateTimePicker").maxDate(e.date);
                    }
                }
            });
        }
    }
}

function getInputGroupDate(){
    var divs = document.getElementsByClassName("input-group date");
    var inputdate = new Array(divs.length);
    if(null !== divs){
        for (var i = 0; i < divs.length; i++) {
            inputdate[i] = divs[i].id;
        }
    }
    return inputdate;
}

function inputArguments(id, argument){
    var element = document.getElementById(id);
    var input = element.getElementsByTagName("INPUT")[0];
    return input.getAttribute(argument);
    //$(id).datetimepicker({locale: 'pt', format: formattime});
}



function convertValue(id, value){
    var input = document.getElementById(id);
    if(input === null){
        return;
    }
    if(input.tagName !== "INPUT" && input.tagName !== "SELECT" && input.tagName !== "TEXTAREA"){
        input = input.getElementsByTagName("INPUT")[0];
    }
    var formattime = input.getAttribute('data-formatime');
    if(null !== formattime){
        value = parseDate2Php(value, formattime);
    }else if(input.tagName === "SELECT" && value === "0"){
        value = "";
    }
    //$("#jsmonitor").append(id + "-> " + value + " <br />");
    return value;
}

function parseDate2Php(value, formattime){
    var formatted = moment.parseFormat(value);
    var day = "00"; var month = "00"; var year = "0000"; var hour = "00"; var min = "00";
    var pieces_fmt, pieces_val; 
    if (formattime.indexOf("LL") === 0) {
        var months = moment.months().toString().split(",");
        for (var m = 0; m < months.length; m++) {
            if (value.indexOf(months[m]) > -1) {
                month = ("00" + (m + 1)).slice(-2);
            }
        }
        pieces_fmt = formatted.split(" ");
        pieces_val = value.split(" ");
        for (var i = 0; i < pieces_fmt.length; i++) {
            if(pieces_fmt[i] === "D"){
                day = ("00" + (pieces_val[i])).slice(-2);
            }else if(pieces_fmt[i] === "YYYY"){
                year = pieces_val[i];
            }else if(pieces_fmt[i] === "H:mm"){
                var pieces_time = pieces_val[i].split(":");
                hour = pieces_time[0];
                min = pieces_time[1];
            }
        }
    }else if(formattime.indexOf("LT") === 0){
        pieces_val = value.split(":");
        hour = pieces_val[0];
        min = pieces_val[1];
    }else if(formattime === "L"){
        pieces_fmt = formatted.split("/");
        pieces_val = value.split("/");
        for (var i = 0; i < pieces_fmt.length; i++) {
            if(pieces_fmt[i] === "DD"){
                day = ("00" + (pieces_val[i])).slice(-2);
            }else if(pieces_fmt[i] === "MM"){
                month = pieces_val[i];
            }else if(pieces_fmt[i] === "YYYY"){
                year = pieces_val[i];
                
            }
        }
    }
    var isoDate = new Date(year, month, day, hour, min );
    if(isoDate === 'Invalid Date'){
        return "";
    }else{
        return year + "-" + month + "-" + day + " " + hour + ":" + min + ":00";
    }
}

function chosenSelectGroup(element){
    var input = element.getAttribute("data-input");
    var group = element.getAttribute("data-group");
    $('#' + input).find('option').prop('selected', false);
    if(group !== null){
        $('#' + input).find('optgroup[label="' + group + '"] option').prop('selected', true);
    }
    $('#' + input).trigger("chosen:updated");
    repareChosenHeight(input + "_chosen");
}
