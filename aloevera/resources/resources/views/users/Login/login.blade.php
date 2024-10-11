
<div class="modal" style="display: none" tabindex="-1">
    <div class="spinner">
        <span>L</span>
        <span>O</span>
        <span>G</span>
        <span>I</span>
        <span>N</span>
    </div>
    <div class="close"><i class="fa-solid fa-xmark"></i></div>
    <div class="login-box">
      @if ($errors->any())
          <div class="alert alert-danger error-message ">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="user-box">
            <input type="text" name="username" required>
            <label>Username</label>
            {{-- @if($errors->has('username'))
              <span class="error-message">*{{$errors->first('username')}}</span>
            @endif --}}
          </div>
          <div class="user-box">
            <input type="password" name="password" required>
            <label>Password</label>
          </div><center>
          <button class="btn-send"  type="">
                 SEND
             <span></span>
          </button></center>
        </form>
    </div>
</div>
