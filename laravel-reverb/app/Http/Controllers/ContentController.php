<?php

namespace App\Http\Controllers;

use App\Events\ContentUpdated;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function updateContent(Request $request)
    {
        $content = $request->input('content');

        // Broadcast the content update
        broadcast(new ContentUpdated($content));

        return response()->json(['message' => 'Content updated']);
    }
}


