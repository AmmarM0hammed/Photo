@extends('app.Layout.main',['title'=>'Show'])

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

.image-show a img{
    /* max-height: 600px; */
    width: 500px;
}

.content{
    display: flex;
    justify-content:center;
    position: relative;
    flex-wrap: wrap
}
.content .details{
    padding: 20px;
}
.details{
    /* background: red;s */
    position: relative;
}
.header {
            position: absolute;
            width: 100%;
            height: 405px;
            top: 0px;
            z-index: 1;
            background: #EEF6FF;
        }
</style>

<div class="header-bg"></div>
    <section class="content">
      
        <div class="image-show">
                <a class="ripple" style="border-radius: 24px">
                    <img src="{{asset($data->image)}}" style="border-radius: 24px" class="img-fluid" alt="..." />
                </a>
        
        </div>
        <div class="details">
            <a class="d-flex align-items-center " href="../{{"@".$data->user->username}}" role="button">
                <img src="{{asset('profile_image/'.$data->user->image)}}" class="userimage rounded-circle" height="32"
                    alt="user-image" loading="lazy" />
                <span> {{$data->user->name ?? "none"}}</span>
            </a>
            <br>
            <p>Tag : {{$data->tag}}</p>
            <a href="{{route('photo.download',['key'=>$data->key])}}" class="btn btn-danger">Download</a>
        </div>
</section>

@endsection