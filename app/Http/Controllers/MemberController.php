<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Member;

class MemberController extends Controller
{
    public function index()
    {
        return Member::getMember();
    }
}
