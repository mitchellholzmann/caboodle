@extends('structure.layout')

@section('content')
    @if(have_posts())
        @while(have_posts())
            {{ the_post() }}
            @include('partials.content')
        @endwhile
        {{ the_posts_navigation() }}
    @else
        @include('partials.content-none')
    @endif
@endsection