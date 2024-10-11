


(function( $ ){
    //Xem trước hình ảnh trước khi upload
    $( "#file_upload" ).on( "change", function(e) {
        const files_data =   e.target.files;
        // console.log(files_data)
        document.querySelector('.display_img').innerHTML += ``;
        for(var i = 0; i < files_data.length; i++)
        {
            upLoadImage(files_data[i]);
        }
      });
      //Xóa 1 dữ liệu hiện thông báo trước khi xóa
      $(".btn_event").on("click",(e) => {
            delete_item(e);    
      })
      //Xóa hình ảnh hiện thông báo trước khi xóa
      $(".delete_img").on("click",(e) => {
            //console.log(e.currentTarget)
            deleteImage(e); 
      })
      //Xử lý tình trạng của sản phẩm 
      $('.active_checkbox').on("change",(e) => {
       
        updateActiveById(e);
      })
      //end xử lý tình trạng của sản phẩm

    //   Function xử lý 
    //xử lý thay đổi tình trạng sản phẩm
    function updateActiveById(e){
        data = e.target.dataset;
        // console.log($data['id']);
        const confirm = window.confirm("Bạn có chắc chắn muốn thay đổi không?");
        if(confirm === true)
        {
            $.ajax({
                method:"POST",
                url:data.route,
                data:{
                    data:data
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
            }).done(() => {
                //console.log(str)
                location.reload();
            })
        }
        else{
            location.reload();
            // console.log(e.delegateTarget.classList);
            // e.delegateTarget.classList.prop("checked");
        }
        
        
    }
    //end xử lý thay đổi tình trạng sản phẩm

    //   Xử lý xóa item hiện thông báo 
      function delete_item(e){
            //console.log(e);
            data = e.target.dataset;
            const confirm =  window.confirm("Bạn có muốn xóa không");
            if(confirm == true)
            {
                $.ajax({
                    method: "POST",
                    url: data.route,
                    data: { 
                        id: data.id,
                        data:data
                     },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                }).done(()=>{
                    location.reload();
                })
            } 
            
            
      }
      function upLoadImage(file_data){
      
        //var type = file_data[0].type;
        var fileRender = new FileReader();

             var  file_loading = file_data;
                fileRender.onload = function(fileLoadEvent){
                    
                    var srcData = fileLoadEvent.target.result;
        
                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    document.querySelector('.display_img').innerHTML += 
                                                        `<div class="img_item">`
                                                            +newImage.outerHTML+`
                                                            
                                                        </div>`;
            }
            fileRender.readAsDataURL(file_loading);
        
    }
    // Xóa ảnh 
    function deleteImage(e){
       
        data = e.target.parentElement.dataset;
        //console.log(data);
        //console.log(e );
        //console.log(data.name);
        const confirm =  window.confirm("Bạn có muốn xóa không");
        if(confirm == true)
        {

            $('#'+data.name).remove();
      
        }
    }
    // $(document).keyup(function(e) {
    //     if (e.keyCode == 13) { alert(<br>) }     // 
    //   });
})( jQuery )



