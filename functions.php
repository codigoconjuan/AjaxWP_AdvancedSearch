
<?php 
function advancedSearch() {
        $recipe = $_POST['recipe_name'];
        $price = $_POST['price_range'];
        $course = $_POST['course'];
        $calories = $_POST['calories'];
        $calories = explode('-', $calories);
        $min = $calories[0];
        $max = $calories[1];
        
        $args = array(
              'post_type' => 'recipes',
              'posts_per_page' => -1, 
              's' => $recipe,
              'tax_query' => array(
                    'relation' => 'AND',
                    array(
                          'taxonomy' => 'price_range',
                          'field' => 'slug',
                          'terms' => $price
                    ),
                    array(
                          'taxonomy' => 'course',
                          'field' => 'slug',
                          'terms' => $course
                    ),
              ),
              'meta_query' => array(
                    array(
                        'key' => 'input-metabox',
                        'value' => array($min, $max),
                        'type' => 'numeric',
                        'compare' => 'BETWEEN'
                    ),
              ),
        );
        $recipe_results = get_posts($args);
        $list = array();
        foreach($recipe_results as $recipe) {
           setup_postdata($recipe);
           $list[] = array(
                 'object' => $recipe,
                 'id'     => $recipe->ID,
                 'name'   => $recipe->post_title,
                 'content' => wp_trim_words($recipe->post_content, 18),
                 'image' => get_the_post_thumbnail( $recipe->ID, 'entry'),
                 'link' => get_permalink($recipe->ID)
           );
        }
        header("Content-type: application/json");
        echo json_encode($list);
        die;
  }
  
  add_action('wp_ajax_nopriv_advancedSearch', 'advancedSearch');
  add_action('wp_ajax_advancedSearch', 'advancedSearch');
  