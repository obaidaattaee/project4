@extends('admin.layouts.app')
@php
    $title = "news"
@endphp

@section('title' , ucwords($title) )



@section('content')
    @component('admin.layouts.header' , ['title' => ucwords($title) ])
    @endcomponent


    <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-2">
                    <h4 class="card-title ">{{ ucwords($title) }}</h4>
                    <p class="card-category"> her you can show all {{ ucwords($title) }}</p>
                </div>

                <form>
                    <div class="row">
                        <div class="col-4">
                            <input type="text" name="sammary" class="form-control" value="{{ request()->sammary }}">
                        </div>
                        <div class="col-2">
                            <select class="browser-default custom-select" name="category">
                                <option value="">any category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <select name="published" class="browser-default custom-select">
                                <option value="">all </option>
                                <option value="1">published</option>
                                <option value="0">not published</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="submit" value="search" class="btn btn-success">
                        </div>
                        <div class="col-2 text-right" >
                            <a href="{{ route('news.create') }}" class="btn btn-primary  btn-round" style="background-color: #6C3D5E">New {{$title}}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="card-body">

            @if(session()->get('msg'))

                <div class="alert {{substr(session()->get('msg') ,0,2) == 's:' ? 'alert-info' : 'alert-warning' }} text-center "> {{substr(session()->get('msg') ,2) =='s:' ? substr(session()->get('msg') ,2) : substr(session()->get('msg') ,2) }}</div>


            @endif

            <div class="table-responsive ">

                <table class="table">
                    <thead class=" text-primary">
                    <tr><th>
                            ID
                        </th>

                        <th>
                            sammary
                        </th>
                        <th>
                            Details
                        </th>
                        <th>
                            Published
                        </th>
                        <th>
                            categoru title
                        </th>


                        <th class="">
                            Show / Edit / Delete
                        </th>
                    </tr></thead>
                    <tbody>
@foreach($news as $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>

                        <td>
                            {{ $item->sammary }}
                        </td>

                        <td>
                            <textarea disabled style="width:100%" class="form-control"> {{ $item->details }}</textarea>

                        </td>
                        <td>
                            <input type="checkbox" disabled  {{ $item->published ?'checked':'' }}  >
                        </td>
                        <td>
                            {{ $item->category->title ?? '' }}
                            {{--                        {{dd($item)}}--}}
                        </td>
                        <td class="td-actions " >
                            <a href="{{ route('news.show' , $item->id) }}">
                                <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Edit Task">
                                    <i class="material-icons">remove_red_eye</i>
                                </button>
                            </a>
                            <a href="{{ route('news.edit' , $item->id) }}">
                                <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Edit Task">
                                    <i class="material-icons">edit</i>
                                </button>
                            </a>
                            <a href="{{ route('news.destroy' , $item->id) }}">
                                <button type="button" rel="tooltip" onclick="return confirm('are you sure ?');" title="" class="btn btn-dark btn-link btn-sm text-right" data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </a>
                        </td>
                    </tr>
@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

{{ $news->links() }}
@endsection
