@extends('admin.dashboard.layouts.master')

@section('title', 'العناوين')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('admin.address.index') }}">العناوين</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> قائمة العناوين
        </h1>


        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <a href="{{ route('admin.address.create', 0) }}" class="btn btn-primary"><i
                                    class="fa fa-plus-square"></i></a>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> اسم الشارع </th>
                                        <th> البلد </th>
                                        <th> المدينة </th>
                                        <th> الحي </th>
                                        <th> الشريك (المتجر) </th>
                                        <th> تاريخ الانشاء </th>
                                        <th> اجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $key => $record)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $record->street_name }} </td>
                                            <td> {!! $record->country->name !!} </td>
                                            <td> {!! $record->city->name !!} </td>
                                            <td> {!! $record->nighborhood->name !!} </td>
                                            <td> {!! $record->store->store_name !!} </td>
                                            <td> {{ $record->created_at }} </td>

                                            <td>

                                                <a href="{{ route('admin.address.show', [$record->id]) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('admin.address.edit', [$record->id]) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                                <form id="delete-form-{{ $record->id }}"
                                                    action="{{ route('admin.address.destroy', $record->id) }}"
                                                    style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('هل أنت متأكد أنك تريد حذف السجل؟')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $record->id }}').submit();
                                                    } else {
                                                    event.preventDefault();
                                                    }"><i class="fa fa-trash"></i>


                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>

    </div>

@endsection
@section('myjsfile')

@endsection
