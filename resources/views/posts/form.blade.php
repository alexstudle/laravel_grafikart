<?php
    if($post->id){
        $options = ['method' => 'put', 'url' => action('PostsController@update', $post)];
    } else {
        $options = ['method' => 'post', 'url' => action('PostsController@store', $post)];
    }
?>

{!! Form::model($post, $options) !!}

<div class="form-group">
    {!! Form::label('title', 'Titre') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'URL') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Catégorie') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Contenu') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label>
        {!! Form::checkbox('online_available', 1) !!}
        En Ligne ?
    </label>
</div>
<button class="btn btn-primary">Envoyer</button>

{!! Form::close() !!}