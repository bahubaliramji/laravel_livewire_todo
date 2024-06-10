{{-- First todo --}}
    <div class="flex mt-5 py-4 justify-center justify-between">
        <div>
            <input id="green-checkbox" wire:click='markCompleted({{$todo->id}})' @if($todo->is_completed) checked @endif type="checkbox"
                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        </div>
        <div>
            @if($edit == $todo->id)
            <x-text-input wire:model.live="editedTodo" class="w-full mr-2" />

            @else
            <span @if($todo->is_completed) class="text-green-600" @endif>{{$todo->todo}}</span>

            @endif
        </div>

        <div>
            @if($edit == $todo->id)
            <x-secondary-button wire:click='updateTodo({{$todo->id}})'>
                Update
            </x-secondary-button>
            <x-danger-button wire:click='cancelEdit'>
                Cancel
            </x-danger-button>
            @else
            <x-secondary-button wire:click='editTodo({{$todo->id}})'>
                Edit
            </x-secondary-button>
            <x-danger-button wire:click='deleteTodo({{$todo->id}})'>
                Delete
            </x-danger-button>
            @endif

        </div>

    </div>
