@extends('app.Layout.main', ['title' => 'Home'])

@section('content')
    <style>
       

        .left-side {
            width: 300px;
            height: 400px;
            position: fixed;
            /* top: 100px;
                left: 100px;  */

        }

        .card {
            width: 160px;
            height: 120px;
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


        .content-header{
             padding: 33px;
             display: flex;
             justify-content: space-between;
        }   
    </style>
    
    <div class="header-bg"></div>
    <section class="content">
        <div class="content-header">
            <div class="warpper">
                <h4>Welcome back <strong>{{auth()->user()->name}}</strong> </h4>
                <h6 style="opacity: .7">Lorem ipsum dolor sit i vel blanditiis aliquid obcaecati voluptatibus? </h6>
            </div>
            <a href="{{ route('photo.create') }}" class="btn btn-danger">Craete</a>
        </div>
    <div class="image-gallery">

    @foreach ($data as $photo )
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
