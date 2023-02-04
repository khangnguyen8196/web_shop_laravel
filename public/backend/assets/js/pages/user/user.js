$(function () {
    pages.user.init();
});

if (!pages) {
    var pages = {};
}
pages = $.extend(pages, {
    user: {
        // status_text:{
        //     1 : 'Active',
        //     2 : 'InActive',
        //     3 : 'Deleted'
        // },
        init: function () {
            if ($("#user_tbl").length > 0) {
                pages.user.setupRoleList();
            }
            if ($("#member_tbl").length > 0) {
                pages.user.setupMemberList();
            }

            $(document).on("click", '#check_all_permission', function(){
                if( $(this).is(':checked') ){
                    $("#permission_tbl input[type='checkbox']").prop('checked', true);
                } else {
                    $("#permission_tbl input[type='checkbox']").prop('checked', false);
                }
            });

            if( $('#permission_tbl input.item_check:checked').length === $('#permission_tbl input.item_check').length ){
                $('#check_all_permission').prop('checked', true);
            }

            $(document).on("click", 'input[name=check_row]', function() {
                if( $(this).is(':checked') ){
                    $(this).closest('tr').find('.item_check').prop('checked', true);
                } else {
                    $(this).closest('tr').find('.item_check').prop('checked', false);
                }
                if( $('#permission_tbl input.item_check:checked').length === $('#permission_tbl input.item_check').length ){
                    $('#check_all_permission').prop('checked', true);
                } else {
                    $('#check_all_permission').prop('checked', false);
                }
            });

            $(document).on("click", 'input.item_check', function() {
                if( $('#permission_tbl input.item_check:checked').length === $('#permission_tbl input.item_check').length ){
                    $('#check_all_permission').prop('checked', true);
                } else {
                    $('#check_all_permission').prop('checked', false);
                }
                var obj = $(this).closest('tr');
                if (obj.find('.item_check:checked').length === obj.find('.item_check').length){
                    obj.find('input[name=check_row]').prop('checked', true);
                }else{
                    obj.find('input[name=check_row]').prop('checked', false);
                }
            });

            $(document).on('click', '.btn_execute_search', function (evt) {
                evt.preventDefault();
                pages.common.executeSearchForm("member_search_form", 'member_tbl');
            });

            $(document).on('keyup', 'input[name=name_email]', function (evt) {
                if(evt.keyCode == 13)
                {
                    pages.common.executeSearchForm("member_search_form", 'member_tbl');
                }
            });
            // $(document).on('submit','#change-password',function(){
            //     event.preventDefault();
            //     var id = $('#user-id').val();
            //     var url = $('#url-update-pass').val();
            //     var current_password = $('#current-password').val();
            //     var password = $('#password').val();
            //     var password_confirm = $('#password-confirm').val();
            //     $('#current_passwordError').text('');
            //     $('#passwordError').text('');
            //     $('#password_confirmError').text('');
            //     $.ajax({
            //         url: url ,
            //         type:"POST",
            //         dataType: 'JSON',
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         data:{
            //             "current_password": current_password,
            //             "password": password,
            //             "password_confirmation": password_confirm,
            //         },
            //         success:function(response){
            //             $('#current_passwordError').text('');
            //             $('#passwordError').text('');
            //             $('#password_confirmError').text('');
            //             if(response.isSuccess == false){
            //                 $('#current_passwordError').text(response.Message);
            //             }else if(response.isSuccess == true){
                            
            //             }
            //         },
            //         error: function(response) {
            //             $('#current_passwordError').text(response.responseJSON.errors.current_password);
            //             $('#passwordError').text(response.responseJSON.errors.password);
            //             $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            //         }
            //     });
            // });
        },
        setupRoleList: function () {
            var aoColumns = [
                { data: "id", name: 'id', "className": "text-center align-middle"},
                { data: "name", name: 'title', "className": "text-center align-middle"},
                { data: "status", name: 'status', "className": "text-center align-middle"},
                { data: "user_name_updated", name: 'user_name_updated', "className": "text-center align-middle"},
                { data: "updated_at", name: 'updated_at', "className": "text-center align-middle"},
                { data: "action", name: 'action', "className": "text-center align-middle"}
            ];
            var columnDefs = [
                {
                    render: function (data, type, row) {
                        var can_edit = 'disabled';
                        if( pages.common.isDefined(row['permissions'].edit) && row['permissions'].edit == 1){
                            can_edit = '';
                        }
                        var checked = data === 1 ? 'checked' : '';
                        return '<div class="form-switch" dir="ltr">\n' +
                            '       <input type="checkbox" '+can_edit+' class="form-check-input" onclick="pages.user.changeRoleStatus('+row["id"]+')" id="'+row["id"]+'" '+checked+'>\n' +
                            '          <label class="form-check-label" for="'+row["id"]+'"></label>\n' +
                            '</div>';
                    },
                    targets: 2,
                    orderable: false,
                    data: "status"
                },
                {
                    render: function (data, type, row) {
                        return pages.common.formatDate(data);
                    },
                    targets: 4,
                    orderable: true,
                    data: "updated_at"
                },
                {
                    render: function (data, type, row) {
                        if( pages.common.isDefined(row['permissions'].edit) && row['permissions'].edit == 1 ){
                            return "<a href='"+ row['url'] +"' class='edit btn'><i class='bx bx-pencil'></i></a>";
                        } else {
                            return '';
                        }
                    },
                    targets: 5,
                    orderable: true,
                    data: "action"
                }

            ];
            var opts = {
                searching: true,
                ordering: true
            };

            pages.common.setupDataTable(
                "#user_tbl",
                "/account/user-group-ajax",
                aoColumns,
                columnDefs,
                opts
            );
        },
        setupMemberList: function () {
            var aoColumns = [
                { data: "id", "className": "text-center align-middle"},
                { data: "name", "className": "text-center align-middle"},
                { data: "email","className": "text-center align-middle"},
                { data: "created_at", "className": "text-center align-middle"},
                { data: "role_name", "className": "text-center align-middle"},
                { data: "status", "className": "text-center align-middle"},
                { data: "action", "className": "text-center align-middle"}
            ];
            var columnDefs = [
                {
                    render: function (data, type, row) {
                        return pages.common.formatDate(data);
                    },
                    targets: 3,
                    orderable: true,
                    data: "created_at"
                },
                {
                    render: function (data, type, row) {
                        var can_edit = 'disabled';
                        if( pages.common.isDefined(row['permissions'].edit) && row['permissions'].edit == 1){
                            can_edit = '';
                        }
                        var checked = data === 1 ? 'checked' : '';
                        return '<div class="dropdown mt-4 mt-sm-0">'
                                +'<a href="#" '+can_edit+' class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">'
                                +    pages.user.status_text[data]
                                +'</a>'
                                +'<div class="dropdown-menu" style="">'
                                +    '<a class="dropdown-item" href="#" onclick="pages.user.changeMemberStatus('+row["id"]+',1)">Active</a>'
                                +    '<a class="dropdown-item" href="#" onclick="pages.user.changeMemberStatus('+row["id"]+',2)">InActive</a>'
                                +    '<a class="dropdown-item" href="#" onclick="pages.user.changeMemberStatus('+row["id"]+',3)">Delete</a>'
                                +'</div>'
                            +'</div>';
                    },
                    targets: 5,
                    orderable: false,
                    data: "status"
                },
                {
                    render: function (data, type, row) {
                        if( pages.common.isDefined(row['permissions'].edit) && row['permissions'].edit == 1 ){
                            return "<a href='"+ row['url'] +"' class='edit btn'><i class='bx bx-pencil'></i></a>";
                        } else {
                            return '';
                        }
                    },
                    targets: 6,
                    orderable: true,
                    data: "action"
                }

            ];
            var opts = {
                searching: true
            };

            pages.common.setupDataTable(
                "#member_tbl",
                "/account/member/list",
                aoColumns,
                columnDefs,
                opts
            );
        },

        changeRoleStatus: function ( role_id ) {
            $.ajax({
                url: '/account/user-group/change-role-status',
                data: {
                    'role_id': role_id
                },
                dataType: 'json',
                success: function (result) {
                    if (result.code === pages.constant.CODE_SUCCESS) {
                        $("#user_tbl").DataTable().draw();
                    }
                }
            });
        },
        changeMemberStatus: function ( member_id, status ) {
            $.ajax({
                url: '/account/member/change-member-status',
                data: {
                    'id': member_id,
                    'status': status
                },
                dataType: 'json',
                success: function (result) {
                    if (result.code === pages.constant.CODE_SUCCESS) {
                        $("#member_tbl").DataTable().draw();
                    }
                }
            });
        }
    }
});
