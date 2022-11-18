@extends('employee.profile.partials.layout')
@section('title', 'Edit project')
@section('content')
<main class="main-bg inner-login-shape job-descri-form-page">
    <section class="form-inner-wrapper">
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        @include('layouts.messages.success')
                        @include('layouts.messages.error')
                        <form class="form-inner" action="{{ route('employee.project.update', [$project->uuid]) }}" method="POST" enctype="multipart/form-data" id="jqueryValidatorAddProjectForm">
                            @csrf
                            @method('PUT')
                            <a href="{{ route('employee.profile.edit') }}" title="Back to profile" class="text-primary">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </a>
                            <h2 class="form-heading">Project details</h2>
                            <div id="copy_form">
                                <div class="row  form-group">
                                    <label for="inputname" class="form-label">Project Name*</label>
                                    <div class="col-12">
                                        <input type="text" name="name" value="{{ old('name', $project->name) }}" required class="form-control form-input" placeholder="Ex: Job Portal website job-ax" aria-label="name">
                                        @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputrole" class="form-label">Role in the project*</label>
                                    <div class="col-12">
                                        <input type="text" name="role" value="{{ old('role', $project->role) }}" required class="form-control form-input" placeholder="Ex: Backend Developer" aria-label="inputCompany">
                                        @error('role')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCountry" class="form-label">Project team size*</label>
                                    <div class="col-12">
                                        <input type="text" name="team_size" value="{{ old('team_size', $project->team_size) }}" required class="form-control form-input" placeholder="Ex: 5" aria-label="inputCompany">
                                        @error('team_size')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCity" class="form-label">images</label>
                                    <div class="col-12">
                                        <input type="file" name="images[]" multiple class="form-control" id="files" accept="image/png, image/jpg, image/jpeg">
                                        <small class="text-secondary">Maximum size of each file 2 MB (.jpeg, .jpg, .png files are accepted)</small>
                                        <div class="row thumbnails">
                                            @forelse (optional($project->loadMissing('images'))->images as $image)
                                            <div class="col-3 pip">
                                                <img class='imageThumb' src="{{ $image->image_url }}" width="100" class="">
                                                <input type="hidden" name="old_images[]" value="{{ $image->image }}">
                                                <a class='remove remove-button mt-2 btn btn-danger btn-sm' href='javascript:void(0);' width='100'>Remove</a>
                                            </div>
                                            @empty
                                            @endforelse
                                        </div>
                                        @error('images')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Write some 2 or 3 lines in your project">{{ old('description', $project->description) }}</textarea>
                                        @error('describe')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row btn-form-wrapper">
                                <div class=" d-grid col-sm-9">
                                    <input type="submit" class="btn  btn-primary btn-form" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection