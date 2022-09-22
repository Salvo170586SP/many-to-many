@extends('home')


@section('contain')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center my-5">
            <h1>Utente: {{ $user->name }}</h1>
            {{-- <a class="btn btn-primary" href="">Aggiungi hobby</a> --}}
        </div>
        <div class="col-3">
            <div class="form-floating my-5">
                <form action="{{ route('users.hobbies.addHobbies') }}" method="post">
                    @csrf
                    @method('GET')
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <label>Inserisci hobbies</label>
                    <select class="form-select" id="floatingSelect" name="hobby_id" aria-label="Floating label select example">
                        @foreach ($hobbiesOff as $hobby)
                            <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-sm btn-primary my-3" type="submit">Inserisci</button>
                </form>
            </div>
        </div>
        <div class="offset-3 col-5">
            <table class="table shadow">
                <thead>
                    <tr>
                        <th scope="col">HOBBY</th>
                        <th class="d-flex justify-content-end"><a class="btn btn-danger"
                                href="{{ route('users.hobbies.detachAllHobbies', $user) }}">Elimina tutti</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hobbies as $hobby)
                        <tr>
                            <td>{{ $hobby->name }}</td>
                            <td class="d-flex justify-content-end">
                                {{-- <a class="btn btn-secondary mx-2" href="{{ route('users.hobbies.editHobby', [ $hobby->id, $hobby->pivot->user_id]) }}">Modifica Hobby</a> --}}
                                <a class="btn btn-danger"
                                    href="{{ route('users.hobbies.detachHobby', [$hobby->id, $hobby->pivot->user_id]) }}">Elimina</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
