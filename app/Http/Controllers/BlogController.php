<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; //import the Blog model

class BlogController extends Controller
{
    public function index()
    {
       
        return Blog::all(); // Fetch all blog data from the blog table
    }
}
