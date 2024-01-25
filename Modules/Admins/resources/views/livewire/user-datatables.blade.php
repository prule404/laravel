<div> 
    <input type="search" wire:model.live="search" />
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                
            @empty
                <tr>
                    <th class="text-center" scope="col">No Data</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>