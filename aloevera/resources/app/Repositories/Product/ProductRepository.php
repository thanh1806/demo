<?php

namespace App\Repositories\Product;
use App\Models\Product;
use App\Http\Requests\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Base\BaseRepository;

class ProductRepository extends BaseRepository implements ProductInterface
{
     //lấy model tương ứng
     public function getModel()
     {
         return Product::class;
     }
 
     public function getProduct()
     {
         return $this->model->paginate(6);
     }
     public function getProductsByCategory($cate_id)
     {
         return $this->model->where("cate_id", $cate_id)->paginate(6);
     }
     public function find($id)
     {
         return $this->model->find($id);
     }
     public function create($attributes = [])
     {
         return $this->model->create($attributes);
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
            if ($result) {
                $result->delete();

                return true;
            }

            return false;
     }
        
}