<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>

   @include('project.admin.css')

   


  </head>
 
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

            @include('project.admin.aside')
        
        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
         

             @include('project.admin.navbar')
        

          <!-- / Navbar -->

          <!-- Content wrapper -->


          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
  <div class="row align-items-center justify-content-between mb-4">
    <div class="col">
      <h4 class="fw-bold py-3"><span class="text-muted fw-light">Modules</span></h4>
    </div>
    <div class="col-auto">
      <div class="demo-inline-spacing">
        <button
          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#moduleCreateModal"
        >
          Create Module
        </button>
      </div>
    </div>
  </div>



  

              
<!--Create Modal -->


<div class="modal fade" id="moduleCreateModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5> -->
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                           
                            <form id="moduleCreateForm">
                                @csrf
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameSmall" class="form-label">module Name</label>
                                  <input type="text" id="modulename-create"  class="form-control" placeholder="Enter module Name" />
                                </div>

                                

                      
                              </div>
                                        
                              
                            <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button> -->
                              <button type="submit" class="btn btn-primary">Create module</button>
                            </div>
                          </div>

                         </form>
                        </div>
                      </div>
                    </div>



<!--Create Modal -->

              <!-- <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Add Role</h5>

                   
                    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('success'))
             <div class="alert alert-success">
               {{ session()->get('success') }}
             </div>
            @endif

                    <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                     
                       

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Role Name</label>
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="Enter Role" name="name" value="{{old('name')}}" required>
                        </div>

                          <button type="submit" class="btn btn-primary">save</button>
                      </form>


                    </div>
                  </div>
                </div>
              </div>
 -->







              <!-- Basic Bootstrap Table -->
              <div class="card">
                <!-- <h5 class="card-header">Table Basic</h5> -->
                <div class="table-responsive text-nowrap text-center">
                  <table class="table serial-number" id="moduleTable">
                    <thead>
                      <tr>
                        <th>Module</th>
                        <th>slug</th>
                        <th>Order</th>
                        <th>Dashboard View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <!-- <th>Actions</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($module as $view_module)
                      <tr id="mid{{$view_module->id}}">
                        <td>
                          <!-- <i class="fab fa-angular fa-lg text-danger me-3"></i> -->
                           <strong>{{$view_module->name}}</strong></td>
                        <!-- <td>{{$view_module->guard_name}}</td> -->

                        <td>{{$view_module->slug}}</td>
                        <td>
                           <img src="icons/up.png" alt="" class="updown-icon move-up" data-module-id="{{ $view_module->id }}" >
                           <img src="icons/down.png" alt="" class="updown-icon move-down" data-module-id="{{ $view_module->id }}">
                        </td>

                            <td class="text-center">
                              <div class="d-flex justify-content-center align-items-center">
                                <div class="form-check form-switch mb-2">
                                  <input class="form-check-input" type="checkbox" id="dashboard-module-edit" {{ $view_module->is_dashboard == 0 ? 'checked' : '' }} onchange="updateDashboardStatus({{ $view_module->id }}, this.checked)" />
                                </div>
                              </div>
                            </td>

                        <td>
                             <!-- <button class="btn btn-primary btn-edit" data-id="{{ $view_module->id }}">edit</button> -->

                              <a  data-id="{{ $view_module->id }}" onclick="editModule({{ $view_module->id}})"><img src="/icons/edit.png" alt="" class="edit-icon"></a>


                        </td>
                        <td>
                          
                            <!-- <span class="badge bg-label-primary me-1">Active</span> -->
                            <a class="btn-delete" onclick="deleteModule({{ $view_module->id }})" data-id="{{ $view_module->id }}"><img src="/icons/delete.png" alt=""class="edit-icon"></a>


                        </td>
                        <!-- <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td> -->
                      </tr>
                      @endforeach
                     
                    
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Pagination links -->
                

              <!--/ Basic Bootstrap Table -->

          




<!-- edit Modal -->


                      <div class="modal fade" id="moduleEditModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5> -->
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                              </button>
                            </div>
                           
                            <form id="moduleUpdateForm">
                                @csrf
                            <div class="modal-body">
                              <input type="hidden" name="id" id="id">
                              <div class="row">
                                <div class="col mb-3">
                                  <label for="nameSmall" class="form-label">Module Name</label>
                                  <input type="text" id="moduleName-edit"  class="form-control" placeholder="Enter Module Name" />
                                </div>

                                

                      
                              </div>
                                        <div class="form-check form-switch mb-2">
                                  <input class="form-check-input" type="checkbox"  id="status-module-edit" checked />
                                  <label class="form-check-label" for="flexSwitchCheckChecked"
                                    >Status</label
                                  >
                              </div>
                              
                            <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                              </button> -->
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>

                         </form>
                        </div>
                      </div>



