<x-layout>
@include("partials._hero")
@include("partials._search")


{{-- <h1>{{$heading}}</h1> --}}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

{{-- Conditional Statement if there are no listings --}}

{{-- @if (count($listings) === 0)
<p>No Listings Found</p>
@endif

@foreach ($listings as $listing)
    <h2>{{$listing["title"]}}</h2>
    <p>{{$listing["description"]}}</p>
@endforeach --}}

{{-- Using @unless --}}

@unless (count($listings) == 0)

@foreach ($listings as $listing)
    <x-listing-card :listing="$listing" />
@endforeach

@else   
    <p>No Listings Found</p>

@endunless

</div>

<div class="mt-6 p-4">

    {{$listings->links()}}

</div>

</x-layout>