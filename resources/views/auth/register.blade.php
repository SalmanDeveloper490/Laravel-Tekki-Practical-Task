<x-guest-layout>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="register-form">
        @csrf

        <div class="form-section">
            <div class="form-group mt-2">
                <label>Email Address</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>


            <div class="form-group mt-2">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="form-section">
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
        </div>

        <div class="form-navigation mt-3">
            <button type="button" class="previous btn btn-primary float-left">&lt; Previous</button>
            <button type="button" class="next btn btn-primary float-right">Next &gt;</button>
            <button type="submit" class="btn btn-success float-right">Submit</button>
        </div>
    </form>


</x-guest-layout>
