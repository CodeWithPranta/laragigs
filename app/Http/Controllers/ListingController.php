<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index(){
        //dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(6));
        return view('listings.index', [
            // We can use simple pagination to show only next and previous button simplePaginate()
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single listing
    public function show(Listing $listing){

        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create(){
        return view('listings.create');
    }

    // Store listing data
    public function store(Request $request){
        //dd($request->all());

        //dd($request->file('logo)->store());

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Lsiting created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        //dd($listing->company);
        return view('listings.edit', ['listing' => $listing]);
    }
}
