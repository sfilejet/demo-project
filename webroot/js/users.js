$(document).ready(function() {
    console.log("kkkkk");
    
    $('#users_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/users/getData",
            type: 'GET',
            dataSrc: "data"
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'is_verified' },
            { data: 'role.name' }
        ],
        "pageLength": 10,
    "language": {
        "search": "Filter users:",
        "lengthMenu": "Show _MENU_ users",
        "info": "Showing _START_ to _END_ of _TOTAL_ users"
    },
        language: {
            search: 'Filter Users:'
        }
    });
});


$("#user_login").validate({
    rules:{
        email:{
            required:true
        },
        password:{
            required:true
        }
    },
    errorPlacement:function (error,element) {
        error.insertAfter(element);
        error.css("color","red");
    }
});