$().ready(function () {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
            class: 'navbar-form navbar-left navbar-search-form'
        }
    });
    let table = $('#datatables, #datatable').DataTable();
    // Edit record
    table.on('click', '.edit', function (e) {

        let id = $(this).data('id');
        let url = $(this).data('body');

        $.ajax({
            url: '/' + url + 's/' + id,
            method: 'GET',
            success: function (response) {

                loadData(url, response)

            }, error: function (response) {
                modalHide();
                swal("Failed to load data",response, "error");
            }
        })
    });
    // Delete a record
    table.on('click', '.remove', function (e) {
        //alert('HH')
        let id = $(this).data('id');
        let url = $(this).data('body');
        //alert(url)
        swal({
                title: "Are you sure?",
                text: "You won't be able to retrieve this file.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, archive it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url + 's/' + id,
                        method: 'DELETE',
                        data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            swal("success", "Data Updated", "success");
                            window.location.href = url + 's'
                        },
                        error: function (response) {
                            swal("error", "Failed to delete", "error");
                        }
                    })
                    // window.location.href = url+'s/'+id;
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });

        e.preventDefault();
    });
    table.on('click', '.change_state', function (e) {
        //alert('HH')
        let id = $(this).data('id');
        let url = $(this).data('body');
        //alert(url)
        swal({
                title: "Sue to change status ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Confirm",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '/updateAppointmentStatus/' + id,
                        method: 'get',
                        data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            swal("success", data.message , "success");
                            window.location.reload()
                        },
                        error: function (response) {
                            swal("error", "Failed to delete", "error");
                        }
                    })
                    // window.location.href = url+'s/'+id;
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });

        e.preventDefault();
    });

});


$('.bootstrap-switch').each(function () {
    $this = $(this);
    data_on_label = $this.data('on-label') || '';
    data_off_label = $this.data('off-label') || '';

    $this.bootstrapSwitch({
        onText: data_on_label,
        offText: data_off_label
    });
});


function expert(id, role) {
    window.location.href = '/make_expert/' + id + '/' + role;
}
function changeCouponStatus(id, type) {
    window.location.href = '/changeCouponStatus/' + id + '/' + type;
}
function changeFeeStatus(id, role) {
    window.location.href = '/changeStatus/' + id + '/' + role;
}

function approveProduct(id, role) {
    window.location.href = '/approve/' + id + '/' + role;
}

function verified(id, value) {
    window.location.href = '/make_verified/' + id + '/' + value
}

function loadData(url, response) {
    switch (url) {
        case 'slider':
            loadSlider(response)
            break;
        case 'hospital' :
            loadHospital (response)
            break;
        case 'doctor' :
            loadDoctor(response)
            break;
        case 'ambulance' :
            loadAmbulance (response)
            break;
        case 'donor' :
            loadDonor (response)
            break
        case 'department' :
            loadDepartment (response)
            break;
    }

}


function loadHospital (response) {
    $('#id').val(response.id);
    $('#name').val(response.name);
    $('#details').val(response.details);
    // $('#latitude').val(response.latitude);
    // $('#longitude').val(response.longitude);
    // $('#iframe').val(response.iframe);
    $('#center').val(response.center);
    $('#contact').val(response.contact);
    $('#address').val(response.address);
    $('#old_photo').attr('src', response.image);
}
function loadDoctor (response) {
    $('#id').val(response.id);
    $('#name').val(response.name);
    $('#designation').val(response.designation);
    $('#hosp_id').append("<option  value=" + response.hospital.id + "  selected> " + response.hospital.name + " </option>")
    $('#dept_id').append("<option  value=" + response.department.id + "  > " + response.department.name + " </option>")
    $('#old_photo').attr('src', response.image);
}
function loadAmbulance (response) {
    $('#id').val(response.id);
    $('#name').val(response.name);
    $('#ambulance_no').val(response.ambulance_no);
    $('#mobile').val(response.mobile);
    $('#district').val(response.district);
    $('#area').val(response.area);
    $('#old_photo').attr('src', response.image);
}
function loadDonor (response) {
    $('#id').val(response.id);
    $('#name').val(response.name);
    $('#blood_group').append("<option  value=" + response.blood_group + "  selected> " + response.blood_group + " </option>")
    $('#mobile').val(response.mobile);
    $('#district').val(response.district);
    $('#gender').append("<option  value=" + response.gender + "  selected> " + response.gender + " </option>")
    $('#area').val(response.area);
}
function loadDepartment (response) {
    $('#id').val(response.id);
    $('#name').val(response.name);
    $('#hosp_id').append("<option  value=" + response.hospital.id + "  selected> " + response.hospital.name + " </option>")
    $('#old_photo').attr('src', response.image);
}

function get_department(id) {
    let hospital_id = id.value;
    $(".generate_department").find('option').remove().end();
    $(".generate_department").find('option>selected').remove().end();
    $(".sub_class ul.inner").empty();

    $.ajax(
        {
            url: '/get_departments/'+hospital_id,
            method: 'get',
            // data: {"_token": $('meta[name="csrf-token"]').attr('content')},
            success: function (result) {
                $.each(result, function(i, resp)
                {
                    let value = resp.id;
                    let dept_name = resp.name;
                    $(".generate_department").append("<option value="+ value +" > "+dept_name+" </option>");
                });
            },
            error: function(response)
            {
                console.log(response)
            }
        }
    )
}

function loadSlider (response) {
    $('#id').val(response.id);
    $('#title').val(response.title);
    $('#old_photo').attr('src', response.image);
}
function tinyMCE_init() {
    tinymce.init({
        selector: 'textarea',
        height: 200,
    });
}
function modalHide() {
    $('#Modal').modal('hide')
}
function loadCountry(response) {

    $('#country_id').val(response.id);
    $('#country_name').val(response.country_name);
}
function loadSkill(response) {
    $('#skill_id').val(response.id);
    $('#skill_name').val(response.skill_name);
    $('#skill_detail').val(response.skill_detail);
}
function loadNotice(response) {
    $('#id').val(response.id);
    $('#title').val(response.title);
}
function delete_image(name, id) {
    //alert(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'delete_selected_image',
        method: 'get',
        data: {
            data_id: id,
            name: name
        },
        contentType: 'application/json; charset=utf-8',
        dataType: "json",
        /*  beforeSend: function (request) {
              return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
          },*/
        success: function (object) {

            $('#old_img').html("");
            $.each(JSON.parse(object.product_images), function (index, val) {
                $('div#old_img').append("<div class='col-md-3 mb-md-3' >\n" +
                    "<img src='" + val + "' alt=\"\" width=\"70\" height=\"auto\">\n" +
                    "<br> <a id='delete_image' onclick='delete_image(\"" + val + "\",\"" + object.id + "\")' class='btn btn-sm  btn-danger'>DELETE</a></div>");
            });

        },
        error: function (resp) {
            console.log(resp);
        }
    })
}





