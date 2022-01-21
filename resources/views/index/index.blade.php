@extends('layouts.app', ['pageTitle' => isset($pageTitle) ? $pageTitle : 'Page'])

@section('content')
    <div class="inner">
        <div class="content">
            <header>
                <h2>{{$title}}</h2>
            </header>
            {!! $text !!}
        </div>
    </div>
@endsection
