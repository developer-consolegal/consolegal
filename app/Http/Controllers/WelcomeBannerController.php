<?php
namespace App\Http\Controllers;

use App\Models\WelcomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeBannerController extends Controller
{
    // Show the banner management page
    public function index()
    {
        $banner = WelcomeBanner::first();
        return view('welcome_banner.index', compact('banner'));
    }

    // Store or Update the banner
    public function storeOrUpdate(Request $request)
    {
        $validate = $request->validate([
            'url' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'active' => 'required|boolean',
        ]);


        // Handle file upload
        $filePath = null;
        if ($request->hasFile('url')) {
            $url = $request->file('url');
            $url_name = time() . '_kyc.' . $url->extension();
            $url->move(public_path('storage'), $url_name);
            $filePath = $url_name;
        }


        // Check if a banner already exists
        $banner = WelcomeBanner::first();

        if ($banner) {
            // Update the existing banner
            if ($filePath) {
                // Delete the old file
                Storage::disk('public')->delete($banner->url);
                $banner->url = $filePath;
            }
            $banner->active = $request->active;
            $banner->timestamp = now();
            $banner->save();
        } else {
            // Create a new banner
            WelcomeBanner::create([
                'url' => $filePath,
                'active' => $request->active,
                'timestamp' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Welcome banner updated successfully!');
    }

    // Delete the banner
    public function destroy()
    {
        $banner = WelcomeBanner::first();
        if ($banner) {
            Storage::disk('public')->delete($banner->url);
            $banner->delete();
        }

        return redirect()->back()->with('success', 'Welcome banner deleted successfully!');
    }
}
