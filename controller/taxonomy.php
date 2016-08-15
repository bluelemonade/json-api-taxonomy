<?php

class JSON_API_Taxonomy_Controller {

  public function get() {
    global $json_api;
    global $post;
    global $post_count;

    $taxonomy = $json_api->query->taxonomy;
    $slug = $json_api->query->slug;

    if(empty($taxonomy)){
      $json_api->error("Include a 'taxonomy' on query var.");
    }
    if(empty($slug)){
      $json_api->error("Include a 'slug' on query var.");
    }

    $args = array(
        'tax_query' => array(
                array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $slug,
                )
        )
    );
    $query = new WP_Query( $args );

    $return = array();
    if ( $query->have_posts() ) {
      $return = array(
        'status' => 'ok',
        'count' => $query->post_count,
        'count_total' => $query->found_posts,
        'pages' => $query->max_num_pages,
      );
      $arrPosts = array();
      while ( $query->have_posts() ) {
        $query->the_post();
        $arrPosts[] = $post->to_array();
      }
      $return['posts'] = $arrPosts;
    } else {
        $json_api->error("No data found");
    }

    return $return;
  }

}

?>
