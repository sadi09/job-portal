<h1>Employer Profile</h1>

<div class="profile-pic cat-item rounded p-4">
    <h2>Logo</h2>
    <img id="placeHolderImage" width="auto" height="150"
         src="{{ $employer->company_logo ? asset( $employer->company_logo) : asset('img/logo_placeholder.png') }}"
         alt="Company Logo">
    <form method="post" action="{{ route('update_employer_profile_picture') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" oninput="placeHolderImage.src=window.URL.createObjectURL(this.files[0])" name="img">
        <button class="btn btn-primary" type="submit">Update Logo</button>
    </form>
</div>

<div class="credentials cat-item rounded p-4">
    <h2>Email and Password</h2>
    <form method="post" action="{{ route('update_employer_credentials') }}">
        @csrf
        <label for="email">Email: [Can not change email for now]</label>
        <input type="text" id="email" readonly name="email" value="{{ $employer->email }}">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter new password">
        <button class="btn btn-primary" type="submit">Update Email and Password</button>
    </form>
</div>

<div class="company-details cat-item rounded p-4">
    <h2>Company Details</h2>
    <form method="post" action="{{ route('update_employer_details') }}">
        @csrf
        <label for="company_name">Company Name:</label>
        <input type="text" id="company_name" name="company_name" value="{{ $employer->company_name }}">
        <label for="industry_type">Industry Type:</label>
        <select id="industry_type" name="industry_type" class="form-control">
            @foreach($industry_types as $industry_type)
                <option {{ $industry_type->id == $employer->industry_type_id ? 'selected' : '' }} value="{{$industry_type->id}}"> {{$industry_type->name}}</option>
            @endforeach
        </select>
        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" value="{{ $employer->contact_number }}">
        <label for="company_description">Company Description:</label>
        <textarea id="company_description" name="company_description">{{ $employer->company_description }}</textarea>
        <label for="company_website">Company Website:</label>
        <input type="text" id="company_website" name="company_website" value="{{ $employer->company_website }}">
        <button class="btn btn-primary" type="submit">Update Company Details</button>
    </form>
</div>

