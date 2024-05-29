@extends('layouts.admin')

@section('content')
    <div class="container mt-5 d-flex">
        <div class="container">
            @include('admin.partials.validation_error')
            <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" placeholder="Inserisci il nome" value="{{ old('name') }}"
                        aria-describedby="NameHelpId" />
                    <div id="NameHelpId" class="form-text">Scrivi il nome qui</div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="responsabile" class="form-label">Responsabile</label>
                    <input type="text" class="form-control @error('responsabile') is-invalid @enderror"
                        name="responsabile" id="responsabile" placeholder="Inserisci il responsabile (opzionale)"
                        value="{{ old('responsabile') }}" aria-describedby="ResponsabileHelpId" />
                    <div id="ResponsabileHelpId" class="form-text">Scrivi il nome del responsabile qui</div>
                    @error('responsabile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                        id="date" value="{{ old('date') }}" aria-describedby="DateHelpId" />
                    <div id="DateHelpId" class="form-text">Seleziona la data</div>
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hour" class="form-label">Hour</label>
                    <input type="time" class="form-control @error('hour') is-invalid @enderror" name="hour"
                        id="hour" value="{{ old('hour') }}" aria-describedby="HourHelpId" />
                    <div id="HourHelpId" class="form-text">Seleziona l'ora</div>
                    @error('hour')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        rows="3" aria-describedby="DescriptionHelpId">{{ old('description') }}</textarea>
                    <div id="DescriptionHelpId" class="form-text">Scrivi la descrizione qui</div>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Img</label>
                    <input type="file" class="form-control @error('img') is-invalid @enderror" name="img"
                        id="img" aria-describedby="ImgHelpId" />
                    <div id="ImgHelpId" class="form-text">Aggiungi la tua immagine</div>
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Crea</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome Evento</th>
                        <th scope="col">Responsabile</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ora</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr class="">
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->responsabile }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->hour }}</td>
                            <td class="w-25 text-center">
                                <a class="btn btn-dark" href="">Show </a>
                                <a class="btn btn-dark" href="">Edit </a>
                                <a class="btn btn-danger" href="">Delete </a>

                            </td>
                        </tr>
                    @empty
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
@endsection
