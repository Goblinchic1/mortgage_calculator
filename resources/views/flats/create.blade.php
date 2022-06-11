@extends('layouts.layout')
@section('content')
    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Добавить квартиру</h1>
                        </div>
                        <form method="post" action="{{ route('flats.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="Название">
                                </div>
                                <div class="form-group">
                                    <label for="type">Тип</label>
                                    <input type="text" name="type"
                                           class="form-control @error('type') is-invalid @enderror" id="type"
                                           placeholder="Тип">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           placeholder="Цена">
                                </div>
                                <div class="form-group">
                                    <label for="mortgage">Ипотека</label>
                                    <select type="text" name="mortgages[]"
                                            multiple="multiple"
                                           class="form-select @error('mortgage') is-invalid @enderror" id="mortgage">
                                        @foreach($aMortgages as $oMortgage)
                                        <option value="{{ $oMortgage->id }}">{{ $oMortgage->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
