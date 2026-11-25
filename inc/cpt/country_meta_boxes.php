

<style>
.image_thumbs {
	width:30px;
	height:30px;
	background-size:cover;
	background-position:center center;
	background-repeat:no-repeat;
	float:left;
	margin:0 0 0 10px;
}
.button_float {
	float:left!important;
}
</style>
<h1>Gallery Images</h1>
<p>For best results use images with dimensions: <strong>1400px</strong> (w) X <strong>800px</strong> (h)</p>
<table>
	<tr>
    	<td width="150px"><label>Image 1:</label></td>
        <td width="500px"><input type="text" name="_country[image_1]" id="image_1" class="regular-text" value="<?php if(!empty($meta['image_1'])) echo $meta['image_1']; ?>" style="width:100%;"></td>
		<td width="150px"><div name="upload-img-1" id="upload-img-1" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['image_1'])) echo $meta['image_1']; ?>');"></div></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 1 Title:</label></td>
        <td width="500px"><input type="text" name="_country[image_1_title]" id="image_1_title" class="regular-text" value="<?php if(!empty($meta['image_1_title'])) echo $meta['image_1_title']; ?>" style="width:100%;"></td>
		<td ></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 2:</label></td>
        <td width="500px"><input type="text" name="_country[image_2]" id="image_2" class="regular-text" value="<?php if(!empty($meta['image_2'])) echo $meta['image_2']; ?>" style="width:100%;"></td>
		<td><div name="upload-img-2" id="upload-img-2" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['image_2'])) echo $meta['image_2']; ?>');"></div></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 2 Title:</label></td>
        <td width="500px"><input type="text" name="_country[image_2_title]" id="image_2_title" class="regular-text" value="<?php if(!empty($meta['image_2_title'])) echo $meta['image_2_title']; ?>" style="width:100%;"></td>
		<td ></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 3:</label></td>
        <td width="500px"><input type="text" name="_country[image_3]" id="image_3" class="regular-text" value="<?php if(!empty($meta['image_3'])) echo $meta['image_3']; ?>" style="width:100%;"></td>
		<td><div name="upload-img-3" id="upload-img-3" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['image_3'])) echo $meta['image_3']; ?>');"></div></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 3 Title:</label></td>
        <td width="500px"><input type="text" name="_country[image_3_title]" id="image_3_title" class="regular-text" value="<?php if(!empty($meta['image_3_title'])) echo $meta['image_3_title']; ?>" style="width:100%;"></td>
		<td ></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 4:</label></td>
        <td width="500px"><input type="text" name="_country[image_4]" id="image_4" class="regular-text" value="<?php if(!empty($meta['image_4'])) echo $meta['image_4']; ?>" style="width:100%;"></td>
		<td><div name="upload-img-4" id="upload-img-4" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['image_4'])) echo $meta['image_4']; ?>');"></div></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 4 Title:</label></td>
        <td width="500px"><input type="text" name="_country[image_4_title]" id="image_4_title" class="regular-text" value="<?php if(!empty($meta['image_4_title'])) echo $meta['image_4_title']; ?>" style="width:100%;"></td>
		<td ></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 5:</label></td>
        <td width="500px"><input type="text" name="_country[image_5]" id="image_5" class="regular-text" value="<?php if(!empty($meta['image_5'])) echo $meta['image_5']; ?>" style="width:100%;"></td>
		<td><div name="upload-img-5" id="upload-img-5" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['image_5'])) echo $meta['image_5']; ?>');"></div></td>
    </tr>
    <tr>
    	<td width="150px"><label>Image 5 Title:</label></td>
        <td width="500px"><input type="text" name="_country[image_5_title]" id="image_5_title" class="regular-text" value="<?php if(!empty($meta['image_5_title'])) echo $meta['image_5_title']; ?>" style="width:100%;"></td>
		<td ></td>
    </tr>
