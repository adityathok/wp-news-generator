(function( $ ) {
	jQuery(document).ready(function($) {
        
        function getDataNews(){   
            var today           = new Date();            
            var date            = today.getFullYear()+''+today.getMonth();       
            var apiKey          = $('#apikey').val();
            var country         = $('#country').val();
            var nameSession     = "wpnewsgen"+date+country+apiKey;
            if(sessionStorage.getItem(nameSession) === null) {    
                $('.wpnewsgen-run').text('Loading....');
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'https://newsapi.org/v2/top-headlines',
                    data: { 
                        'country': country,
                        'apiKey': apiKey,
                    },
                    success: function(result){
                        sessionStorage.setItem(nameSession, JSON.stringify(result)); 
                        $('.wpnewsgen-run').text('Load News');
                        return sessionStorage.getItem(nameSession);
                    }
                });
            } else {  
                return sessionStorage.getItem(nameSession);
            }
        }
        
        $('.wpnewsgen-run').click(function(){
            var dataNews = getDataNews();
            console.log( JSON.parse(dataNews));
        });
    });
})( jQuery );