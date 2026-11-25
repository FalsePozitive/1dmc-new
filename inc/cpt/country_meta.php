<?php
add_action('admin_init','country_init');

function country_init()
{
    foreach (array('country') as $type) 
    {
        add_meta_box('country_setup', 'Country Details', 'country_setup', $type, 'normal');
    }
    add_action('save_post','country_save');
}

function country_setup()
{
    global $post, $wpdb;
    
    // Query the database directly
    $results = $wpdb->get_results($wpdb->prepare(
        "SELECT meta_id, meta_key, meta_value FROM {$wpdb->postmeta} 
        WHERE post_id = %d AND meta_key = '_country'",
        $post->ID
    ));
    
    $meta = array();
    
    if (!empty($results)) {
        $raw_value = $results[0]->meta_value;
        
        // Try normal unserialization first
        $meta = maybe_unserialize($raw_value);
        
        // If that fails, manually extract the data
        if (!is_array($meta) || empty($meta)) {
            $meta = array();
            
            // Define all the fields we need to extract
            $fields = array(
                'image_1', 'image_2', 'image_3', 'image_4', 'image_5',
                'image_1_title', 'image_2_title', 'image_3_title', 'image_4_title', 'image_5_title',
                'logo_url', 'profile_url', 'company_name', 'first_name', 
                'phone', 'mobile', 'address', 'skype', 'email', 'website',
                'services', 'highlights', 'highlights_2',
                'video_youtube', 'video_vimeo', 'map',
                'itin_1', 'itin_1_name', 'itin_2', 'itin_2_name', 'itin_3', 'itin_3_name'
            );
            
            foreach ($fields as $field) {
                $field_len = strlen($field);
                // Pattern: s:LENGTH:"FIELDNAME";s:VALUE_LENGTH:"VALUE"
                $pattern = '/s:' . $field_len . ':"' . preg_quote($field, '/') . '";s:\d+:"([^"]*)"(?:;|\})/';
                if (preg_match($pattern, $raw_value, $matches)) {
                    $meta[$field] = $matches[1];
                }
            }
        }
    }
    
    // Initialize as empty array if still no data
    if (!is_array($meta)) {
        $meta = array();
    }
    
    include (get_template_directory() . "/inc/cpt/country_meta_boxes.php"); 
    echo '<input type="hidden" name="country_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function country_save($post_id) 
{
    // Check if this is the country post type
    if (get_post_type($post_id) != 'country') {
        return $post_id;
    }
    
    // Check if nonce is set
    if (!isset($_POST['country_noncename'])) {
        return $post_id;
    }
    
    // Verify nonce
    if (!wp_verify_nonce($_POST['country_noncename'], __FILE__)) {
        return $post_id;
    }
    
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    
    // Check if _country data exists
    if (!isset($_POST['_country'])) {
        return $post_id;
    }
    
    // Get and sanitize the data
    $new_data = $_POST['_country'];
    
    if (is_array($new_data)) {
        $sanitized_data = array();
        foreach ($new_data as $key => $value) {
            // Keep the value even if it's empty - don't use country_clean
            $sanitized_data[$key] = sanitize_text_field($value);
        }
        
        // Save the data
        update_post_meta($post_id, '_country', $sanitized_data);
    }
    
    return $post_id;
}

// Optional: Keep this if you need it elsewhere, but don't use it in country_save
function country_clean(&$arr)
{
    if (is_array($arr))
    {
        foreach ($arr as $i => $v)
        {
            if (is_array($arr[$i])) 
            {
                country_clean($arr[$i]);

                if (!count($arr[$i])) 
                {
                    unset($arr[$i]);
                }
            }
            else 
            {
                if (trim($arr[$i]) == '') 
                {
                    unset($arr[$i]);
                }
            }
        }
        if (!count($arr)) 
        {
            $arr = NULL;
        }
    }
}
?>