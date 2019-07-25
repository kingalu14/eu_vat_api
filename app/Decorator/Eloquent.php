<?php
namespace App\Decorator;

class Eloquent
{
    protected $model;
    public function __construct(object $model){
            $this->model = $model;   
    }
    public function getAll(){
            return $this->model->all();
    }
    public function getByUserId($id){
            return   $this->model->where('user_id',$id)
            ->first();
    }
    public function create(array $attributes){
            return  $this->model->create($attributes);
    }
    public function update($id,array $attributes){
        $template=$this->model->findOrFail($id);
        if($template){
            $template->update($attributes);
            return  $template;
            }
    }
    public function delete($id){
        $template=$this->model->findOrFail($id);
        if($template){
            return $template->delete($id);
        }
    }
    public function edit($id){
        $template=$this->model->findOrFail($id);
        if($template){
            return $template;
        }
    }

}
