<?php


namespace App\interfaces;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Http\FormRequest;

interface CrudInterface
{
    /**
     * retrieve Data From Our Storage
     * @return Collection
     */
    public  function getAllData( $modelName):Collection;

    /**
     * Get Record by Id
     * @param $modelName
     * @param $id
     * @return Collection
     */
    public function getById($modelName,$id);

    /**
     * store data in our storage
     * @param FormRequest $request
     * @param $id
     * @return mixed
     */
    public function store(FormRequest $request,$modelName);

    /**
     * ubdate record in our storage
     * @param FormRequest $request
     * @param $modelName
     * @param $id
     * @return mixed
     */
    public function update(FormRequest $request,$id,$modelName);

    /**
     * delete record from our storage
     * @param $id
     * @param $modelName
     * @return mixed
     */
    public function delete($id,$modelName);
}