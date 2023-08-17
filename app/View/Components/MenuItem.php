<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
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
        $menu = [ 
            [
                'title' => 'Transfer',
                'icon' => 'fa-solid fa-money-bill-transfer',
            ],
            [
                'title' => 'Tarik Tunai',
                'icon' => 'fa-solid fa-money-bill-wave'
            ],
            [
                'title' => 'Setor Tunai',
                'icon' => 'fa-solid fa-hand-holding-dollar'
            ],
            [
                'title' => 'Bayar Cicilan',
                'icon' => 'fa-regular fa-credit-card'
            ],
            [
                'title' => 'Asuransi',
                'icon' => 'fa-solid fa-file-shield'
            ],
            [
                'title' => 'Pengajuan Pinjaman',
                'icon' => 'fa-solid fa-building-columns'
            ],
            [
                'title' => 'Pulsa',
                'icon' => 'fa-solid fa-mobile-screen-button'
            ],
            [
                'title' => 'PLN',
                'icon' => 'fa-solid fa-bolt-lightning'
            ],
            [
                'title' => 'Top Up',
                'icon' => 'fa-brands fa-steam'
            ],
            [
                'title' => 'Bahan Dapur',
                'icon' => 'fa-solid fa-kitchen-set'
            ],
            [
                'title' => 'Sayur Saji',
                'icon' => 'fa-solid fa-bag-shopping'
            ],
        ];
        return view('components.menu-item', compact('menu'));
    }
}
