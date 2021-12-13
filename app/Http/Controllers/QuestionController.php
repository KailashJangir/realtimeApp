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
        $this->middleware('JWT', ['only' => ['show', 'index']]);
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
        //auth()->user()->question()->create($request->all());
        Question::create($request->all());
        return response("Created", Response::HTTP_CREATED);
    }

    public function show(Question $question, $id)
    {
        $question = Question::findorfail($id);
        return  new QuestionResource($question);
    }

    
    public function update(Request $request, Question $question,$id)
    {
        $question = Question::findorfail($id);
        $question->update($request->all());
        return response("Updated", Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question,$id)
    {
        $replies = Reply::where('question_id',$id)->delete();
        $question = Question::where('id',$id)->delete();
        return response("Deleted"); 
    }
}
