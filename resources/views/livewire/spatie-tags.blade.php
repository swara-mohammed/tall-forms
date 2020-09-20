<div class="bg-grey-lighter w-full">
    <p>{{$field['key']}}</p>
    @error('search')<p class="{{ $errorClass }}">{{ $field['searchError'] }}</p>@enderror
{{--    @error($field['key'])<p class="{{ $errorClass }}">{{ $field['errorMsg'] ?? $this->errorMessage($message) }}</p>@enderror--}}
    <div class="flex flex-1 flex-wrap bg-white border rounded shadow-sm pl-2 pr-4 pt-2 pb-1">
        @foreach ($tags as $i => $tag)
            <span
                class="tags-input-tag inline-flex leading-4 items-center text-sm bg-blue-300 text-blue-800 rounded py-1 px-2 mr-2 mb-1"
                style="user-select: none">
                <span>{{ $tag }}</span>
                <button wire:click.prevent="removeTag({{$i}})" type="button"
                        class="pl-1 tags-input-remove text-gray-500 text-lg leading-4 focus:outline-none">
                    &times;
                </button>
            </span>
        @endforeach
        <input autofocus wire:model.debounce.750ms="search" wire:keydown.space.prevent="addFromSearch" name="search"
               class="tags-input-text flex-1 outline-none pt-1 pb-1 ml-2"
               style="min-width:10rem" placeholder="Add tag...">
    </div>
    @if($field['help'])<p class="{{ $helpClass }} py-1">{{ $field['help'] }}</p>@endif
    <div class="flex items-center py-2">
        @foreach($options as $option)
            <button wire:click.prevent="addFromOptions('{{$option}}')" type="button">
                <span class="{{ $color }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 whitespace-no-wrap">
                    {{ $option ?? null }}
                </span>
            </button>
        @endforeach
    </div>
</div>
