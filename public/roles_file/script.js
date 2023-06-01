



// // create role function 


// $("#roleCreateForm").submit(function(e){
//   e.preventDefault();

   
//     let name =$("#name-create").val();
//     let _token =$("input[name=_token]").val();


//     $.ajax({
//       url: "{{route('role.store')}}",
//       type: "POST",
//       data: {
//         name: name,
//         _token: _token,
//       },
//       success: function(response){
//           if(response)
//           {
//             var newRow = '<tr id="rid' + response.id + '">' +
//                 '<td><strong>' + response.name + '</strong></td>' +
//                 '<td>' +
//                   '<a data-id="' + response.id + '" onclick="editRole(' + response.id + ')"><img src="/icons/edit.png" alt="" class="edit-icon"></a>' +
//                 '</td>' +
//                 '<td>' +
//                   '<a class="btn-delete" onclick="deleterole('+ response.id +')" data-id="' + response.id + '"><img src="/icons/delete.png" alt="" class="edit-icon"></a>' +
//                 '</td>' +
//               '</tr>';
//   $("#roleTable tbody").prepend(newRow);

//    //success message 
//    toastr.options = {
//       closeButton: true,
//       progressBar: true,
//       positionClass: 'toast-top-right',
//       timeOut: 5000
//     };
//    toastr.success('Role created successful!');

//              $("#roleCreateForm")[0].reset();
//              $("#createModal").modal('hide');
//           }
//       },
//       error: function(error) {
//     if (error.responseJSON.errors && error.responseJSON.errors.name) {
//       let errorMessage = error.responseJSON.errors.name[0];
//       $("#name-create").addClass('is-invalid');
//       $("#name-create").after('<div class="invalid-feedback">' + errorMessage + '</div>');
//     }
//   },
      
//     });
//   });


//   //create for error messsage hide if edit the input value again

//   $("#name-create").on("input", function() {
//   if ($(this).hasClass("is-invalid")) {
//     $(this).removeClass("is-invalid");
//     $(this).next(".invalid-feedback").remove();
//   }
// });



//   // Edit role function.....................................................................................
//   function editRole(roleId) {
//   // Make an AJAX GET request to retrieve the role data
//   $('.form-control.is-invalid').removeClass('is-invalid');
// $('.invalid-feedback').remove();
//   $.get('role/' + roleId, function(role){
//     $("#id").val(role.id);
//     $("#name-edit").val(role.name);
//     $("#status-edit").prop('checked', role.status == 0);
//     $("#roleEditModal").modal('toggle');
//   });
// }

// $("#roleUpdateForm").submit(function(e){
//   e.preventDefault();
//   let id = $("#id").val();
//   let name = $("#name-edit").val();
//   let status = $("#status-edit").prop('checked') ? 0 : 1;
//   let _token = $("input[name=_token]").val();

//   $.ajax({
//     url: "roleupdate",
//     type: "POST",
//     data: {
//       id:id,
//       name: name,
//       status: status,
//       _token: _token,
//     },
//     success: function(response){
//       console.log(response); // Handle the response here

//       $('#rid' + response.id + ' td:nth-child(1)').html('<strong>' + response.name + '</strong>');
//       // $('#rid' + response.id + ' td:nth-child(2)').text(response.guard_name);
      
//       //success message 
//       toastr.options = {
//           closeButton: true,
//           progressBar: true,
//           positionClass: 'toast-top-right',
//           timeOut: 5000
//         };
//       toastr.success('Role update successful!');

//       $("#roleEditModal").modal('toggle');
//       $("#roleUpdateForm")[0].reset();
//     },
//     error: function(error) {
//     if (error.responseJSON.errors && error.responseJSON.errors.name) {
//       let errorMessage = error.responseJSON.errors.name[0];
//       $("#name-edit").addClass('is-invalid');
//       $("#name-edit").after('<div class="invalid-feedback">' + errorMessage + '</div>');
//     }
//   }
//   });
// });



// //error message hide from input box while edit some text.....
// $("#name-edit").on("input", function() {
//   if ($(this).hasClass("is-invalid")) {
//     $(this).removeClass("is-invalid");
//     $(this).next(".invalid-feedback").remove();
//   }
// });





// //delete function .........................................................................

// // Delete button click event handler
// function deleterole(roleId){
//       var roleId = roleId;

//   // Prompt the user for confirmation
//   if (confirm("Are you sure you want to delete this role?")) {
//       // Send the delete request via Ajax
//       $.ajax({
//           url: '/roles/' + roleId,
//           type: 'DELETE',
//           data: {
//               "_token": "{{ csrf_token() }}"
//           },
//           success: function (response) {
//               // Handle the successful delete response
//               console.log(response.message);

           
//               //success message 
//                toastr.options = {
//                   closeButton: true,
//                   progressBar: true,
//                   positionClass: 'toast-top-right',
//                   timeOut: 5000
//                 };
//                toastr.warning('Role Delete successful!');

//               // Remove the deleted role from the UI
//               $('#rid' + roleId).remove();
//           },
          
         

//           error: function(error) {
//           if (error.status === 422) {
//               toastr.options = {
//             closeButton: true,
//             progressBar: true,
//             positionClass: 'toast-top-right',
//             timeOut: 5000
//           };
//             let errorMessage = error.responseJSON.message;
//             toastr.info(errorMessage);

//           }
//         }
//       });
//     }
//   }
