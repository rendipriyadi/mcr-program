@extends('templating.default')



@php
    $title ="Data User";
    $preTitle ="";
@endphp

@push('page-action')



@endpush

@section('isi')

<div class="panel panel-inverse">

    <div class="panel-body">
      <div class="d-flex">
        <div class="ms-2 d-inline-block">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>

        </div>
      </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Last Seen</th>
                <th>Status</th>

                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
          <tr>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>

            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </td>
            <td>
                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
            </td>
            <td>
                @if(Cache::has('user-is-online-' . $user->id))
                    <span class="text-success">Online</span>
                @else
                    <span class="text-secondary">Offline</span>
                @endif
            </td>

            <td>
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
