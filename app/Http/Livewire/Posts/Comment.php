<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $count = 4;

    public $body;

    public $post;

    public $body2;

    public $showFormEdit;

    public $showFormReply;

    public $comment_id;

    public $edit_comment_id;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.posts.comment', [
            'comments' => ModelsComment::where('post_id', $this->post->id)
                ->with(['user', 'childrens', 'post'])
                ->whereNull('comment_id')
                ->get(),
            'total_comments' => ModelsComment::with('user')->where('post_id', $this->post->id)->count(),
        ]);
    }

    public function store()
    {
        if (Auth()->user()) {
            $this->validate(
                ['body' => 'required'],
                ['body.required' => 'The comment field is required.']
            );

            $comment = ModelsComment::create([
                'user_id' => Auth::user()->id,
                'post_id' => $this->post->id,
                'body' => $this->body,
            ]);
            if ($comment) {
                $this->emit('comment_store', $comment->id);

                $this->body = null;
            } else {
                \session()->flash('danger', 'komentar gagal terkirim');

                return to_route('landing.show', $this->post->slug);
            }
        } else {
            \session()->flash('info', 'komentar gagal terkirim');
            $this->body = null;
        }
    }

    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment_id == null;
        $this->body2 = null;
        $this->showFormReply = true;
        $this->showFormEdit = false;
    }

    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = ModelsComment::find($this->comment_id);
        $comment = ModelsComment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body2,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id,
        ]);

        if ($comment) {
            $this->emit('comment_store', $comment->id);
            $this->showFormReply = false;
            $this->body = null;
        } else {
            \session()->flash('danger', 'komentar gagal terkirim');

            return to_route('landing.show', $this->post->slug);
        }
    }

    public function selectEdit($id)
    {
        $comment = ModelsComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
        $this->showFormEdit = true;
        $this->showFormReply = false;
    }

    public function change()
    {
        $this->validate(['body2' => 'required']);

        $comment = ModelsComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2,
        ]);

        if ($comment) {
            $this->emit('comment_store', $this->edit_comment_id);
            $this->edit_comment_id == null;
            $this->body2 = null;
            $this->showFormEdit = false;
        } else {
            \session()->flash('danger', 'komentar gagal diubah');

            return to_route('landing.show', $this->post->slug);
        }
    }

    public function delete($id)
    {
        $comment = ModelsComment::where('id', $id)->delete();

        if ($comment) {
            return null;
        } else {
            \session()->flash('danger', 'komentar gagal diubah');

            return to_route('landing.show', $this->post->slug);
        }
    }
}
