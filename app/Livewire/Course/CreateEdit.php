<?php

namespace App\Livewire\Course;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use Livewire\Component;

class CreateEdit extends Component
{
    public CourseForm $form;

    public array $statuses = [
        'draft' => 'Draft',
        'published' => 'Published',
        'archived' => 'Archived',
    ];

    public function mount()
    {
        $course = Course::first();
        $this->form->setModel($course);
    }

    /**
     * Calls the edit method of the form object to get and set the model with
     * the given id.
     */
    public function edit(int $id): void
    {
        $this->form->edit($id);
    }

    /**
     * Calls the create method of the form object to reset the form
     * properties.
     */
    public function create(): void
    {
        $this->form->setModel(new Course);
    }

    /**
     * Calls the save method of the form object to persist the form data, then
     * dispatches a 'notify' event with the message 'Saved!'.
     */
    public function save(): void
    {
        $this->form->update();
        $this->dispatch('notify', ('Saved!'));
    }

    public function render()
    {
        return view('livewire.course.create-edit');
    }
}
