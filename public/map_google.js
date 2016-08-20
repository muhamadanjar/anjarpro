      /*var map;
      var src = 'https://developers.google.com/maps/tutorials/kml/westcampus.kml';
      //var src = 'https://localhost/anjarpro/public/poi.kml';

      function initialize() {
        map = new google.maps.Map(document.getElementById('map_google'), {
          center: new google.maps.LatLng(-6.6,106.81),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        });
        loadKmlLayer(src, map);
      }

      function loadKmlLayer(src, map) {
        var kmlLayer = new google.maps.KmlLayer(src, {
          suppressInfoWindows: true,
          preserveViewport: false,
          map: map
        });
        google.maps.event.addListener(kmlLayer, 'click', function(event) {
          var content = event.featureData.infoWindowHtml;
          var testimonial = document.getElementById('capture');
          testimonial.innerHTML = content;
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);*/





var xMAP, xDM, xMO;

function xMsgAlert(A) {
    alert(A);
    xFRM(false)
}

function xFBC(C, M, X, Z, F) {
    C.style.padding = '5px';
    var U = document.createElement('div');
    U.style.backgroundColor = 'white';
    U.style.borderStyle = 'solid';
    U.style.borderWidth = '1px';
    U.style.cursor = 'pointer';
    U.style.textAlign = 'center';
    U.title = X;
    C.appendChild(U);
    var T = document.createElement('div');
    T.style.fontFamily = 'Arial,sans-serif';
    T.style.fontSize = '12px';
    T.style.paddingLeft = '4px';
    T.style.paddingRight = '4px';
    T.innerHTML = Z;
    U.appendChild(T);
    google.maps.event.addDomListener(U, 'click', F)
}

function xFCS() {
    if (xMO && xMO.type != 'marker') {
        xMO.setEditable(false)
    }
}

function xFSS(S) {
    xFCS();
    xMO = S;
    S.setEditable(true)
}

function xFDSS(R) {
    if (xMO) {
        xMO.setMap(null);
        R = (typeof R == 'undefined') ? true : false;
        if (R) {
            jQuery('#<%=$this->kLP->ClientID%>').val('')
        }
    }
}

function xFSC(C) {
    var PL = xDM.get('polylineOptions');
    PL.strokeColor = C;
    xDM.set('polylineOptions', PL);
    var PG = xDM.get('polygonOptions');
    PG.fillColor = C;
    xDM.set('polygonOptions', PG)
}

function xFDSN(M) {
    if (M.vertex != null) {
        var t = (xMO.type == 'polygon') ? 3 : 2;
        if (xMO.getPath().getLength() > t) {
            xMO.getPath().removeAt(M.vertex)
        }
    }
    xFUP()
}

function xFSM() {
    var l = jQuery('#<%=$this->kLP->ClientID%>').val().split(",");
    if (l[0] == '') {
        var p = new google.maps.LatLng(xMAP.getCenter().lat(), xMAP.getCenter().lng())
    } else {
        var p = new google.maps.LatLng(l[0], l[1])
    }
    xMO = new google.maps.Marker({
        draggable: true,
        position: p,
        map: xMAP
    });
    xMO.type = google.maps.drawing.OverlayType.MARKER;
    google.maps.event.addListener(xMO, 'dragend', xFUP);
    google.maps.event.addListener(xMO, 'click', xFUP);
    xDM.setDrawingMode(null);
    if (l[0] != '') {
        var b = new google.maps.LatLngBounds();
        b.extend(p);
        xMAP.setZoom(11);
        xMAP.fitBounds(b)
    }
}

function xFSPL() {
    var c = '#ff0000';
    var d = google.maps.geometry.encoding.decodePath(jQuery('#<%=$this->kLP->ClientID%>').val());
    if (d.length > 0) {
        var l = [];
        var b = new google.maps.LatLngBounds();
        for (var i = 0; i < d.length; ++i) {
            var p = new google.maps.LatLng(d[i].lat(), d[i].lng());
            l.push(p);
            b.extend(p)
        }
        xMO = new google.maps.Polyline({
            path: l,
            strokeColor: c,
            strokeOpacity: 0.45,
            strokeWeight: 2
        });
        xMO.type = google.maps.drawing.OverlayType.POLYLINE;
        xMO.setMap(xMAP);
        google.maps.event.addListener(xMO, 'mouseout', xFUP);
        google.maps.event.addListener(xMO, 'click', function() {
            xFSS(xMO);
            xFUP()
        });
        google.maps.event.addListener(xMO, 'rightclick', xFDSN);
        xDM.setDrawingMode(null);
        xMAP.fitBounds(b);
        xFUP()
    } else {
        xFSC(c);
        xDM.setDrawingMode(google.maps.drawing.OverlayType.POLYLINE)
    }
}

