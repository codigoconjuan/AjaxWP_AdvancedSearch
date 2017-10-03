
jQuery(function($) {
    
    $('#search_btn').on('click', function() {
      
        $('#result').html('');
      
        var recipe = $('#recipe_name').val();
        var price_range = $('#price_range').val();
        var course = $('#course').val();
        var calories = $('#calories').val();
      
        var postData = {
          action: 'advancedSearch',
          recipe_name: recipe,
          price_range : price_range,
          course: course,
          calories: calories
        }
      
        jQuery.ajax({
            url : admin_url.ajax_url,
            type : 'post',
            data : postData
        }).done(function(response) {
            console.log(response.length);
            $.each(response, function(index, object) {
              var result  = '<div class="medium-6 columns">';
                  result += '<div class="row">';
                  result += '<div class="medium-6 columns">';
                  result += '<a href="'+ object.link + '">';
                  result += object.image;
                  result += '</a>';
                  result += '</div>';
                  result += '<div class="medium-6 columns">';
                  result += '<h2>' + object.name + '</h2>';
                  result += '<p>' + object.content + '</p>';
                  result += '<a class="button" href="'+ object.link + '">View Recipe</a>';
                  result += '</div>'; //closing row
                  result += '</div>'; //closing medium-6
                  
              $('#result').append(result);
            });
            
            if(!response.length > 0 ) {
              var result = '<h2>No results found, try with other search terms</h2>';
              $('#results_found').html(result);
            } else {
              var result = '<h2>There are: ' +  response.length + ' result(s)';
              $('#results_found').html(result);
            }
            
            
            
        });
    });

});