<!-- resources/views/kangaroos/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        
        <section class="content-header">
            <h1>All Kangaroos</h1>
        </section>

        <!-- Button to trigger Add Kangaroo modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKangarooModal">Add Kangaroo</button>

    <!-- Include the Add Kangaroo Modal -->
    @include('kangaroos._create_modal')
        <section class="content">
            <div class="box">
                <div class="box-body" >
                    <div id="gridContainer"></div>
                </div>
            </div>
        </section>
    </div>
    @include('kangaroos._edit_modal')
    <script>
        // Initialize the DxDataGrid
        $(function() {
  $("#gridContainer").dxDataGrid({
    dataSource: {!! json_encode($kangaroos) !!},
    columns: [
      { dataField: 'name', caption: 'Name' },
      { dataField: 'birthday', caption: 'Birthday', dataType: 'date' },
      { dataField: 'weight', caption: 'Weight', dataType: 'number' },
      { dataField: 'height', caption: 'Height', dataType: 'number' },
      { dataField: 'friendliness', caption: 'Friendliness', defaultValue: '-' },
      {
        type: 'buttons',
        buttons: [{
          text: 'Edit',
          onClick: function(e) {
            var kangarooId = e.row.data.id;
            openEditModal(kangarooId);
          }
        }]
      }
    ],
    showBorders: true,
    searchPanel: {
      visible: true,
      highlightCaseSensitive: false
    },
    sorting: {
      mode: 'multiple'
    },
    filterRow: {
      visible: true
    },
    headerFilter: {
      visible: true
    }
  });
});

  function openEditModal(kangarooId) {
  $.ajax({
    url: '/kangaroos/' + kangarooId + '/edit',
    method: 'GET',
    success: function(response) {
      var kangaroo = response.data; // Assuming the response contains the Kangaroo data

      // Set the modal form values based on the retrieved Kangaroo details
      $('#editKangarooModal').modal('show');
      $('#editKangarooForm').attr('action', '/kangaroos/' + kangarooId);

      $('#edit-name').val(kangaroo.name);
      $('#edit-nickname').val(kangaroo.nickname);
      $('#edit-weight').val(kangaroo.weight);
      $('#edit-height').val(kangaroo.height);
      $('#edit-gender').val(kangaroo.gender);
      $('#edit-color').val(kangaroo.color);
      $('#edit-friendliness').val(kangaroo.friendliness);
      $('#edit-birthday').val(kangaroo.birthday);

      // Store the kangaroo ID in a hidden input field within the form
      $('#edit-kangaroo-id').val(kangarooId);
    },
    error: function(error) {
      // Handle the error case
      console.log(error);
    }
  });
}


    </script>
@endsection
