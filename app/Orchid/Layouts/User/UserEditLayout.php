<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class UserEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),

            Input::make('user.company')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Company'))
                ->placeholder(__('Company')),

            Input::make('user.country')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Country'))
                ->placeholder(__('Country')),

            Input::make('user.phone')
                ->type('number')
                ->max(255)
                ->required()
                ->title(__('Phone'))
                ->placeholder(__('Phone')),
        ];
    }
}
