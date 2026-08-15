<?php

namespace App\Filament\Resources\Artikels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class ArtikelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Textarea::make('konten')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('uploads')
                    ->visibility('public'),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}