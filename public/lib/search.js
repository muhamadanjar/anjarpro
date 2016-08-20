function search_layer() {
    resetlayer();
    map.addLayer(layerOSM);
    var text_search = $('#textSearch').val();
    url = rootUrl+'api/map/search/'+text_search;
    var table;
        $.ajax({'url':url}).then(function(response) {
            data = response.length;
                for (var i = 0; i < data; i++) {
                            
                    var sSource = new ol.source.TileWMS({     
                        url: '/geoserver/wms',
                        params: {
                            'LAYERS': response[i].source_layer,
                            'VERSION': '1.1.1',
                            'FORMAT': 'image/png', 
                            tiled: true,
                        },
                    });
                    var sLayerTile = new ol.layer.Tile({
                        source: sSource,
                        visible: true,
                        name: response[i].namalayer,
                        id: response[i].source_layer
                    });
                    map.addLayer(sLayerTile);
                }
            table = table_layer(response);
            $('#table-layer').html(table);

        });               
}
function resetlayer() {
                
    var layers = map.getLayers(),
                    len = layers.length,
                    layersarr = layers.getArray();
                    console.log(layersarr);
                
                    layers.forEach(function(lyr) {
                        map.removeLayer(lyr);    
                    });
}

function table_layer(katalog) {        
    var content = "<table class='table table-condensed table-responsive'>";
    if (katalog.length > 0) {
        for (var i = 0; i < katalog.length; i++) {
            content += "<tr><td>" + katalog[i].namalayer + "</td><td></td><td><a onclick='ZoomToLayer(\""+ (katalog[i].source_layer)+"\")'>Lihat</a></td></tr>";    
        }
    }else{
        content += '<tr><td>Data tidak ada</td></tr>';
    }
    content += '</table>';
                
    return content; 
}