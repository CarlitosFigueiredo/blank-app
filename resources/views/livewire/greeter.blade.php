<div>
    <form
        wire:submit="changeGreeting()"
    >
        <div class="mt-2">
            <select
                wire:model.fill='greeting'
                name="greeting"
                id="greeting"
                class="p-4 border rounded-md bg-gray-700 text-white"
            >
                <option value="Hello">Hello</option>
                <option value="Hi">Hi</option>
                <option value="Hey">Hey</option>
                <option value="Howdy">Howdy</option>
            </select>

            <input
                wire:model='name'
                type="text"
                name="newName"
                id="newName"
                class="p-4 border rounded-md bg-gray-700 text-white"
            />
        </div>
        <div>
            @error('name')
                <span
                    class="text-[#f53003]"
                >
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mt-2">
            <button
                class="text-white font-medium rounded-md px-4 py-2 bg-blue-600"
                type="submit"
            >
                Greet
            </button>
        </div>
    </form>

    @if ($greetingMessage !== '')
        <div class="mt-5">

            {{ $greetingMessage }}!
        </div>
    @endif
</div>