<!-- edit Modal -->



<script>

// create module function 


$("#moduleCreateForm").submit(function(e){
  e.preventDefault();

   
    let name =$("#modulename-create").val();
    let _token =$("input[name=_token]").val();


    $.ajax({
      url: "{{route('module.store')}}",
      type: "POST",
      data: {
        name: name,
        _token: _token,
      },
      success: function(response){
          if(response)
          {
            console.log(response);
            var newRow = '<tr id="mid' + response.id + '">' +
                '<td><strong>' + response.name + '</strong></td>' +
                '<td>' + response.slug + '</td>' +
                '<td>' + '<img src="icons/up.png" alt="" class="updown-icon" onclick="uporderModule('+ response.order +')" > <img src="icons/down.png" alt="" class="updown-icon" onclick="downorderModule('+ response.order +')">' + '</td>' +
                '<td class="text-center">' +
  '<div class="d-flex justify-content-center align-items-center">' +
    '<div class="form-check form-switch mb-2">' +
      '<input class="form-check-input" type="checkbox" id="dashboard-module-edit-' + response.id + '" ' + (response.is_dashboard == 0 ? 'checked' : '') + ' onchange="updateDashboardStatus(' + response.id + ', this.checked)" />' +
    '</div>' +
  '</div>' +
'</td>'+

                '<td>' +
                  '<a data-id="' + response.id + '" onclick="editModule(' + response.id + ')"><img src="/icons/edit.png" alt="" class="edit-icon"></a>' +
                '</td>' +
                '<td>' +
                  '<a class="btn-delete" onclick="deleteModule(' + response.id + ')" data-id="' + response.id + '"><img src="/icons/delete.png" alt="" class="edit-icon"></a>' +
                '</td>' +
              '</tr>';

  $("#moduleTable tbody").append(newRow);

   //success message 
   toastr.options = {
      closeButton: true,
      progressBar: true,
      positionClass: 'toast-top-right',
      timeOut: 5000
    };
   toastr.success('Module created successful!');

             $("#moduleCreateForm")[0].reset();
             $("#moduleCreateModal").modal('hide');
          }
      },
      error: function(error) {
    if (error.responseJSON.errors && error.responseJSON.errors.name) {
      let errorMessage = error.responseJSON.errors.name[0];
       
       $('#modulename-create').removeClass("is-invalid");
       $('#modulename-create').next(".invalid-feedback").remove();

      $("#modulename-create").addClass('is-invalid');
      $("#modulename-create").after('<div class="invalid-feedback">' + errorMessage + '</div>');
    }
  },
      
    });
  });


  //create for error messsage hide if edit the input value again

  $("#modulename-create").on("input", function() {
  if ($(this).hasClass("is-invalid")) {
    $(this).removeClass("is-invalid");
    $(this).next(".invalid-feedback").remove();
  }
});








// Edit module function.....................................................................................
  function editModule(moduleId) {
  // Make an AJAX GET request to retrieve the role data
  $('.form-control.is-invalid').removeClass('is-invalid');
$('.invalid-feedback').remove();
  $.get('modules/' + moduleId, function(moduleEdit){
    $("#id").val(moduleEdit.id);
    $("#moduleName-edit").val(moduleEdit.name);
    $("#status-module-edit").prop('checked', moduleEdit.status == 0);
    $("#moduleEditModal").modal('toggle');
    // console.log(moduleId)
  });
}

$("#moduleUpdateForm").submit(function(e){
  e.preventDefault();
  let id = $("#id").val();
  let name = $("#moduleName-edit").val();
  let status = $("#status-module-edit").prop('checked') ? 0 : 1;
  let _token = $("input[name=_token]").val();

  $.ajax({
    url: "moduleupdate",
    type: "POST",
    data: {
      id:id,
      name: name,
      status: status,
      _token: _token,
    },
    success: function(response){
    //   console.log(response); // Handle the response here

      $('#mid' + response.id + ' td:nth-child(1)').html('<strong>' + response.name + '</strong>');
      $('#mid' + response.id + ' td:nth-child(2)').text(response.slug); // Update the slug in the table

      //success message 
      toastr.options = {
          closeButton: true,
          progressBar: true,
          positionClass: 'toast-top-right',
          timeOut: 5000
        };
      toastr.success('Module update successful!');

      $("#moduleEditModal").modal('toggle');
      $("#moduleUpdateForm")[0].reset();
    },
    error: function(error) {
    if (error.responseJSON.errors && error.responseJSON.errors.name) {
      let errorMessage = error.responseJSON.errors.name[0];

      $("#moduleName-edit").removeClass("is-invalid");
      $("#moduleName-edit").next(".invalid-feedback").remove();


      $("#moduleName-edit").addClass('is-invalid');
      $("#moduleName-edit").after('<div class="invalid-feedback">' + errorMessage + '</div>');
    }
  }
  });
});



