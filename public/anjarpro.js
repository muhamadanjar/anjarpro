
$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
});

$.extend({
    getValues: function(url) {
        var result = null;
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            async: false,
            success: function(data) {
                result = data;
            }
        });
        return result;
    }
});

(function($, window, document){ }(jQuery, window, document));
   
tinymce.init({
    selector: ".tinymce_anjarpro",
            theme: "modern",
                //skin: "light",
    width: 580,
    height: 300,    
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code "
    ],
    relative_urls: false,
    browser_spellcheck : true ,
    filemanager_title:"Responsive Filemanager",
    external_filemanager_path:"http://"+window.location.hostname+"/anjarpro/public/filemanager/",
    external_plugins: { "filemanager" : "../../filemanager/plugin.min.js"},
    codemirror: {
        indentOnInit: true, // Whether or not to indent code on init. 
        path: 'CodeMirror'
    },  
    image_advtab: true,
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview code  | youtube | qrcode | flickr | picasa | easyColorPicker"
});

function numeralsOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
    ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Hanya Nomor yang bisa di input pada kolom ini.");
            return false;
        }
    return true;
}

function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        alert("Enter letters only.");
        return false;
    }
    return true;
}

function ynOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 31 && charCode != 78 && charCode != 89 && charCode != 110 && charCode != 121) {
    alert("Enter \"Y\" or \"N\" only.");
    return false;
    }
    return true;
}


function getGeoserverLayer () {
                
    var url = '/geoserver/wms?request=GetCapabilities&service=WMS&version=1.1.1&info_format=text/html';
    var parser = new ol.format.WMSCapabilities();
    $.ajax({
        url: url,
        dataType : 'json',
    }).then(function(response) {
       
                    
    });
}


/*var errorAjax = function(x,e,thrownError){
    if(x.status==0){
        console.log('You are offline!!\n Please Check Your Network.');
    }else if(x.status==404){
        console.log('Requested URL not found.');
    }else if(x.status==500){
        console.log('Internel Server Error.');
    }else if(e=='parsererror'){
        console.log('Error.\nParsing JSON Request failed.'+thrownError);
            
    }else if(e=='timeout'){
        console.log('Request Time out.');
    }else {
        console.log('Unknow Error.\n'+x.responseText);
    }
}*/

(function($, window, document){
    $('.formConfirm').on('click', function(e) {
        e.preventDefault();
        var el = $(this).parent();
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html('<h6>'+msg+'</h6>')
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
    });

    $('#formConfirm').on('click', '#frm_submit', function(e) {
            var id = $(this).attr('data-form');
          
            $(id).submit();
    });
  

}(jQuery, window, document));

(function($, window, document){
    
    $(function(){
        $(".fungsi_rth").change(function(){
            var fungsi_rth = $(".fungsi_rth").val();
            $.ajax({  
                url: "get-rth-klasifikasi-"+fungsi_rth,
                data: "fungsirthid="+fungsi_rth,
                cache: false,
                success: function(msg){
                    $(".klasifikasi_rth").html(msg);
                },

            });
        });
    });
       
   
}(jQuery, window, document));

(function($, window, document){
    $('.furniture').tagsInput({width:'100%'});
    $('.vegetasi').tagsInput({width:'100%'});
    $(function() {
        $(".rth").validate({
            errorPlacement: function(error, element) {
                if (element.parent().parent().attr("class") == "checker" || element.parent().parent().attr("class") == "choice" ) {
                  error.appendTo( element.parent().parent().parent().parent().parent() );
                } 
                else if (element.parent().parent().attr("class") == "checkbox" || element.parent().parent().attr("class") == "radio" ) {
                  error.appendTo( element.parent().parent().parent() );
                } 
                else {
                  error.insertAfter(element);
                }
            },
            rules: {
                nama_rth:{
                    required:true,
                    minlength:2
                }
            },
            messages: {
                nama_rth: {
                    required: "Error! harus diisi",
                },
                
                
            },
            success: function(label) {
                label.text('Success!').addClass('valid');
            }
        });
    });
}(jQuery, window, document));

(function($, window, document){
    //Form openlayers
    $( "#layeropacity" ).val(1);
    $( "#slider_opacity" ).slider({
        value:0.5,
        min: 0,
        max: 1,
        step: 0.1,
        slide: function( event, ui ) {
            $( "#layeropacity" ).val(ui.value);
        }
    });

    var source_layer,layername;
    var btn = $('#btnLoadextent');
    btn.click(function (argument) {
        source_layer = $('.source_layer').val();
        console.log(source_layer);
        layername = source_layer;
        var url = '/geoserver/wms?request=GetCapabilities&service=WMS&version=1.1.1';
        var parser = new ol.format.WMSCapabilities();
        $.ajax(url).then(function(response) {
            var result = parser.read(response);
            var Layers = result.Capability.Layer.Layer;
            var extent,extent_;
            for (var i=0, len = Layers.length; i<len; i++) {
                var layerobj = Layers[i];
                if (layerobj.Name == layername) {
                    extent = layerobj.BoundingBox[0].extent;
                    $('#x_min').val(extent[0]);
                    $('#y_min').val(extent[1]);
                    $('#x_max').val(extent[2]);
                    $('#y_max').val(extent[3]);
                    break;
                }  
                    
            }
            console.log(extent);

        });    
    });


    

}(jQuery, window, document));

(function($, window, document){ }(jQuery, window, document));

(function($, window, document){
	$('.btn-harian-proses').on('click', function(e) {
		
	
		
    	e.preventDefault();
    	var el = $(this).parent();
        var harianid = el.attr('data-harianid');
        //var bobot = el.attr('data-bobot');
		var bobot = $(this).closest('.form-group').find("input[name='bobot']").val();

	
		var formData = {
            harianid: harianid,
            bobot: bobot,
			'_token': $('input[name=_token]').val(),
        }
		console.log(formData);
		
		$.ajax({
			type: 'POST',
			url: '/edit-bobot',
			dataType : 'json',
			data: formData,
			success: function (data) {
                console.log(data);
            },
			error: function (data) {
                console.log('Error:', data);
            }
		});
            
        
    });


}(jQuery, window, document));
