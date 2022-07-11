@extends('layout')

@section('content')

@include('partials._hero')
@include('partials._search')

@unless(count($listings) == 0)
@foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
@endforeach
@else
<p>No Listing found</p>
@endunless
@endsection

