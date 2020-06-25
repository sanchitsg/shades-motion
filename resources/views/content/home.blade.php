@extends('layouts.base')

@section('title','Shades & Motion - Home')

@section('styles')
<link href="{{ url('assets/css/content/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="home-page pages">
    <!-- Home Section -->
    <div class="section section-home" id="home">
        <input type="hidden" id="navigation_id" value="{{ $navigation_id }}">
        @if(!empty($files['carousel']))
        <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php $i = 0; @endphp
                @foreach($files['carousel'] as $carousel)
                @if($i == 0)
                <li data-target="#home-carousel" data-slide-to="{{ $i }}" class="active"></li>
                @else
                <li data-target="#home-carousel" data-slide-to="{{ $i }}" class=""></li>
                @endif
                @php $i++; @endphp
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($files['carousel'] as $carousel_key => $carousel_img)
                @if($carousel_key == 0)
                <div class="carousel-item active">
                    <img src="storage/{{ $carousel_img }}" class="w-100" alt="Shades & Motion">
                </div>
                @else
                <div class="carousel-item">
                    <img src="storage/{{ $carousel_img }}" class="w-100" alt="Shades & Motion">
                </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @endif
        <div class="home-quote">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                    <p class="quote-text"><q> Trust Your <span class="quote-text-pink">Crazy Ideas</span> And Set Them In <span class="quote-text-pink">Motion</span> </q></p>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
            </div>
        </div>
    </div>
    <!-- Home Section Ends -->

    <!-- About Section -->
    <div class="section section-about" id="about">
        <div class="parallax"></div>
        <div class="about-box">
            <div class="about-quote">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <p class="quote-text"><span class="about-quote-black">ABOUT</span> <span class="about-quote-pink">US</span></p>
                    </div>
                </div>
            </div>
            <div class="about-content">
                <div class="row">
                    <div class="about-image-block">
                        <?php $img_url = array_get($about,'img',''); ?>
                        <img src="storage/{{ $img_url }}" alt="Shades & Motion">
                    </div>
                    <div class="about-text-block">
                        <p class="about-text">We love coloring empty canvases</p>
                        <p class="about-text">& making simple briefs into artistic jibes!</p>
                        <p class="about-text">Our designs and creativity bring alive digital experiences to live exchanges!</p>
                        <p class="about-text">We have been handpicking our artists who have come on board,</p>
                        <p class="about-text">working fro the nooks & corners of their artistic freedom.</p>
                        <p class="about-text">We are old school yet milenial & always hungry</p>
                        <p class="about-text">for better designs, amazing talents and super clients.</p>
                    </div>
                </div>
                @if(!empty($about['parallax']))
                @foreach($about['parallax'] as $parallax)
                <div class="about-work-parallax" style="background-image: url('storage/{{ $parallax }}')"></div>
                @endforeach
                @endif
                <br/>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        @if(!empty($about['cards']))
                        @foreach($about['cards'] as $card)
                        <div class="card about-card">
                            <?php $img_url = array_get($card,'path',''); ?>
                            <img src="storage/{{ $img_url }}" class="card-img-top" alt="{{ array_get($card,'name','') }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ array_get($card,'name','') }}</h5>
                                <a href="javascript:void(0);" class="btn">CHECK 'EM OUT</a>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section Ends -->

    <!-- Client Section -->
    <div class="section section-client" id="client">
        <div class="parallax"></div>
        <div class="row client-head-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <p class="client-head">OUR <span class="head-pink">CLIENTS</span></p>
            </div>
        </div>
        <div class="row client-content-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                @if(!empty($clients))
                <div id="client-carousel" class="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach($clients as $client_key => $client_val)
                        @if($client_key == 0)
                        <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                        @endif
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    @if(!empty($client_val))
                                    @foreach($client_val as $client)
                                    <div class="card">
                                        <img class="card-img-top" src="storage/{{ array_get($client,'path','') }}" data-toggle="tooltip" data-placement="bottom" title="APIS Partners. One of our oldest and most prestigious clients. We have successfully completed 10 projects together." alt="{{ array_get($client,'name','') }}">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <ol class="carousel-indicators">
                        @for($i=0; $i < count($clients); $i++)
                        @if($i == 0)
                        <li data-target="#client-carousel" data-slide-to="{{ $i }}" class="active"></li>
                        @else
                        <li data-target="#client-carousel" data-slide-to="{{ $i }}" class=""></li>
                        @endif
                        @endfor
                    </ol>
                    <div class="controls-bottom">
                        <button class="btn btn-prev" href="#client-carousel" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <button class="btn btn-next" href="#client-carousel" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Client Section Ends -->

    <!-- Contact Us Section -->
    <div class="section section-contact-us" id="contact">
        <div class="parallax"></div>
        <div class="row contact-head-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <p class="contact-head">Get in touch with us!</p>
            </div>
        </div>
        <div class="row contact-content-row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contact-content-img text-center">
                <?php $img_url = array_get($files,'contact.0',''); ?>
                <img class="contact-us-img" src="storage/{{ $img_url }}" alt="Contact Us" title="Contact Us">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 contact-content-text text-center">
                <p class="contact-text">Fill the following details and we will get in touch</p>
                <form action="javascript:void(0);" id="contact-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="client-name" name="client-name" aria-describedby="client-name-err" placeholder="Enter Your Name">
                        <small id="client-name-err" class="contact-us-error">Please provide a name.</small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="company-name" name="company-name" aria-describedby="company-name-err" placeholder="Enter Company Name">
                        <small id="company-name-err" class="contact-us-error">Please provide a company name.</small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="client-email" name="client-email" aria-describedby="client-email-err" placeholder="Enter Your Email">
                        <small id="client-email-err" class="contact-us-error">Please provide an email.</small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="client-number" name="client-number" aria-describedby="client-number-err" placeholder="Enter Your Number">
                        <small id="client-number-err" class="contact-us-error">Please provide a number.</small>
                    </div>
                    <div class="contact-submit">
                        <button type="button" class="btn btn-lg btn-block" id="contact-from-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Contact Us Section Ends -->
</div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/home.js') }}"></script>
@endsection