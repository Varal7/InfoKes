@extends('template')

@section('title') Rédiger un article @stop

@section('content')
<div class="row white form-container">
	{{Form::open(array('class'=>'col s12','id'=>'formCreate', 'url'=>'article','files' => true))}}
	<div class="row">
	 	@foreach ($errors->all() as $error)
	 		<div class="alert">{{$error}}</div>
        @endforeach
		<div class="input-field col s12">
			<input name="titre" type="text" class="{!! $errors->has('titre') ? 'invalid' : '' !!}" value="{{old('titre')}}">
			<label for="titre">Titre</label>
			{!! $errors->first('titre', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="input-field col s12">
			<input name="auteur" type="text" class="{!! $errors->has('auteur') ? 'invalid' : '' !!}" value="{{old('auteur')}}">
			<label for="auteur">Auteur(s)</label>
			{!! $errors->first('auteur', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="input-field col s12">
			<select name="cat_id" value="{{old('cat_id')}}">
				<option disabled selected>Choisi la rubrique dans laquelle ton veux publier ton article</option>
				@foreach($categories as $cat)
				<option class="blue-text darken-3" value="{{$cat->id}}">{{$cat->name}}</option>
				@endforeach
			</select>
			<label>Rubrique</label>
			{!! $errors->first('cat_id', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="input-field col s12">
			<textarea name="presentation" class="materialize-textarea {!!$errors->has('presentation') ? 'invalid' : '' !!}">{{old('presentation')}}</textarea>
			<label for="presentation">Présentation de l'article</label>
			{!! $errors->first('presentation', '<small class="">:message</small>') !!}
		</div>
		<div class="input-field col s12">
			<label for="contenu" class="active">Écrit ton article ici</label>
			<textarea id="textarea" name="contenu" class="materialize-textarea validate {!!$errors->has('contenu') ? 'invalid' : '' !!}">{{old('contenu')}}</textarea>
			{!! $errors->first('contenu', '<small class="error-message">:message</small>') !!}
		</div>
		<p>Ou poste un fichier Word ou OpenOffice (mais ton article ne sera pas immédiatement sur le site).</p>
		<div class="file-field input-field">
			<div class="btn blue darken-3">
				<span>Article</span>
				<input type="file" name="fichier">
			</div>
			<div class="file-path-wrapper">
				<input class="file-path {!!$errors->has('fichier') ? 'invalid' : '' !!}" type="text" placeholder="Tu peux uploader un fichier Word ou Open Office">
			</div>
			{!! $errors->first('fichier', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="file-field input-field">
			<div class="btn blue darken-3">
				<span>Photos</span>
				<input type="file" name="image" multiple>
			</div>
			<div class="file-path-wrapper">
				<input class="file-path {!!$errors->has('image') ? 'invalid' : 'v' !!}" type="text" placeholder="Upload une ou plusiers photos pour illuster ton article" multiple>
			</div>
			{!! $errors->first('image', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="input-field col s12">
			<input id="date" name="published_at" type="date" class="datepicker {!!$errors->has('date') ? 'invalid' : '' !!}" value="{{Carbon\Carbon::today()->toDateString()}}">
			<label for="published_at">Date de publication</label>
			{!! $errors->first('date', '<small class="error-message">:message</small>') !!}
		</div>
		<div class="input-field col s12 center-align">
			<input type="submit" class="btn blue darken-3" value="Publier">
		</div>
	</div>
	{{Form::close()}}
</div>
</div>

@stop