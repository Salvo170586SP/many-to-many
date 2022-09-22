@extends('home')


@section('contain')
    <div class="row">
        <div class="col-12">
            <h1>Users</h1>
        </div>
        <div class="col-12">
            <table class="table shadow">
                <thead>
                    <tr>
                        <th scope="col">NOME</th>
                        <th scope="col">EMAIL</th>
                        <th>--</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('users.hobbies.showHobbies', $user->id) }}">Vedi hobbies</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
