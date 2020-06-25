@extends('layouts.base')

@section('title','Shades & Motion - {{ $name }}')

@section('styles')
<link href="{{ url('assets/css/content/work.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="section section-work" id="work">
    <div class="row work-tabs">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <ul class="nav nav-tabs nav-fill">
                <li @if(!empty($name) && $name == '2D ANIMATIONS') class="nav-item action" @else class="nav-item" @endif>
                    <a @if(!empty($name) && $name == '2D ANIMATIONS') class="nav-link active" @else class="nav-link " @endif href="/work/animations-2d">2D ANIMATIONS</a>
                </li>
                <li @if(!empty($name) && $name == '3D ANIMATIONS') class="nav-item action" @else class="nav-item" @endif>
                    <a @if(!empty($name) && $name == '3D ANIMATIONS') class="nav-link active" @else class="nav-link " @endif href="/work/animations-3d">3D ANIMATIONS</a>
                </li>
                <li @if(!empty($name) && $name == 'FILMS') class="nav-item action" @else class="nav-item" @endif>
                    <a @if(!empty($name) && $name == 'FILMS') class="nav-link active" @else class="nav-link " @endif href="/work/films">FILMS</a>
                </li>
            </ul>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="work-display">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
                        <h2>{{ $name }}</h2>
                        <input type="hidden" id="work_type" value="{{ strtolower(str_replace(' ','-',$name)) }}">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
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
                        <div class="load-more-content"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <button type="button" class="btn load-more">View More</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/work.js') }}"></script>
@endsection