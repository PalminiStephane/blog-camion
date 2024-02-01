<x-default-layout>          
    <div class="space-y-10 md:space-y-16">
        @forelse ($posts as $post )
        {{-- <x-post:post="$post":list="true"/> --}}
        <x-post :$post list />
        @empty
        <p class="text-slate-600 text-center">Aucun article ne correspond à votre recherche.</p>
        @endforelse
        {{ $posts->links() }}
    </div>
</x-default-layout>