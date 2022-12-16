<div class="modal-header">
  
    <h5 class="modal-title" id="exampleModalLabel"><span class="text-primary">{{ optional($applied_job->loadMissing('user')->user)->full_name }}</span>'s application status update</h5>
    
</div>
<div class="modal-body">
    @if(!empty($applied_job->cover_letter))
    <h5>Cover Letter</h5>
    <p>{{$applied_job->cover_letter}}</p>
    @endif
    <form action="{{ route('employer.applicant-status-update', $applied_job->id) }}" method="GET" id="application_form">
        <div class="row">
            <div class="col-md-8">
                <select name="status" class="form-control" required>
                    <option value="">Select status</option>
                    @forelse (\App\Models\AppliedJob::STATUS_ARRAY as $key => $value)
                    <option value="{{ $key }}" @if($key == $applied_job->status) selected @endif>{{ $value }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-search btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
<script>
    $("#application_form").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "GET",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(response) {
                if(response.status == true){
                    successToastAlert(response.message);
                    window.location.reload();
                }else{
                    errorToastAlert(response.message);
                }
            }
        });

    });
</script>