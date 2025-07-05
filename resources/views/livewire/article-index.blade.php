<div class="m-auto w-full">

    @foreach ($articles as $article)

    <div class="mt-5 p-3" wire:key="{{ $article->id }}">
        <h3 class="text-2xl text-blue-500 hover:text-blue-700">
            <a href="/articles/{{ $article->id }}">
                {{ $article->title}}
            </a>
        </h3>
        <p>
            {{ str($article->content)->words(50) }}
        </p>
    </div>
    @endforeach
</div>
