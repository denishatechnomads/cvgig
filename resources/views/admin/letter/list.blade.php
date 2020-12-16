@extends('admin.layout.master')
@section('title', 'Types')
@section('parentPageTitle', 'Letters')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Letters</strong></h2>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-raised btn-primary btn-round waves-effect float-right" href="{{ route('letter_type.create') }}">
                                <i class="zmdi zmdi-plus"></i>Add
                            </a>
                        </div>
                    </div>


                </div>
                <div class="body">
                    <p><code>List of templates.</code></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($letters as $letter)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>
                                        @if($letter->parent_id == 0)
                                            Main
                                        @else
                                            Sub
                                        @endif
                                    </td>
                                    <td>{{ $letter->name }}</td>
                                    <td>{{ $letter->description }}</td>
                                    <td>{{ date("Y-m-d",strtotime($letter->created_at)) }}</td>
                                    <td class="project-actions text-center">
                                        <form id="destroy-form" action="{{ route('letter_type.destroy',$letter->id) }}"
                                              method="POST">
                                            <div class="btn-group btn-group-sm">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('letter_type.edit',$letter->id) }}">
                                                    <i class="fas fa-pencil-alt"></i> Edit
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit"><i
                                                        class="fas fa-trash"></i>Delete
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="10">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            Showing {{ $letters->firstItem() }} to {{ $letters->lastItem() }}
                                            of {{ $letters->total() }}
                                            entries
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            {{ $letters->links() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
