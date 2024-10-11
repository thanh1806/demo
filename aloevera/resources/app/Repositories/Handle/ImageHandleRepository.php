<?php

namespace App\Repositories\Handle;
use App\Models\Product;
use App\Http\Requests\Request;
use App\Repositories\Handle\HandleInterface;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ImageHandleRepository extends BaseRepository implements HandleInterface
{
     //lấy model tương ứng
     public function getModel()
     {
         return Product::class;
     }
    //  xử lý tiếng việt có dấu sang không dấu
   
    // hàm xử lý url thân thiện

    // end
    //Xử lí  hình ảnh
    public function imageHandle($files_upload){
        
        // $files = [];
        // if($request->hasfile($files_upload))
		// {
		// 	foreach($request->file(files_upload) as $file)
		// 	{
		// 	    $name = time().rand(1,100).'.'.$file->extension();
		// 	    $file->move(public_path('upload/images'), $name);  
		// 	    $files[] = $name;  
		// 	}
		// }
        // return $files;
    }
    // Hàm chuyển đổi chuỗi tiếng việt có dấu $str, trả về chuỗi không dấu
 
 
    
    // Chuyển đổi chuỗi kí tự thành dạng slug dùng cho việc tạo friendly url.
  

    public function currency_format($number, $suffix = ' VND') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }

    }
    
    //Hàm mã hóa id
    public function id_encode($id) {
        // $id = base64_encode($id);
        $rand_str = Str::random(4);
        $rand_str2 = Str::random(4);
        // $id_new_encode = $rand_str .'_'.$id .'_'. $rand_str2;
        $id_new_encode = $rand_str .$id . $rand_str2;
        
        return $id_new_encode; 

    }
    //end hàm mã hóa id

    //hàm băm id mã hóa
    public function id_decode($id) {
        // $arr = explode('_', $id);
        //dd($arr);
        // if(count($arr) > 0) {
        //     $id = $arr[1];
        //     $id_new_decode = base64_decode($id);
        // }
        if(isset($id))
        {
            $id_cut_1 = Str::substr($id,4);
            $id_new_decode = Str::substr($id_cut_1,0,-4);
          
        }
      
        return $id_new_decode;

    }

    //
    
    
}