<x-guest-layout>

    {{-- <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ml-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
    </form> --}}

    <form method="POST" action="{{ route('register.step.two.post') }}" enctype="multipart/form-data">

        @csrf

        <div class="form-group mt-2">
            <label>Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Mobile Number</label>
            <input type="text" id="mobile_number" name="mobile_number" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Address</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>City</label>
            <input type="text" id="city" name="city" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>State</label>
            <input type="text" id="state" name="state" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Country</label>
            <input type="text" id="country" name="country" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Postcode</label>
            <input type="text" id="postcode" name="postcode" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Date of Birth</label>
            <input type="date" id="dob" name="dob" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Qualification</label>
            <input type="text" id="qualification" name="qualification" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Experience/Fresher</label>
            <div class="form-check">
                <input type="radio" id="experience_fresher" name="experience" value="experienced" class="form-check-input" required>
                <label class="form-check-label">Experienced</label>
            </div>
            <div class="form-check">
                <input type="radio" id="experience_fresher" name="experience" value="fresher" class="form-check-input" required>
                <label class="form-check-label">Fresher</label>
            </div>
        </div>

        <div class="form-group mt-2">
            <label>Experience Detail</label>
            <textarea id="experience_detail" name="experience_detail" class="form-control"></textarea>
        </div>

        <div class="form-group mt-2">
            <label>Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label>Resume</label>
            <input type="file" id="resume" name="resume" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3 submit">Submit</button>

    </form>


</x-guest-layout>
