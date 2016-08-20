
        tinymce.init({
            selector: ".tinymce_",
            theme: "modern",
            //skin: "light",
            width: 680,
            height: 300,
            
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code "
           ],
            relative_urls: false,
            browser_spellcheck : true ,
            filemanager_title:"Responsive Filemanager",
            external_filemanager_path:"http://localhost/anjarpro/public/filemanager/",
            external_plugins: { "filemanager" : "../../filemanager/plugin.min.js"},
            codemirror: {
            indentOnInit: true, // Whether or not to indent code on init. 
            path: 'CodeMirror'
          },
          
           image_advtab: true,
           toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
           toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview code  | youtube | qrcode | flickr | picasa | easyColorPicker"
        });
