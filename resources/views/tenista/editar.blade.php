@extends('layouts.app')

@section('content')	
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ url('/tenista') }}">Tenista {{auth()->guard('tenista')->user()->nome}}</a></li>
                    <li class="active">Editar</li>
                </ol>

                <div class="panel-body">

            <h3 class="page-header">Dados do Tenista</h3>
				<form action="{{ route('tenista.atualizar', $tenista->id) }}" method="POST">
					{{csrf_field()}}
					<div class="row">
					<input type="hidden" name="_method" value="put">
	<div class="{{ $errors->has('nome') ? 'has-error' : '' }} form-group col-md-12">
		<label for="nome">Nome</label>
		<input type="text" name="nome" value="{{$tenista->nome}}">*
		@if($errors->has('nome'))
	        <span class="help-block">
	            <strong>{{ $errors->first('nome') }}</strong>
	        </span>
	    @endif
	</div>
		
	<div class="form-group col-md-12 {{ $errors->has('sexo') ? 'has-error' : '' }}">
		<label>Sexo*</label>
		<label class="col-md-offset-1"/>
		<input type="radio" name="sexo" value="M">Masculino<br/>
		<input type="radio" name="sexo" value="F">Feminino<br/>
		@if($errors->has('sexo'))
            <span class="help-block">
                <strong>{{ $errors->first('sexo') }}</strong>
            </span>
        @endif

	</div>
	
	<div class="{{ $errors->has('telefone') ? 'has-error' : '' }} form-group col-md-12">
		<label for="telefone">Telefone</label>
		<input type="text" name="telefone" value="{{$tenista->telefone}}" id="phone">*
		@if($errors->has('telefone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                            @endif
	</div>
	<div class="form-group col-md-12">
                        <label>Estado</label>
                            
                        
                            {{Form::select('estado_id', $estados, null, ['id' => 'estado_id'])}}
                        
                    </div>
                    <div class="form-group col-md-12">
                        <label>Cidade</label>
                            
                        
                        
                            <select name="cidade_id" id="cidade_id">
                                <option value="{{$tenista->cidade->id}}">{{$tenista->cidade->nome}}</option>}
                                
                            </select>*
                        
                    </div>
	<div class="{{ $errors->has('datadenascimento') ? 'has-error' : '' }} form-group col-md-12">
		<label for="DatadeNascimento">Data de Nascimento</label>
		<input type="date" name="datadenascimento" value="{{date_format(date_create_from_format('Y-m-d', $tenista->datadenascimento), 'd/m/Y')}}"></input>*
		@if($errors->has('datadenascimento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('datadenascimento') }}</strong>
                                </span>
                            @endif
			
	</div>
	<div class="form-group col-md-12 {{ $errors->has('cidade') ? 'has-error' : '' }}">
							<label for="academia_id">Academia</label>
							
								<?php 
								
								$academias = DB::table('academias')->get();
								$valido = sizeof($academias);
								if ($valido > 0) {
									
									echo '<select name="academia_id">';
									foreach ($academias as $academia) {
										echo ('<option value="'.$academia->id.'">'.$academia->nome.'</option>');
									}
									echo '</select>';

								}else{
									echo ('<label for="academia_id">: O administrador deve cadastrar Academia</label>');
								}	

								?>	*	
							
							@if($errors->has('academia'))
							<span class="help-block">
								<strong>{{ $errors->first('cidade') }}</strong>
							</span>
							@endif
						</div>
	<div class="form-group col-md-12">
		<input type="hidden" name="statustenista_id" value=" value="{{$tenista->statustenista->id}}"">
		<button class="btn btn-info">Salvar</button>
		<a href="#" class="btn btn-default">Cancelar</a>
	</div>
</form>
  </div>
            </div>
        </div>
    </div>
</div>
{{Html::script('js/jquery.maskedinput.js')}}
{{Html::script('js/jquery.js')}}
<!-- InputMask -->
<script src="{{asset('js/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script>

  /* Load positions into postion <selec> */
  $( "#estado_id" ).change(function() 
  {
    $.getJSON("/estado/"+ $(this).val() +"/cidades", function(jsonData){
        select = '<select name="cidade_id" class="form-control" required id="cidade_id" >';
          $.each(jsonData, function(i,data)
          {
               select +='<option value="'+data.id+'">'+data.nome+'</option>';
           });
        select += '</select>';
        $("#cidade_id").html(select);
    });
  });
</script>

@endsection