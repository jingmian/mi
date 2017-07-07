<?php

/**
 * File Name: ImageController.php
 * Description: 图片尺寸自动缩放
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 16:48
 */

namespace App\Http\Controllers\PublicC;

 use Image;
 use Storage;
 use Illuminate\Support\Facades\Response;
 use App\Http\Controllers\Controller;
 
 class ImageController extends Controller
 {

     /*
      *
      * uploads下一级目录的图片处理
      *
      */
    public function oneDirImage($pathName, $imgSrc)
     {
        $imgName = preg_replace('/\!(\d)\_(\d)$/', '', $imgSrc);
                //完整文件路径
        $fileName = '/uploads/' . $pathName . '/' . $imgSrc;
                //获取原图
        $src = Storage::disk('uploads')->get($pathName . '/' . $imgName);
                //执行缩略
        $img = $this->store($fileName, $imgSrc, $src);

        return $img;
     }

     /*
      * uploads下两级目录的图片处理
      *
      */
     public function twoDirImage($pathName, $date, $imgSrc)
     {
        $imgName = preg_replace('/\!(\d+)\_(\d+)/','',$imgSrc);
        //完整文件路径
        $fileName = '/uploads/'.$pathName.'/'.$date.'/'.$imgSrc;
        //获取原图
        $src = Storage::disk('uploads')->get($pathName.'/'.$date.'/'.$imgName);
        //执行缩略 获得图片
        $img = $this->store($fileName, $imgSrc, $src);

        return $img;
     }
 
 
     /*
      * 执行缩略
      * @param $fileName 完整带参数图片文件地址
      * @param $imgSrc 请求的imgSRC
      * @pamam $src  实际存在的文件原图数据流
      */
     public function store($fileName, $imgSrc, $src)
     {

         //判断图片文件是否存在 若存在则读取
         if (file_exists($fileName)) {
             ob_start();
             header('Content-type:image/jpeg');
             readfile($fileName);
             ob_flush();
             flush();
         }else {
             if (!preg_match('/\!(\d+)\_(\d+)/', $imgSrc, $wh)) {
                 //若图片不存在 并且 参数匹配失败
                 //输出默认图像
                 $this->default();
                 exit();
             }
         }
         // 获取参数
         $width = $wh[1];
         $height = $wh[2];

         $img = $this->resize($src,$width,$height, false);

         return Response::make($img, 200, ['Content-type'=>'image/jpeg']);
     }
 
 
     /*
      *  图片地址 参数错误 显示默认图片
      *
      */
     public function default()
    {
        $default_img = realpath('/images/public/default.jpg');
        ob_start();
        header('Content-type:image/jpeg');
        readfile($default_img);
        ob_flush();
        flush();
    }

    public function resize($image, $width, $height, $crop)
    {
        $imagick = new \Imagick();
        $imagick->readImageBlob($image);
        $w = $imagick->getImageWidth();
        $h = $imagick->getImageHeight();
        if ($w > $width || $h > $height) {
            if ($crop) {
                $imagick->cropThumbnailImage($width, $height);
            }
            else {
                $imagick->resizeImage($width, $height, \Imagick::FILTER_CATROM, 1, true);
            }
        }
        $imagick->setImageFormat('JPEG');
        $imagick->setImageCompression(\Imagick::COMPRESSION_JPEG);
        $a = $imagick->getImageCompressionQuality() * 0.75;
        if ($a == 0) {
            $a = 75;
        }
        $imagick->setImageCompressionQuality($a);
        $imagick->stripImage();
        $blob = $imagick->getImageBlob();
        $imagick->clear();
        $imagick->destroy();

        return $blob;
    }

 }