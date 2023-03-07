<?php

namespace App\Http\Controllers\API;

use App\Models\Quote;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $quotes = auth()->user()->quotes();

        return response()->json([
            'success' => true,
            'data' => $quotes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required'
        ]);

        $quote = new Quote();
        $quote->title = $request->title;
        $quote->description = $request->description;

        if (auth()->user()->quotes()->save($quote))
            return response()->json([
                'success' => true,
                'data' => $quote->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Quote not added'
            ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     *
     * @return JsonResponse
     */
    public function show(Quote $quote)
    {
        $quote = auth()->user()->quotes()->find();

        if (!$quote) {
            return response()->json([
                'success' => false,
                'message' => 'Quote not found '
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $quote->toArray()
        ], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Quote  $quote
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     *
     * @return JsonResponse
     */
    public function destroy(Quote $quote)
    {
        $quote = auth()->user()->quote()->find($quote);

        if (!$quote) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }

        if ($quote->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Quote can not be deleted'
            ], 500);
        }
    }
}
