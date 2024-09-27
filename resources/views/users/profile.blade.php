@foreach ($usersList as $user)
    <h1>{{ $user['nome'] }}</h1>
    <h1>{{ $user['eta'] }}</h1>
@endforeach

