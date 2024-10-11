<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Category\CategoryInterface;
use App\Repositories\Handle\HandleInterface;
use Illuminate\Support\Str;


class ProductDetailController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;
    protected $handleRepo;

    public function __construct(CategoryInterface $categoryRepo, ProductInterface $productRepo, HandleInterface $handleRepo) {
        $this->productRepo = $productRepo;
        $this->handleRepo = $handleRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function detail_product($id)
    {
          //lấy dữ liệu categories cho header
          $cate = $this->categoryRepo->getCategories();
          
        for($j = 0; $j < count($cate); $j++){
            
            $cate[$j]['id_new'] = $this->handleRepo->id_encode($cate[$j]['id']);
          
        }
          //end
        //giải hóa id
         //end
        $arr_id = explode('-',$id);
      
        //giải hóa id
        $id = $this->handleRepo->id_decode(end($arr_id));
        //
        $product = $this->productRepo->find($id);
        //xử lí giảm giá
        $product['sale'] = floor(((($product['price'])-($product['discount']))/($product['price'])) *100); 
         //Chuyển đổi tiền tệ
         $product['price'] = number_format($product['price']);
         $product['discount'] = number_format($product['discount']);
        // xử lí hiển thị hình ảnh từ json về dạng mảng
        $product['images'] = json_decode($product['images']);
        $product['description'] = Str::of($product['description'])->toHtmlString();
        $product['name_product'] = Str::of($product['name_product'])->toHtmlString();
        
        return view('users.ProductDetail.detail')->with('product',$product)->with('cate',$cate);
    }
}
