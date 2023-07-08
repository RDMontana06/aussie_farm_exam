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
                <div id="createKangarooForm">
                    <div class="form-group">
                        <label for="name">Name: <span style="color:red">*</span> </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nickname">Nickname:</label><span> (optional)</span>
                        <input type="text" name="nickname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="weight">Weight: <span style="color:red">*</span> </label>
                        <input type="number" name="weight" step="0.01" min=0.00 class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="height">Height: <span style="color:red">*</span> </label>
                        <input type="number" name="height" step="0.01" min=0.00 class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender: <span style="color:red">*</span> </label>
                        <select name="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color">Color:</label> <span> (optional)</span>
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
                        <label for="birthday">Birthday:<span style="color:red">*</span> </label>
                        <input type="date" name="birthday" max="{{date('Y-m-d')}}" class="form-control" required>
                    </div>

                    <button id="createKangarooButton" type="button" class="btn btn-primary">Add Kangaroo</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#createKangarooButton').click(function(event) {
            event.preventDefault(); // Prevent form submission

            var formData = {
                name: $('input[name="name"]').val(),
                nickname: $('input[name="nickname"]').val(),
                weight: $('input[name="weight"]').val(),
                height: $('input[name="height"]').val(),
                gender: $('select[name="gender"]').val(),
                color: $('input[name="color"]').val(),
                friendliness: $('select[name="friendliness"]').val(),
                birthday: $('input[name="birthday"]').val(),
            };

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
