(function( $ ) {
	jQuery(document).ready(function($) {	
        $('.wpnewsgen-run').click(function(){
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'https://newsapi.org/v2/top-headlines',
                data: { 
                    'country': $('#country').val(),
                    'apiKey': $('#apikey').val(),
                    'pageSize': $('#page').val(),
                },
                success: function(result){                    
                    console.log(result);
                }
            });
        });
    });
})( jQuery );