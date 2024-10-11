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
  public function convert_vn2latin($str)
    {
        // Mảng các ký tự tiếng việt không dấu theo mã unicode tổ hợp
        $tv_unicode_tohop  =
            [
                "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ",
                "è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ò","ớ","ợ","ở","õ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","À","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ" ,"Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ"
            ];
        // Mảng các ký tự tiếng việt không dấu theo mã unicode dựng sẵn   
        $tv_unicode_dungsan  =
            [
                "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
                "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ"
            ];
        // Mảng các ký không dấu sẽ thay thế cho ký tự có dấu
        $tv_khongdau =
            [
                "a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a",
                "e","e","e","e","e","e","e","e","e","e","e",
                "i","i","i","i","i",
                "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o",
                "u","u","u","u","u","u","u","u","u","u","u",
                "y","y","y","y","y",
                "d",
                "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A",
                "E","E","E","E","E","E","E","E","E","E","E",
                "I","I","I","I","I",
                "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O",
                "U","U","U","U","U","U","U","U","U","U","U",
                "Y","Y","Y","Y","Y",
                "D"
            ];

        $str = str_replace($tv_unicode_dungsan, $tv_khongdau, $str);
        $str = str_replace($tv_unicode_tohop,   $tv_khongdau, $str);
        return $str;
		}
	public function urlNormal($str)
		{
			// Chuyển tiếng việt không dấu
			$str = $this->convert_vn2latin($str);
			// chuyển sang in thường
			$str = mb_strtolower($str);
			// Giữ lại các ký tự chữ a - z và số 0 - 9 còn lại thay bằng -
			$str = preg_replace('/[^a-z0-9]/', '-', ($str));
			$str = preg_replace('/[--]+/', '-', $str);
			$str = trim($str, '-');
			return $str;
		}
        
 
    
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