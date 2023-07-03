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
        $list = [
            [
                'url' => 'http://127.0.0.1:8000/transfer-bri',
                'img' => 'asset("assets/image/bank-bri.svg")',
            ],
            [
                'url' => 'http://127.0.0.1:8000/transfer-bca',
                'img' => 'asset("assets/image/bank-bca.svg")',
            ],
        ];
        return view('components.bank.list-bank', compact('list'));
    }
}
