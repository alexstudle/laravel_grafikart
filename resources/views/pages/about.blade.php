@extends("default")
@section('title', $title)


@section('content')
    <h1>{{ $title }}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda consequatur consequuntur cupiditate dignissimos distinctio doloremque est excepturi facere, itaque laboriosam minus nostrum, omnis quia voluptatum. Aliquam iusto recusandae sint.</p>

    <ul>
        @forelse($numbers as $number)
            <li>{{ $number }}</li>
        @empty
            <li>Aucun chiffre</li>
        @endforelse
    </ul>

@endsection

@section('sidebar')

    @parent

    <h3>À propos</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus odit, saepe! Accusamus accusantium adipisci commodi consectetur consequatur dolores eos inventore, ipsam iure nemo odit optio pariatur praesentium, provident veniam, voluptas.</p>

@endsection