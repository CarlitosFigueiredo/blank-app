<div>
    <form>
        <div class="mt-2">
            <input wire:model.live.debounce="searchText" type="text"
                class="p-4 w-9/12 border rounded-md bg-gray-700 text-white" placeholder="type something to search">

            <button type="button" class="text-white font-medium rounded-md p-4 disabled:bg-indigo-400 bg-indigo-600"
                wire:click.prevent="clear" @disabled(empty($searchText))>
                Clear
            </button>
        </div>
    </form>
    <div class="mt-4">

        @error('searchText')
        <span class="text-[#F53003]">
            {{ $message }}
        </span>
        @enderror
    </div>
    <div class="mt-4">
        @foreach($results as $result)

        <div class="pt-2">
            <a href="/articles/{{ $result->id }}" target="_blank">

                {{$result->title}}
            </a>
        </div>
        @endforeach
    </div>
</div>
