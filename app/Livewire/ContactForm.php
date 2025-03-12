<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
class ContactForm extends Component
{
    public $surface;
    public $size;
    public $address;
    public $phone;
    public $email;

    public $content;

    public $successMessage;



    public $captcha = 0;

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('CAPTCHA_SECRET_KEY') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if (!$this->captcha > .3) {
            $this->store();
        } else {
            return session()->flash('success',  __('global.contact.success-message'));
        }

    }


    protected $rules = [
        'email' => 'required|email',
        'content' => 'required',
        'captcha' => ['required'],

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contact = $this->validate();

        Mail::send('emails.contact-form-email', [
            'surface' => $this->surface,
            'size' => $this->size,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'content' => $this->content,
        ], function ($message) {
            $message->from(env('MAIL_USERNAME'))
                ->to(env('MAIL_TO'))
                ->subject('Nowa wiadomość ze strony ');
        });

        $this->successMessage =  __('global.contact_form.success_message');

        $this->resetForm();

        session()->flash('success_message', $this->successMessage);
    }

    public function resetForm()
    {
        $this->surface = '';
        $this->size = '';
        $this->address = '';
        $this->phone = '';
        $this->email = '';
        $this->content = '';
        $this->captcha = 0;
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
