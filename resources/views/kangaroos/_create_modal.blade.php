<div class="modal fade" id="addKangarooModal" tabindex="-1" role="dialog" aria-labelledby="addKangarooModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addKangarooModalLabel">Add Kangaroo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add form content -->
                <form id="createKangarooForm" action="{{ route('kangaroos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nickname">Nickname:</label>
                            <input type="text" name="nickname" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="number" name="weight" step="0.01" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="height">Height:</label>
                            <input type="number" name="height" step="0.01" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" name="color" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="friendliness">Friendliness:</label>
                            <select name="friendliness" class="form-control">
                                <option value="friendly">Friendly</option>
                                <option value="not friendly">Not Friendly</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="birthday">Birthday:</label>
                            <input type="date" name="birthday" class="form-control" required>
                        </div>

                        <button id="createKangarooButton" type="button" class="btn btn-primary">Add Kangaroo</button>
                    </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
  $('#createKangarooButton').click(function() {
    var formData = $('#createKangarooForm').serialize();

    $.ajax({
      url: "{{ route('kangaroos.store') }}",
      method: 'POST',
      data: formData,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        // Handle the success case
        console.log(response);
         // Redirect to the index page
         window.location.href = "{{ route('kangaroos.index') }}";
      },
      error: function(error) {
        // Handle the error case
        console.log(error);
      }
    });
  });
});
</script>
