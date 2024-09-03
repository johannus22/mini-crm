<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CompanyNotification;
use App\Models\User;
use Notification;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("add-company");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //form validation
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:companies',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'required',

        ]);

        try {
                $new_company = new Company;
                $new_company->name = $request->name;
                $new_company->email = $request->email;
                $new_company->website = $request->website;

                // file check
                if ($request->hasFile('logo')) {
                    $filename = time().$request->file('logo')->getClientOriginalName();
                    $logoPath = $request->file('logo')->storeAs('logos', $filename, 'public');

                    $new_company->logo = $logoPath;
                }
                $new_company->save();

                //emailnotiffff

                $this->sendNotification($new_company);

                return redirect('/companies')->with('success','Company Added Successfully');
        } catch (\Exception $e) {
                return redirect('/add/company')->with('fail',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('edit-company', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //form validation
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:companies,email,'. $request->company_id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|max:2048',
            'website' => 'nullable',

        ]);

        try {
                // Find the company to update
            $company = Company::findOrFail($request->company_id);

            // Update company details
            $company->name = $request->name;
            $company->email = $request->email;
            $company->website = $request->website;

            // Handle file upload if a new file is present
            if ($request->hasFile('logo')) {
                // Delete the old logo if it exists
                if ($company->logo && Storage::disk('public')->exists($company->logo)) {
                    Storage::disk('public')->delete($company->logo);
                }

                // Store the new logo and update the path
                $logoPath = $request->file('logo')->store('logos', 'public');
                $company->logo = $logoPath;
            }

            // Save the updated company
            $company->save();
                return redirect('/companies')->with('success','Company Updated Successfully');
        } catch (\Exception $e) {
                return redirect('/edit/company')->with('fail',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Company::where('id', $id)->delete();
            return redirect('/companies')->with('success','Company Updated Successfully');
        } catch (\Exception $e) {
           return redirect('/companies')->with('fail',$e->getMessage());
        }
    }

    public function sendNotification(Company $company){
        $user = User::all();

        $details = [
            'greeting' => 'Hi!',
            'body' => 'A new Company named ' . $company->name . ' was added!',
            'lastline' => 'Check it Out!'

        ];
        Notification::send($user, new CompanyNotification($details));
    }
}
