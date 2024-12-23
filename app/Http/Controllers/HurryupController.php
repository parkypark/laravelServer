<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
abstract class HurryupController extends Controller
{
    abstract protected function validate(Request $request);
}