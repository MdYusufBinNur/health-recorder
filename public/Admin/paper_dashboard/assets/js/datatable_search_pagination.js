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
        case 'fee' :
            loadFee(response);
            break;
        case 'skill' :
            loadSkill(response);
            break;
        case 'categorie' :
            loadCategory(response);
            break;
        case 'employee':
            loadEmployee(response)
            break;
        case 'subcategorie':
            loadSubCategory(response)
            break;
        case 'product':
            loadProduct(response)
            break;
        case 'gig':
            loadGigs(response)
            break;
        case 'countrie':
            loadCountry(response)
            break;
        case 'notice':
            loadNotice(response)
            break;
        case 'service':
            loadService(response)
            break;
        case 'design':
            loadDesign(response)
            break;
        case 'trust':
            loadTrust(response)
            break;
        case 'work':
            loadWorks(response)
            break;
        case 'slider':
            loadSlider(response)
            break;
        case 'job':
            loadJobs(response)
            break;
        case 'job_image':
            loadJobImage(response)
            //console.log(response)
            break;
        case 'productcategorie' :
            loadProductCategory(response);
            break;
        case 'content' :
            loadContent(response);
            break;
        case 'content_item' :
            loadContentItem(response);
            break;
        case 'coupon' :
            loadCoupon(response);
            break;
    }

}

