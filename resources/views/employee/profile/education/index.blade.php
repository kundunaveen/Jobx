<table class="table">
    <thead>
        <tr>
            <th>Qualification</th>
            <th>Institution</th>
            <th>Address</th>
            <th>Duration</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employee->loadMissing('educations')->educations as $education)
        <tr>
            <td>{{ $education->qualification }}</td>
            <td>{{ $education->institution_name }}</td>
            <td>
                @if($country = optional($education->loadMissing('country')->country)->name)
                    Country: {{ $country }}
                @endif                
                @if($state = optional($education->loadMissing('state')->state)->name)
                    , State: {{ $state }}
                @endif
                @if($city = optional($education->loadMissing('city')->city)->city)
                 , City: {{ $city }}
                @endif
            </td>
            <td>
                {{ date('F', mktime(0,0,0,$education->from_month, 10)) }}&nbsp;{{ $education->from_year }}
                -
                @if ($education->is_pursuing_here)
                    Pursuing
                @else
                    {{ date('F', mktime(0,0,0,$education->to_month, 10)) }}&nbsp;{{ $education->to_year }}
                @endif
            </td>
            <td>{{ $education->describe }}</td>
            <td>
                <div>
                <a href="{{ route('employee.education.edit', $education->uuid) }}">Edit</a>
                </div>
                <div>
                <a href="javascript:void(0);" class="text-danger delete_prompt" data-action="{{ route('employee.education.destroy', $education->uuid) }}">Delete</a>                    
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No education found.</td>
        </tr>
        @endforelse
    </tbody>
</table>