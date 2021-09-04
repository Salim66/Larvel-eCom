@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-2 col-md-3 d-none d-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Overview <sapn class="sr-only">(current)</sapn></a>
                    </li>
                    <li class="nav-item">
                        <a href="nav-link" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="nav-link" href="#">Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a href="nav-link" href="#">Export</a>
                    </li>
                </ul>

                <ul class="nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Nav item</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Nav item again</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">One more nav</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Another nav item</a>
                    </li>
                </ul>
            </nav>


            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <h1>Dashboard</h1>
                <div class="col-md-6">
                    <h1>BMW</h1>
                    <h1>Add New</h1>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'product.store', 'files' => true]) !!}
                            <div class="form-group">
                                {!! Form::label('Proname', 'Name') !!}
                                {!! Form::text('pro_name', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Code', 'Code') !!}
                                {!! Form::text('pro_code', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::text('pro_price', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description', 'Description') !!}
                                {!! Form::text('pro_info', null, array('class' => 'form-control', )) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('image', 'Image') !!}
                                {!! Form::text('image', null, array('class' => 'form-control', )) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Sall Price', 'Sall Price') !!}
                                {!! Form::text('sell_price', null, array('class' => 'form-control', )) !!}
                            </div>

                            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