</table>
<hr>
<h1>Company Details</h1>
<table>
	<tr>
    	<td width="150px"><label>Logo:</label></td>
        <td width="500px"><input type="text" name="_country[logo_url]" id="logo_url" class="regular-text" value="<?php if(!empty($meta['logo_url'])) echo $meta['logo_url']; ?>" style="width:100%;"></td>
		<td width="150px"><div name="upload-btn" id="upload-btn" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['logo_url'])) echo $meta['logo_url']; ?>');"></div></td>
    </tr>
    <tr>
    	<td><label>Profile photo:</label></td>
        <td><input type="text" name="_country[profile_url]" id="profile_url" class="regular-text" value="<?php if(!empty($meta['profile_url'])) echo $meta['profile_url']; ?>" style="width:100%;"></td>
        <td><div name="upload-btn-2" id="upload-btn-2" class="button button-primary button_float button-large"> Upload </div> <div class="image_thumbs" style="background-image:url('<?php if(!empty($meta['profile_url'])) echo $meta['profile_url']; ?>');"></div></td>
	</tr>
    <tr>
    	<td><label>Company Name:</label></td>
        <td><input type="text" name="_country[company_name]" id="company_name" value="<?php if(!empty($meta['company_name'])) echo $meta['company_name']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td><label>Name:</label></td>
        <td><input type="text" name="_country[first_name]" id="first_name" value="<?php if(!empty($meta['first_name'])) echo $meta['first_name']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <!--<tr>
    	<td><label>Surname Name:</label></td>
        <td><input type="text" name="_country[last_name]" id="last_name" value="<?php //if(!empty($meta['last_name'])) echo $meta['last_name']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr> -->
    <tr>
    	<td><label>Phone:</label></td>
        <td><input type="text" name="_country[phone]" id="phone" value="<?php if(!empty($meta['phone'])) echo $meta['phone']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td><label>Mobile:</label></td>
        <td><input type="text" name="_country[mobile]" id="mobile" value="<?php if(!empty($meta['mobile'])) echo $meta['mobile']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td><label>Address:</label></td>
        <td><input type="text" name="_country[address]" id="address" value="<?php if(!empty($meta['address'])) echo $meta['address']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td><label>Skype:</label></td>
        <td><input type="text" name="_country[skype]" id="skype" value="<?php if(!empty($meta['skype'])) echo $meta['skype']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td><label>Email:</label></td>
        <td><input type="text" name="_country[email]" id="email" value="<?php if(!empty($meta['email'])) echo $meta['email']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td><label>Website:</label></td>
        <td><input type="text" name="_country[website]" id="website" value="<?php if(!empty($meta['website'])) echo $meta['website']; ?>" style="width: 100%;"/></td>
        <td></td>
    </tr>
    <tr>
    	<td valign="top"><label>Services:</label></td>
        <td><textarea  name="_country[services]" id="services" style="width: 100%;height: 150px;"/><?php if(!empty($meta['services'])) echo $meta['services']; ?></textarea></td>
        <td></td>
    </tr>
    
 </table>
<hr>
<h1>Highlights (OLD)</h1>
<p><strong>NB:</strong> Separate each point with an <strong>asterisk (*)</strong>. Leave last point sans asterisk i.e. <em><strong>Point One* Point Two* Point Three</strong></em></p>
<table>
	<tr>
        <!--<td width="150px"><label>Column 1:</label></td>-->
        <td width="650px">
        <textarea name="_country[highlights]" id="highlights" style="width: 100%;height: 200px;"><?php if(!empty($meta['highlights'])) echo $meta['highlights']; ?></textarea>
        </td>
        <td></td>
	</tr>
  <!--  <tr>
        <td width="150px"><label>Column 2:</label></td>
        <td width="500px">
      <textarea name="_country[highlights_2]" id="highlights_2" style="width: 100%;height: 200px;"><?php if(!empty($meta['highlights_2'])) echo $meta['highlights_2']; ?></textarea>
        </td>
        <td></td>
	</tr> -->
</table>
<hr>
<h1>Video</h1>
<table>
	<tr>
    	<td colspan="2"><strong>YouTube:</strong> Cut and paste only the relevent YouTube ID. i.e. https://youtu.be/<em style="color:#F00;"><strong>TXedVafIgsw</strong></em> or https://www.youtube.com/watch?v=<em style="color:#F00;"><strong>TXedVafIgsw</strong></em></td>
    </tr>
	<tr>
    	<td width="150px"><label>YouTube ID:</label></td>
        <td width="500px"><input type="text" name="_country[video_youtube]" id="video_youtube" class="regular-text" value="<?php if(!empty($meta['video_youtube'])) echo $meta['video_youtube']; ?>" style="width:100%;"></td>
	
    </tr>

     <tr>
        <td colspan="2"><h2><strong>Or</strong></h2></td>
    </tr>
 
    <tr>
    	<td colspan="2"><strong>Vimeo:</strong> Cut and paste only the relevent Vimeo ID. i.e. https://vimeo.com/<em style="color:#F00;"><strong>167177444</strong></em> or https://player.vimeo.com/video/<em style="color:#F00;"><strong>167177444</strong></em></td>
    </tr>
	<tr>
    	<td width="150px"><label>Vimeo ID:</label></td>
        <td width="500px"><input type="text" name="_country[video_vimeo]" id="video_vimeo" class="regular-text" value="<?php if(!empty($meta['video_vimeo'])) echo $meta['video_vimeo']; ?>" style="width:100%;"></td>

    </tr>
