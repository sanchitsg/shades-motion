@extends('layouts.base')

@section('title','Shades & Motion - Meet The Shades')

@section('styles')
<link href="{{ url('assets/css/content/team.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="section section-team" id="team">
    <input type="hidden" id="navigation_id" value="{{ $navigation_id }}">
    <div class="about-team">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <p class="about-team-head">MEET THE <span class="head-pink">SHADES</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center">
                <p class="about-team-text">Shades came together by the purest accident. The team is made up of young people with a strong affinity towards fine arts. It was natural for them to make a collective decision to take their arts to the digital platform.</p>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
        </div>
        <div class="row team-cards-block">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                @if(!empty($lead))
                <div class="team-lead">
                    <div class="team-lead-img">
                        <?php $img_url = array_get($lead,'lead_img',''); ?>
                        <img src="storage/{{ $img_url }}" alt="{{ array_get($lead,'lead_name','') }}" title="{{ array_get($lead,'lead_name','') }}">
                    </div>
                    <div class="team-lead-text">
                        <p class="name">{{ array_get($lead,'lead_name','') }}</p>
                        <p class="designation">{{ array_get($lead,'lead_designation','') }}</p>
                        <p class="description">{{ array_get($lead,'lead_intro','') }}</p>
                        <p class="quote"><q> {{ array_get($lead,'lead_quote','') }} </q></p>
                    </div>
                </div>
                @endif
                @if(!empty($others))
                <div class="team-others">
                    <?php $i = 1; ?>
                    @foreach($others as $member)
                    @if($i % 2 != 0)
                    <div class="team-member team-member-odd">
                        <div class="team-member-img">
                            <?php $img_url = array_get($member,'member_img',''); ?>
                            <img src="storage/{{ $img_url }}" alt="{{ array_get($member,'member_name','') }}" title="{{ array_get($member,'member_name','') }}">
                        </div>
                        <div class="team-member-text">
                            <p class="name">{{ array_get($member,'member_name','') }}</p>
                            <p class="designation">{{ array_get($member,'member_designation','') }}</p>
                            <p class="description">{{ array_get($member,'member_intro','') }}</p>
                            <p class="quote"><q> {{ array_get($member,'member_quote','') }} </q></p>
                        </div>
                    </div>
                    @else
                    <div class="team-member team-member-even">
                        <div class="team-member-img">
                            <?php $img_url = array_get($member,'member_img',''); ?>
                            <img src="storage/{{ $img_url }}" alt="{{ array_get($member,'member_name','') }}" title="{{ array_get($member,'member_name','') }}">
                        </div>
                        <div class="team-member-text">
                            <p class="name">{{ array_get($member,'member_name','') }}</p>
                            <p class="designation">{{ array_get($member,'member_designation','') }}</p>
                            <p class="description">{{ array_get($member,'member_intro','') }}</p>
                            <p class="quote"><q> {{ array_get($member,'member_quote','') }} </q></p>
                        </div>
                    </div>
                    @endif
                    <?php $i++; ?>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/team.js') }}"></script>
@endsection