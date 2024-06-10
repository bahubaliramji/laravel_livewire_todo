<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Repo\TodoRepo;
use Livewire\WithPagination;


class Todo extends Component
{
    use WithPagination;
    //public $todos;
    protected $repo;

    #[Rule('required|min:3')]
    public $todo = '';

    #[Rule('required|min:3')]
    public $editedTodo;

    public $edit;

    public function boot(TodoRepo $repo){
        $this->repo = $repo;
    }

    public function addTodo(){
        $validate = $this->validateOnly('todo');
        $this->repo->save($validate);
        $this->todo = '';
        session()->flash('message','Todo Created Successfully');
        return $this->redirect(route('dashboard'));
    }

    public function editTodo($todoId){
       $this->edit = $todoId;
       $this->editedTodo = $this->repo->getTodo($todoId)->todo;
    }

    public function updateTodo($todoId){
       $validate = $this->validateOnly('editedTodo');
       //dd($validate);
       $this->repo->update($todoId,$validate['editedTodo']);
        //    $this->cancelEdit();
        session()->flash('message','Todo Update Successfully');
        return $this->redirect(route('dashboard'));
    }

    public function cancelEdit(){
       $this->edit = '';
    }

    public function deleteTodo($todoId){
        $this->repo->delete($todoId);
    }


    public function markCompleted($todoId){
        return $this->repo->completed($todoId);
     }

    public function render()
    {
        $todos = $this->repo->fetchAll();

        return view('livewire.todo',compact('todos'));
    }
}
