<div class="m-auto w-1/2 mb-4">
    <h3 class="text-lg text-gray-200 mb-3">
        Edit Article
    </h3>
    <form wire:submit="save">

        <div class="mb-3">
            <label class="block" for="article-title">Title</label>
            <input wire:model="form.title" id="article-title" type="text"
                class="p-2 w-full rounded-md bg-gray-700 text-white" />

            <div>
                @error('form.title')
                <span class="text-red-600">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="block" for="article-content">Content</label>
            <textarea wire:model="form.content" id="article-content"
                class="p-2 w-full rounded-md bg-gray-700 text-white"></textarea>

            <div>
                @error('form.content')
                <span class="text-red-600">
                    {{ $message }}
                </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">

            <label class="flex items-center">
                <input type="checkbox" name="published" class="mr-2" wire:model.boolean="form.published" />
                Published
            </label>
        </div>

        <div class="mb-3">
            <div>
                <div class="mb-2">Notification Options</div>
                <div class="flex items-center gap-6">

                    <label class="flex items-center ">
                        <input type="radio" value="email" class="mr-2" wire:model="form.notification" />
                        Email
                    </label>

                    <label class="flex items-center">
                        <input type="radio" value="sms" class="mr-2" wire:model="form.notification" />
                        SMS
                    </label>

                    <label class="flex items-center">
                        <input type="radio" value="none" class="mr-2" wire:model="form.notification" />
                        None
                    </label>
                </div>

            </div>
        </div>

        <div class="mb-3">
            <button class="text-gray-200 p-2 bg-indigo-700 hover:bg-indigo-900 rounded-sm" type="submit">
                Save
            </button>
        </div>
    </form>
</div>