//error message hide from input box while edit some text.....
$("#moduleName-edit").on("input", function() {
  if ($(this).hasClass("is-invalid")) {
    $(this).removeClass("is-invalid");
    $(this).next(".invalid-feedback").remove();
  }
});





//delete function .........................................................................

// Delete button click event handler
function deleteModule(moduleId) {
  // Prompt the user for confirmation using SweetAlert
  Swal.fire({
    title: 'Are you sure?',
    text: 'You will not be able to recover this module!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      // Send the delete request via Ajax
      $.ajax({
        url: '/modules/' + moduleId,
        type: 'DELETE',
        data: {
          "_token": "{{ csrf_token() }}"
        },
        success: function(response) {
          // Handle the successful delete response
        //   console.log(response.message);
          
          // Display a success message using SweetAlert
          Swal.fire({
            title: 'Deleted!',
            text: 'The module has been deleted.',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
          });

          // Remove the deleted role from the UI
          $('#mid' + moduleId).remove();
        },
        error: function(error) {
          if (error.status === 422) {
            // Display an error message using SweetAlert
            Swal.fire({
              title: 'Error!',
              text: error.responseJSON.message,
              icon: 'error',
              timer: 3000,
              showConfirmButton: false
            });
          }
        }
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Display a cancel message using SweetAlert
      Swal.fire({
        title: 'Cancelled',
        text: 'The deletion has been cancelled.',
        icon: 'info',
        timer: 2000,
        showConfirmButton: false
      });
    }
  });
}



//swap table Handle move-up button click event.................................................................
$('.move-up').on('click', function() {
        var moduleId = $(this).data('module-id');
        var direction = 'up';

        updateModuleOrder(moduleId, direction);
    });

    // Handle move-down button click event
    $('.move-down').on('click', function() {
        var moduleId = $(this).data('module-id');
        var direction = 'down';

        updateModuleOrder(moduleId, direction);
    });
    // Update module order using Ajax
    function updateModuleOrder(moduleId, direction) {

        $.ajax({
            url: "{{ route('module.update-order') }}",
            method: "PUT",
            data: {
                module_id: moduleId,
                direction: direction,
                _token: "{{ csrf_token() }}"
            },

            success: function(response) {
                console.log(response);

                if (response.success) {
                  // Update the table row with the new data
                  var currentRow = $('#mid' + moduleId);
                  var newRow = direction === 'up' ? currentRow.prev() : currentRow.next();

                  if (newRow.length) {
                    // Swap the row IDs
                    currentRow.attr('id', 'mid' + newRow.data('module-id'));
                    newRow.attr('id', 'mid' + moduleId);

                    // Swap the module data in the table rows
                    var currentData = currentRow.html();
                    var newData = newRow.html();

                    currentRow.html(newData);
                    newRow.html(currentData);

                     // Update the data-module-id attribute
                    var currentModuleId = currentRow.data('module-id');
                    var newModuleId = newRow.data('module-id');

                    currentRow.data('module-id', newModuleId);
                    newRow.data('module-id', currentModuleId);
                  }
                }
            }
        });
    }



//is dashboard status ..........................................................................................


function updateDashboardStatus(moduleId, isChecked) {
    // Send the AJAX request
    console.log(moduleId, isChecked);
    $.ajax({
      url: "{{ route('module.update-dashboard') }}",
      method: 'POST',
      data: {
        moduleId: moduleId,
        isChecked: isChecked,
        _token: "{{ csrf_token() }}"
      },
      success: function(response) {
        console.log(response);
        // Update the input box checkbox based on the response
        if (response.success) {
          var checkbox = $("#dashboard-module-edit-" + moduleId);
          checkbox.prop("checked", response.is_dashboard);
        }
      },
      error: function(xhr, status, error) {
        // Handle the error if needed
        console.log(error);
      }
    });
  }

</script>

              
            </div>
          </div>


          
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

     @include('project.admin.script')
  </body>
</html>
 