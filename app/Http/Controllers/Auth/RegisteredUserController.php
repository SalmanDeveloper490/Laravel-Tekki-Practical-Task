<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{    

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {  
        // // Validate the user input
        // request()->validate([
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|string|min:8',
        // ]);
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'mobile_number' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:20'],
            'dob' => ['required', 'date'],
            'qualification' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'in:experienced,fresher'],
            'experience_detail' => ['required_if:experience,experienced', 'string'],
            'image' => ['required', 'image', 'max:2048'],
            'resume' => ['required', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);

        // $user = User::create([
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'dob' => $request->dob,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'experience_detail' => $request->experience_detail,
            // 'image' => $image,
            // 'resume' => $resume,
        ]);

        // // // Save the user's profile image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_images', $filename);
            $user->image = $filename;
        }

        // // Save the user's resume
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $filename = time() . '.' . $resume->getClientOriginalExtension();
            $resume->storeAs('public/resumes', $filename);
            $user->resume = $filename;
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        
    }

    public function createStepTwo(): View {
        return view('auth.register-step-two');
    }

    public function postCreateStepTwo(Request $request){
       
        try {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:20'],
            'dob' => ['required', 'date'],
            'qualification' => ['required', 'string', 'max:255'],
            'experience' => ['required', 'in:experienced,fresher'],
            'experience_detail' => ['required_if:experience,experienced', 'string'],
            'image' => ['required', 'image', 'max:2048'],
            'resume' => ['required', 'mimes:pdf,doc,docx', 'max:2048'],
        ]);
        
         // Save the user's resume file
         $imageName = time() . '_' . $request->file('resume')->getClientOriginalName();
         $request->file('image')->storeAs('public/image', $imageName);
         
         // Save the user's resume file
         $resumeName = time() . '_' . $request->file('resume')->getClientOriginalName();
         $request->file('resume')->storeAs('public/resumes', $resumeName);


        $user = User::create([
            'name' => $request->name, 
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'dob' => $request->dob,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'experience_detail' => $request->experience_detail,
            'image' => $imageName,
            'resume' =>  $resumeName,
        ]);

        // // // // Save the user's profile image
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/profile_images', $filename);
        //     $user->image = $filename;
        // }

        // // // Save the user's resume
        // if ($request->hasFile('resume')) {
        //     $resume = $request->file('resume');
        //     $filename = time() . '.' . $resume->getClientOriginalExtension();
        //     $resume->storeAs('public/resumes', $filename);
        //     $user->resume = $filename;
        // }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
}
