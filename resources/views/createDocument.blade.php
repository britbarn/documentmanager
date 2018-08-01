@extends('theme.default')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create New Document</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add as many fields as desired
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" method="POST" action="/create-document" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input name="name" class="form-control name" placeholder="Document Name">
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped tablesorter" id="keyvals">
                                    <thead>
                                        <tr>
                                            <th class="header">Key <i class="fa fa-sort"></i></th>
                                            <th class="header">Value <i class="fa fa-sort"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input name="key1" class="form-control key1" placeholder="Enter Key"></td>
                                            <td><input name="value1" class="form-control value1" placeholder="Enter value"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Document</button>
                            <button type="button" class="btn btn-success" onclick="addField()">Add Field</button>
                            <button type="button" class="btn btn-danger" onclick="deleteField()">Delete Field</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function(){
        x = 1;
        console.log(x);
    });

    function addField() {
        x++;
        console.log(x);
        $("#keyvals").find('tbody')
        .append($('<tr>')
            .append($('<td>')
                .append($('<input class="form-control key'+ x + '" placeholder="Enter Key" name="key'+ x + '">'))
            )
            .append($('<td>')
                .append($('<input class="form-control value'+ x + '" placeholder="Enter Value" name="value'+ x + '">'))
            )
        );
    }

    function deleteField() {
        document.getElementById("keyvals").deleteRow(x);
        x--;
    }
</script>
@endsection
