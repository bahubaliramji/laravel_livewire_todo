<div>
    <div class="flex justify-center">
        <x-input-error :messages="$errors->get('todo')" class="mt-2" />
    </div>

    <x-alert />
    <form class="flex" method="POST" wire:submit.prevent="addTodo">
        <x-text-input wire:model.live="todo" class="w-full mr-2" />

        <x-primary-button>
            Add
        </x-primary-button>

    </form>
    <br>



    @foreach($todos as $todo)
        <x-todo-item :todo="$todo" :edit="$edit"  />
    @endforeach



    <div class="mt-5">
    {{$todos->links()}}
    <div>

        </div>
