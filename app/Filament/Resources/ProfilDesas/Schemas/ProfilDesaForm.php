<?php

namespace App\Filament\Resources\ProfilDesas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class ProfilDesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_desa')->required()->maxLength(255),
                Textarea::make('alamat_lengkap')->required()->columnSpanFull(),
                Textarea::make('sejarah_singkat')->required()->columnSpanFull(),
                Textarea::make('visi')->columnSpanFull(),
                Textarea::make('misi')->columnSpanFull(),
                FileUpload::make('logo')->image()->disk('public')->directory('uploads')->visibility('public'),
                TextInput::make('kontak')->maxLength(255),
            ]);
    }
}
