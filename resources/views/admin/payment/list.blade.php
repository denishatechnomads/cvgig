@extends('admin.layout.master')
@section('title', 'Payment')
@section('parentPageTitle', 'All Payment')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><strong>Payments</strong></h2>
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                </div>
                <div class="body">
                    <p><code>List of payments.</code></p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Payment #</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Discount</th>
                                <th>Total Amount</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $payment->payment_id }}</td>
                                    <td>
                                        {{ $payment->user->name }}<br>
                                        {{ $payment->user->email }}
                                    </td>
                                    <td>{{ $payment->amount }} $</td>
                                    <td>{{ $payment->discount }} $</td>
                                    <td>{{ $payment->total_amount }} $</td>
                                    <td class="text-center">
                                        <span class="badge badge-{{ $payment->payment_status }}">{{ $payment->payment_status }}</span>
                                    </td>

                                    <td class="project-actions text-center">
{{--                                        <form id="destroy-form" action="{{ route('order.destroy',$payment->id) }}"--}}
{{--                                              method="POST">--}}
                                            <div class="btn-group btn-group-sm">
                                                <a class="btn btn-info btn-sm"
                                                   href="{{ route('payment.show',$payment->id) }}">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button class="btn btn-danger btn-sm" type="submit"><i--}}
{{--                                                        class="fas fa-trash"></i>Delete--}}
{{--                                                </button>--}}
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
                                            Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }}
                                            of {{ $payments->total() }}
                                            entries
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            {{ $payments->links() }}
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
