(function( $ ) {
	jQuery(document).ready(function($) {
        
        $(document).on('click','.icon-toggle',function(){
            var node = $(this).data('node');
            $('.wpnewsgen-card-post[data-node="'+node+'"]').toggleClass('open');
        });

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
            if(dataNews){
                var dataN = JSON.parse(dataNews);
                var articles = dataN.articles;
                articles.forEach(function (article, index) {
                    var node = Math.floor(Math.random() * 9999999) + 3;
                    var content = article.content+' Source="'+article.url+'"';
                    var cardpost = $('.wpnewsgen-layout-default').clone().removeClass('wpnewsgen-layout-default').attr('data-node',node);
                    cardpost.find('.icon-toggle').attr('data-node',node);
                    cardpost.find('.post-title').text(article.title);
                    cardpost.find('input[name="post_title"]').text(article.title);
                    cardpost.find('input[name="url_post_image"]').text(article.urlToImage);
                    cardpost.find('textarea[name="post_content"]').text(content);

                    cardpost.appendTo('.wpnewsgen-layout-datanews');
                });
            }
        });
    });
})( jQuery );