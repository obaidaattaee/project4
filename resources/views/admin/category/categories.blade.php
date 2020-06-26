@extends('admin.layouts.app')
@php
    $title = "categories"
@endphp

@section('title' , ucwords($title) )



@section('content')
    @component('admin.layouts.header' , ['title' => ucwords($title) ])
    @endcomponent


    <div class="card">
        <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="card-title ">{{ ucwords($title) }}</h4>
                    <p class="card-category"> her you can show all {{ ucwords($title) }}</p>
                </div>


                <div class="col-md-4 text-right">
                    <a href="{{ route('category.create') }}" class="btn btn-primary  btn-round" style="background-color: #6C3D5E">New {{$title}}</a>
                </div>
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
                            CategoryName
                        </th>
                        <th>
                            Visible
                        </th>

                        <th class="">
                            Edit / Delete
                        </th>
                    </tr></thead>
                    <tbody>
@foreach($categories as $category)
                        <tr>
                            <td>
                              {{ $category->id }}
                            </td>

                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                <input type="checkbox" disabled {{ $category->show ?'checked':'' }} >
                            </td>

                            <td class="td-actions " >
                                <a href="{{ route('category.show' , $category->id) }}">
                                    <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Edit Task">
                                        <i class="material-icons">remove_red_eye</i>
                                    </button>
                                </a>
                                <a href="{{ route('category.edit' , $category->id) }}">
                                    <button type="button" rel="tooltip" title="" class="btn btn-dark btn-link btn-sm" data-original-title="Edit Task">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="{{ route('category.destroy' , $category->id) }}">
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


@endsection
