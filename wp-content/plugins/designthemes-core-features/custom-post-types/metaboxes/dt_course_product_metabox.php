<?php
global $post;

$product_args = array(	'post_type' 		=> array( 'product' ),
						'posts_per_page' 	=> -1,
						'orderby'         	=> 'title',
						'order'           	=> 'ASC',
						'meta_query' 		=> array(
													array(
														'key'     => '_ywsbs_subscription',
														'compare' => '=',
														'value' => 'no',
													),											
												),					
						'post_status'		=> array( 'publish', 'private', 'draft' ),
						'suppress_filters' 	=> 0
					);
$products_list1 = get_posts( $product_args );

$product_args = array(	'post_type' 		=> array( 'product' ),
						'posts_per_page' 	=> -1,
						'orderby'         	=> 'title',
						'order'           	=> 'ASC',
						'meta_query' 		=> array(
													array(
														'key'     => '_ywsbs_subscription',
														'compare' => 'NOT EXISTS',
													),												
												),					
						'post_status'		=> array( 'publish', 'private', 'draft' ),
						'suppress_filters' 	=> 0
					);
$products_list2 = get_posts( $product_args );

$products_array = array_merge($products_list1, $products_list2);


$dt_product_id = get_post_meta( $post->ID, 'dt-course-product-id', true );
?>
<p><?php _e( 'Choose WooCommerce Product to link with this course for payment purpose', 'dt_themes' ); ?></p>
<p><?php _e("Leave this field empty if you are going to add this course to class.",'dt_themes');?></p>
<select name="dt-course-product-id" id="dt-course-product-id" class="dt-chosen-select">
    <option value=""><?php _e( 'None', 'dt_themes' ); ?></option>
    <?php
    foreach ( $products_array as $product ) {
		$sel_str = '';
		if($product->ID == $dt_product_id) {
			$sel_str = 'selected="selected"'; 
		}
        ?>
        <option value="<?php echo $product->ID; ?>" <?php echo $sel_str; ?>><?php _e( $product->post_title, 'dt_themes' ); ?></option>
        <?php
    }
    ?>
</select>