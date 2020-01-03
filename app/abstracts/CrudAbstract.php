<?php


namespace App\abstracts;


use App\interfaces\CrudInterface;
use App\repository\UploadImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

abstract class CrudAbstract implements CrudInterface
{
    /**
     * @param $modelName
     * @return Collection
     */
    public function getAllData($modelName): Collection
    {
        return $modelName::all();
    }

    /**
     * @param $modelName
     * @param $id
     * @return Collection
     */
    public function getById($modelName,$id)
    {

        return $modelName::find($id);
    }

    /**
     * @param FormRequest $request
     * @param $modelName
     */
    public function store(FormRequest $request,$modelName)
    {


        foreach ($request->input() as $key=>$filed){

            if($key!='_token'&& $key!='_method'){
                $modelName->$key=$filed;
            }

        }
        if(is_array($request->file())){

            foreach ($request->file() as $key=>$filed){
                if(!is_array($filed)){
                    //just one image
                    $image=new UploadImage('image','image',$filed);
                    $modelName->$key=$image->UploadeImage();
                }else{
                    //array of images
                    $images=new UploadImage('image','image',$filed);
                    $modelName->$key=json_encode($images->uploadeImages());
                }

            }
        }
        $modelName->save();
    }

    /**
     * @param FormRequest $request
     * @param $id
     * @param $modelName
     */
    public function update(FormRequest $request, $id,$modelName)
    {

        $requrd=$modelName::find($id);
        foreach ($request->input() as $key=>$filed){

            if($key!='_token' && $key!='_method'){
                $requrd->$key=$filed;
            }

        }
        if(is_array($request->file())){

            foreach ($request->file() as $key=>$filed){
                if(!is_array($filed)){
                    //just one image
                    $image=new UploadImage('image','image',$filed);
                    $requrd->$key=$image->UploadeImage();
                }else{

                    //array of images
                    $images=new UploadImage('image','image',$filed);
                    $requrd->$key=json_encode($images->uploadeImages());
                }

            }
        }
        $requrd->save();
    }

    /**
     * @param $id
     * @param $modelName
     */
    public function delete($id,$modelName)
    {

        $deletedRecoded=  $modelName::find($id);
        $deletedRecoded->delete();
    }
}