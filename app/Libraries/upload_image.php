  <?PHP
	  class uploadimage {
	 
	 function image_upload_original ($set_image,$set_dir,$set_name,$percent){
		 
		 $newname = $set_name."_Origial.jpg";
		 $path = $set_dir;
		 $pathcopy = $path.'/'.$newname;
	   if (($img_info = getimagesize($set_image)) === FALSE)
	die("Image not found or not an image");
  
	  $width = $img_info[0];
	  $height = $img_info[1];
	  
	  switch ($img_info[2]) {
		case IMAGETYPE_GIF  : $src = imagecreatefromgif($set_image);  break;
		case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($set_image); break;
		case IMAGETYPE_PNG  : $src = imagecreatefrompng($set_image);  break;
		default : die("Unknown filetype");
	  }
	  
	  if($width > $height ){
	  $newwidth=(1500/$percent);
	  $newheight=round($newwidth*$height/$width);	
	  }
	  if($height > $width){
	  $newwidth=(1500/$percent);
	  $newheight=round($newwidth*$height/$width);		
		  }else{
	  $newwidth=(1000/$percent);
	  $newheight=round($newwidth*$height/$width);		
	  }
	  
	  $tmp = imagecreatetruecolor($newwidth,$newheight);
	  imagecopyresampled($tmp, $src, 0, 0, 0, 0,$newwidth,$newheight, $width, $height);
	  imagejpeg($tmp,$pathcopy);
	  return $pathcopy;
		 }
		 
		 
	   function image_upload_thumb ($set_image,$set_dir,$set_name){
		 
		 $newname = $set_name."_Thumb.jpg";
		 $path = $set_dir.$set_name;
		 $pathcopy = $path."/".$newname;
		 echo  $path."<br>".$pathcopy;
	   if (($img_info = getimagesize($set_image)) === FALSE)
	die("Image not found or not an image");
  
	  $width = $img_info[0];
	  $height = $img_info[1];
	  
	  switch ($img_info[2]) {
		case IMAGETYPE_GIF  : $src = imagecreatefromgif($set_image);  break;
		case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($set_image); break;
		case IMAGETYPE_PNG  : $src = imagecreatefrompng($set_image);  break;
		default : die("Unknown filetype");
	  }
	  
	  if($width > $height ){
	  $newwidth=700;
	  $newheight=round($newwidth*$height/$width);	
	  }
	  if($height > $width){
	  $newwidth=700;
	  $newheight=round($newwidth*$height/$width);		
		  }else{
	  $newwidth=500;
	  $newheight=round($newwidth*$height/$width);		
	  }
	  
	  $tmp = imagecreatetruecolor($newwidth,$newheight);
	  imagecopyresampled($tmp, $src, 0, 0, 0, 0,$newwidth,$newheight, $width, $height);
	  imagejpeg($tmp,$pathcopy);
		 }


	   function image_upload_gal ($set_image,$set_dir,$set_name){
		 echo $set_image;
		for($i=0; $i<count($_FILES[$set_image]['name']); $i++){
		 $image_set = $_FILES[$set_image]['tmp_name'][$i];
		 $newname = $set_name."_".$i."_gal.jpg";
		 $path = $set_dir.$set_name;
		 $pathcopy = $path."/".$newname;
		 echo  $path."<br>".$pathcopy;
		 
	   if (($img_info = getimagesize($image_set)) === FALSE)
		die("Image not found or not an image");
  
	  $width = $img_info[0];
	  $height = $img_info[1];
	  
	  switch ($img_info[2]) {
		case IMAGETYPE_GIF  : $src = imagecreatefromgif($image_set);  break;
		case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($image_set); break;
		case IMAGETYPE_PNG  : $src = imagecreatefrompng($image_set);  break;
		default : die("Unknown filetype");
	  }
	  
	  if($width > $height ){
	  $newwidth=700;
	  $newheight=round($newwidth*$height/$width);	
	  }
	  if($height > $width){
	  $newwidth=700;
	  $newheight=round($newwidth*$height/$width);		
		  }else{
	  $newwidth=500;
	  $newheight=round($newwidth*$height/$width);		
	  }
	  
	  $tmp = imagecreatetruecolor($newwidth,$newheight);
	  imagecopyresampled($tmp, $src, 0, 0, 0, 0,$newwidth,$newheight, $width, $height);
	  imagejpeg($tmp,$pathcopy);
	  return $pathcopy;
		 }
	   }




	   
 function upload_thumb($source_image,$destination,$tn_w = 100,$tn_h = 100,$quality = 80,$wmsource = false) {
  $info = getimagesize($source_image);
  $imgtype = image_type_to_mime_type($info[2]);

  switch ($imgtype) {
	  case 'image/jpeg':
		$source = imagecreatefromjpeg($source_image);
	  break;
	  case 'image/gif':
		$source = imagecreatefromgif($source_image);
	  break;
	  case 'image/png':
		$source = imagecreatefrompng($source_image);
	  break;
	  default:
		die('Invalid image type.');
  }

  $src_w = imagesx($source);
  $src_h = imagesy($source);
  $src_ratio = $src_w/$src_h;

  if ($tn_w/$tn_h > $src_ratio) {
    $new_h = $tn_w/$src_ratio;
    $new_w = $tn_w;
  } else {
    $new_w = $tn_h*$src_ratio;
    $new_h = $tn_h;
  }
  $x_mid = $new_w/2;
  $y_mid = $new_h/2;
  $newpic = imagecreatetruecolor(round($new_w), round($new_h));
  imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);
  $final = imagecreatetruecolor($tn_w, $tn_h);
  imagecopyresampled($final, $newpic, 0, 0, ($x_mid-($tn_w/2)), ($y_mid-($tn_h/2)), $tn_w, $tn_h, $tn_w, $tn_h);


  if($wmsource) {
  
    $info = getimagesize($wmsource);
    $imgtype = image_type_to_mime_type($info[2]);

    switch ($imgtype) {
  	  case 'image/jpeg':
  		$watermark = imagecreatefromjpeg($wmsource);
  	  break;
  	  case 'image/gif':
  		$watermark = imagecreatefromgif($wmsource);
  	  break;
  	  case 'image/png':
  		$watermark = imagecreatefrompng($wmsource);
  	  break;
  	  default:
  		die('Invalid watermark type.');
    }

    $wm_w = imagesx($watermark);
    $wm_h = imagesy($watermark);
    imagecopy($final, $watermark, $tn_w - $wm_w, $tn_h - $wm_h, 0, 0, $tn_w, $tn_h);
  }
  if(Imagejpeg($final,$destination,$quality)) {
    return true;
  }
  return false;
  
} 
	   
	  }
  ?>