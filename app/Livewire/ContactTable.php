<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ContactTable extends PowerGridComponent
{
    public string $tableName = 'contacts';

    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Contact::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('name')
            ->add('email')
            ->add('contact');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),
            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Contact', 'contact')
                ->sortable()
                ->searchable(),
            Column::action('Action')
        ];
    }

    public function actions(Contact $row): array
    {
        if (!Auth::check()) {
            return [];
        }

        return [
            Button::add('show')
                ->slot('<i class="fa-solid fa-eye"></i>')
                ->class('bg-gray-500 text-white font-semibold px-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2')
                ->route('contacts.show', ['contact' => $row->id]),
            Button::add('edit')
                ->slot('<i class="fa-solid fa-pencil"></i>')
                ->class('px-2')
                ->route('contacts.edit', ['contact' => $row->id]),
            Button::add('delete')
                ->slot('<i class="fa-solid fa-trash"></i>')
                ->class('bg-red-500 text-white font-semibold px-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2')
                ->route('contacts.delete', ['contact' => $row->id]),
        ];
    }
}
