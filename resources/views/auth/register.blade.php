@extends('app.Layout.main',['title'=>'Register'])

@section('content')

<style>

.landing{
    height: calc(100vh - 120px);
    /* background: red; */
    display: flex;
    justify-content: center;
    justify-items: center;
    flex-direction: column;

}

.header{
    font-weight: bold
}

</style>

<section class="landing">
 
  <div class="effect1"></div>
  <div class="effect2"></div>
  <div class="ball1"></div>
  <div class="ball2"></div>
  

  <div class="con auth ">
    <div class="left">
      <h3><strong>Join the club</strong></h3>
      
      <ul>
        <li><i class='bx bx-user'></i><span> Community</span></li>
        <li><i class='bx bx-images'></i><span> Share Photo</li>
        <li><i class='bx bx-save' ></i><span> Save photo</span></li>
      </ul>
    </div>
    <div class="right">
      <div class="header">
        <img src="{{asset('assets/image/websitelogo.png')}}" alt="logo">
        <span>{{config('app.name')}}</span>
      </div>
      <form action="{{route('auth.register.post')}}" method="POST" id="loginForm">

        @if ($errors->any())
          @foreach ($errors->all() as $error)
              <x-alert text="{{$error}}" />
          @endforeach
        @endif

        @csrf
          <input type="text" class="input" placeholder="Fullname" name="fullname"/>
          <input type="text" class="input" placeholder="Username" name="username"/>
          <input type="email" class="input" placeholder="Email" name="email"/>
          <input type="password" class="input" placeholder="Password" name="password"/>
          <input type="password" class="input" placeholder="Retype Password" name="retypepassword"/>
      </form>
      <div class="d-flex flex-column justfiy-center">
        <button class="btn btn-danger btn-block" style="height: 45px;margin-bottom: 10px" form="loginForm">Reigester</button>
        <a href="{{route('auth.login')}}" class="link-auth" style="text-align: center">Have an account ?</a>
      </div>
    </div>

  </div>
  
</section>

@endsection