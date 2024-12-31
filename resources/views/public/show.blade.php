<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - User View</title>
  @vite('resources/css/app.css')
</head>

<body>
    <!-- Page Header -->
<div class="bg-gray-200 py-10">
    <h1 class="text-4xl font-bold text-center text-gray-800">
        {{ $article->title }}
    </h1>
</div>

<!-- Article Content Section -->
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-10">
    <!-- Article Image -->
    <div class="h-80 bg-gray-100 overflow-hidden">
        <img 
            class="w-full h-full object-cover" 
            src="{{ $article->image_url ?: 'https://ui-avatars.com/api/?name=' . urlencode($article->title) . '&background=random&color=fff&bold=true&size=400&length=2' }}" 
            alt="{{ $article->title }}">
    </div>

    <!-- Article Content -->
    <div class="p-6">
        <!-- Category -->
        @if($article->category)
            <span class="inline-block bg-purple-100 text-purple-600 text-xs font-semibold rounded-full px-3 py-1 mb-4">
                {{ $article->category->name }}
            </span>
        @endif

        <!-- Content -->
        <div class="text-gray-800 text-lg leading-7">
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Tags -->
        @if($article->tags->isNotEmpty())
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700">Tags:</h3>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach ($article->tags as $tag)
                        <span class="text-xs bg-blue-100 text-blue-600 font-semibold px-2.5 py-0.5 rounded">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Comments Section -->
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mb-10 p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Comments</h2>

    <!-- Comments List -->
    <div class="space-y-4">
        @forelse ($article->comments as $comment)
            <div class="bg-gray-100 p-4 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-semibold text-gray-700">{{ $comment->user->name }}</span>
                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-600">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-gray-600">No comments yet. Be the first to comment!</p>
        @endforelse
    </div>

    <!-- Add Comment Form -->
    @auth
        <form action="{{ route('comments.store') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" rows="4" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Write your comment..." required></textarea>
            <button type="submit" class="bg-blue-500 text-white font-semibold rounded-lg shadow-md px-6 py-3 mt-3 hover:bg-blue-600 transition duration-200">
                Submit Comment
            </button>
        </form>
    @else
        <p class="text-gray-600 mt-4">
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a> to post a comment.
        </p>
    @endauth
</div>
</body>
</html>