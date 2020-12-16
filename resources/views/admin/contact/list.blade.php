@extends('admin.layout.master')
@section('title', 'Contacts List')
@section('parentPageTitle', 'User Contacts')
@section('content')
    <div class="row clearfix" id="Degrees">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>User Contacts</strong></h2>
                        </div>
                    </div>


                </div>
                <div class="body">
                    <p><code>List of user contacts.</code></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ date("Y-m-d",strtotime($contact->created_at)) }}</td>
                                    <td class="project-actions text-center">
                                        <form id="destroy-form" action="{{ route('contacts.destroy',$contact->id) }}"
                                              method="POST">
                                            <div class="btn-group btn-group-sm">
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
                                            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }}
                                            of {{ $contacts->total() }}
                                            entries
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            {{ $contacts->links() }}
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

        {{--  Create Model --}}
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="title" id="createModalLabel">Create Degree</h4>
                    </div>
                    <form @submit.prevent="createDegree" method="post">
                        <div class="modal-body">
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group required">
                                        <label for="name">Name</label>
                                        <input type="text" name="name"
                                               class="form-control" v-model="degreeForm.name"
                                               placeholder="Enter degree name">
                                        <has-error :form="degreeForm" field="name"></has-error>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-default btn-round waves-effect">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.js"></script>
    <script src="https://unpkg.com/axios-mock-adapter/dist/axios-mock-adapter.js"></script>
    <script src="https://unpkg.com/vform"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

    <script>
        const {Form, HasError, AlertError} = window.vform
        // Register the components
        Vue.component(HasError.name, HasError)
        Vue.component(AlertError.name, AlertError)

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        var myObject = new Vue({
            el: '#Degrees',
            data: {
                degreeForm: new Form({
                    id: null,
                    name: ''
                })
            },
            methods: {
                createDegree() {
                    this.degreeForm.post('/api/degree/create').then((response) => {
                        if (response.data.Success == true) {
                            Toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.degreeForm.reset();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }
                    }).catch((error) => {
                        console.log("Errors: ",error);
                    });
                }
            }
        })
    </script>
@stop
