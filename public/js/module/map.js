var tracking = tracking || {};

tracking.map = (function() {

    var day = function(positions) {
        /** Variáveis globais **/
        var $userLat, $userLong;
        getLocalication();

        if($userLat != undefined)
            var center = {lat: $userLat, lng: $userLong};
        else
            var center = {lat: -5.561566, lng: -47.461249};

        var map = new google.maps.Map(document.getElementById('map'), {
            center: center,
            zoom: 14,
        });

        var flightPath = new google.maps.Polyline({
            path: positions.maps,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 4
        });

        var infowindow = new google.maps.InfoWindow();

        for (var i = 0; i < positions.maps.length; i++) {
            var marker = new google.maps.Marker({
                position:  new google.maps.LatLng(positions.maps[i].lat, positions.maps[i].lng),
                map: map,
            });
            if(positions.maps[i].key == 1)
                var key = 'Ligada';
            else
                var key = 'Desligada';
            var content = '<div id="content">'+
                '<h1 id="firstHeading" class="firstHeading">Informação</h1>'+
                '<div id="bodyContent">'+
                '<p><b>Modelo: </b>'+positions.model+'<br />'+
                '<b>Placa: </b>'+positions.board+'<br />'+
                '<b>Odometro: </b>'+positions.maps[i].odometer+'<br />'+
                '<b>Velocidade: </b>'+positions.maps[i].kilometers+' Km/h <br />'+
                '<b>Ignição: </b>'+key+
                '</p>'+
                '</div>'+
                '</div>';

            google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){
                return function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                };
            })(marker,content,infowindow));
        };

        flightPath.setMap(map);
    };

    var getLocalication = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
        function showPosition(position) {
            $userLat = position.coords.latitude;
            $userLong = position.coords.longitude;
        }
        function showError(error)
        {
            switch(error.code)
            {
                case error.PERMISSION_DENIED:
                    console.log('Usuário rejeitou a solicitação de Geolocalização.');
                    break;
                case error.POSITION_UNAVAILABLE:
                    console.log('Localização indisponível.');
                    break;
                case error.TIMEOUT:
                    console.log('A requisição expirou.');
                    break;
                case error.UNKNOWN_ERROR:
                    console.log('Algum erro desconhecido aconteceu.');
                    break;
            }
        }
    };

    return {
        day: day,
    };

}());
