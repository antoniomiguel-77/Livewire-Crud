<?php

namespace App\Http\Livewire;

use App\Models\Students;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;


class StudentsComponent extends Component
{

    public $student_id,$name,$email,$phone;
    public function resetInputFields()
    {
        $this->student_id = '';
        $this->name = '';
        $this->email = '';
        $this->phone = '';
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'student_id'=>'required|numeric|unique:students',
            'name'=>'required',
            'email'=>'required|email|unique:students',
            'phone'=>'required|unique:students',
        ]);
    }
    public function storeStudentData()
    {
       $student = $this->validate([
            'student_id'=>'required|numeric|unique:students',
            'name'=>'required',
            'email'=>'required|email|unique:students',
            'phone'=>'required|unique:students',
        ]);

            $response = Students::create($student);
            if($response)
            {
                Session()->flash('success','Student Added Successfuly!');
                $this->resetInputFields();
                $this->dispatchBrowserEvent('close-modal');
            }
    }

    public function render()
    {
        $students = Students::orderBy('id','desc')->get();
        return view('livewire.students-component',compact('students'));
    }
}
