@extends('layouts.app', ['pageTitle' => isset($pageTitle) ? $pageTitle : 'Page'])

@section('content')
    <div>
        @if (count($students) === 0)
            <p class="display-4 text-center">Sorry, no results were found...</p>
        @endif
        <header class="main">
            <h1>Students</h1>
        </header>
        <div class="input-group-append row mr-4 pt-4 w-100">
            <form class="w-100" action="/students" method="GET" style="margin-left: 10px">
                <div class="input-group">
                    <input type="search" name="search" placeholder="Search for..." class="form-control">
                    <select class="custom-select" name="search_by" id="searchBy">
                        <option value="name" selected>Search by name</option>
                        <option value="teacher">Search by teacher</option>
                        <option value="graduate_thesis">Search by graduate thesis</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="mt-3">Students ({{count($students)}})</div>
        <div class="container d-flex flex-wrap">
            @foreach ($students as $student)
                <div class="col-lg-4 col-md-6 mb-4 mt-4">
                    <div class="card h-100">
                            <h4>
                                <a href="/student/{{$student->id}}">Name: {{$student->name}}</a>
                            </h4>
                            <p class="card-text">Faculty number: {{$student->faculty_number}}</p>
                            <p class="card-text">Graduate thesis: {{$student->graduateThesisTopic}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
