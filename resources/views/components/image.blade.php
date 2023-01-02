<div class="image">
    <div class="post-image">
        <a class="ripple" href="/photo/{{$id}}" style="border-radius: 24px">
            <img src="{{ asset($image) }}" class="img-fluid" alt=""srcset="">
        </a>
        <div class="det">
            <a class="d-flex align-items-center " href="{{"@".$username}}" role="button">
                <img src="/profile_image/{{$profileImage}}" class="userimage rounded-circle" height="32"
                    alt="user-image" loading="lazy" />
                <span> {{$name ?? "none"}}</span>
            </a>
        </div>
    </div>
</div>