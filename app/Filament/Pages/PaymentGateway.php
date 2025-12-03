<?php

namespace App\Filament\Pages;

use App\Facades\FilamentPayments;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Table;
use App\Models\PaymentGateway as PaymentGatewayModel;
use UnitEnum;

class PaymentGateway extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected string $view = 'filament.pages.payment-gateway';
    public function mount(): void
    {
        FilamentPayments::loadDrivers();
    }
    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public function table(Table $table): Table
    {
        return $table
            ->query(PaymentGatewayModel::query())
            ->paginated(false)
            ->reorderable('sort_order')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('alias')
                    ->label('Alias'),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Actions\Action::make('edit')
                    ->label('Edit')
                    ->tooltip('Edit')
                    ->icon('heroicon-s-pencil')
                    ->iconButton()
                    ->form([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('description')
                            ->label('Description')
                            ->columnSpanFull(),
                        KeyValue::make('gateway_parameters')
                            ->label('Gateway Parameters')
                            ->keyLabel('Key')
                            ->valueLabel('Value')
                            ->editableKeys(false)
                            ->addable(false)
                            ->deletable(false),
                    ])
                    ->fillForm(fn($record) => $record->toArray())
                    ->action(function (array $data, $record) {
                        $record->update($data);
                        Notification::make()
                            ->title('Gateway Updated')
                            ->body('Gateway has been updated successfully')
                            ->send();
                    }),
            ])
            ->searchable();
    }
}
