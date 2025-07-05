<div>
    <form>
        <div class="mt-2">
            <input wire:model.live.debounce="searchText" type="text"
                class="p-4 w-full border rounded-md bg-gray-700 text-white" placeholder="{{ $this->placeholder }}" />
        </div>
    </form>
    <div class="mt-4">

        @error('searchText')
        <span class="text-[#F53003]">
            {{ $message }}
        </span>
        @enderror
    </div>

    <livewire:search-results :$results :show="!empty($searchText)" />
</div>
