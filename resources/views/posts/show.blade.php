<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Information') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <p>Post Info</p>
            <livewire:like-button :post="$post" />
        </div>
        <div class="card-body">
          <h5 class="card-title">Title: {{$post->title}}</h5>
          <p class="card-text">Description: {{$post->description}}</p>
        </div>
    </div><br>
    <div class="card">
        <div class="card-header">
          Post Creator Info
        </div>
        <div class="card-body">
          <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'not found'}}</h5>
          <p class="card-text">Email:{{$post->user->email}}</p>
        </div>
    </div>
</x-app-layout>