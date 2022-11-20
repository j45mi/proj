<?php
//TODO:

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4) //paginate can be replaced with get
        ]);

    }

    // show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);

    }

    //show create form
    public function create(){
        return view('listings.create');

    }

    //store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'descriptions' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); // this will make file named logos with all the uploaded logos(storage/app/public/logos)
                                                                                    // after new tournament with logo is created run: php artisan storage:link

        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //show edit form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing data
    public function update(Request $request, Listing $listing){
        //make sure logged in user is owner!
        if($listing->user_id != auth()->id()){
            abort(403, 'Unathorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'descriptions' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); 
        }

        $listing->update($formFields);

        //Session::flash('message', 'Listing Create'); instead of this look at redirect and its flash message

        return back()->with('message', 'Listing updated successfully!');
    }

    //delete listing
    public function destroy(Listing $listing){
        //make sure logged in user is owner!
        if($listing->user_id != auth()->id()){
            abort(403, 'Unathorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    //manage listings
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}
