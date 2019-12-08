<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Notifications\CompanyRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('admin.companies.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        DB::transaction(function() use($request) {
            $company = new Company();
            $company->fill($request->only($company->getFillable()));
            if($request->hasFile('logo'))
            {
                $path = $request->file('logo')->store('/public/images');
                $company->logo = pathinfo($path, PATHINFO_BASENAME);
            }
            $company->save();

            $company->notify(new CompanyRegistration());
        });

        return redirect()->route('admin.companies.index')->with('message', __('admin.company_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companies.create', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {

        DB::transaction(function() use($request, $company) {
            $company->fill($request->only($company->getFillable()));
            if($request->hasFile('logo'))
            {
                $path = $request->file('logo')->store('/public/images');
                $company->logo = pathinfo($path, PATHINFO_BASENAME);
            }
            $company->save();
        });

        return redirect()->route('admin.companies.index')->with('message', __('admin.company_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        try{
            $company->delete();
        }catch (\Exception $e) {
            return redirect()->route('admin.companies.index')->with('message', $e->getMessage());
        }
        return redirect()->route('admin.companies.index')->with('message', __('admin.company_deleted'));
    }
}
