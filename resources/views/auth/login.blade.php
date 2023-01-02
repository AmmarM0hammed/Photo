@extends('app.Layout.main',['title'=>'Login'])

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

      @if(session()->has('error'))
        <x-alert text="{{session()->get('error')}}" />
      @endif
      <form action="{{route('auth.login.post')}}" method="POST" id="loginForm">
        @csrf
          <input type="text" class="input" placeholder="Username" name="username"/>
          <input type="password" class="input" placeholder="Password" name="password"/>
          <div class="d-flex">
          {{-- <input style="width: 50%" type="password" class="input" placeholder="Code"/> --}}
          
          </div>
          <a href="#" class="link-auth">Forgate Password ? </a>
      </form>
      <div class="d-flex flex-column justfiy-center">
        <button class="btn btn-danger btn-block" style="height: 45px;margin-bottom: 10px" form="loginForm">Login</button>
        <a href="{{ route('auth.register') }}" class="link-auth" style="text-align: center">Create an account !</a>
      </div>
    </div>

  </div>

</section>

@endsection