<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    //Show all listings
    public function index() {
        // dd(request());
        // dd(request()->tag);
        // dd(request("tag"));

        // dd(Listing::latest()->filter(request(["tag", "search"]))->paginate(4));

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(["tag", "search"]))->paginate(4)
        ]);
    }

     //Show Create Form
     public function create() {
        return view("listings.create");
    }

    //Store
    public function store(Request $request) {
        // dd($request->all());
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings")],
            "location" => "required",
            "website" => "required",
            "email" =>[ "required", "email"],
            "tags" => "required",
            "description" => "required",
        ]);

        if($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        $formFields["user_id"] = auth()->id();

        Listing::create($formFields);


        return redirect("/")->with("message", "Job posting created successfully!");
    }

    //show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show Edit Form
    public function edit (Listing $listing) {
        
        return view("listings.edit", ["listing" => $listing]);
    }

    //Update Listing Data

    public function update(Request $request, Listing $listing) {

        if($listing->user_id != auth())

        $formFields = $request->validate([
            "title" => "required",
            "company" => "required",
            "location" => "required",
            "website" => "required",
            "email" =>[ "required", "email"],
            "tags" => "required",
            "description" => "required",
        ]);

        if($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        $listing-> update($formFields);


        return back()->with("message", "Job posting updated successfully!");
    }

    //Delete Listing
    public function destroy(Listing $listing) {
        $listing->delete();
        
        return redirect("/")->with("message", "Job Listing Deleted Successfully!");
    }

    //Manage Listings
    public function manage() {
        return view("listings.manage", ["listings" => auth()->user()->listing()->get()]);
    }

}