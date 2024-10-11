<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Handle\HandleInterface;
use Illuminate\Http\Request;

class ProductsByCategoryController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;
    protected $handleRepo;
    public function __construct(CategoryInterface $categoryRepo, ProductInterface $productRepo, HandleInterface $handleRepo) {
        $this->productRepo = $productRepo;
        $this->handleRepo = $handleRepo;
        $this->categoryRepo = $categoryRepo;
    }
    public function index($id) {
         //lấy dữ liệu categories cho header
         $cate = $this->categoryRepo->getCategories();
         
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
         //end
         //giải hóa id
         $id = $this->handleRepo->id_decode($id);
         //
        $products = $this->productRepo->getProductsByCategory($id);
        $count = count($products);
        $flag = 1;
        for($i = 0; $i < $count; $i++){
          
            // xử lý thêm class fix vào item
            $products[$i]['fix'] = '';
            if($flag % 3 == 0 )
            {
                $products[$i]['fix'] = 'fix';
            }
             // xử lý thêm class fixmobile vào item
             $products[$i]['fixmobile'] = '';
             if($flag % 2 == 0 )
             {
                 $products[$i]['fixmobile'] = 'fixmobile';
             }
             
            // 
            $products[$i]['id_new'] = $this->handleRepo->id_encode($products[$i]['id']);
        
            //chuyển chuỗi thành mảng 
            $products[$i]['images'] = json_decode($products[$i]['images']);
            
             //Chuyển đổi tiền tệ
             $products[$i]['price'] = $this->handleRepo->currency_format($products[$i]['price']);
            // Hiển thị mô tả ngắn gọn cho trang sản phẩm
    
            
            $flag++;
        }
        return view("users.ProductsByCategory.index", compact("products","cate"));
    }
}
