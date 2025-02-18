<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::with('images')->where('is_accepted', null)->first();

        if (!$article_to_check) {
            // Log this situation or handle it accordingly
            Log::warning('No articles found with is_accepted as null.');
            // You might want to redirect or load a default article or set a dummy article
        }

        return view('revisor.index', compact('article_to_check'));
    }


    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', __('ui.articleAccepted'), "$article->title");
    }
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', __('ui.articleRefused'), "$article->title");
    }
    //funzione che rimanda alla vista del form per inviare la mail
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message',  __('ui.congratsRevisor'));
    }
    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }
}
