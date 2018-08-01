@extends('theme.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
           <h1 class="page-header">All Documents</h1>
    </div>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th class="header">Name <i class="fa fa-sort"></i></th>
        <th class="header">Created <i class="fa fa-sort"></i></th>
        <th class="header">Last Updated <i class="fa fa-sort"></i></th>
        <th class="header">Exported <i class="fa fa-sort"></i></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($documents as $document)
            <tr>
              <td>{{$document->name}}</td>
              <td>{{$document->created_at}}</td>
              <td>{{$document->updated_at}}</td>
              <td>{{$document->exported}}</td>
              <td><a class="btn btn-primary" href="/edit-document/{{$document->id}}" role="button">Edit Document</a></td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
