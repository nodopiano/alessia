<?php

namespace App\Menu;

use App\Menu\Core\Menu;
use App\Menu\Core\MenuItem;

class MenuList implements \JsonSerializable
{
    public static function make()
    {
        $items = [
            'sidebar' => Menu::items([
                MenuItem::make('bookings')->label(__('Prenotazioni'))->url('/bookings')->icon('timetable'),
                MenuItem::make('owners')->label(__('Proprietari'))->url('/owners')->icon('avatar'),
                MenuItem::make('boats')->label(__('Imbarcazioni'))->url('/boats')->icon('sailboat'),
                MenuItem::make('reports')->label(__('Report'))->url('/reports')->icon('bars'),
                MenuItem::make('validate')->label(__('Validazione'))->url('/validations')->icon('validate')->gate(auth()->user()->can('validate_bookings')),
                MenuItem::make('settings')->label(__('Impostazioni'))->url('/settings')->icon('controls'),
            ]),
            'profile' => []
        ];
        return new static($items);
    }

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function get($item)
    {
        if (array_key_exists($item, $this->items)) {
            return $this->items[$item];
        }
        return [];
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}
