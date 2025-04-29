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
    // Get a specific blog by ID
    public function show($id)
    {
        // Find the blog by its ID
        $blog = Blog::find($id); //find the blog with requested id and store in $blog
    
        // If blog not found, return a 404 error
        if (!$blog) {
            return response()->json([
                'message' => 'Blog not found.'
            ], 404);
        }
    
        // If found, return the blog data
        return response()->json($blog);
    }
    
        // Add a new blog
        public function store(Request $request) //It accepts a Request object ($request) that contains all the data sent by the client
        {
            // Validate incoming request
            $validated = $request->validate([ //If any validation fails → Laravel automatically returns an error response.
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|string', // optional image field
            ]);
    
            // Create a new blog
            $blog = Blog::create($validated); // creates a new Blog record in the database using the validated data
    //It automatically fills fields like title, description, and image because we already defined them in Blog.php's $fillable.
   
            return response()->json([ // Return a JSON response
                'message' => 'Blog created successfully!',
                'blog' => $blog,
            ], 200);
        }

        public function update(Request $request)
        {
            // Validate incoming request
            $validated = $request->validate([
                'id' => 'required|integer|exists:blogs,id',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|string', // image is optional
            ]);

            // Find the blog by ID from validated data
            $blog = Blog::find($validated['id']);

            // Update blog fields
            $blog->title = $validated['title'];
            $blog->description = $validated['description'];

            if (isset($validated['image'])) {
                $blog->image = $validated['image'];
            }

            // Save updated blog
            $blog->save();

            // Return updated blog
            return response()->json([
                'message' => 'Blog updated successfully!',
                'blog' => $blog,
            ]);
        }
    // Delete a specific blog
    public function destroy(Request $request)
{
    // Validate incoming request
    $validated = $request->validate([
        'id' => 'required|integer|exists:blogs,id',
    ]);

    // Find the blog
    $blog = Blog::find($validated['id']);

    // Delete the blog
    $blog->delete();

    // Return response
    return response()->json([
        'message' => 'Blog deleted successfully!',
    ]);
}


}
