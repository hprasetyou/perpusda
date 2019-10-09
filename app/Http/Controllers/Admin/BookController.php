<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends ResourceController
{
    protected $with = ['author','category','publisher'];
}
