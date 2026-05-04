<?php

namespace App\Livewire;

use App\Models\EventReview;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventReviewForm extends Component
{
    use WithFileUploads;

    public $event_id;

    public $author_name;

    public $email;

    public $comment;

    public $photo;

    public bool $accepted_terms = false;

    public $isSubmitted = false;

    protected function rules(): array
    {
        return [
            'author_name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|min:5|max:500',
            'photo' => 'nullable|image|max:5120',
            'accepted_terms' => 'accepted',
        ];
    }

    public function mount(int $eventId): void
    {
        $this->event_id = $eventId;
    }

    public function submit(): void
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('event-reviews', 'public');
        }

        EventReview::create([
            'event_id' => $this->event_id,
            'author_name' => $this->author_name,
            'email' => $this->email,
            'comment' => $this->comment,
            'photo_path' => $photoPath,
            'accepted_terms' => true,
            'is_approved' => false,
        ]);

        $this->isSubmitted = true;
        $this->reset(['author_name', 'email', 'comment', 'photo', 'accepted_terms']);
    }

    public function render()
    {
        return view('livewire.event-review-form');
    }
}