</table>
<hr>
<h1>Map</h1>
<table>
	<tr>
    	<td width="150px"><label>Map:</label></td>
        <td width="500px"><input type="text" name="_country[map]" id="map" class="regular-text" value="<?php if(!empty($meta['map'])) echo $meta['map']; ?>" style="width:100%;"></td>
		<td><div name="upload-map" id="upload-map" class="button button-primary button_float button-large"> Upload </div></td>
    </tr>
</table>
<hr>
<h1>Itinerary</h1>
<table>
	<tr>
    	<td width="150px"><label>Itinerary 1 (PDF):</label></td>
        <td width="300px"><input type="text" name="_country[itin_1]" id="itin_1" class="regular-text" value="<?php if(!empty($meta['itin_1'])) echo $meta['itin_1']; ?>" style="width:100%;"></td>
		<td><div name="upload-itin-1" id="upload-itin-1" class="button button-primary button_float button-large"> Upload </div></td>
        <td width="150px"><label> Itinerary 1 Name:</label></td>
        <td width="300px"><input type="text" name="_country[itin_1_name]" id="itin_1_name" class="regular-text" value="<?php if(!empty($meta['itin_1_name'])) echo $meta['itin_1_name']; ?>" style="width:100%;"></td>
    </tr>
    <tr>
    	<td width="150px"><label>Itinerary 2 (PDF):</label></td>
        <td width="300px"><input type="text" name="_country[itin_2]" id="itin_2" class="regular-text" value="<?php if(!empty($meta['itin_2'])) echo $meta['itin_2']; ?>" style="width:100%;"></td>
		<td><div name="upload-itin-2" id="upload-itin-2" class="button button-primary button_float button-large"> Upload </div></td>
        <td width="150px"><label> Itinerary 2 Name:</label></td>
        <td width="300px"><input type="text" name="_country[itin_2_name]" id="itin_2_name" class="regular-text" value="<?php if(!empty($meta['itin_2_name'])) echo $meta['itin_2_name']; ?>" style="width:100%;"></td>
    </tr>
    <tr>
    	<td width="150px"><label>Itinerary 3 (PDF):</label></td>
        <td width="300px"><input type="text" name="_country[itin_3]" id="itin_3" class="regular-text" value="<?php if(!empty($meta['itin_3'])) echo $meta['itin_3']; ?>" style="width:100%;"></td>
		<td><div name="upload-itin-3" id="upload-itin-3" class="button button-primary button_float button-large"> Upload </div></td>
        <td width="150px"><label> Itinerary 3 Name:</label></td>
        <td width="300px"><input type="text" name="_country[itin_3_name]" id="itin_3_name" class="regular-text" value="<?php if(!empty($meta['itin_3_name'])) echo $meta['itin_3_name']; ?>" style="width:100%;"></td>
    </tr>
</table>
<div style="clear:both;width:100%;"></div>
<?php
	wp_enqueue_script('jquery');
	wp_enqueue_media();
?>

<script type="text/javascript">
jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: true
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#logo_url').val(image_url);
        });
    });
	
	$('#upload-btn-2').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#profile_url').val(image_url);
        });
    });
	
	$('#upload-img-1').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_1').val(image_url);
        });
    });
	
	$('#upload-img-2').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_2').val(image_url);
        });
    });
	
	$('#upload-img-3').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_3').val(image_url);
        });
    });
	
	$('#upload-img-4').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_4').val(image_url);
        });
    });
	
	$('#upload-img-5').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_5').val(image_url);
        });
    });
	
	$('#upload-map').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#map').val(image_url);
        });
    });
	
	$('#upload-itin-1').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#itin_1').val(image_url);
        });
    });
	
	$('#upload-itin-2').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#itin_2').val(image_url);
        });
    });
	
	$('#upload-itin-3').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#itin_3').val(image_url);
			
        });
    });
});
</script>