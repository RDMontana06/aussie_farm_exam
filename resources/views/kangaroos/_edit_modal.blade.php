<div class="modal fade" id="editKangarooModal" tabindex="-1" role="dialog" aria-labelledby="editKangarooModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKangarooModalLabel">Edit Kangaroo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editKangarooForm">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">Name:</label><span style="color:red">*</span>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nickname">Nickname:</label><span> (optional)</span>
                        <input type="text" name="nickname" id="edit-nickname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="weight">Weight:</label><span style="color:red">*</span>
                        <input type="number" name="weight" id="edit-weight" step="0.01" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="height">Height:</label><span style="color:red">*</span>
                        <input type="number" name="height" id="edit-height" step="0.01" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label><span style="color:red">*</span>
                        <select id="edit-gender" name="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color">Color:</label><span> (optional)</span>
                        <input type="text" name="color" id="edit-color" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="friendliness">Friendliness:</label>
                        <select id="edit-friendliness" name="friendliness" class="form-control">
                            <option value="friendly">Friendly</option>
                            <option value="not friendly">Not Friendly</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Birthday:</label><span style="color:red">*</span>
                        <input type="date" name="birthday" id="edit-birthday" class="form-control" required>
                    </div>
                    <input type="hidden" name="kangaroo_id" id="edit-kangaroo-id">
                    <button id="updateKangarooButton" type="button" class="btn btn-primary">Update Kangaroo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle the button click event for updating the kangaroo
$('#updateKangarooButton').on('click', function() {
  var kangarooId = $('#edit-kangaroo-id').val();
  var name = $('#edit-name').val();
  // Get other form values similarly

  var formData = {
    name: $('#edit-name').val(),
    nickname: $('#edit-nickname').val(),
    weight: $('#edit-weight').val(),
    height: $('#edit-height').val(),
    gender: $('#edit-gender').val(),
    color: $('#edit-color').val(),
    friendliness: $('#edit-friendliness').val(),
    birthday: $('#edit-birthday').val()
};

  $.ajax({
    url: '/kangaroos/' + kangarooId,
    method: 'PATCH',
    data: formData,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      // Handle the success case
      console.log(response);
      window.location.href = "{{ route('kangaroos.index') }}";
    },
    error: function(error) {
      // Handle the error case
      console.log(error);
    }
  });
});
</script>
