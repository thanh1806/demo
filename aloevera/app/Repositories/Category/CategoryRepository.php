<?php

namespace App\Repositories\Category;
use App\Models\Categories;
use App\Models\Product;
use App\Http\Requests\Request;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Base\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
     //lấy model tương ứng
     public function getModel()
     {
         return Categories::class;
     }
 
     public function getCategory()
     {
         return $this->model->paginate(6);
     }
     public function getCategories()
     {
         return $this->model->get();
     }
     public function find($id)
     {
         return $this->model->find($id);
     }
     public function update($id, $attributes = [])
     {
         $result = $this->find($id);
         if ($result) {
             $result->update($attributes);
             return $result;
         }
 
         return false;
     }
     public function delete($id)
     {
            $result = $this->find($id);
            $product = Product::where("cate_id",$id)->get();
            if (count($product) > 0) {
                return false;
            }
            else{
                $result->delete();

                return true;
            }

     }

}