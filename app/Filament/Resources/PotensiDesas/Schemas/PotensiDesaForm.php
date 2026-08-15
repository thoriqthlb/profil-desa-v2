<?php

namespace App\Filament\Resources\PotensiDesas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class PotensiDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_potensi')
                    ->required()
                    ->maxLength(255),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('gambar')
                    ->image()
                    ->disk('public')
                    ->directory('uploads')
                    ->visibility('public'),
            ]);
    }
}