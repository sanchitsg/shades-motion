@if(!empty($work))
<?php $count = 0; $small_count = 0; ?>
@foreach($work as $img_key => $img_val)
@if(in_array($count,[0,3,6,9,12]))
<div class="work-img-large">
    <div class="img-container">
        <a href="javascript:void(0);" class="work-img-redirect" data-video-id="animate-2d-1" data-video-title="{{ $img_key }}" data-video-description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae quo vero explicabo mollitia distinctio architecto obcaecati ea illo? Odio id similique labore corporis consequatur minima asperiores, cum blanditiis aperiam architecto." data-video-url="assets/videos/Merlot.mp4">
            <img class="work-img" src="/storage/{{ array_get($img_val,'0','') }}" alt="{{ $img_key }}" title="{{ $img_key }}">
        </a>
    </div>
</div>
@else
@if(in_array($small_count,[0,2,4,6,8]))
<div class="work-img-small">
@endif
    @if(in_array($count,[1,4,7,10,13]))
    <div class="image-1">
        <div class="img-container">
            <a href="javascript:void(0);" class="work-img-redirect" data-video-id="animate-2d-2" data-video-title="{{ $img_key }}" data-video-description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae quo vero explicabo mollitia distinctio architecto obcaecati ea illo? Odio id similique labore corporis consequatur minima asperiores, cum blanditiis aperiam architecto." data-video-url="assets/videos/Merlot.mp4">
                <img class="work-img" src="/storage/{{ array_get($img_val,'0','') }}" alt="{{ $img_key }}" title="{{ $img_key }}">
            </a>
        </div>
    </div>
    <?php $small_count++; ?>
    @elseif(in_array($count,[2,5,8,11,14]))
    <div class="image-2">
        <div class="img-container">
            <a href="javascript:void(0);" class="work-img-redirect" data-video-id="animate-2d-3" data-video-title="{{ $img_key }}" data-video-description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae quo vero explicabo mollitia distinctio architecto obcaecati ea illo? Odio id similique labore corporis consequatur minima asperiores, cum blanditiis aperiam architecto." data-video-url="assets/videos/Merlot.mp4">
                <img class="work-img" src="/storage/{{ array_get($img_val,'0','') }}" alt="{{ $img_key }}" title="{{ $img_key }}">
            </a>
        </div>
    </div>
    <?php $small_count++; ?>
    @endif
    @if(in_array($small_count,[2,4,6,8]))
</div>
@endif
@endif
<?php $count++; ?>
@endforeach
@endif