@extends('theme.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Document {{$document->name}}</h1>
    </div>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit values or delete document
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter" id="keyvals">
                                <thead>
                                    <tr>
                                        <th class="header">Key <i class="fa fa-sort"></i></th>
                                        <th class="header">Value <i class="fa fa-sort"></i></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach ($keyvals as $keyval)
                                        <form role="form" method="POST" action="/edit-value/{{$keyval->id}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                            <tr>
                                                <td>{{$keyval->key}}</td>
                                                <td><input name="value" class="form-control value{{$count}}" value="{{$keyval->value}}"></td>
                                                <td><button type="submit" class="btn btn-primary">Save Value</button></td>
                                            </tr>
                                            <?php $count++; ?>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                            <form role="form" method="POST" action="/delete-document/{{$document->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <td><button type="submit" class="btn btn-danger">Delete Document</button></td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
