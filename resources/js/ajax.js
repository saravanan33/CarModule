
        $('#start').typeahead({
            source: function (query, process) { 
                return $.get('bookingsearch', {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });

$('#end').typeahead({
    source: function (query, process) {
        return $.get('bookingsearch',
         {
            'query': query
        }, 
        function (data) 
        {             
            return process(data);
        });
    }
});


