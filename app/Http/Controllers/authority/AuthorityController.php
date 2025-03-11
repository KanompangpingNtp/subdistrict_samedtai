<?php

namespace App\Http\Controllers\authority;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AuthorityDetails;
use App\Models\AuthorityType;

class AuthorityController extends Controller
{
    public function AuthorityShowDetailsPages($id)
    {
        $AuthorityType = AuthorityType::findOrFail($id);
        $AuthorityDetails = AuthorityDetails::with('files')
            ->where('type_id', $id)
            ->first();

        return view('pages.authority.show_details', compact('AuthorityType','AuthorityDetails'));
    }
}
