<?php


namespace App\repository;


use Buglinjo\LaravelWebp\Webp;
use Illuminate\Http\Request;
//use WebPConvert\WebPConvert;

class UploadImage
{

    private $Image_Name;



    private $image_Folder;

    private $Request_image;


    /**
     * UploadImage constructor.
     * @param string image name $Image_Name
     * @param string folder name $image_Folder
     * @param  Request image $Request_image
     */
    public function __construct($Image_Name ,$image_Folder,$Request_image)
    {
        $this->setImageName($Image_Name);
        $this->setImageFolder($image_Folder);
        $this->setRequestImage($Request_image);


    }
    /**
     * @return mixed
     */
    public function getImageName()
    {
        return $this->Image_Name;
    }

    /**
     * @param mixed $Image_Name
     */
    public function setImageName($Image_Name): void
    {
        $this->Image_Name = $Image_Name;
    }
    /**
     * @return mixed
     */
    public function getImageFolder()
    {
        return $this->image_Folder;
    }

    /**
     * @param mixed $image_Folder
     */
    public function setImageFolder($image_Folder): void
    {
        $this->image_Folder = $image_Folder;
    }

    /**
     * @return mixed
     */
    public function getRequestImage()
    {
        return $this->Request_image;
    }

    /**
     * @param mixed $Request_image
     */
    public function setRequestImage($Request_image): void
    {
        $this->Request_image = $Request_image;
    }

    /**
     * upload image to public path
     * @return string image name by extension $Image_Final_Name
     */
    public function UploadeImage(){


        $Image_Final_Name=time().'.'.$this->getRequestImage()->getClientOriginalExtension();
        $this->getRequestImage()->move(public_path($this->getImageFolder()), $Image_Final_Name);
//        $source=public_path($this->getImageFolder().'/'.$Image_Final_Name);
//        $output=$source.'.webp';
//        WebPConvert::convert($source,$output);
        return $Image_Final_Name;
    }

    /**
     * uploade from images array
     * @return array
     */
    public function uploadeImages(){
        $i=0;
        foreach ($this->getRequestImage()as $image)
        {
            $Image_Final_Name=time().$i.'.'.$image->getClientOriginalExtension();
            $image->move(public_path($this->getImageFolder()), $Image_Final_Name);
//            $source=public_path($this->getImageFolder().'/'.$Image_Final_Name);
//            $output=$source.'.webp';
//            WebPConvert::convert($source,$output);
            $data[] = $Image_Final_Name;
            $i++;
        }
        return $data;
    }


}