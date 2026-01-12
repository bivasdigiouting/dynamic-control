<?php

namespace App\Http\Controllers;

use Modules\Frontend\Models\SitePage;
use Modules\Page\Models\Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index()
    {
        $theme_name = Session::has('demo_homepage') ? Session::get('demo_homepage') : getDefaultTheme();

        $page = SitePage::where('slug', $theme_name)->with(['sections.translations'])->first();

        if(!$page || $page->status == 0) {
            abort(404);
        }

        $sections = $page?->sections->keyBy('slug');

        extract(getSiteMenus());

        return view('frontend.home.' . $theme_name . '.index', compact(
            'page', 'sections', 'main_menu', 'footer_menu_one', 'footer_menu_two', 'footer_menu_three', 'footer_menu_four'
        ));

    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if(!$page || $page->status == 0) {
            abort(404);
        }

        return view('frontend.pages.custom-page', compact('page'));
    }

    public function requestQuote(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'location' => 'required|string|max:200',
            'address' => 'required|string|max:1000',
            'bill' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            // hidden calc fields are optional but used if provided
            'consumer_type' => 'nullable|string',
            'installation_type' => 'nullable|string',
            'available_area' => 'nullable',
            'unit_cost' => 'nullable',
            'monthly_bill' => 'nullable',
            'monthly_units' => 'nullable',
            'sanction_load' => 'nullable',
            'feasible_kwp' => 'nullable',
            'monthly_generation' => 'nullable',
            'monthly_savings' => 'nullable',
            'total_savings' => 'nullable',
            'selected_years' => 'nullable',
            'advisory_required' => 'nullable',
            'advisory_kw' => 'nullable',
        ]);

        $data = $validated;

        Mail::send('emails.request-quote', $data, function ($message) use ($request, $data) {
            $message->to('pankaj.ssconline@gmail.com')
                    ->subject('Solar Quote Request - '.$data['name']);

            if ($request->hasFile('bill')) {
                $file = $request->file('bill');
                $message->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getClientMimeType(),
                ]);
            }
        });

        return back()->with('success', 'Your request has been submitted successfully. We will contact you soon.');
    }
}
