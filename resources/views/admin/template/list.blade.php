@extends('admin.layout.master')
@section('title', 'Templates')
@section('parentPageTitle', 'Templates')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Templates</strong></h2>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-raised btn-primary btn-round waves-effect float-right" href="{{ route('template.create') }}">
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Path</th>
                                <th>Type</th>
                                <th>Tag</th>
                                <th>Required Image</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($templates as $template)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>
                                        @if($template->image == 'default.png')
                                            <img alt="profile"
                                                 src="{{ asset('images/'.$template->image) }}"
                                                 class="rounded mx-auto d-block"  style="height: 50px; width: 50px">
                                        @else
                                            <img src="{{ Storage::url($template->image) }}"
                                                 class="rounded mx-auto d-block" style="height: 50px; width: 50px">
                                        @endif
                                    </td>
                                    <td>{{ $template->name }}</td>
                                    <td>{{ $template->description }}</td>
                                    <td>{{ $template->path }}</td>
                                    <td>{{ $template->type }}</td>
                                    <td>{{ $template->tag }}</td>
                                    <td>
                                        @if($template->required_image == 1) Yes @else No @endif
                                    </td>
                                    <td>{{ date("Y-m-d",strtotime($template->created_at)) }}</td>
                                    <td class="project-actions text-center">
                                        <form id="destroy-form" action="{{ route('template.destroy',$template->id) }}"
                                              method="POST">
                                            <div class="btn-group btn-group-sm">
{{--                                                <a class="btn btn-dark btn-sm"--}}
{{--                                                   href="{{ route('template.show',$template->id) }}">--}}
{{--                                                    <i class="fas fa-pencil-alt"></i> Detail--}}
{{--                                                </a>--}}
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('template.edit',$template->id) }}">
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
                                            Showing {{ $templates->firstItem() }} to {{ $templates->lastItem() }}
                                            of {{ $templates->total() }}
                                            entries
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            {{ $templates->links() }}
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
