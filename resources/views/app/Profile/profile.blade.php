@extends('app.Layout.main',['title'=>$data->name])

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
.image-gallery{
            margin: 0 auto;
            justify-content: center;
            display: grid;
            width: 100%;
            /* background: red; */
            gap: 1em;
            grid-template-columns:  repeat(auto-fit, min(300px, 100%));
            grid-template-rows: masonry;
            justify-tracks: end, center, space-around;
            grid-auto-flow: dense;
            justify-items: center;
        }
</style>
<div class="header-bg"></div>
<section class="contect">
        <div class="container py-5 h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-md-9 col-lg-7 col-xl-5">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-4">
                  <div class="d-flex text-black">
                    <div class="flex-shrink-0">
                      <img src="profile_image/{{$data->image}}"
                        alt="Generic placeholder image" class="img-fluid"
                        style="width: 180px; border-radius: 10px;">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1">{{$data->name}}</h5>
                      <p class="mb-2 pb-1" style="color: #2b2a2a;">{{"@".$data->username}}</p>
                      <div class="d-flex justify-content-around  rounded-3 p-2 mb-2"
                        style="background-color: #efefef;">
                        <div>
                          <p class="small text-muted mb-1">Photo</p>
                          <p class="mb-0">{{count($data->photo)}}</p>
                        </div>
                        <div class="px-3">
                          <p class="small text-muted mb-1">Followers</p>
                          <p class="mb-0">976</p>
                        </div>
                        
                      </div>
                      <div class="d-flex pt-1">
                        @if($data->id != auth()->user()->id)
                        <button type="button" class="btn btn-danger me-1  flex-grow-1">Follow</button>
                          @endif
                        @if($data->id == auth()->user()->id)
                            <button type="button" class="btn btn-danger  flex-grow-1">Edit</button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="image-gallery">

            @foreach ($data->photo as $photo )
            <x-Image 
            id='{{$photo->id}}' 
            username="{{$photo->user->username}}"
            name="{{$photo->user->name}}"
            image="{{$photo->image}}"
            profileImage="{{$photo->user->image}}"
            />
        
                @endforeach
            </div>
    </section>
    <script>
        let grids = [...document.querySelectorAll('.image-gallery')];
        
        if (grids.length && getComputedStyle(grids[0]).gridTemplateRows !== 'masonry') {
          grids = grids.map(grid => ({
            _el: grid,
            gap: parseFloat(getComputedStyle(grid).gridRowGap),
            items: [...grid.childNodes].filter(c => c.nodeType === 1),
            ncol: 0 }));
        
        
          function layout() {
            grids.forEach(grid => {
              /* get the post relayout number of columns */
              let ncol = getComputedStyle(grid._el).gridTemplateColumns.split(' ').length;
        
              /* if the number of columns has changed */
              if (grid.ncol !== ncol) {
                /* update number of columns */
                grid.ncol = ncol;
        
                /* revert to initial positioning, no margin */
                grid.items.forEach(c => c.style.removeProperty('margin-top'));
        
                /* if we have more than one column */
                if (grid.ncol > 1) {
                  grid.items.slice(ncol).forEach((c, i) => {
                    let prev_fin = grid.items[i].getBoundingClientRect().bottom /* bottom edge of item above */,
                    curr_ini = c.getBoundingClientRect().top /* top edge of current item */;
        
                    c.style.marginTop = `${prev_fin + grid.gap - curr_ini}px`;
                  });
                }
              }
            });
          }
        
          addEventListener('load', e => {
            layout(); /* initial load */
            addEventListener('resize', layout, false); /* on resize */
          }, false);
        }
        </script>
@endsection