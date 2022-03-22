@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <div class="tile_inner_box">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h4 class="header-title mb-4">Settings Information</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                              <li class="breadcrumb-item"><a style="color:#ED1C24; font-weight:700" href="#">Settings</a></li>
                            </ol>
                        </nav>
                        <div class="card text-center mt-4">
                            <div class="card-header" style="background:#ED1C24"><h4 class="text-white">SMS Credential</h4></div>
                            <div class="card-body">
                                <input type="hidden" id="edit_id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="setting__item_text">
                                            <p>SMS Client ID </p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="setting__item_text">
                                            <input type="text" id="sms_client_id" name="sms_client_id" placeholder="SMS Client ID" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="setting__item_text">
                                            <p>SMS Client Secret </p>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="setting__item_text mt-4">
                                            <input type="text" id="sms_client_secret" name="sms_client_secret" placeholder="SMS Client Secret" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="setting__item_text">
                                            <p>SMS Client ID </p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="setting__item_text">
                                            <p id="get_id"></p>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-1">
                                        <div class="info_edit_icon mt-4">
                                           <a  onclick="editData()"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="setting__item_text">
                                            <p>SMS Client Secret </p>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="setting__item_text mt-4">
                                            <p id="get_secret"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <a id="save_btn" onclick="insertData()" class="btn btn-warning" style="background:#ED1C24">Save</a>
                                <a id="update_btn" onclick="updateSMS()" class="btn btn-warning" style="background:#ED1C24">Update</a>
                            </div>
                        </div>
                     </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('admin_footer_script')
  <script>
    // insert sms data using ajax
    function insertData(){
        let id = $("#sms_client_id").val();
        let secret = $("#sms_client_secret").val();
        $.ajax({
            type: 'POST',
            url: '/sms/post',
            dataType: 'json',
            data: {id: id, secret:secret},
            success: function (data) {
                clearData()
                getSmsData()
               toastr.success('Data add success');
            },
            error: function (error) {
                toastr.warning('Already Added. Please edit this section');
            }
        });
    }
    function getSmsData(){
        $.ajax({
            type:"GET",
            url:"sms/all",
            dataType: "json",
            success:function(data){
                $("#edit_id").val(data.id)
                $("#get_id").text(data.sms_id);
                $("#get_secret").text(data.sms_secret);
            }
        })
    }
    getSmsData()
    function clearData(){
        $("#sms_client_id").val('');
        $("#sms_client_secret").val('');
    }
    // sms edit settings
    $("#save_btn").show()
    $("#update_btn").hide()
    function editData(){
        let id = $("#edit_id").val();
        $("#save_btn").hide()
        $("#update_btn").show()

        $.ajax({
            type:"GET",
            url:"sms/edit/"+id,
            dataType: "json",
            success:function(data){
                $("#sms_client_id").val(data.sms_id);
                $("#sms_client_secret").val(data.sms_secret);
            }
        })
    }
    // sms update settings
    function updateSMS(){
        let edit_id = $("#edit_id").val();
        let id = $("#sms_client_id").val();
        let secret = $("#sms_client_secret").val();
        $.ajax({
            type: 'POST',
            url: '/sms/udate/'+edit_id,
            dataType: 'json',
            data: {id: id, secret:secret},
            success: function (data) {
                $("#save_btn").show()
                $("#update_btn").hide()
                clearData()
                getSmsData()
               toastr.success('Update success');
            },
            error: function(error){
                console.log(error);
            }
        });
    }
  </script>
@endsection

