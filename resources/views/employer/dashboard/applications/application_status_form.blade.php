<div class="modal-header">
  
    <h5 class="modal-title" id="exampleModalLabel"><span class="text-primary">{{ optional($applied_job->loadMissing('user')->user)->full_name }}</span>'s application status update</h5>
    
</div>
<div class="modal-body">
    @if(!empty($applied_job->cover_letter))
    <h5>Cover Letter</h5>
    <p>{{$applied_job->cover_letter}}</p>
    @endif
    @if(!empty($applied_job->motivation_letter))
    <h5 class="mt-3">Motivation Letter</h5>
    <p>{{$applied_job->motivation_letter}}</p>
    @endif
    @if(!empty($applied_job->cover_video))
    <h5 class="mt-3">Cover Video</h5>
    <video class="" controls style="border-radius: 20px;border:solid lightgray 1px; cursor:pointer; height:280px;width:100%; object-fit:cover">
        <source src="{{ $applied_job->cover_video_url }}" type="video/mp4">
    </video>
    @endif
    <form action="{{ route('employer.applicant-status-update', $applied_job->id) }}" method="GET" id="application_form" class="mt-3">
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
            <div class="col-md-4">
                <button type="submit" class="btn btn-search btn-primary w-50 modal_btns_new">Save</button>
                <button type="button" class="btn btn-danger w-50 modal_btns_new" id="closeStatusModal" >Cancel</button>
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
     $('#closeStatusModal').click(function(){
        // alert()
         $('#exampleModal').modal('hide');
    })
</script>