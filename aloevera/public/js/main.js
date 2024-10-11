let img = document.querySelectorAll('.imglist-item img');
let imgshow = document.querySelector('.product-info_imgbig img');


// FB.getLoginStatus(function(response) {
//     statusChangeCallback(response);
// });



// function checkLoginState() {
//     FB.getLoginStatus(function(response) {
//       statusChangeCallback(response);
//     });
//   }

//   function loginWithFacebook() {
//     FB.login(function(response) {
//       if (response.authResponse) {
//         console.log('Welcome! Fetching your information.... ');
//         FB.api('/cart', {fields: 'name,email'}, function(response) {
//           console.log('Successful login for: ' + response.name);
//           // Bạn có thể gửi dữ liệu của người dùng đến server của mình ở đây
//         });
//       } else {
//         console.log('User cancelled login or did not fully authorize.');
//       }
//     }, {scope: 'name,email'});
//   }
  
// slide detail
    img.forEach((e)=>{
       
        e.addEventListener('click',()=>{
            imgshow.src = e.src;
            if(imgshow.src === e.src)
            {
                e.parentNode.classList.add("active");
            }
            //kiểm tra và xóa class active trong dom
            img.forEach((handle) =>{
                if(imgshow.src !== handle.src)
                    {
                        //console.log(1)
                        handle.parentNode.classList.remove("active");
                    }
            })
          
        });
    })

    $(document).ready(function(){
        $("#content-slider").lightSlider({
            loop:true,
            keyPress:true,
        });
        
                           
      
        $('#toggle').click(function() {
            $('#nav').slideToggle();
        });
        // Hiển thị form đăng nhập
        $(".login-btn").click(function(){
            $(".modal").toggle("fast","linear",function(){
                $(".modal").show();
            });
        });
        //đóng form đăng nhập
        $(".close").click(function(){
            $(".modal").toggle("fast","linear",function(){
                $(".modal").hide();
            });
        });
    });

 

