<div>
    <button wire:click="toggleLike" class="text-primary">
        <span style="color: {{ $liked ? 'red' : 'blue' }};">{{ $liked ? 'UnLike' : 'Like'}}</span>
    </button>
    <span>{{ $post->likes()->count() }} {{ Str::plural('like', $post->likes()->count()) }}</span>
</div>
