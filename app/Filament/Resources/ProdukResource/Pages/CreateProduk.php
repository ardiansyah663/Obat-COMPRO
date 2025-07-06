<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use App\Filament\Resources\ProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateProduk extends CreateRecord
{
    protected static string $resource = ProdukResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Produk ditambahkan')
            ->body('Produk baru berhasil ditambahkan.');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        \Illuminate\Support\Facades\Log::info('CreateProduk - Data before create:', $data);
        return $data;
    }
}
