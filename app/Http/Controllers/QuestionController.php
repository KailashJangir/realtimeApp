<?php

namespace App\Http\Controllers;

use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
//$this->middleware('JWT', ['except' => ['show', 'index']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }


    public function store(Request $request)
    {
        $request['slug'] = str_slug($request->title);
        $question= auth()->user()->question()->create($request->all());
        return  response(new QuestionResource($question),Response::HTTP_ACCEPTED);
    }

    public function show(Question $question)
    {
        return  new QuestionResource($question);
    }

    
    public function update(Request $request,Question $question)
    {
        $question->update($request->all());
        return response(new QuestionResource($question), Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return new QuestionResource($question);
    }
}
