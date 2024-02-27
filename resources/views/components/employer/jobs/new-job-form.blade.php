<div class="container">
    <h2>Create a New Job</h2>
    <form method="POST" action="{{ route('jobs.store') }}">
        @csrf

        <div class="cat-item rounded p-4">
            <!-- Job Title -->
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title"
                       placeholder="Enter job title" required>
            </div>

            <!-- Vacancy, Job Type, and Job Category -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="vacancy">Vacancy</label>
                    <input type="number" class="form-control" value="{{ old('vacancy') }}" id="vacancy" name="vacancy"
                           placeholder="Enter vacancy"
                           required>
                </div>

                <div class="form-group col-md-3">
                    <label for="type">Job Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option>--select--</option>
                        <option value="full time" {{old('type') == 'full time' ? 'selected': ''}}>Full Time</option>
                        <option value="part time" {{old('type') == 'part time' ? 'selected': ''}}>Part Time</option>
                        <option value="contractual" {{old('type') == 'contractual' ? 'selected': ''}}>Contractual</option>
                        <option value="internship" {{old('type') == 'internship' ? 'selected': ''}}>Internship</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="job_categories_id">Job Category</label>
                    <select class="form-control" id="job_categories_id" name="job_categories_id" required>
                        <option value="">--select--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('job_categories_id') == $category->id ? 'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


            </div>

            <div class="form-row">
                <!-- Location -->
                <div class="form-group col-md-3">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" value="{{ old('location') }}" id="location" name="location"
                           placeholder="Enter job location" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="isRemote">Is Remote?</label>
                    <select class="form-control" id="isRemote" name="isRemote" required>
                        <option value="0" {{ old('isRemote') == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('isRemote') == '1' ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Salary Lower Limit and Upper Limit -->
        <div class="cat-item rounded p-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="salary_lower_limit">Salary Lower Limit</label>
                    <input type="number" class="form-control" id="salary_lower_limit"
                           value="{{ old('salary_lower_limit') }}" name="salary_lower_limit"
                           placeholder="Enter lower salary limit" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="salary_upper_limit">Salary Upper Limit</label>
                    <input type="number" class="form-control" id="salary_upper_limit"
                           value="{{ old('salary_upper_limit') }}" name="salary_upper_limit"
                           placeholder="Enter upper salary limit" required>
                </div>
            </div>

            <!-- Application Deadline -->
            <div class="form-group">
                <label for="deadline">Application Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline') }}"
                       required>
            </div>

            <!-- Job Description -->
            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                          placeholder="Enter job description" required>{{ old('description') }}</textarea>
            </div>
        </div>

        <!-- Additional Fields -->
        <div class="cat-item rounded p-4">
            <!-- Experience Requirements -->
            <div class="form-group">
                <label for="experience_requirements">Experience Requirements</label>
                <input type="number" class="form-control" id="experience_requirements"
                       value="{{ old('experience_requirements') }}" name="experience_requirements"
                       placeholder="Enter experience requirements" required>
            </div>

            <!-- Education Requirements -->
            <div class="form-group">
                <label for="education_requirements">Education Requirements</label>
                <input type="text" class="form-control" id="education_requirements"
                       value="{{ old('education_requirements') }}" name="education_requirements"
                       placeholder="Enter education requirements" required>
            </div>

            <!-- Skills and Qualifications -->
            <div class="form-group">
                <label for="skills_and_qualifications">Skills and Qualifications</label>
                <textarea class="form-control" id="skills_and_qualifications" name="skills_and_qualifications" rows="4"
                          placeholder="Enter required skills and qualifications"
                          required>{{ old('skills_and_qualifications') }}</textarea>
            </div>

            <!-- Application Instructions -->
            <div class="form-group">
                <label for="application_instructions">Application Instructions</label>
                <textarea class="form-control" id="application_instructions" name="application_instructions" rows="4"
                          placeholder="Enter application instructions"
                          required>{{ old('application_instructions') }}</textarea>
            </div>

            <!-- Contact Information -->
            <div class="form-group">
                <label for="contact_information">Contact Information</label>
                <input type="text" class="form-control" id="contact_information"
                       value="{{ old('contact_information') }}" name="contact_information"
                       placeholder="Enter contact information" required>
            </div>
        </div>

        <div class="form-row">
            <!-- Submit Button -->
            <button type="submit" name="draft" class="btn btn-info text-white">Save Draft</button>
            <button type="submit" name="publish" class="btn btn-success">Save & Publish</button>
        </div>
    </form>
</div>
