@extends('layouts.app') {{-- Changez 'layouts.app' avec votre layout public si nécessaire --}}

@section('title', 'Articles')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-center mb-6">Articles</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $article->title }}</h2>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($article->content, 100) }}
                        </p>
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Catégorie :</strong> 
                            <span class="text-blue-600">{{ $article->category->name ?? 'Non catégorisé' }}</span>
                        </p>
                        <p class="text-sm text-gray-700 mb-4">
                            <strong>Tags :</strong>
                            @forelse($article->tags as $tag)
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-1 px-2.5 py-0.5 rounded">
                                    {{ $tag->name }}
                                </span>
                            @empty
                                <span class="text-gray-500">Aucun tag</span>
                            @endforelse
                        </p>
                        <a href="{{ route('public.articles.show', $article->id) }}" 
                           class="inline-block bg-blue-500 text-white text-sm font-medium py-2 px-4 rounded hover:bg-blue-600">
                            Lire plus
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center">
                    <p class="text-gray-500">Aucun article disponible pour le moment.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $articles->links('pagination::tailwind') }} {{-- Pagination stylée pour Tailwind --}}
        </div>
    </div>
@endsection
