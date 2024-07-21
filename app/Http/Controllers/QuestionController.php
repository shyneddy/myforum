<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Hashtag;
use App\Models\Like;
use App\Models\Question;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function gethomequestion(Request $request){
        switch ($request['query']) {
            case 'recent-question':
                $questions = Question::orderBy('created_at', 'desc')->paginate(5);
                $taget = 1;
                return view('home.home', compact('questions', 'taget'));
                // code block
                break;
            case 'most-response':
                // code block
                $questions = Question::withCount('answers')->orderBy('answers_count', 'desc')->paginate(5);
                $taget = 2;
                return view('home.home', compact('questions', 'taget'));
                break;
            case 'recently-answered':
                // code block
                $questions = Question::has('answers')->orderBy('updated_at', 'desc')->paginate(5);
                $taget = 3;
                return view('home.home', compact('questions', 'taget'));
                break;
            case null:
                $questions = Question::orderBy('created_at', 'desc')->paginate(5);
                $taget = 1;
                return view('home.home', compact('questions', 'taget'));
                break;
            default:
                return redirect('/');
        }

    }

    public function searchHome(Request $request){
        try{
            if(trim($request->input('search')) == ''){
                return redirect()->back();
            }
    
            $searchQuery = trim($request->input('search'));
    
            $questions = Question::search(trim($request->input('search')))->paginate(5);
            return view('question.searchQuestion', compact('questions', 'searchQuery'));
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Vui lòng kết nối internet để thực hiện tính năng này');
        }

    }

    public function detailquestion($slug){
        $question = Question::where('slug', $slug)->first();

        // dd(Answer::find(13)->recursive());

        $question->viewcount = $question->viewcount + 1;
        $question->save();
        $answers = Answer::where('parent_id', null)->where('question_id', $question->id)->orderBy('created_at', 'desc')->get();

        $relatedQuestions = Question::where('category_id', $question->category_id)->inRandomOrder()->take(4)->get();

        $user = Auth::user();

        return view('post.questionDetail', compact('question', 'answers', 'relatedQuestions', 'user'));

    }

    public function askquestion(){
        $categories = Category::all();
        $hashtags = Hashtag::all();
        return view('question.askQuestion', compact('categories','hashtags'));
    }

    public function createquestion(Request $request){
        // Validate dữ liệu từ request
        $questionValidate = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'hashtag_id' => 'required',
        ]);

        $slug = Str::slug($request['title']);
        
        $existingQuestion = Question::where('slug', $slug)->first();

        if($existingQuestion){
            $randomString = Str::random(5);
            $slug = $slug . '-' . $randomString;
        }

        $question = Question::create([
            'title' => $questionValidate['title'],
            'content' => $questionValidate['content'],
            'category_id' => $questionValidate['category_id'],
            'hashtag_id' => $questionValidate['hashtag_id'],
            'user_id' => Auth::user()->id,
            'slug' => $slug,
        ]);

        return redirect('/')->with('success', 'Đăng bài thành công');
        
    }

    public function categoryFilter($slug){
        
        try{
            $category = Category::where('slug', $slug)->first();
            $questions = Question::where('category_id', $category->id)->paginate(5);
            if($questions){
                return view('category.filterCategory', compact('questions','category'));
            }

            return view('category.filterCategory', compact('category'));    
        }catch(Exception $e ){
            return redirect('/');
        }
    }

    public function HashtagFilter($hashtag_id, $user_id){
        try{
            $hashtag = Hashtag::find($hashtag_id);
            $user = User::find($user_id);
            $questions = Question::where('hashtag_id', $hashtag_id)->where('user_id', $user->id)->paginate(5);
            if($questions){
                return view('user.Hashtag', compact('questions','hashtag'));
            }

            return view('user.Hashtag', compact('hashtag'));
        }catch(Exception $e ){
            return redirect('/');
        }
    }

    public function answer(Request $request, $id){
        // Validate dữ liệu từ request
        $questionValidate = $request->validate([
            'content' => 'required',
        ]);
        
        $question = Question::find($id);

        $question->updated_at = date('Y-m-d H:i:s');
        $question->save();

        $answer = Answer::create([
            'question_id' => $id,
            'user_id' => Auth::user()->id,
            'content' => $questionValidate['content'],
        ]);

        return redirect()->back();

    }

    public function repAnswer(Request $request, $parent_id){
        // Validate dữ liệu từ request
        $questionValidate = $request->validate([
            'content' => 'required',
        ]);

        $answer = Answer::where('id', $parent_id)->get()->first();

        $answerNew = Answer::create([
            'question_id' => $answer->question->id,
            'user_id' => Auth::user()->id,
            'content' => $questionValidate['content'],
            'parent_id' => $parent_id,
        ]);

        return redirect()->back();
    }

    public function like($question_id){
        // dd($id);
        $like = Like::where('question_id', $question_id)->where('user_id', Auth::user()->id)->get()->first();

        if($like){
            if($like->like == 0){
                $like->delete();
                $likeNew = Like::create([
                    'question_id' => $question_id,
                    'user_id' => Auth::user()->id,
                    'like' => 1
                ]);
            }else{
                $like->delete();
            }
        }else{
            $likeNew = Like::create([
                'question_id' => $question_id,
                'user_id' => Auth::user()->id,
                'like' => 1
            ]);
        }

        return redirect()->back();

    }

    public function disLike($question_id){

        $like = Like::where('question_id', $question_id)->where('user_id', Auth::user()->id)->get()->first();

        if($like){
            if($like->like == 1){
                $like->delete();
                $likeNew = Like::create([
                    'question_id' => $question_id,
                    'user_id' => Auth::user()->id,
                    'like' => 0
                ]);
            }else{
                $like->delete();
            }
        }else{
            $likeNew = Like::create([
                'question_id' => $question_id,
                'user_id' => Auth::user()->id,
                'like' => 0
            ]);
        }

        return redirect()->back();
        
    }
}
