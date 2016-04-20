var fileupObj;

function fileupload() {

    fileupObj = $(".fileUpld").uploadFile({
        url: $(".start-upload").attr('data-action'),
        showPreview: true, previewHeight: "150px", previewWidth: "150px",
        multiple: false, maxFileCount: 1, autoSubmit: false,
        fileName: "myfile",
        acceptFiles: $(".start-upload").attr('data-mime'),
        extraHTML: function () {
            return '<div><input class="form-control" type="text" name="title" placeholder="Title" /> <br/>';
        },
        formData: {
            "position": $(".start-upload").attr('data-position'),
            "mime": $(".start-upload").attr('data-mime')
        },
        onSubmit: function (files) {
            $("#eventsmessage").html($("#eventsmessage").html() + "<br/>Submitting...");
        },
        onSuccess: function (files, data, xhr) {
            if (xhr.responseText === 'false') {
                $(".ajax-file-upload-bar").html("File error ...");
                $(".ajax-file-upload-bar").css({"background-color": "red"});
            } else {
                var result = xhr.responseText;
                var parent = getParentByClass(document.getElementById('fileuploader'), "bodygrid");
                addThumb(parent, result);
                parent = getParentByClass(document.getElementById('fileuploader'), "datawindow");
                parent.parentNode.removeChild(parent);
            }
        }
    });
}

function addThumb(parent_element, result){
    var template = (parent_element.parentNode).previousElementSibling.children[0];
    var obj = JSON.parse(result);
    var layer = template.cloneNode(true);
    parent_element.insertBefore(layer, parent_element.childNodes[0]);
    var thumbnail = layer.children[0];
    var thumbtools = thumbnail.children[0];
    var img = document.createElement("IMG");
    img.setAttribute("src", "/" + obj.url);        
    thumbnail.insertBefore(img, thumbnail.childNodes[0]);
    var div = document.createElement("DIV");
    div.setAttribute("class", "thumb-title");
    div.appendChild(document.createTextNode(obj.title));
    thumbnail.appendChild(div);
    
    var nodes = thumbtools.children;
    for (var i = 0; i < nodes.length; i++) {
        nodes[i].setAttribute("data-id", obj.id); 
    }
}
