<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditVacant extends Component
{
    public $vacant_id;
    public $title;
    public $salary;
    public $category;
    public $company;
    public $lastDay;
    public $description;
    public $image;
    public $newImage;

    use WithFileUploads;

    protected $rules = [
        'title' => ['required', 'string'],
        'salary' => ['required'],
        'category' => ['required'],
        'company' => ['required'],
        'lastDay' => ['required'],
        'description' => ['required'],
        'newImage' => ['nullable', 'image', 'max:1024', 'mimes:jpg,png,gif']
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant_id = $vacant->id;
        $this->title = $vacant->title;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->lastDay = Carbon::parse($vacant->lastDay)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;
    }

    public function editVacant()
    {
        $data = $this->validate();

        if($this->newImage) {
            $image = $this->newImage->store('public/vacants');
            $data['image'] = str_replace('public/vacants/', '', $image);
        }

        //Find the vacant to edit it
        $vacant = Vacant::find($this->vacant_id);

        //Overwrite the old values ​​with the new ones
        $vacant->title = $data['title'];
        $vacant->salary_id = $data['salary'];
        $vacant->category_id = $data['category'];
        $vacant->company = $data['company'];
        $vacant->lastDay = $data['lastDay'];
        $vacant->description = $data['description'];
        $vacant->image = $data['image'] ?? $vacant->image;

        //Save the Vacant
        $vacant->save();

        //Redirect
        session()->flash('message', 'La vacante ha sido actualizada correctamente');
        return redirect()->route('vacants.index');
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.edit-vacant', [
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
