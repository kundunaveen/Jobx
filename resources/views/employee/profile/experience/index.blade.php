<table class="table">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Address</th>
            <th>Duration</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employee->loadMissing('experience')->experience as $experience)
        <tr>
            <td>{{ $experience->job_title }}</td>
            <td>{{ $experience->company }}</td>
            <td>
                @if($country = optional($experience->loadMissing('country')->country)->name)
                    Country: {{ $country }}
                @endif                
                @if($state = optional($experience->loadMissing('state')->state)->name)
                    , State: {{ $state }}
                @endif
                @if($city = optional($experience->loadMissing('city')->city)->city)
                 , City: {{ $city }}
                @endif
            </td>
            <td>
                {{ date('F', mktime(0,0,0,$experience->from_month, 10)) }}&nbsp;{{ $experience->from_year }}
                -
                @if ($experience->is_work_here)
                    Currently work Here
                @else
                    {{ date('F', mktime(0,0,0,$experience->to_month, 10)) }}&nbsp;{{ $experience->to_year }}
                @endif
            </td>
            <td>{{ $experience->describe }}</td>
            <td>
                <div>
                <a href="{{ route('employee.experience.edit', [$experience->uuid]) }}">Edit</a>
                </div>
                <div>
                <a href="javascript:void(0);" class="text-danger delete_prompt" data-action="{{ route('employee.experience.destroy', [$experience->uuid]) }}" data-id="{{ $experience->uuid }}">Delete</a>                    
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No experience found.</td>
        </tr>
        @endforelse
    </tbody>
</table>