<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class InlineCategoryForm extends Component
{
    public $name = '';
    public $parent_id = null;

    public function create()
    {
        $this->validate(
            [
               'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}0-9\s\-]+$/u'],
            ],
            $this->messages()
        );

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'tag' => implode(', ', [$this->name]),
            'parent_id' => $this->parent_id,
            'is_active' => true,
        ]);

        $this->dispatch('categoryCreated'); // Gửi event Livewire nếu cần

        $this->reset(['name', 'parent_id']);
    }

    public function render()
    {
        return view('livewire.admin.inline-category-form', [
            'parentCategories' => Category::whereNotIn('row_id', [1])->pluck('name', 'row_id'),
        ]);
    }

    protected function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là chuỗi.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên danh mục chỉ được chứa các ký tự chữ cái, số.',
        ];
    }
}
