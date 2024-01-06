<?php

namespace App\Livewire;

use App\Mail\SubscribeMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SubscribeFormComponent extends Component
{
    public string $email = '';
    public string $username = '';

    protected array $rules = [
        'username' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:subscribers',
    ];

    protected $messages = [
        'username.min' => 'Минимум :min символа',
        'username.max' => 'Максимум :max символа',
        'username.*' => 'Поле не заполнено',
        'email.unique' => 'Вы уже подписаны на рассылку',
        'email.*' => 'Неверный адрес электронной почты',
    ];

    protected $validationAttributes = [
        'username' => 'Имя',
        'email' => 'Электронная почта',
    ];

    public function mount()
    {
        $this->username = auth()->user()->name ?? '';
        $this->email = auth()->user()->email ?? '';
    }

    public function submit() {
        $this->validate();

        $subscriber = Subscriber::create([
            'name' => $this->username,
            'email' => $this->email,
        ]);

        Mail::to($this->email)->send(new SubscribeMail($subscriber));

        $this->reset(['username', 'email']);
        $this->dispatch('livewireSubscribeFormSent');
    }

    public function render()
    {
        return view('livewire.subscribe-form-component');
    }
}
