<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        try {

            $tenants = tenant::get();
            return responseJson(1, 'DONE', $tenants);
            
        } catch (\Exception $e) {
            return responseJson(0, $e->getMessage());
        }
    } //end of index

    public function store(Request $request)
    {

        $validatedata = $request->validate([
            'name'  => 'required',
        ]);

        try {

            $tenant = tenant::create($validatedata);
            return responseJson(1, 'tenant added successfully', $tenant);

        } catch (\Exception $e) {
            return responseJson(0, $e->getMessage());
        }
    } //end of store

    public function update(Request $request)
    {
        $validatedata = $request->validate([
            'name'  => 'required',
        ]);
        try {

            $tenant = tenant::find($request->id);
            $tenant->update($validatedata);
            return responseJson(1, 'tenant update successfully', $tenant);
            
        } catch (\Exception $e) {

            return responseJson(0, $e->getMessage());
        }

    } //end of update

    public function destroy(request $request)
    {
        try {

            tenant::find($request->id)->delete();
            return responseJson(1, 'tenant deleted successfully');

        } catch (\Exception $e) {

            return responseJson(0, $e->getMessage());
        }

    } //end of destroy
}
