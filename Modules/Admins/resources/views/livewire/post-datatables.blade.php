<div> 
    <input type="search" wire:model.live="search" />
    <span >
        <p>Count Posts: {{ $count }}</p>
    <span>
    <table class="table">
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <a href="{{route('posts.show' , $post->id)}}" class="btn btn-primary">View</a>
                        <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-info">Edit</a>
                        <form style="display: inline" method="post" action="{{route('posts.destroy' , $post->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" style="background-color: #c30c0c;" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <th class="text-center" scope="col">No Data</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $posts->links() }}
</div>