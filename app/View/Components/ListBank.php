<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListBank extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            [
                'id' => '1',
                'url' => '',
                'img' => 'asset("assets/image/bank-bri.svg")',
            ],
            [
                'id' => '2',
                'url' => '',
                'img' => 'asset("assets/image/bank-bca.svg")',
            ],
        ];
        return view('components.bank.list-bank', compact('data'));
    }
}
