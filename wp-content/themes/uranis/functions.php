<?php
add_action( 'template_redirect', 'remove_type_attr' );
	
function remove_type_attr() {
	ob_start( function ( $buffer ) {
		return preg_replace( "%[ ]type=['\"]text\/(javascript|css)['\"]%", '', $buffer );
	} );
}
add_theme_support('menus');
add_theme_support( 'post-thumbnails',array('page','post')); 
register_nav_menus(array('top-menu' => __('Top Menu','theme')));
register_nav_menus(array('footer-products' => __('Footer Products','theme')));
register_nav_menus(array('quick-links' => __('Quick Links','theme')));
register_nav_menus(array('category-menu' => __('Quick Categories','theme')));

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'current';
  }
  return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function add_anchor_class($attr,$item,$args)
{
	if (isset($args->a_class)) 
	{
		$attr['class'] = $args->a_class;
	}
	return $attr;
}
add_filter('nav_menu_link_attributes','add_anchor_class',10,3);

function apurba_wp_title( $title, $sep ) 
{
	global $paged, $page;
	if ( is_feed() ) 
	{
		return $title;
	}
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) 
	{
		$title = "$title $sep $site_description";
	}
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) 
	{
		$title = "$title $sep " . sprintf( __( 'Page %s', 'apurba' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'apurba_wp_title', 10, 2 );




add_action('admin_menu', 'site_details');
function site_details() 
{
	add_menu_page('Site Details', 'Site Details', 'administrator', __FILE__, 'my_cool_plugin_settings_page' ,'dashicons-admin-generic' );
	add_action( 'admin_init', 'register_site_details' );
}
function register_site_details() 
{
    
	register_setting( 'theme-option-group', 'email2' );
	register_setting( 'theme-option-group', 'fax_number' );
	register_setting( 'theme-option-group', 'ph_number1' );
	register_setting( 'theme-option-group', 'facebook');
	register_setting( 'theme-option-group', 'insta');
	register_setting( 'theme-option-group', 'linkedin');
	register_setting( 'theme-option-group', 'google_map');
	register_setting( 'theme-option-group', 'newsletter_title');
	register_setting( 'theme-option-group', 'newsletter_caption');
	
	register_setting( 'theme-option-group', 'thani_address' );
	register_setting( 'theme-option-group', 'thani_ph_no' );
	register_setting( 'theme-option-group', 'thani_whatsapp' );
	register_setting( 'theme-option-group', 'thani_email' );
	
	register_setting( 'theme-option-group', 'dip_address' );
	register_setting( 'theme-option-group', 'dip_ph_no' );
	register_setting( 'theme-option-group', 'dip_whatsapp' );
	register_setting( 'theme-option-group', 'dip_email' );

}
function my_cool_plugin_settings_page() 
{
?>
<div class="wrap">
	<h1>Site Details</h1>
	<form method="post" action="options.php">
		<?php settings_fields( 'theme-option-group' ); ?>
		<?php do_settings_sections( 'theme-option-group' ); ?>
		<table class="form-table">
    	<tr valign="top">
    		<th scope="row">Email ID</th>
				<td><input type="email" name="email2" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('email2') ); ?>" /></td>
    	</tr>
    	<tr valign="top">
    		<th scope="row">Phone Number</th>
				<td><input type="text" name="ph_number1" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('ph_number1') ); ?>" /></td>
    	</tr>
			<tr valign="top">
  			<th scope="row">Facebook Link</th>
  			<td><input type="text" name="facebook" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('facebook') ); ?>" /></td>
    	</tr>
  		<tr valign="top">
  			<th scope="row">Instagram Link</th>
				<td><input type="text" name="insta" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('insta') ); ?>" /></td>
  		</tr>
  		<tr valign="top">
  			<th scope="row">LinkedIn Link</th>
  			<td><input type="text" name="linkedin" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('linkedin') ); ?>" /></td>
  		</tr>
  		<tr valign="top">
  			<th scope="row"><br>Google Map</th>
  			<td>
  	
					<?php
					$google_map = get_option('google_map');
					wp_editor( $google_map, 'google_map', array(
	      			'wpautop'       => true,
	      			'media_buttons' => true,
	      			'textarea_name' => 'google_map',
	      			'textarea_rows' => 6,
	      			'teeny'         => true
	      			) );
					?>
			
  			</td>
  		</tr>
  		<tr valign="top">
    		<th scope="row">Newsletter Title</th>
				<td><input type="text" name="newsletter_title" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('newsletter_title') ); ?>" /></td>
    	</tr>
    	<tr valign="top">
    		<th scope="row">Newsletter Caption</th>
				<td><input type="text" name="newsletter_caption" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('newsletter_caption') ); ?>" /></td>
    	</tr>
    	
    	<tr valign="top">
  			<th scope="row"><br>Branch Address</th>
  			<td>
  	
					<?php
					$thani_address = get_option('thani_address');
					wp_editor( $thani_address, 'thani_address', array(
	      			'wpautop'       => true,
	      			'media_buttons' => true,
	      			'textarea_name' => 'thani_address',
	      			'textarea_rows' => 6,
	      			'teeny'         => true
	      			) );
					?>
			
  			</td>
  		</tr>
  		<tr valign="top">
    		<th scope="row">Branch Phone Number</th>
			<td><input type="text" name="thani_ph_no" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('thani_ph_no') ); ?>" /></td>
    	</tr>
    	<tr valign="top">
    		<th scope="row">Branch WhatsApp Number</th>
			<td><input type="text" name="thani_whatsapp" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('thani_whatsapp') ); ?>" /></td>
    	</tr>
    	<tr valign="top">
    		<th scope="row">Branch Email ID</th>
			<td><input type="text" name="thani_email" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('thani_email') ); ?>" /></td>
    	</tr>
    	
    	<tr valign="top">
  			<th scope="row"><br>Headquater Address</th>
  			<td>
  	
					<?php
					$dip_address = get_option('dip_address');
					wp_editor( $dip_address, 'dip_address', array(
	      			'wpautop'       => true,
	      			'media_buttons' => true,
	      			'textarea_name' => 'dip_address',
	      			'textarea_rows' => 6,
	      			'teeny'         => true
	      			) );
					?>
			
  			</td>
  		</tr>
  		<tr valign="top">
    		<th scope="row">Headquater Phone Number</th>
			<td><input type="text" name="dip_ph_no" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('dip_ph_no') ); ?>" /></td>
    	</tr>
    	<tr valign="top">
    		<th scope="row">Headquater WhatsApp Number</th>
			<td><input type="text" name="dip_whatsapp" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('dip_whatsapp') ); ?>" /></td>
    	</tr>
    	<tr valign="top">
    		<th scope="row">Headquater Email ID</th>
			<td><input type="text" name="dip_email" class="full" style="width: 500px;" value="<?php echo esc_attr( get_option('dip_email') ); ?>" /></td>
    	</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>
<?php
	}
add_theme_support('widgets');

function footer_menu() {
   register_sidebar(array(
      'name' => __('Footer Menu', 'text_domain'),
      'id' => 'footer-menu',
      'description' => __('A custom widget for displaying content', 'text_domain'),
      'before_widget' => '<div class="footer-menu">',
      'after_widget' => '</div>',
      'callback' => 'custom_widget_output',
   ));
}
add_action('widgets_init', 'footer_menu');

function add_svg_to_upload_mimes($upload_mimes) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

function allow_svg_in_media_library($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('mime_types', 'allow_svg_in_media_library');

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}


?>