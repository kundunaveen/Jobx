<section class="experience-section">
    <div class="container">
        <h4 class="">Projects
            @if (auth()->user()->roleUser->role->role == 'employee')
            &nbsp;&nbsp;<a href="{{ route('employee.project.create') }}" title="add your project"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            @endif
        </h4>
        @php
        if(auth()->user()->roleUser->role->role == 'employee'){
        $projects = optional($employee->loadMissing('projects'))->projects;
        }else{
        $projects = optional($user->loadMissing('projects'))->projects;
        }
        @endphp
        @if($projects)
        <ul class="list-group">
            @forelse ($projects as $project)
            <li class="list-group-item border-0 pb-4">
                <article>
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h5>{{ $project->name }} <span class="ms-2 d-inline-block text-secondary">{{ $project->role }}</span> </h5>
                        </div>
                        @if (auth()->user()->roleUser->role->role == 'employee')
                        <div class="col-auto">
                            <a href="{{ route('employee.project.edit', [$project->uuid]) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="javascript:void(0);" class="text-danger delete_prompt" data-action="{{ route('employee.project.destroy', [$project->uuid]) }}" data-id="{{ $project->uuid }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <span class="mb-2 d-inline-block exp-period">
                        Team Size - {{ $project->team_size }}
                    </span>
                    <p class="mb-0">{{ \Illuminate\Support\Str::limit($project->description, 150, $end='...') }}</p>
                    @if($images = optional($project->loadMissing('images'))->images)
                    <div class="row">
                        @forelse ($images as $image)
                        <div class="col-2 project_images">
                            <a href="{{ $image->image_url }}" target="_blank">
                                <img src="{{ $image->image_url }}" width="100" height="100" title="Project image" />
                            </a>
                        </div>
                        @empty

                        @endforelse
                    </div>
                    @endif
                </article>
            </li>
            @empty
            No project has been added.
            @endforelse
        </ul>
        @else
        No project has been added.
        @endif
    </div>
</section>