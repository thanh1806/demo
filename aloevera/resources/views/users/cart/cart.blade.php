@extends('users.master')
@section('content')
<div class="container container-gobal">
<div class="demo">
<div class="login">


  <h2>bạn cần đăng nhập </h2>

  <form action="edit.php" method="GET"></form>

<div class="inputbox">
    <input type="text" name="name" placeholder="tài khoản">
</div>

<div class="inputbox">
<input type="password" name="pass" placeholder="mật khẩu">
</div>

<div class="inputbox">
<input type="submit" value="LOGIN" id="btn">
</div>
<div class="group">
  <p>hoặc</p>
  <input type="checkbox" id="123" name="check"> bạn có đồng ý không?
  <a class="loging" href="/cart"> <img width="42" height="42" src="{{ asset('/images/gmails.png') }}" title="gmail" alt="gmail"></a>
</div>


</div>
</div>

</div>
@endsection