<!DOCTYPE html>
<html>
    <head>
    	<meta charset = "utf-8"/>
        <title>laravel framework demo!</title>
	<link rel="stylesheet" type="text/css" href="<?= url('css/bootstrap.min.css') ?>" />
        <link rel="stylesheet" type="text/css" href="<?= url('css/bootstrap-select.min.css') ?>" />
	<script type="text/javascript" src="<?= url('js/jquery.min.js')?>"></script>
	<script type="text/javascript" src="<?= url('js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?= url('js/bootstrap-select.min.js') ?>"></script>
	<script type="text/javascript">
 	    $('.selectpicker').selectpicker();
 	</script>
    </head>
    <body>
        <div class="row-fluid">
            {{HTML::ul( $errors->all() )}}
            
            {{Form::open(array('url' => 'athome'))}}
                <div class="form-group">
                {{Form::label('led_one','Led One')}}
                {{Form::select('led_one',array('Off','On'),$selected=NULL,array('class'=>'selectpicker'))}}
                </div>
                <div class="form-group">
                {{Form::label('sensors_one','Sensors One')}}
                {{Form::text('sensors_one',Input::old('sensors_one'),array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                {{Form::label('sensors_two','Sensors Two')}}
                {{Form::text('sensors_two',Input::old('sensors_two'),array('class'=>'form-control'))}}
                </div>
                <div class="form-group">
                {{Form::label('temperature','Temperature')}}
                {{Form::text('temperature',Input::old('temperature'),array('class'=>'form-control'))}}
                </div>
                
                {{Form::submit('Create',array('class'=>'btn btn-primary'))}}
                
            {{Form::close()}}
        </div>
    </body>
</html>
