<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{__('dashboard')}}</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Welcome {{Auth::user()->name}}, You're logged in!

                <h1>Your favies are</h1>
                @foreach ($favies->favie as $row)

                {{$row->imdbid}}<hr>

                @php
                $movies = Http::get('http://www.omdbapi.com/?apikey=45843c2&i='.$row->imdbid)
                $movies = json_decode(movies);
                @endphp
                - {{$movies->Title}}<hr>

                @endforeach
            </div>
        </div>
    </div>
</div>