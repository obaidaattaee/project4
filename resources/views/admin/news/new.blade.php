@extends('admin.layouts.app')
@php
    $title = 'edit news'
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
                @if($errors->any())

                    <ul>
                        @foreach($errors->all() as $error)

                            <li class="alert alert-danger col-md-11 text-center" style="display: inline-block">
                                {{ $error }}
                            </li>
                        @endforeach

                    </ul>
                @endif
                <form method="GET" action="{{route('news.index' )}}">

                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  bmd-form-group">
                                <label class="bmd-label-floating" >news sammary</label>
                                <input type="text" disabled name="sammary" class="form-control" value="{{old('sammary')?? $news->sammary}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-field col s12">
                                    <label for="categories"> select category title</label>
                                    <select class="browser-default custom-select" name="category_id" disabled  id="categories">
{{--                                        <option selected value="" disabled>Open this select menu</option>--}}
                                        @foreach($categories as $category)
                                            <option {{ $news->category->id == $category->id   ? 'selected':'' }}value="{{  $category->id }}">{{ old('title')?? $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group  bmd-form-group">
                                <label class="bmd-label-floating" >detail</label>
                                <textarea disabled style="width:100%" class="form-control" name="details" id="detail"> {{ old('details')?? $news->details }}</textarea>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group  bmd-form-group">
                                    <input class="ml-lg-3" type="checkbox" id="published"  name="published" {{ ($news->published == true ? 'checked' : '' )}} >
                                    <label for="published" > accept to show category</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>

                    <div class="clearfix"></div>

                </form>
            </div>
        </div>
    </div>


@endsection
