
        $('#start').typeahead({
            source: function (query, process) { 
                return $.get('bookingsearch', {
                    query: query
                }, function (data) {
                    return process(data);console.log(data);
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
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#date').attr('min', minDate);
});


