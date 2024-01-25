<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
    </div>
    <table class="table mt-3 ml-10">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->addDays(1)->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{route('posts.show' , $post->id)}}" class="btn btn-primary">View</a>
                    @if(auth()->id() == $post->user_id)
                        <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-info">Edit</a>
                        <form style="display: inline" method="post" action="{{route('posts.destroy' , $post->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" style="background-color: #c30c0c;" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @empty
                <tr>
                <td class="text-center" colspan="5">No Data To View</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {!! $posts->links() !!}
</x-app-layout>
  