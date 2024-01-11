@include('header.header')
    <div class="container">
        <h2>Add New Item</h2>
        {!! Form::open(['route' => 'stock.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Item Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('item_code', 'Item Code') !!}
                {!! Form::text('item_code', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::number('price', null, ['class' => 'form-control', 'required', 'step' => '0.01', 'min' => '0']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', ['class' => 'form-control-file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('quantity', 'Quantity') !!}
                {!! Form::number('quantity', null, ['class' => 'form-control', 'required', 'min' => '0']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Item', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
