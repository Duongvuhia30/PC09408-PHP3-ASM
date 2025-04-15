<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\CategoryBlog;
use Illuminate\Support\Str;

class InlineCategoryBlogForm extends Component
{
    public $name = '';

    public function create()
    {
        $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\p{L}0-9\s\-]+$/u',
                'unique:categories_blog,name',
            ],
        ], $this->messages());        

        CategoryBlog::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'is_active' => true,
        ]);

        $this->dispatch('categoryCreated');
    }

    public function render()
    {
        return view('livewire.admin.inline-category-blog-form');
    }

    protected function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là chuỗi.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'name.regex' => 'Tên danh mục chỉ được chứa các ký tự chữ cái, số.',
            'name.unique' => 'Tên danh mục đã tồn tại.'
        ];
    }
}
