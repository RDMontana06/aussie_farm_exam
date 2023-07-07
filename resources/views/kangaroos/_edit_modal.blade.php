
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
            <form id="editKangarooForm" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="edit-name" class="form-control"  required>
                        </div>

                        <div class="form-group">
                            <label for="nickname">Nickname:</label>
                            <input type="text" name="nickname" id="edit-nickname" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="number" name="weight" id="edit-weight" step="0.01" class="form-control"  required>
                        </div>

                        <div class="form-group">
                            <label for="height">Height:</label>
                            <input type="number" name="height" id="edit-height" step="0.01" class="form-control"  required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select id="edit-gender" name="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" name="color" id="edit-color" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label for="friendliness">Friendliness:</label>
                            <select id="edit-friendliness" name="friendliness" class="form-control">
                                <option value="friendly">Friendly</option>
                                <option value="not friendly">Not Friendly</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="birthday">Birthday:</label>
                            <input type="date" name="birthday" id="edit-birthday" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Kangaroo</button>
                    </form>
            </div>
        </div>
    </div>
</div>