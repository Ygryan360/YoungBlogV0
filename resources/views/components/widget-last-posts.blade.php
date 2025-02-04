@php
    $lastPosts = \App\Models\Post::select(['title', 'slug', 'cover', 'created_at', 'id', 'category_id'])
        ->where('status', '=', 'published')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();
@endphp

<div class="mb-5 text-center">
    <h2 class="widget-title text-white d-inline-block">Articles récents</h2>
</div>
@foreach ($lastPosts as $lastPost)
    <div class="card post-item bg-transparent border-0 mb-5">
        <a href="{{ route('blog.show', [$lastPost->slug, $lastPost->id]) }}">
            <img class="card-img-top rounded-0" src="{{ asset('img/cover.png') }}" alt="{{ $lastPost->title }}">
        </a>
        <div class="card-body px-0">
            <h2 class="card-title">
                <a class="text-white opacity-75-onHover"
                    href="{{ route('blog.show', [$lastPost->slug, $lastPost->id]) }}">
                    {{ \Str::limit(ucfirst($lastPost->title), 35) }}
                </a>
            </h2>
            <ul class="post-meta mt-3 mb-4">
                <li class="d-inline-block mr-3">
                    <span class="fas fa-clock text-primary"></span>
                    <span class="ml-1 text-white">
                        {{ \Carbon\Carbon::parse($lastPost->created_at)->format('d M Y') }}
                    </span>
                </li>
                <li class="d-inline-block">
                    <span class="fas fa-list-alt text-primary"></span>
                    <a class="ml-1" href="{{ route('blog.category', $lastPost->category->name) }}">
                        {{ ucfirst($lastPost->category->name) }}
                    </a>
                </li>
            </ul>
            <a href="{{ route('blog.show', [$lastPost->slug, $lastPost->id]) }}" class="btn btn-primary">
                Lire &rarr;
            </a>
        </div>
    </div>
@endforeach
