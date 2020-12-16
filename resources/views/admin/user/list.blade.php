@extends('admin.layout.master')
@section('title', 'Users')
@section('parentPageTitle', 'User')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Users</strong> List</h2>
                </div>
                <div class="body">
                    <p><code>List of users.</code></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Registered By</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-capitalize">{{ $user->type }}</td>
                                    <td>@if($user->google_id == null)Manually @else Google @endif</td>
                                    <td>{{ date("Y-m-d",strtotime($user->created_at)) }}</td>
                                    <td class="project-actions text-center">
                                        <form id="destroy-form" action="{{ route('user.destroy',$user->id) }}"
                                              method="POST">
                                            <div class="btn-group btn-group-sm">
                                                <a class="btn btn-dark btn-sm"
                                                   href="{{ route('user.resumes',$user->id) }}">
                                                    <i class="fas fa-pencil-alt"></i> Resumes
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
                                                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }}
                                                    of {{ $users->total() }}
                                                    entries
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                {{ $users->links() }}
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
