<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\TagsInput;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;
use UnitEnum;

class SEO extends Page
{
    protected string $view = 'filament.pages.s-e-o';
    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->value ?? []);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('description')
                        ->required()
                        ->maxLength(255),
                    TagsInput::make('keywords')
                        ->required()
                        ->separator(',')
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (!$record) {
            $record = new Setting();
            $record->key = 'seo';
        }

        $record->value = $data;
        $record->save();

        Notification::make()
            ->success()
            ->title('Saved')
            ->send();
    }

    public function getRecord(): ?Setting
    {
        return Setting::query()
            ->where('key', 'seo')
            ->first();
    }
}
