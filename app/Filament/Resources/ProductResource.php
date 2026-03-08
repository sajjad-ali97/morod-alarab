<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'المنتجات';
    protected static ?string $modelLabel = 'منتج';
    protected static ?string $pluralModelLabel = 'المنتجات';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('category_id')
                ->label('القسم')
                ->relationship('category', 'name')
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('name')->label('اسم المنتج')->required()->maxLength(255),
            Forms\Components\TextInput::make('slug')->label('Slug')->maxLength(255),
            Forms\Components\Textarea::make('description')->label('الوصف')->rows(5),

            Forms\Components\FileUpload::make('image')
                ->label('الصورة')
                ->image()
                ->directory('products')
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
                Tables\Columns\TextColumn::make('name')->label('اسم المنتج')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('القسم')->searchable(),
                Tables\Columns\IconColumn::make('is_active')->label('نشط')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->label('الترتيب'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
