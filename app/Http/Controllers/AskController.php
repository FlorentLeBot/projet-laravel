<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\QuestionRequest;
use App\Models\{Answer, Question};
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AskController extends Controller
{
    public function index()
    {
        //$questions = Question::select('id')->orderBy('id','asc')->get();
        // $questions = Question::select('id')
        // ->orderBy('id','asc')
        // ->limit(3)
        // ->get();
        // $questions = Question::select('id')
        // ->latest()
        // ->limit(3)
        // ->get();
        // $questions = Question::whereId(10)->first(); 
        // $questions = Question::find(10);
        $questions = Question::orderBy('id','DESC')->paginate(10);
        //$title = "Bienvenue sur " . config("app.name");

        // foreach ($questions as $question) {
        //     foreach ($question->answers as $answer) {
        //         $answer->mc = "lorin";
        //         dd($answer);
        //     }
        // }

        //dd($questions[0]->answers[0]->answer);

        // return View('questions.index',[
        //     "questions"=>$questions
        // ]);
        foreach ($questions as $question) {
            $question->user->avatar = Gravatar::get($question->user->email);
        }

        return view('questions.index', compact('questions'));
    }


    public function show(Question $question)
    {
        $answers = $question->answers()->orderBy('id', 'desc')->get();
        foreach ($answers as $answer) {
            $answer->user->avatar = $this->avatar($answer->user);
        }
        // dd($answers);
        $question->user->avatar = $this->avatar($question->user);
        return view('questions.show', compact('question', 'answers'));
    }


    public function avatar($user)
    {
        $avatar = Gravatar::get($user->email);
        return $avatar;
    }

    public function delete($id)
    {
        $question = Question::find($id);
        $this->authorize('updateAndDelete', $question);
        Question::whereId($id)->delete();
        return redirect()->route("questions.index")->withStatus("La question a bien été supprimée !");
    }

    public function edit(Question $question)
    {
        $this->authorize('updateAndDelete', $question);
        return view('questions.edit', compact('question'));
    }

    // les méthodes pour les questions

    public function create(){
        return view('questions.create');
    }
    public function store(QuestionRequest $request) {
        $validated = $request->validated();

        Question::create([
            'question' => $validated['question'],
            'user_id'  => Auth::id()
        ]);
        return redirect()->route('questions.index')->withStatus('La question a bien été ajoutée');
    }

    public function update(QuestionRequest $request, Question $question)
    {

        $validated = $request->validated();

        // Façon 1

        //     $question = new Question();
        //     $question->question = $validated['question'];
        //     $question->user_id = Auth::user()->id;
        //     $question->save();

        // Façon 2

        $question->update([
            "question" => $validated['question'],
            "user_id" => Auth::id(),
        ]);

        return back()->withStatus('La question a bien été modifiée !');
        //dd($validated);
    }
    public function answer(AnswerRequest $request, Question $question){
        $validated = $request->validated();
        Answer::create([
            "answer"      => $validated["answer"],
            "question_id" => $question->id,
            "user_id"     => Auth::id()
        ]);
        return back()->withStatus('La réponse a bien été ajoutée !');
    }
    
}
