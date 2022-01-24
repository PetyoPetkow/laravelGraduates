@extends('layouts.app', ['pageTitle' => isset($pageTitle) ? $pageTitle : 'Page'])

@section('content')
    <div>
        @if (count($teachers) === 0)
            <p class="display-4 text-center">Sorry, no results were found...</p>
        @endif
        <header class="main">
            <h1>Teachers</h1>
        </header>
        <div class="input-group-append row mr-4 pt-4 w-100">
            <form class="w-100" action="/teachers" method="GET" style="margin-left: 10px">
                <div class="input-group">
                    <input style="margin:10px" type="search" name="search" placeholder="Search for..." class="form-control">
                    <select style="margin:10px" class="custom-select form-control" name="search_by" id="searchBy">
                        <option value="name" selected>Search by name</option>
                        <option value="student">Search by student</option>
                        <option value="graduate_thesis">Search by graduate thesis</option>
                    </select>
                    <button style="margin:10px" type="submit" class="btn">Search</button>
                </div>
            </form>
        </div>
        <div class="mt-3">Teachers ({{count($teachers)}})</div>
        <div class="container d-flex flex-wrap">
            @foreach ($teachers as $teacher)
                <div class="col-lg-4 col-md-6 mb-4 mt-4">
                    <div class="card h-100">
                        <h4>
                            {{$teacher->name}}
                        </h4>

                        <div><img style="width:100px" src="{{$teacher->image}}" alt="teacher image" title="teacher image"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
