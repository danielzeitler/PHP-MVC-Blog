<?php

class File  {

    /**
     * Create Date Coded Path
     * @access  public
     * @return  string
     * @since   1.0.0
     * @author  nbe
     */
    public static function createDateCodedPath(){
        $date       = date('Y:m:d', time());
        $code       = explode(':', $date);
        $coded_path = '';

        foreach($code as $dir)
            $coded_path .= "$dir/";

        return (string) $coded_path;
    }


    /**
     * Create Folder
     * @access  private
     * @param   string  $dir
     * @param   int     $mode
     * @return  bool
     * @since   1.0.0
     * @author  nbe
     */
    private static function createFolder($dir, $mode = 0777){
        if (!file_exists($dir))
            return (boolean) mkdir($dir, $mode, true);
        else
            return true;
    }

    /**
     * Create Img Thumbnail
     * @access  private
     * @param   string  $img
     * @param   string  $thumb_path
     * @param   int     $width
     * @param   int     $height
     * @return  bool
     * @since   1.0.0
     * @author  nbe
     */
    private static function createImgThumbnail($img, $thumb_path, $width, $height) {
        if (!$width || !$height)
            return false;

        list($img_width, $img_height, $img_type) = getimagesize($img);

        switch($img_type){
            case IMAGETYPE_GIF:
                $gd_img = imagecreatefromgif($img);
                break;
            case IMAGETYPE_JPEG:
                $gd_img = imagecreatefromjpeg($img);
                break;
            case IMAGETYPE_PNG:
                $gd_img = imagecreatefrompng($img);
                break;
            default:
                return false;
        }

        $img_ratio      = $img_width/ $img_height;
        $thumb_ratio    = $width / $height;

        if($thumb_ratio > $img_ratio){
            $thumb_height   = $height;
            $thumb_width    = (int) $height * $img_ratio;
        } else {
            $thumb_height   = (int) $width / $img_ratio;
            $thumb_width    = $width;
        }

        $gd_thumb = imagecreatetruecolor($thumb_width, $thumb_height);

        imagecopyresampled($gd_thumb, $gd_img, 0, 0, 0, 0, $thumb_width, $thumb_height, $img_width, $img_height);
        imagejpeg($gd_thumb, $thumb_path, 90);

        imagedestroy($gd_img);
        imagedestroy($gd_thumb);

        return true;
    }

    /**
     * Get type of an image
     * @access  private
     * @param   string  $tempImgFile
     * @return  string
     * @since   1.0.0
     * @author  nbe
     */
    private static function getImgType($tempImgFile){
        list( , , $tempImgFile) = getimagesize($tempImgFile);
        switch($tempImgFile){
            case IMAGETYPE_GIF:
                return '.gif';
            case IMAGETYPE_ICO:
                return '.ico';
            case IMAGETYPE_JPEG:
                return '.jpg';
            case IMAGETYPE_PNG:
                return '.png';
            default:
                return false;
        }
    }

    /**
     * Move Uploaded File
     * @access  public
     * @param   string  $file
     * @param   string  $destination
     * @return  bool
     * @since   1.0.0
     * @author  nbe
     */
    public static function moveUploadedFile($file, $destination){
        return (boolean) move_uploaded_file($file, $destination);
    }

    /**
     * Delete file
     * @access  public
     * @param   string  $file
     * @return  bool
     * @since   1.0.0
     * @author  nbe
     */
    public static function delete($file) {
        return (boolean) unlink($file);
    }

    /**
     * Upload Img
     * @access  public
     * @param   array  $fileArray
     * @param   string  $path
     * @param   array   $thumb
     * @return  mixed
     * @since   1.0.0
     * @author  nbe
     */
    public static function uploadImg($fileArray, $path = '', array $thumb = array(IMAGE_THUMB_WIDTH, IMAGE_THUMB_HEIGHT)) {

        $temp_img_id    = $fileArray['name'];
        $temp_img_file  = $fileArray['tmp_name'];
        $temp_img_type  = '.'.explode('.', $temp_img_id)[1];
        $temp_img_size  = $fileArray['size'];

        $img_name   = time().'-'.rand(100,9999);
        $img_type   = self::getImgType($temp_img_file);

        if (!$img_type && !$temp_img_type)
            $img_type   = IMAGE_DEFAULT_EXT;
        else
            $img_type   = $temp_img_type;

        $inner_path     = implode('/', explode('/', $path)).'/';
        $coded_path     = self::createDateCodedPath();
        $img_dir        = IMAGE_UPLOADS_PATH."{$inner_path}{$coded_path}";

        $img_path       = "{$img_dir}{$img_name}{$img_type}";
        $thumb_path     = "{$img_dir}{$img_name}".IMAGE_THUMB_EXT."{$img_type}";

        // TODO: ForLoop if more then one thumb-size
        if (!empty($thumb)) {
            $thumb_height   = $thumb[1];
            $thumb_width    = $thumb[0];
        }

        if (!self::createFolder($img_dir))
            $error['upload']    = _('Missing User-Rights');
        if (!self::moveUploadedFile($temp_img_file, $img_path))
            $error['upload']    = _('Error while uploading file');
        if (empty($thumb) && !self::createImgThumbnail($img_path, $thumb_path, $thumb_width, $thumb_height) || !empty($thumb) && !self::createImgThumbnail($img_path, $thumb_path, $thumb_width, $thumb_height))
            $error['upload']    = _('Error while generating Thumbnails');

        if (!isset($error))
            return array('name' => $temp_img_id, 'image' => $img_path, 'thumb' => $thumb_path, 'size' => $temp_img_size);
        else {
            return false;
        }


    }


}