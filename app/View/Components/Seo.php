<?php

namespace App\View\Components;

use App\Models\Seo as SeoModel;
use Illuminate\View\Component;

class Seo extends Component
{
    public $seo;

    public function __construct($page)
    {
        $this->seo = SeoModel::where('page', $page)->first();
    }

    public function render()
    {
        return view('components.seo');
    }
}