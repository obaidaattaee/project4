@extends('admin.layouts.app')
@php
    $title = 'edit category'
@endphp
@section('title' , ucwords($title))

@section('content')
    @component('admin.layouts.header' , ['title' => ucwords($title)])
    @endcomponent

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
            </div>

            <div class="card-body">

                <form method="GET" action="{{route('category.index' )}}">

                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  bmd-form-group">
                                <label class="bmd-label-floating" >category title</label>
                                <input type="text" disabled required name="title" class="form-control" value="{{old('title')?? $category->title}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  bmd-form-group">
                                    <input class="ml-lg-3" disabled type="checkbox" id="show"  name="show" {{ ($category->show == true ? 'checked' : '' )}}>
                                    <label for="show" > accept to show category</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Back</button>
{{--                    <a href="{{route('category.index')}}">--}}
{{--                        <div  class="btn btn-primary pull-right">Cancel</div>--}}
{{--                    </a>--}}
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

@endsection
