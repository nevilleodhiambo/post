<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("This is a Posts Page") }}
                </div>
                <div class="form">
                    <form class="ml-4 w-300 h-200" action="{{route('posts.store')}}" method="post">
                        @csrf
                    <textarea name="body" id="body" placeholder="Post Something" cols="30" rows="10" class="bg-gray-100 border-2 w-400 h-200 p-4 rounded-lg"></textarea><br>
                    <button type="submit" class="btn">Post</button>

                    </form>
                    @if($posts->count())
                             @foreach($posts as $post)
                             <div class="mb-4 ">
                             <a href="">{{ $post->user->name}}</a><span>{{$post->created_at->diffForHumans()}}</span><br>

                                {{$post->body}}
                                <form action="{{route('posts.likes',  $post->id)}}" method="post">
                                    @csrf
                                    <button type="submit">Like</button>
                                </form>
                                <form action="" method="post">
                                    @csrf
                                    <button type="submit">Unlike</button>
                                </form>

                               <span> {{ $post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>

                            @endforeach

                            {{$posts->Links()}}
                    @else
                       <p>There are no Posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
