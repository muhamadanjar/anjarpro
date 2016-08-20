<!DOCTYPE html>

<html lang="en">
<head>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <!-- The jQuery library is a prerequisite for all jqSuite products -->
    <script type="text/ecmascript" src="{{ asset('vendor/jquery/jquery.min.js')}}"></script> 
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="{{ asset('vendor/jqgrid/js/trirand/i18n/grid.locale-en.js')}}"></script>
    <!-- This is the Javascript file of jqGrid -->   
    <script type="text/ecmascript" src="{{ asset('vendor/jqgrid/js/trirand/jquery.jqGrid.min.js')}}"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.-->
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('vendor/jqgrid/css/trirand/ui.jqgrid-bootstrap.css')}}" />
    
  <script>
    $.jgrid.defaults.width = 780;
    $.jgrid.defaults.styleUI = 'Bootstrap';
  </script>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
    <meta charset="utf-8" />
    <title>jqGrid Loading Data - JSON</title>
</head>
<body>
<div style="margin-left:20px">
    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>
</div>
    <script type="text/javascript"> 
    
        $(document).ready(function () {
            $("#jqGrid").jqGrid({
                url: 'jgridData-modul',
                mtype: "GET",
                datatype: "json",
                page: 1,
                colModel: [
                    { label : "Order ID",name: 'moduleid', key: true, width: 75 },
                    { label : "Customer ID",name: 'modulename',width: 150, },
                    { label : "Country" ,name:'Country'},
                    { label : "Price" ,name:'Price'},
                    { label : "Quantity" ,name:'Quantity'},
                    
                ],
                loadonce: true,
                viewrecords: true,
                width: 780,
                height: 250,
                rowNum: 10,
                pager: "#jqGridPager"
            });
      
            $('#jqGrid').navGrid("#jqGridPager", {                
                search: true, // show search button on the toolbar
                add: false,
                edit: false,
                del: false,
                refresh: true
            });
        });

    </script>
</body>
</html>