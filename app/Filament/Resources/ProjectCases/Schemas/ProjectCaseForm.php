<?php

namespace App\Filament\Resources\ProjectCases\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectCaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('case_id')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('client')
                    ->required(),
                Select::make('industry_category_id')
                    ->relationship('industryCategory', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('period')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('images')
                    ->visibility('public')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('before_after')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('service_key')
                    ->required()
                    ->default('seo-promotion'),
                Toggle::make('is_published')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('result_1'),
                TextInput::make('result_2'),
                TextInput::make('result_3'),
                TextInput::make('result_4'),
                TextInput::make('result_5'),
                TextInput::make('result_6'),
                Textarea::make('content')
                    ->columnSpanFull(),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
            ]);
    }
}
