<?php

namespace App\Livewire\Auth;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $company = Company::firstOrCreate(
            ['cnpj' => '00.000.000/0000-00'],
            [
                'name' => 'Empresa Fictícia',
                'contact_email' => 'contato@empresa.com',
                'phone' => '0000000000',
                'is_active' => false,
                'has_active_subscription' => false,
            ]
        );

        $user = new User($validated);
        $user->company()->associate($company);
        $user->save();

        event(new Registered($user));
        Auth::login($user);
        
        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
