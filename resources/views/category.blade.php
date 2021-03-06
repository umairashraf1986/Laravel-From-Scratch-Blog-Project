<x-layout>
    @foreach($category->posts as $post)
        <article>
            <h1>
                <a href="posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach

    <a href="/">Go Back</a>
</x-layout>
