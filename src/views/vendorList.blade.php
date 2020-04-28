@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/user.vendor_list') !!}
@stop
@section('styles')
<link href="{!! asset('assets/admin/plugins/bootstrap3-editable/css/bootstrap-editable.css') !!}" rel="stylesheet" type="text/css" />
<style>
    .credit-txt{cursor: pointer;}
</style>
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/user.vendor_list') !!}</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Notifications -->
                
                <!-- ./ notifications -->
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <thead>
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        <div class="form-group">
                            <label>Status</label>
                            <select data-column="9"  class="search-input-select form-control" style="width: 10%; display: inline-block;">
                                <option value="">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                <option value="2">Pending</option>
                                <option value="3">Rejected</option>
                            </select>
                            <label>User Type</label>
                            <select data-column="13"  class="search-input-select form-control" style="width: 10%; display: inline-block;">
                                <option value="">All</option>
                                <option value="0">Web User</option>
                                <option value="1">Facebook User</option>
                            </select>
                        </div>
                        
                        <table id="user_list" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="11%">{!! trans('admin/vendors.firstname') !!}</th>
                                    <th width="11%">{!! trans('admin/vendors.lastname') !!}</th>
                                    <th width="15%">{!! trans('admin/vendors.email') !!}</th>
                                    <th width="10%">{!! trans('admin/vendors.phone_number') !!}</th>
                                    <th width="5%">{!! trans('admin/vendors.bookings') !!}</th>
                                    <th width="8%">{!! trans('admin/vendors.Refer_code') !!}</th>
                                    <th width="8%">{!! trans('admin/vendors.Refer_by') !!}</th>
                                    <th width="5%">{!! trans('admin/vendors.vendor_doc') !!}</th>
                                    <th width="5%">{!! trans('admin/vendors.user_type') !!}</th>
                                    <th width="7%">{!! trans('admin/common.status') !!}</th>
                                    <th width="5%">{!! trans('admin/vendors.vender_tag') !!}</th>
                                    <th width="4%">{!! trans('admin/vendors.availability') !!}</th>
                                    <th width="16%" style="min-width:130px;">{!! trans('admin/common.action') !!}</th>
                                    <th width="16%">{!! trans('admin/common.user_type') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div> <!-- /. box body -->
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
{{-- Scripts --}}
@section('scripts')
<script src="{{asset('assets/admin/plugins/bootstrap3-editable/js/bootstrap-editable.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    var oTable;

    oTable = $('#user_list').DataTable({
        "dom": "<'row no-gutters'<'col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding'l><'col-xs-12 col-sm-4 col-md-4 col-lg-4'r><'col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding'f>>t<'row no-gutters'<'col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding'i><'col-xs-12 col-sm-4 col-md-4 col-lg-4'><'col-xs-12 col-sm-4 col-md-4 col-lg-4 no-padding'p>>",
        "processing": true,
        "serverSide": true,
        "ajax": "{!! url('admin/vendors/VendorData') !!}",
        "columnDefs": [
            {"orderable": false, "targets": [5, 6, 9, 10, 11]},
            {"searchable": false, "targets": [ 8, 4 ]},
            {"visible": false, "targets": [13]},
        ],
        "order": [[0, "asc"]],
        "fnDrawCallback": function () {
            //jQuery.fn.editable.defaults.mode = 'inline';
            $.fn.editableform.buttons =
                    '<button type="submit" class="btn btn-success editable-submit btn-mini"><i class="fa fa-check"></i></button>' +
                    '<button type="button" class="btn editable-cancel btn-mini"><i class="fa fa-times"></i></button>';

            $('.credit-txt').editable({
                type: 'text',
                pk: '1',
                url: '/demo/users/updateCredit',
                params: function (params) {
                    // add additional params from data-attributes of trigger element
                    params._token = "{!! csrf_token() !!}";
                    params.userId = $(this).editable().data('userid');
                    return params;
                },
                name: 'credit',
                title: "{!! trans('admin/user.credit_title') !!}",
                success: function () {
                }
            });
        },
        "language": {
            "emptyTable": "{!! trans('admin/common.datatable.empty_table') !!}",
            "info": "{!! trans('admin/common.datatable.info') !!}",
            "infoEmpty": "{!! trans('admin/common.datatable.info_empty') !!}",
            "infoFiltered": "({!! trans('admin/common.datatable.info_filtered') !!})",
            "lengthMenu": "{!! trans('admin/common.datatable.length_menu') !!}",
            "loadingRecords": "{!! trans('admin/common.datatable.loading') !!}",
            "processing": "{!! trans('admin/common.datatable.processing') !!}",
            "search": "{!! trans('admin/common.datatable.search') !!}:",
            "zeroRecords": "{!! trans('admin/common.datatable.zero_records') !!}",
            "paginate": {
                "first": "{!! trans('admin/common.datatable.first') !!}",
                "last": "{!! trans('admin/common.datatable.last') !!}",
                "next": "{!! trans('admin/common.datatable.next') !!}",
                "previous": "{!! trans('admin/common.datatable.previous') !!}"
            },
        }
    });

    $('.search-input-select').on('change', function () {   // for select box
        var i = $(this).attr('data-column');
        var v = $(this).val();
        oTable.columns(i).search(v).draw();
    });

    $("#user_list").on('click', '.delete-btn', function () {
        var id = $(this).attr('id');
        var r = confirm("{!! trans('admin/common.delete_confirmation') !!}");
        if (!r) {
            return false
        }
        $.ajax({
            type: "POST",
            url: "users/" + id,
            data: {
                _method: 'DELETE',
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json',
            beforeSend: function () {
                $(this).attr('disabled', true);
                $('.alert .msg-content').html('');
                $('.alert').hide();
            },
            success: function (resp) {
                $('.alert:not(".session-box")').show();
                if (resp.success) {
                    $('.alert-success .msg-content').html(resp.message);
                    $('.alert-success').removeClass('hide');
                } else {
                    $('.alert-danger .msg-content').html(resp.message);
                    $('.alert-danger').removeClass('hide');
                }
                $(this).attr('disabled', false);
                oTable.draw();
            },
            error: function (e) {
                alert('Error: ' + e);
            }
        });
    });

    $("#user_list").on('click', '.status-btn', function () {
        var id = $(this).attr('id');
        var r = confirm("{!! trans('admin/common.status_confirmation') !!}");
        if (!r) {
            return false
        }
        $.ajax({
            type: "POST",
            url: "{{ url('demo/users/changeStatus') }}",
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            dataType: 'json',
            beforeSend: function () {
                $(this).attr('disabled', true);
                $('.alert .msg-content').html('');
                $('.alert').hide();
            },
            success: function (resp) {
                $('.alert:not(".session-box")').show();
                if (resp.success) {
                    $('.alert-success .msg-content').html(resp.message);
                    $('.alert-success').removeClass('hide');
                } else {
                    $('.alert-danger .msg-content').html(resp.message);
                    $('.alert-danger').removeClass('hide');
                }
                $(this).attr('disabled', false);
                oTable.draw();
            },
            error: function (e) {
                alert('Error: ' + e);
            }
        });
    });
    
    $("#user_list").on('click', '.reject', function () {
        var id = $(this).attr('id');
        id = id.slice(6);
        var reason = $('#rejection_reason'+id).val();
        if (reason)
        {
            $.ajax({
                type: "POST",
                url: "{{ url('demo/vendor/reject') }}",
                data: {
                    id: id,
                    reason: reason,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                beforeSend: function () {
                    $(this).attr('disabled', true);
                    $('.alert .msg-content').html('');
                    $('.alert').hide();
                },
                success: function (resp) {
                    $('.alert:not(".session-box")').show();
                    if (resp.success) {
                        $('.alert-success .msg-content').html(resp.message);
                        $('.alert-success').removeClass('hide');
                    } else {
                        $('.alert-danger .msg-content').html(resp.message);
                        $('.alert-danger').removeClass('hide');
                    }
                    $(this).attr('disabled', false);
                    oTable.draw();
                },
                error: function (e) {
                    alert('Error: ' + e);
                }
            });
            
            $(this).parent().parent().parent().parent().modal('hide');
        }
        else
        {
            alert("Reason is required");
        }
    });

    
    });
</script>
@stop