<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel = 'الأقسام';
    protected static ?string $modelLabel = 'قسم';
    protected static ?string $pluralModelLabel = 'الأقسام';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->label('اسم القسم')->required()->maxLength(255),
            Forms\Components\TextInput::make('slug')->label('Slug')->maxLength(255),
            Forms\Components\Textarea::make('description')->label('الوصف')->rows(4),
            Forms\Components\FileUpload::make('image')
                ->label('الصورة')
                ->image()
                ->directory('categories')
                ->disk('public'),
            Forms\Components\TextInput::make('sort_order')->label('الترتيب')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('نشط')->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('الصورة')->disk('public'),
                Tables\Columns\TextColumn::make('name')->label('اسم القسم')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->label('نشط')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->label('الترتيب'),
                Tables\Columns\TextColumn::make('created_at')->label('تاريخ الإنشاء')->dateTime('Y-m-d H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