function xFSPG() {
    var c = '#ff0000';
    var d = google.maps.geometry.encoding.decodePath(jQuery('#<%=$this->kLP->ClientID%>').val());
    if (d.length > 0) {
        var l = [];
        var b = new google.maps.LatLngBounds();
        for (var i = 0; i < d.length; ++i) {
            var p = new google.maps.LatLng(d[i].lat(), d[i].lng());
            l.push(p);
            b.extend(p)
        }
        xMO = new google.maps.Polygon({
            path: l,
            fillColor: c,
            strokeColor: c,
            fillOpacity: 0.45,
            strokeWeight: 2
        });
        xMO.type = google.maps.drawing.OverlayType.POLYGON;
        xMO.setMap(xMAP);
        google.maps.event.addListener(xMO, 'mouseout', xFUP);
        google.maps.event.addListener(xMO, 'click', function() {
            xFSS(xMO);
            xFUP()
        });
        google.maps.event.addListener(xMO, 'rightclick', xFDSN);
        xDM.setDrawingMode(null);
        xMAP.fitBounds(b);
        xFUP()
    } else {
        xFSC(c);
        xDM.setDrawingMode(google.maps.drawing.OverlayType.POLYGON)
    }
}

function xFRM(R) {
    var x = jQuery('#<%=$this->kAT->ClientID%>').val();
    xFDSS(R);
    switch (x) {
        case "PT":
            xFSM();
            break;
        case "PL":
            xFSPL();
            break;
        case "PG":
            xFSPG();
            break
    }
}

function xFHM() {
    jQuery("#modal-content").modal('show');
}

function xFUP() {
    var c = '';
    var t = jQuery('#<%=$this->kAT->ClientID%>').val();
    switch (t) {
        case "PT":
            c = xMO.getPosition().lat() + ',' + xMO.getPosition().lng();
            break;
        case "PG":
        case "PL":
            c = google.maps.geometry.encoding.encodePath(xMO.getPath());
            break
    }
    jQuery('#<%=$this->kLP->ClientID%>').val(c)
}

function xINIT() {
    xMAP = new google.maps.Map(document.getElementById('map_google'), {
        zoom: 5,
        minZoom: 5,
        maxZoom: 20,
        scrollwheel: false,
        center: new google.maps.LatLng(-4.083453,116.938477),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
        },
        overviewMapControl: true,
        overviewMapControlOptions: {
            opened: true
        },
        disableDefaultUI: true,
        zoomControl: true
    });
    var HBD = document.createElement('div');
    var HB = new xFBC(HBD, xMAP, 'Bantuan', 'Bantuan', xFHM);
    HBD.index = 1;
    xMAP.controls[google.maps.ControlPosition.TOP_RIGHT].push(HBD);
    var RCD = document.createElement('div');
    var RC = new xFBC(RCD, xMAP, 'Hapus map layer', 'Hapus Layer', function() {
        xFRM()
    });
    RCD.index = 1;
    xMAP.controls[google.maps.ControlPosition.TOP_RIGHT].push(RCD);
    xDM = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        markerOptions: {
            draggable: true
        },
        polylineOptions: {
            editable: true
        },
        polygonOptions: {
            strokeWeight: 0,
            fillOpacity: 0.45,
            editable: true
        },
        map: xMAP,
        drawingControl: false
    });
    google.maps.event.addListener(xDM, 'overlaycomplete', function(e) {
        xDM.setDrawingMode(null);
        xMO = e.overlay;
        xMO.type = e.type;
        if (e.type != google.maps.drawing.OverlayType.MARKER) {
            google.maps.event.addListener(xMO, 'mouseout', xFUP);
            google.maps.event.addListener(xMO, 'click', function() {
                xFSS(xMO);
                xFUP()
            });
            google.maps.event.addListener(xMO, 'rightclick', xFDSN);
            xFSS(xMO)
        }
        xFUP()
    });
    google.maps.event.addListener(xMAP, 'click', xFCS);
    xFRM()
}

google.maps.event.addDomListener(window, 'load', xINIT);
