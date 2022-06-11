@extends('layouts.layout')
@section('content')
    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Изменить квартиру</h1>
                        </div>
                        <form method="post" action="{{ route('flats.update', ['flat' => $oFlat->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="Название"
                                           value="{{ $oFlat->name }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="type">Тип</label>
                                    <input type="text" name="type"
                                           class="form-control @error('type') is-invalid @enderror" id="type"
                                           placeholder="Тип"
                                           value="{{ $oFlat->type }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           placeholder="Цена"
                                           value="{{ $oFlat->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="mortgage">Ипотека</label>
                                    <select type="text" name="mortgages[]"
                                            multiple="multiple"
                                            class="form-select @error('mortgage') is-invalid @enderror" id="mortgage">
                                        @php($aSelectedMortgages = $oFlat->mortgages->pluck('id')->all())
                                        @foreach($aMortgages as $oMortgage)
                                            <option value="{{ $oMortgage->id }}"
                                                    @if(in_array($oMortgage->id, $aSelectedMortgages))
                                                    selected
                                                    @endif>
                                                {{ $oMortgage->name }}
                                            </option>
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
