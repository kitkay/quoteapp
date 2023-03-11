<?php

namespace App\Http\Controllers\API;

use App\Models\Quote;
use App\Services\QuoteServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuoteController extends BaseController
{
    /** @var QuoteServices $service*/
    private QuoteServices $services;

    public function __construct(QuoteServices $quoteServices)
    {
        $this->services = $quoteServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        dd('j');
        $quotes =  $this->services->all();
        return $this->sendResponse($quotes);
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Quote  $quote
     *
     * @return JsonResponse
     */
    public function update(Request $request, Quote $quote): JsonResponse
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
    public function destroy(Quote $quote): JsonResponse
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
