@extends('templating.default')



@php
    $title ="Data Customer";
    $preTitle ="";
@endphp

@push('page-action')


@endpush

@section('isi')
<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <a href="{{ route('customer.create') }}" class="btn btn-primary">Create Customer</a>

        </div>
      </div>
    </div>
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
          <tr>
            <th>Code</th>
            <th>Customer Description</th>
            <th>Customer Address</th>
            <th>Customer Telp</th>
            <th width="1%"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customer as $customer)


          <tr>
            <td>{{ $customer->cscode}}</td>
            <td>{{ $customer->csdescript }}</td>
            <td>{{ $customer->csaddress}}</td>
            <td>{{ $customer->cstelp }}</td>
            <td>
              <a href="{{ route('customer.edit', $customer->id) }}"class="btn btn-secondary w-100 btn-sm">Edit</a>
            <br></br>
              <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
              @csrf
              @method('DELETE')

              <input type="submit" value="Hapus" class="btn btn-danger btn-sm">

              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
