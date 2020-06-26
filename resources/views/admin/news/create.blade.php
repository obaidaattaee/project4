@extends('admin.layouts.app')
@php
    $title = "news"
@endphp

@section('title' , ucwords($title) )



@section('content')
    @component('admin.layouts.header' , ['title' => ucwords($title) ])
    @endcomponent


    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
            </div>

            <div class="card-body">
                @if($errors->any())

                    <ul>
                        @foreach($errors->all() as $error)

                            <li class="alert alert-danger col-md-11 text-center" style="display: inline-block">
                                {{ $error }}
                            </li>
                        @endforeach

                    </ul>
                @endif
                <form method="POST" action="{{route('news.store')}}">

                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  bmd-form-group">
                                <label class="bmd-label-floating" for="sammary">news sammary</label>
                                <input type="text" required name="sammary" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-field col s12">
                                    <label for="categories"> select category title</label>
                                    <select class="browser-default custom-select" name="category_id" required id="categories">
                                        <option selected value="" disabled>Open this select menu</option>
                                      @foreach($categories as $category)
                                        <option value="{{  $category->id }}">{{ $category->title }}</option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group  bmd-form-group">
                                <div class="form-group purple-border">
                                    <label for="details">details</label>
                                    <textarea class="form-control" name="details" id="details" required style="width: 100%"></textarea>
                                </div>

                            </div>
                        </div>

                            <div class="col-md-12">
                                <div class="form-group  bmd-form-group">
                                    <input class="ml-lg-3" type="checkbox" id="show"  name="published">
                                    <label for="show"> accept to publish news</label>
                                </div>
                            </div>

                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <a href="{{route('news.index')}}">
                        <div  class="btn btn-primary pull-right">Cancel</div>
                    </a>
                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>

@endsection
