@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-offset-11 col-sm-1">
        <div class="panel">
            <a href="{{ url('patients/add') }}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
        </div>
    </div>
    <div class="col-sm-12">
        <table class="table table-bordered table-responsive table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date Registered</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center">
                @if(count($patients) < 1)
                <tr>
                    <td colspan="5">
                        No records found.
                    </td>
                </tr>
                @endif
                @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ $patient->date_registered }}</td>
                    <td style="width: 50px;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-menu-hamburger"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("patients/{$patient->id}/cases/add") }}">New Case</a></li>
                                <li><a href="{{ url("patients/edit/{$patient->id}") }}">Edit</a></li>
                                <li><a href="{{ url("patients/delete/{$patient->id}") }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-12">
        <div class="pull-right">
            {!! $result->render() !!}
        </div>
    </div>
</div>
@endsection