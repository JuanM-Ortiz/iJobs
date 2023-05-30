<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $lastDay;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => ['required'],
        'category' => ['required'],
        'company' => ['required'],
        'lastDay' => ['required'],
        'description' => ['required'],
        'image' => ['required', 'image', 'max:1024', 'mimes:jpg,png,gif']
    ];

    public function createVacant()
    {
        $data = $this->validate();

        //Save Image
        $image = $this->image->store('public/vacants');

        //Insert Image to DataArray['image'] except 'public/vacants/'
        $data['image'] = str_replace('public/vacants/', '', $image);

        //Create Vacant in DB
        Vacant::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'lastDay' => $data['lastDay'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]);

        //Message
        session()->flash('message', 'La vacante se publico correctamente');

        //Redirect
        return redirect()->route('vacants.index');

    }

    public function render()
    {
        //Consult DB
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
