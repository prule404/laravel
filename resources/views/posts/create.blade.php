<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
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
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}" id="exampleFormControlInput1" placeholder="Title Here...">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="post_creator" class="form-select" aria-label="Default select example">
                <option value="{{$user->id}}">{{$user->name}}</option>
            </select>
        </div>
        <button type="submit" style="background-color: #303ea5;" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>