<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    
    protected static ?string $navigationLabel = 'Produk';
    
    protected static ?string $modelLabel = 'Produk';

    protected static ?string $navigationGroup = 'E-Commerce';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('deskripsi')
                                    ->maxLength(65535),
                                Forms\Components\TextInput::make('harga')
                                    ->required()
                                    ->numeric()
                                    ->prefix('Rp'),
                                Forms\Components\TextInput::make('Berat')
                                    ->required()
                                    ->numeric()
                                    ->suffix('Kg')
                                    ->maxLength(255),
                            ]),
                    ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Gambar')
                            ->schema([
                                FileUpload::make('gambar')
                                    ->image()
                                    ->disk('public')
                                    ->directory('products')
                                    ->visibility('public')
                                    ->imagePreviewHeight('250')
                                    ->loadingIndicatorPosition('left')
                                    ->panelAspectRatio('2:1')
                                    ->panelLayout('integrated')
                                    ->removeUploadedFileButtonPosition('right')
                                    ->uploadButtonPosition('left')
                                    ->uploadProgressIndicatorPosition('left')
                                    ->afterStateUpdated(function ($state) {
                                        // Log state setelah diupdate untuk debugging
                                        Log::info('FileUpload afterStateUpdated:', [
                                            'state' => $state,
                                            'is_array' => is_array($state),
                                            'array_contents' => is_array($state) ? json_encode($state) : null,
                                        ]);
                                    }),
                            ])->columnSpanFull(),
                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gambar')
                    ->label('Gambar Produk')
                    ->html()
                    ->formatStateUsing(function ($record) {
                        // Metode yang sangat langsung
                        if (!$record->gambar) {
                            return 'No Image';
                        }
                        
                        // Dapatkan URL langsung ke file
                        $path = '/storage/' . $record->gambar;
                        
                        Log::info('Direct image path approach:', [
                            'record_id' => $record->id,
                            'gambar' => $record->gambar,
                            'direct_path' => $path,
                        ]);
                        
                        // HTML langsung dengan path yang sangat sederhana
                        return "<img src='{$path}' class='h-12 w-12 rounded object-cover' />";
                    }),
                Tables\Columns\TextColumn::make('berat')
                    ->label('Berat (Mg)')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (array $data) {
                        Log::info('Edit form data:', $data);
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Log::info('Deleting record:', $record->toArray());
                    }),
                Tables\Actions\Action::make('view_image')
                    ->label('View Image')
                    ->icon('heroicon-o-photo')
                    ->url(function ($record) {
                        if (!$record->gambar) {
                            return null;
                        }
                        
                        // Gunakan URL langsung yang sama dengan kolom gambar
                        $path = '/storage/' . $record->gambar;
                        
                        Log::info('View Image direct path approach:', [
                            'record_id' => $record->id,
                            'gambar' => $record->gambar,
                            'direct_path' => $path,
                        ]);
                        
                        // Lengkapi dengan base URL saat menggunakan sebagai action
                        return url($path);
                    })
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
