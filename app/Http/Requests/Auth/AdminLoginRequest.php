<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $fieldType = filter_var($this->input('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return [
            'login_id' => [
                'required',
                "exists:admins,$fieldType",
                $fieldType === 'email' ? 'email' : 'string',
            ],
            'password' => 'required|min:5|max:45',
        ];
    }

    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        // التحقق من نوع الحقل (email أو username)
        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $fieldType => $this->login_id,
            'password' => $this->password,
        ];

        $remember = $this->has('remember');
        if (!Auth::guard('admin')->attempt($credentials, $remember)) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'login_id' => trans('auth.failed'),
            ]);
        }
        RateLimiter::clear($this->throttleKey());
        return to_route('admin.home');
    }

    protected function ensureIsNotRateLimited()
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $seconds = RateLimiter::availableIn($this->throttleKey());
            session(['retry_after' => $seconds]);
            throw ValidationException::withMessages([
            ])->status(429);
        }
    }

    public function throttleKey(): string
    {
        return Str::lower($this->input('login_id')) . '|' . $this->ip();
    }
}
