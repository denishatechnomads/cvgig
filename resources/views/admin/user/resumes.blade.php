@extends('admin.layout.master')
@section('title', 'User Resumes')
@section('parentPageTitle', 'Resumes')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Resumes</strong> List</h2>
                </div>
                <div class="body">
                    <p><code>List of user resumes.</code></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Template Name</th>
                                <th>Completed Step</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($resumes as $resume)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>
                                        @if($resume->image == 'default.png')
                                            <img alt="profile"
                                                 src="{{ asset('images/'.$resume->template->image) }}"
                                                 class="rounded mx-auto d-block" style="height: 50px; width: 50px">
                                        @else
                                            <img src="{{ Storage::url($resume->template->image) }}"
                                                 class="rounded mx-auto d-block" style="height: 50px; width: 50px">
                                        @endif
                                    </td>

                                    <td>{{ $resume->template->name }}</td>
                                    <td>{{ $resume->complete_step }}</td>
                                    <td>{{ date("Y-m-d",strtotime($resume->created_at)) }}</td>
                                    <td class="project-actions text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a class="btn btn-info btn-sm"
                                               href="{{ route('user.resume.detail',[$resume->user_id,$resume->id]) }}">
                                                <i class="fas fa-pencil-alt"></i> resume detail
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="10">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            Showing {{ $resumes->firstItem() }} to {{ $resumes->lastItem() }}
                                            of {{ $resumes->total() }}
                                            entries
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            {{ $resumes->links() }}
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
