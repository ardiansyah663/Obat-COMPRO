<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesananResource\Pages;
use App\Filament\Resources\PesananResource\RelationManagers;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Services\TripayService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Placeholder;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget\Card as StatsCard;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected static ?string $navigationLabel = 'Pesanan';
    
    protected static ?string $modelLabel = 'Pesanan';

    protected static ?string $navigationGroup = 'E-Commerce';

    protected static ?int $navigationSort = 2;

    // Tambahkan method getWidgets untuk menampilkan widget statistik dan grafik
    public static function getWidgets(): array
    {
        return [
            PesananResource\Widgets\PesananStatsOverview::class,
            PesananResource\Widgets\PesananChart::class,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Informasi Pesanan')
                            ->schema([
                                Forms\Components\Select::make('produk_id')
                                    ->label('Produk')
                                    ->options(Produk::all()->pluck('nama', 'id'))
                                    ->searchable()
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        if ($state) {
                                            $produk = Produk::find($state);
                                            if ($produk) {
                                                $set('harga_satuan', $produk->harga);
                                            }
                                        }
                                    }),
                                
                                Forms\Components\TextInput::make('nama_pembeli')
                                    ->label('Nama Pembeli')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('alamat')
                                    ->label('Alamat')
                                    ->required()
                                    ->maxLength(65535),

                                Forms\Components\TextInput::make('no_hp')
                                    ->label('Nomor Pembeli')
                                    ->required()
                                    ->maxLength(255),

                                
                                Forms\Components\TextInput::make('email_pembeli')
                                    ->label('Email Pembeli')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->required()
                                    ->default(1)
                                    ->minValue(1)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set, $get) {
                                        $hargaSatuan = $get('harga_satuan') ?? 0;
                                        $jumlah = $state ?? 0;
                                        $set('total_harga', $hargaSatuan * $jumlah);
                                    }),
                                    
                                Forms\Components\TextInput::make('harga_satuan')
                                    ->label('Harga Satuan')
                                    ->numeric()
                                    ->disabled()
                                    ->dehydrated(false)
                                    ->afterStateHydrated(function ($state, callable $set, $record) {
                                        if ($record && $record->produk) {
                                            $set('harga_satuan', $record->produk->harga);
                                        }
                                    }),
                                    
                                Forms\Components\TextInput::make('total_harga')
                                    ->label('Total Harga')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->dehydrated(true),
                            ]),
                    ])->columnSpan(['lg' => 2]),
                
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status & Pembayaran')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->options([
                                        'pending' => 'Menunggu Pembayaran',
                                        'paid' => 'Sudah Dibayar',
                                        'expired' => 'Kedaluwarsa',
                                        'failed' => 'Gagal',
                                        'canceled' => 'Dibatalkan',
                                    ])
                                    ->required()
                                    ->default('pending'),
                                    
                                Forms\Components\TextInput::make('payment_method')
                                    ->label('Metode Pembayaran')
                                    ->maxLength(255),
                                    
                                Forms\Components\TextInput::make('reference')
                                    ->label('Referensi Pembayaran')
                                    ->maxLength(255),
                                    
                                Forms\Components\TextInput::make('merchant_ref')
                                    ->label('Referensi Merchant')
                                    ->maxLength(255),
                                
                                Forms\Components\TextInput::make('checkout_url')
                                    ->label('URL Checkout')
                                    ->maxLength(255)
                                    ->url()
                                    ->columnSpan('full'),
                                
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Tanggal Dibuat')
                                    ->content(fn (Pesanan $record): ?string => $record->created_at?->diffForHumans()),
                                
                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Terakhir Diperbarui')
                                    ->content(fn (Pesanan $record): ?string => $record->updated_at?->diffForHumans()),
                            ]),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable(),
                
            Tables\Columns\TextColumn::make('produk.nama')
                ->label('Produk')
                ->searchable()
                ->sortable(),
                
            Tables\Columns\TextColumn::make('nama_pembeli')
                ->label('Pembeli')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->searchable(),
                
            Tables\Columns\TextColumn::make('email_pembeli')
                ->label('Email')
                ->searchable(),
                
            Tables\Columns\TextColumn::make('no_hp')
                ->label('No. HP')
                ->searchable(),
                
                
            Tables\Columns\TextColumn::make('jumlah')
                ->label('Jumlah')
                ->sortable(),
                
            Tables\Columns\TextColumn::make('total_harga')
                ->label('Total')
                ->money('IDR')
                ->sortable(),
                
            Tables\Columns\BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'warning' => 'pending',
                    'success' => 'paid',
                    'danger' => ['expired', 'failed'],
                    'gray' => 'canceled',
                ])
                ->searchable()
                ->sortable(),
                
            Tables\Columns\TextColumn::make('payment_method')
                ->label('Metode Pembayaran')
                ->toggleable(isToggledHiddenByDefault: true),
                
            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal Dibuat')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pending' => 'Menunggu Pembayaran',
                    'paid' => 'Sudah Dibayar',
                    'expired' => 'Kedaluwarsa',
                    'failed' => 'Gagal',
                    'canceled' => 'Dibatalkan',
                ]),
                
            Tables\Filters\Filter::make('created_at')
                ->form([
                    Forms\Components\DatePicker::make('created_from')
                        ->label('Dibuat dari'),
                    Forms\Components\DatePicker::make('created_until')
                        ->label('Dibuat sampai'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                }),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\Action::make('view_payment')
                ->label('Lihat Pembayaran')
                ->icon('heroicon-o-credit-card')
                ->url(fn (Pesanan $record): ?string => $record->checkout_url)
                ->openUrlInNewTab()
                ->visible(fn (Pesanan $record): bool => $record->checkout_url !== null),
            Tables\Actions\Action::make('check_payment_status')
                ->label('Cek Status Pembayaran')
                ->icon('heroicon-o-arrow-path')
                ->color('success')
                ->visible(fn (Pesanan $record): bool => $record->reference !== null)
                ->action(function (Pesanan $record, Tables\Actions\Action $action) {
                    $tripayService = app(TripayService::class);
                    $paymentStatus = $tripayService->getPaymentStatus($record->reference);
                    
                    if (!$paymentStatus) {
                        Notification::make()
                            ->title('Gagal mendapatkan status pembayaran')
                            ->danger()
                            ->send();
                        return;
                    }
                    
                    $statusMapping = [
                        'UNPAID' => 'pending',
                        'PAID' => 'paid',
                        'EXPIRED' => 'expired',
                        'FAILED' => 'failed',
                        'REFUND' => 'canceled'
                    ];
                    
                    $newStatus = $statusMapping[strtoupper($paymentStatus)] ?? 'pending';
                    
                    if ($record->status === $newStatus) {
                        Notification::make()
                            ->title('Status pembayaran tidak berubah: ' . $newStatus)
                            ->info()
                            ->send();
                        return;
                    }
                    
                    $oldStatus = $record->status;
                    $record->status = $newStatus;
                    $record->save();
                    
                    Notification::make()
                        ->title('Status pembayaran diperbarui')
                        ->body("Dari {$oldStatus} menjadi {$newStatus}")
                        ->success()
                        ->send();
                        
                    // Refresh halaman
                    $action->success();
                }),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }
}