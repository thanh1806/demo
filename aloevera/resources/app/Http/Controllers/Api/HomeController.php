<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

use App\Repositories\Product\ProductInterface;
use App\Repositories\Handle\HandleInterface;
use File; 
class HomeController extends Controller
{
    protected $repoHandle;
    protected $repoProduct;
    function __construct(HandleInterface $repoHandle, ProductInterface $repoProduct)
    {
        $this->repoHandle = $repoHandle;
        $this->repoProduct = $repoProduct;
    }
    //xử lý thay đổi tình trạng sản phẩm
    function update_active(Request $request){
        //dd($request->data['id']);
        if($request->data['id'] !== '')
        {
            $id = $this->repoHandle->id_decode($request->data['id']);
            $product = $this->repoProduct->find($id);
            if($product)
            {
                if($request->data['flag'] === 'true')
                {
                    $flag = 0;
                }
                else if($request->data['flag'] === 'false')
                {
                    $flag = 1;
                }
                $update = $this->repoProduct->update($id,[
                    'id' => $id,
                    'active'=> $flag
                    ]);
                if($update)
                {
                    return response()->json([
                        "status"=> "success",
                     ]);
                }

            }
        }  
        return response()->json([
            "status"=> "error",
         ]);  
       
    }
    //end 
    // function delete_image(Request $request)
    // {
    //     if($request->id !== '')
    //     {
    //         $id = $this->repoHandle->id_decode($request->id);
    //         $product = $this->repoProduct->find($id);
    //         if($product)
    //         {
    //             $arr_img = json_decode($product->images);
                
              
    //             if(count($arr_img) > 0)
    //             {
    //                 for($i = 0; $i < count($arr_img); $i++)
    //                 {
    //                     if($arr_img[$i] === $request->data['name'])
    //                     {
    //                         $link_file = 'upload/images/'. $request->data['name'];
    //                         if (File::exists($link_file)) 
    //                         {
    //                             File::delete($link_file);
    //                         }
    //                         unset($arr_img[$i]);
    //                     }
    //                 }
    //             }
                
    //             $json_files = json_encode($arr_img);
    //             //dd($json_files);die;
    //             $update_img = $this->repoProduct->update($id,[
    //                 'id' => $id,
    //                 'images'=> $json_files
    //             ]);
    //             if($update_img)
    //             {
    //                 return response()->json([
    //                     "status"=> "success",
    //                 ]);
    //             }
    //         }
            
    //     }
    //     return response()->json([
    //         "status"=> "error",
    //     ]);
        
    // }
}
