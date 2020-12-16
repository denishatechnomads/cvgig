@extends('admin.layout.master')
@section('title', 'Pre written content')
@section('parentPageTitle', '')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Pre written content</strong></h2>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-raised btn-primary btn-round waves-effect float-right" href="{{ route('prewritten_content.create') }}">
                                <i class="zmdi zmdi-plus"></i>Add
                            </a>
                        </div>
                    </div>


                </div>
                <div class="body">
                    <p><code>List of Pre written content.</code></p>
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
                            @foreach($preContents as $preContent)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $preContent->type }}</td>
                                    <td>{{ $preContent->title }}</td>
                                    <td>{!! $preContent->description !!}</td>
                                    <td>{{ date("Y-m-d",strtotime($preContent->created_at)) }}</td>
                                    <td class="project-actions text-center">
                                        <form id="destroy-form" action="{{ route('prewritten_content.destroy',$preContent->id) }}"
                                              method="POST">
                                            <div class="btn-group btn-group-sm">
                                                <a class="btn btn-dark btn-sm"
                                                   href="{{ route('prewritten_content.show',$preContent->id) }}">
                                                    <i class="fas fa-pencil-alt"></i> Detail
                                                </a>
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('prewritten_content.edit',$preContent->id) }}">
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
                                            Showing {{ $preContents->firstItem() }} to {{ $preContents->lastItem() }}
                                            of {{ $preContents->total() }}
                                            entries
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            {{ $preContents->links() }}
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
