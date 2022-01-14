<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MemberComponent extends Component
{
    use WithFileUploads;

    public $file_name;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'file_name' => 'bail|required|file|mimes:pdf|max:10000',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'file_name' => 'bail|required|file|mimes:pdf|max:10000',
        ]);

        $document = new Document();
        $filename = Carbon::now()->timestamp;
        $this->file_name->storeAs(Auth::guard('member')->user()->email, $filename . '.' . $this->file_name->extension());
        $document->file_name = $filename;
        $document->member_id = Auth::guard('member')->user()->id;
        $document->save();
        session()->flash('message', 'تم ارسال الطلب');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.member.member-component');
    }
}