function loadJobImage(response) {
    $('#append_id').append("<input type='hidden' name='id' value='"+response.id+"'>");
    $('#append_image').append("<img src='"+response.image+"' width='50' height='auto'/>");
    $('#append_bg_image').append("<img src='"+response.bg_image+"' width='50' height='auto'/>");

}
function loadTrust(response) {
    $('#id').val(response.id);
    $('#title').val(response.title);
    $('#number').val(response.number);
    $('#old_photo').attr('src', response.image);
}
function loadWorks(response) {
    $('#id').val(response.id);
    $('#title').val(response.title);
    $('#color').val(response.color);
    $('#sub_title').val(response.sub_title);
    $('#old_photo').attr('src', response.image);
}
function loadSlider(response) {
    $('#id').val(response.id);
    $('#headline').val(response.headline);
    $('#sub_title').val(response.sub_title);
    $('#color').val(response.color);
    $('#popular').val(response.popular);

    $.each(JSON.parse(response.image), function (index, val) {
        $('#old_photo').append("\n" +
            "<img src='" + val + "' class='col-sm-3' alt=\"\" width=\"70\" height=\"70\">\n"
        );
    });
}
function loadJobs(response) {
    $('#id').val(response.id);
    $('#title').val(response.title);
    $('#sub_title').val(response.sub_title);
    $('#icon').val(response.icon);
}
function loadCoupon(response) {
    $('#id').val(response.id);
    $('#coupon_code').val(response.coupon_code);
    $('#coupon_description').val(response.coupon_description);
    $('#valid_till').val(response.valid_till);
    $('#percent').val(response.percent);
}
function loadDesign(response) {
    $('#id').val(response.id);
    $('#title').val(response.title);
    $('#sub_title').val(response.sub_title);
    $('#old_photo').attr('src', response.image);
}
function loadService(response) {
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

function loadFee(response) {
    $('#id').val(response.id);
    $('#seller_fee').val(response.seller_fee);
    $('#buyer_fee').val(response.buyer_fee);
}

function loadCategory(response) {
    $('#category_id').val(response.id);
    $('#category_name').val(response.category_name);
    $('#category_details').val(response.category_details);
}

function loadProductCategory(response) {
    $('#category_id').val(response.id);
    $('#category_name').val(response.category_name);
    $('#category_details').val(response.category_details);
}

function loadContent(response) {
    $('#id').val(response.id);
    $('#content_name').val(response.content_name);
}

function loadContentItem(response) {
    //console.log(response)
    $('#id').val(response.id);
    $('#footer_content_id').append("<option  value=" + response.content.id + "  selected> " + response.content.content_name + " </option>")
    $('#title').val(response.title);
    $('#link').val(response.link);
}

function loadEmployee() {

}

function loadSubCategory(response) {
    $('#all_category').append('<option value="' + response.category_id + '">dada</option>');
}

function loadProduct(response) {
    $('#old_img').html("");
    $('#product_id').val(response.id)
    $('#category').append("<option  value=" + response.category.id + "  selected> " + response.category.category_name + " </option>")
    $('#generate_sub_cat').append("<option  value=" + response.subcategory.id + "  > " + response.subcategory.sub_cat_name + " </option>")
    $('#product_name').val(response.product_name);
    $('#product_details').text(response.product_details);
    $('#product_price').val(response.product_price);

    $.each(JSON.parse(response.product_images), function (index, val) {
        //console.log(value);
        //$('#old_img').append("<img src='"+value+"' width=\"70\" height=\"auto\"/> <br> <button class='btn btn-xs  btn-danger'>DELETE</button> &nbsp;");
        $('#old_img').append("<div class='col-md-3 mb-md-3' >\n" +
            "<img src='" + val + "' alt=\"\" width=\"70\" height=\"auto\">\n" +
            "<br> <a id='delete_image' onclick='delete_image(\"" + val + "\",\"" + response.id + "\")' class='btn btn-sm  btn-danger'>DELETE</a></div>");
        //$('#old_logo').attr('src',value)

        // $('form').append('<input type="hidden" name="document[]" value="' + value + '">')
    });
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

function loadGigs(response) {
    $('#gig_id').val(response.id)
    $('#old_img').html("");
    $('#category').append("<option  value=" + response.category.id + "  selected> " + response.category.category_name + " </option>")
    $('#generate_sub_cat').append("<option  value=" + response.subcategory.id + "  > " + response.subcategory.sub_cat_name + " </option>")
    $('#gig_name').val(response.gig_name)
    $('#gig_details').val(response.gig_details)
    $('#price').val(response.price)
    $.each(JSON.parse(response.gig_images), function (index, val) {
        //console.log(value);
        //$('#old_img').append("<img src='"+value+"' width=\"70\" height=\"auto\"/> <br> <button class='btn btn-xs  btn-danger'>DELETE</button> &nbsp;");
        $('#old_img').append("<div class='col-md-3 mb-md-3' >\n" +
            "<img src='" + val + "' alt=\"\" width=\"70\" height=\"auto\">\n" +
            "<br> <a id='delete_image' onclick='delete_gig_image(\"" + val + "\",\"" + response.id + "\")' class='btn btn-sm  btn-danger'>DELETE</a></div>");
        //$('#old_logo').attr('src',value)

        // $('form').append('<input type="hidden" name="document[]" value="' + value + '">')
    });
}

function delete_gig_image(name, id) {
    //alert(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'delete_selected_gig_image',
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

            //console.log(resp);
            // let object = JSON.parse(resp);
            $('#old_img').html("");
            $.each(JSON.parse(object.gig_images), function (index, val) {
                $('div#old_img').append("<div class='col-md-3 mb-md-3' >\n" +
                    "<img src='" + val + "' alt=\"\" width=\"70\" height=\"auto\">\n" +
                    "<br> <a id='delete_image' onclick='delete_gig_image(\"" + val + "\",\"" + object.id + "\")' class='btn btn-sm  btn-danger'>DELETE</a></div>");

            });

        },
        error: function (resp) {
            console.log(resp);
        }
    })
}

/*
* $('#checky').click(function(){

    if($(this).attr('checked') == false){
         $('#postme').attr("disabled","disabled");
    }
    else {
        $('#postme').removeAttr('disabled');
    }
});
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<input type="checkbox" checked="checked" id="checky"><a href="#">I agree to keep my Username and Password confidential and uphold
  the integrity of this pharmacy</a>
<br>
<input type="submit" id="postme" value="submit">
*
*
* */


