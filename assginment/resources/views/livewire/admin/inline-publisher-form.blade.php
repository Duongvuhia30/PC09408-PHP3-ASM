<div wire:ignore.self x-data="{ showForm: false }">
    <button type="button" class="text-primary text-sm hover:underline" @click="showForm = !showForm">
        ➕ Thêm nhà xuất bản mới
    </button>

    <div x-show="showForm" class="mt-3 space-y-3">
        {{-- Tên danh mục --}}
        <div>
            <input wire:model="name" type="text" placeholder="Tên nhà xuất bản"
                class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:ring-primary-500 focus:border-primary-500 transition" />
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <span style="color: red">{{ $error }}</span>
                @endforeach
            @endif
        </div>
       
        <div class="text-left">
            <button type="button" wire:click="create"
                class="px-4 py-2 bg-primary-600 text-white rounded text-sm hover:bg-primary-700 transition">
                Thêm nhà xuất bản mới
            </button>
        </div>
    </div>
</div>
