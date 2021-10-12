<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    public $name;
    public $slug;
    public $confirmCategoryDeletion = false;
    public $showModalEdit = false;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.dashboard.category-index', compact('categories'));
    }

    public function addCategory()
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        $category = Category::create([
            'name' => $this->name
        ]);

        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = '';
    }

    public function confirmCategoryDeletion($id)
    {
        $this->confirmCategoryDeletion = $id;
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        $this->confirmCategoryDeletion = false;
    }

    public function showModalEdit($id)
    {
        $this->showModalEdit = $id;
        $category = Category::find($id);
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function editCategory(Category $category)
    {
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string'
        ]);

        $category->update([
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->resetInputs();

        $this->showModalEdit = false;
    }
}
