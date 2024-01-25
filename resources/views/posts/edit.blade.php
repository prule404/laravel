<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('posts.update' , $post->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title' , $post->title)}}" id="exampleFormControlInput1" placeholder="Title Here...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="post_creator" class="form-select" aria-label="Default select example">
                @foreach ($users as $user)
                    {{-- <option value="{{$user->id}}"
                        @if ($post->user_id === $user->id) selected @endif
                    >{{$user->name}}</option> --}}
                    <option value="{{$user->id}}" @selected($post->user_id === $user->id)>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" style="background-color: #32912c;" class="btn btn-success">Update</button>
    </form>
</x-app-layout>