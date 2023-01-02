@extends('app.Layout.main',['title'=>'Upload'])

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

.image-upload{
    height: 400px;
    cursor: pointer;
    transition: all .3s ease-in-out;
    border: dashed 4px rgba(0, 0, 0, 0.2);
    letter-spacing: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.image-upload i{
    font-size: 70px;
    color: rgba(0, 0, 0, 0.5);
}
.image-upload:hover{
    box-shadow: 0px 4px 39px rgba(0, 0, 0, 0.1);
}

</style>

<section class="landing">
 
  <div class="effect1"></div>
  <div class="effect2"></div>
  <div class="ball1"></div>
  <div class="ball2"></div>
  

  <div class="con auth ">
    <div class="right" style="width:100%">
      @if ($errors->any())
      @foreach ($errors->all() as $error)
          <x-alert text="{{$error}}" />
      @endforeach
    @endif
      <form action="{{ route('photo.create.post') }}" method="POST" id="upload " enctype="multipart/form-data">
        @csrf
         <div class="con image-upload">
            <i class='bx bxs-image-add'></i>
           <p> Click to upload image  </p>
           <img id="  "/>
           <input type="file" name="image" id="photo" hidden>
         </div>

         <br>
         <input name="tag" class="input" placeholder="Tag (split tag with comma , )" class="tag"/>
         {{-- <br>
         <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="state"/>
            <label class="form-check-label" for="flexSwitchCheckDefault">Public</label>
          </div>
          <br> --}}
          <div class="d-flex flex-column justfiy-center">
            <button class="btn btn-danger btn-block" style="height: 45px;margin-bottom: 10px" >Upload</button>
          </div>
      </form>
     
    </div>

  </div>

</section>

<script>
  let upload_image = document.querySelector('.image-upload');
  upload_image.addEventListener('click', function(e) {
       let file = document.getElementById('photo').click();
});
</script>
@endsection