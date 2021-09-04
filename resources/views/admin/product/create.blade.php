@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <div class="row">
           @include('admin.layouts.sidebar')

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
                                {!! Form::number('pro_code', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('price', 'Price') !!}
                                {!! Form::number('pro_price', null, array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Description', 'Description') !!}
                                {!! Form::text('pro_info', null, array('class' => 'form-control', )) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('image', 'Image') !!}
                                {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('Special Price', 'Special Price') !!}
                                {!! Form::number('spl_price', null, array('class' => 'form-control', )) !!}
                            </div>

                            {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
