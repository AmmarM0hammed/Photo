@extends('app.Layout.main',['title'=>'Landing'])

@section('content')

<style>

.landing{
    height: calc(100vh - 120px);
    /* background: red; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    justify-items: center
}

.header{
    font-weight: bold
}

</style>

<section class="landing">
 <!-- Jumbotron -->


 <div class="p-5 text-center ">
        <h1 class="text display-6">  
          <strong>
            The Best Free Stock Photos
          </strong>

        </h1>
    <h4 class=" text-uppercase header display-1">Photography</h4>
     <p class=" text-uppercase " style="opacity: .7">The best free stock photos, royalty free images  shared by creators.</p>
    <br>
    <div class="flex-row justify-content-center align-items-center" style="gap: 10px;">
        <a class="btn btn-danger btn-larg btn-outline" href="{{ route('auth.login') }}" role="button">Login</a>
        <a class="btn btn-danger btn-larg" href="{{ route('auth.register') }}" role="button">Register</a>
    </div>
  </div>

  <div class="effect1"></div>
  <div class="effect2"></div>
  <div class="ball1"></div>
  <div class="ball2"></div>
  
</section>

@endsection