<?php
namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SeoController extends Controller
{

    public static function getSeoData($page)
    {
        // return Cache::remember("seo_data_{$page}", 3600, function () use ($page) {
            return Seo::where('page', $page)->first();
        // });
    }

    // Display a listing of the resource.
    public function index()
    {
        $seos = Seo::orderBy('page', 'asc')->simplePaginate(10);
        return view('seo.index', compact('seos'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'page' => 'required|string|max:255',
        ]);

        $checkExist = Seo::where("page", $request->page)->count();

        if($checkExist > 0){
        return redirect()->route('seo.index')->with('error', "SEO record already added for $request->page page");
        }

        Seo::create($validated);

        return redirect()->route('seo.index')->with('success', 'SEO record created successfully!');
    }

    // Display the specified resource.
    public function show(Seo $seo)
    {
        return view('seo.show', compact('seo'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Seo $seo)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'page' => 'required|string|max:255',
        ]);

        $checkExist = Seo::where("id", "!=", $seo->id)->where("page", $request->page)->count();

        if($checkExist > 0){
        return redirect()->route('seo.index')->with('error', "SEO record already added for $request->page page");
        }

        $seo->update($validated);

        return redirect()->route('seo.index')->with('success', 'SEO record updated successfully!');
    }

}
