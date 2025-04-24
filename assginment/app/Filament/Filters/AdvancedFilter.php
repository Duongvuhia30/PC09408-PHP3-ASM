<?php

namespace App\Filament\Filters;

use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;

class AdvancedFilter
{
    public static function make(array $config = []): Filter
    {
        $label = $config['label'] ?? 'Lọc nâng cao';
        $fields = $config['fields'] ?? [];
        $filters = $config['filters'] ?? [];
        $categoryModel = $config['category_model'] ?? \App\Models\Category::class;
        $authorModel = $config['author_model'] ?? \App\Models\ProductMetadata::class;

        $form = [];

        // Trạng thái
        if (in_array('status', $filters)) {
            $form[] = Grid::make(2)->schema([
                Checkbox::make('active')->label('Hiển thị'),
                Checkbox::make('inactive')->label('Ẩn'),
            ]);
        }

        // khoảng    
        $form[] = Grid::make(2)->schema(
            collect($fields)->flatMap(function ($f) {
                $minField = "min_{$f['field']}";
                $maxField = "max_{$f['field']}";

                if ($f['field'] === 'release_date') {
                    return [
                        DateTimePicker::make($minField)->label("Tối thiểu {$f['label']}"),
                        DateTimePicker::make($maxField)->label("Tối đa {$f['label']}"),
                    ];
                }

                return [
                    TextInput::make($minField)->label("Tối thiểu {$f['label']}")->numeric()->minValue(0),
                    TextInput::make($maxField)->label("Tối đa {$f['label']}")->numeric()->minValue(0),
                ];
            })->toArray()
        );

        // Lọc danh mục
        if (in_array('category', $filters)) {
            $form[] = Select::make('category_id')
                ->label('Danh mục')
                ->searchable()
                ->options(fn () => $categoryModel::pluck('name', 'row_id')->toArray());
        }

        // Lọc tác giả
        if (in_array('author', $filters)) {
            $form[] = Select::make('author')
                ->label('Tác giả')
                ->searchable()
                ->options(fn () => $authorModel::query()->distinct()->pluck('author', 'author')->toArray());
        }

        return Filter::make('advanced_filter')
            ->label($label)
            ->form($form)
            ->query(function ($query, array $data) use ($fields, $filters) {
                // Trạng thái
                if (in_array('status', $filters)) {
                    $status = [];
                    if ($data['active'] ?? false) $status[] = 1;
                    if ($data['inactive'] ?? false) $status[] = 0;
                    if (!empty($status)) {
                        $query->whereIn('is_active', $status);
                    }
                }

                // Các field min/max có thể ở bảng chính hoặc quan hệ hoặc là count alias (useHaving)
                foreach ($fields as $f) {
                    $field = $f['field'];
                    $relation = $f['relation'] ?? null;
                    $multi = $f['multi'] ?? false;
                    $useHaving = $f['useHaving'] ?? false;

                    $min = $data["min_{$field}"] ?? null;
                    $max = $data["max_{$field}"] ?? null;

                    if ($useHaving) {
                        if ($min !== null) $query->having($field, '>=', $min);
                        if ($max !== null) $query->having($field, '<=', $max);
                        continue;
                    }

                    if ($multi) {
                        $query->where(function ($q) use ($field, $relation, $min, $max) {
                            $q->where(function ($qq) use ($field, $min, $max) {
                                if ($min) $qq->where($field, '>=', $min);
                                if ($max) $qq->where($field, '<=', $max);
                            });

                            if ($relation) {
                                $q->orWhereHas($relation, function ($qr) use ($field, $min, $max) {
                                    if ($min) $qr->where($field, '>=', $min);
                                    if ($max) $qr->where($field, '<=', $max);
                                });
                            }
                        });
                    } elseif ($relation) {
                        $query->whereHas($relation, function ($q) use ($field, $min, $max) {
                            if ($min) $q->where($field, '>=', $min);
                            if ($max) $q->where($field, '<=', $max);
                        });
                    } else {
                        if ($min) $query->where($field, '>=', $min);
                        if ($max) $query->where($field, '<=', $max);
                    }
                }

                // Lọc danh mục
                if (in_array('category', $filters) && !empty($data['category_id'])) {
                    $query->whereHas('categories', fn ($q) => $q->where('categories.row_id', $data['category_id']));
                }

                // Lọc tác giả
                if (in_array('author', $filters) && !empty($data['author'])) {
                    if (method_exists($query->getModel(), 'metadata') &&
                        $query->getModel()->metadata() instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
                        $query->whereHas('metadata', fn ($q) => $q->where('author', $data['author']));
                    } else {
                        $query->where('author', $data['author']);
                    }
                }

                return $query;
            });
    }
}
