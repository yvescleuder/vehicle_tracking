var tracking = tracking || {};

tracking.report = (function() {

    var getDisplacements = function() {
        var success = function(data) {
            $('#simpletable').DataTable().clear().draw();
            var point = [];
            $.each(data,function(key, value)
            {
                point = [value['board'], value['model'], value['startLat'], value['startLng'], value['startDate'], value['startAddress'], value['finalLat'], value['finalLat'], value['finalDate'], value['finalAddress'], value['distance'], value['time']]
                $('#simpletable').DataTable().row.add(point).draw();
            });
        };

        var number_module = $('#vehicles').val();
        var date = $('#date').val();

        tracking.ajax.send('GET', '/api/'+number_module+'/report/displacements/'+date, '', 'json', function() {}, {}, success);
    };

    var getPoints = function() {
        var success = function(data) {
            $('#simpletable').DataTable().clear().draw();
            var point = [];
            $.each(data,function(key, value)
            {
                point = [value['board'], value['model'], value['odometer']+' km', value['lat'], value['lng'], value['date'], value['address'], value['kilometers']+' km/h', value['key'] == 1 ? 'Ligada' : 'Desligada'];
                $('#simpletable').DataTable().row.add(point).draw();
            });
        };

        var number_module = $('#vehicles').val();
        var date = $('#date').val();

        tracking.ajax.send('GET', '/api/'+number_module+'/report/points/'+date, '', 'json', function() {}, {}, success);
    };

    return {
        getDisplacements: getDisplacements,
        getPoints: getPoints
    };

}());
