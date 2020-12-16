@extends('admin.layout.master')
@section('title', 'Degrees')
@section('parentPageTitle', '')
@section('content')
    <div class="row clearfix" id="Degrees">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Degrees</strong></h2>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-raised btn-primary btn-round waves-effect float-right"
                                    @click="createDegree">
                                <i class="zmdi zmdi-plus"></i>Add
                            </button>
                        </div>
                    </div>


                </div>
                <div class="body">
                    <p><code>List of degrees.</code></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            <tr v-for="(degree,index) in degrees" :key="degree.id">
                                <td>@{{ ++index }}</td>
                                <td>@{{ degree.name }}</td>
                                <td>@{{ degree.created_at }}</td>
                                <td class="project-actions text-center">
                                    <div class="btn-group btn-group-sm">
                                    <a class="btn btn-info btn-sm" href="#" @click="editDegree(degree)">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" @click="deleteDegree(degree)">
                                        <i class="fas fa-pencil-alt"></i> Delete
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="footable-paging">
                                <td colspan="10">
                                    <div class="row">
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
                        <h4 class="title" id="createModalLabel">Degree <span v-html="formType"></span></h4>
                    </div>
                    <form @submit.prevent="formType == 'edit' ? updateDegree() : storageDegree()" method="post">
                        <div class="modal-body">
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group required">
                                        <label for="name">Name</label>
                                        <input type="text" name="name"
                                               class="form-control" v-model="degreeForm.name"
                                               placeholder="Enter degree name"
                                               :class="{ 'is-invalid': degreeForm.errors.has('name') }">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
        })


        var myObject = new Vue({
            el: '#Degrees',
            data: {
                degrees:null,
                degreeForm: new Form({
                    id: null,
                    name: ''
                }),
                formType:'create',
            },
            created(){
                this.getDegree();
            },
            methods: {
                getDegree() {
                    axios.get('/api/degree').then((response) => {
                        if (response.data.Success == true) {
                            this.degrees = response.data.Data;
                        }
                    }).catch((error) => {
                        console.log("Errors: ",error);
                    });
                },
                createDegree(){
                    this.degreeForm.reset();
                    this.formType = "create";
                    $('#createModal').modal('show');

                },
                storageDegree() {
                    this.degreeForm.post('/api/degree/create').then((response) => {
                        if (response.data.Success == true) {
                            Toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.degreeForm.reset();
                            this.getDegree();
                            $('#createModal').modal('hide');
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }
                    }).catch((error) => {
                        console.log("Errors: ",error);
                    });
                },
                editDegree(degree){
                    // this.degreeForm.id = degree.id;
                    // this.degreeForm.name = degree.name;
                    this.degreeForm.reset();
                    this.degreeForm.fill(degree);
                    this.formType = "edit";
                    $('#createModal').modal('show');

                },
                updateDegree() {
                    this.degreeForm.put('/api/degree/'+this.degreeForm.id+'/update').then((response) => {
                        if (response.data.Success == true) {
                            Toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.degreeForm.reset();
                            this.getDegree();
                            $('#createModal').modal('hide');
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }
                    }).catch((error) => {
                        console.log("Errors: ",error);
                    });
                },
                deleteDegree(degree){

                    axios.delete('/api/degree/'+degree.id+'/delete').then((response) => {
                        if (response.data.Success == true) {
                            Toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.getDegree();
                            $('#createModal').modal('hide');
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
