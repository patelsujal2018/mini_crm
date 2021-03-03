<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Image;

class CompaniesController extends Controller
{
    public function index()
    {
        $companyList = Company::paginate(10);
        return view('backend.companies.index',compact('companyList'));
    }

    public function create()
    {
        $page_title = "Add Company";
        return view('backend.companies.options',compact('page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_website' => 'required',
            // 'company_logo' => 'required|image|dimensions:max_width=100,max_height=100',
            'company_logo' => 'required|image',
        ]);

        $company = new Company();
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->website = $request->company_website;

        if ($request->hasFile('company_logo')) {

            $destinationPath = 'public/companies';
            $image = $request->file('company_logo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();                 
            });

            $img->stream();

            // $path = $request->file('company_logo')->storeAs($destinationPath,$fileName);
            Storage::disk('local')->put($destinationPath.'/'.$fileName, $img, 'public');
        }

        $company->logo = $fileName;

        if($company->save())
        {
            $notification = ['toastr'=>"Company details store successfully",'type'=>'success'];
            return redirect()->route('company.index')->with($notification);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $company = Company::find($id);
        $page_title = "Edit Company";
        return view('backend.companies.options',compact('company','page_title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required|email',
            'company_website' => 'required',
            // 'company_logo' => 'required|image|dimensions:max_width=100,max_height=100',
            'company_logo' => 'image',
        ]);

        $company = Company::find($id);
        $company->name = $request->company_name;
        $company->email = $request->company_email;
        $company->website = $request->company_website;

        if ($request->hasFile('company_logo')) {

            $destinationPath = 'public/companies';
            $image = $request->file('company_logo');
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();                 
            });

            $img->stream();

            // $path = $request->file('company_logo')->storeAs($destinationPath,$fileName);
            Storage::disk('local')->put($destinationPath.'/'.$fileName, $img, 'public');
            
            $company->logo = $fileName;
        }

        if($company->save())
        {
            $notification = ['toastr'=>"Company details update successfully",'type'=>'success'];
            return redirect()->route('company.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $company = Company::withCount('employees')->find($id);
        if( $company->employees_count > 0)
        {
            Storage::delete('public/companies/'.$company->logo);

            $notification = ['toastr'=>"Sorry you can't delete this Company first delete all related emplyees",'type'=>'warning'];
            return redirect()->route('company.index')->with($notification);
        }
        else
        {
            if($company->delete())
            {
                $notification = ['toastr'=>"Company delete successfully",'type'=>'success'];
                return redirect()->route('company.index')->with($notification);
            }
        }
    }
}
