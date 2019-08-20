@extends('layouts.app')

@section('content')

<div class="card">
   <h1 class="card-header">Dashboard <small>header small text goes here...</small></h1>
</div>
<div class="card">
<div><br></div>
    <!-- begin row -->
    <div class="row">
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-3" style="padding-left:2%">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                <div class="stats-info">
                    <h4>POSTSED</h4>
                    <p>{{$post_count}}</p>
                </div>
                <div class="stats-link">
                <a href="{{route('posts')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-3">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                <div class="stats-info">
                    <h4>TRUSHED POSTS</h4>
                    <p>{{$trashed_count}}</p>
                </div>
                <div class="stats-link">
                    <a href="{{route('post.trash')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-3">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>USERS</h4>
                    <p>{{$user_count}}</p>
                </div>
                <div class="stats-link">
                    <a href="{{route('users')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>

                </div>
            </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-md-3 col-sm-3" style="padding-right:2%">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
                <div class="stats-info">
                    <h4>CATEGORIES</h4>
                    <p>{{$category_count}}</p>
                </div>
                <div class="stats-link">
                    <a href="{{route('categories')}}">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <!-- end col-3 -->
    </div>
    <!-- end row -->





</div>
@endsection


