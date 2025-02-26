<?php
namespace App\Http\Controllers;

use App\Models\services as Service;
use Illuminate\Http\Request;

class ServiceStatusController extends Controller
{

    public function appListTrending(Request $request){
        $trendingServices = Service::where('trending', true)->get();

        return responseJson($trendingServices, 200);
    }
    
    public function appListFeatured(Request $request){
        $featuredServices = Service::where('featured', true)->get();
        return responseJson($featuredServices, 200);

    }

    public function index()
    {
        $trendingServices = Service::where('trending', true)->get();
        $featuredServices = Service::where('featured', true)->get();
        $services = Service::all(); // List all services for dropdown

        return view('services.index', compact('trendingServices', 'featuredServices', 'services'));
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'type' => 'required|in:trending,featured',
            'action' => 'required|in:add,remove',
        ]);

        // return $request->all();

        $service = Service::findOrFail($request->service_id);

        // Limit trending and featured services to 15
        if ($request->action === 'add') {
            if ($request->type == 'trending' && Service::where('trending', true)->count() >= 15) {
                return back()->with('error', 'Cannot add more than 15 services to Trending.');
            }

            if ($request->type == 'featured' && Service::where('featured', true)->count() >= 15) {
                return back()->with('error', 'Cannot add more than 15 services to Featured.');
            }

            $service->update([$request->type => true]);
        } else {
            $service->update([$request->type => false]);
        }

        return back()->with('success', 'Service status updated successfully.');
    }
}
