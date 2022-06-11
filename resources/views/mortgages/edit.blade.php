@extends('layouts.layout')
@section('content')
    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Обновить условия ипотеки</h1>
                        </div>
                        <form method="post" action="{{ route('mortgages.update', ['mortgage' => $oMortgage->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="Название"
                                           value="{{ $oMortgage->name }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="interest_rate">Процентная ставка</label>
                                    <input type="number" step="0.1" name="interest_rate"
                                           class="form-control @error('interest_rate') is-invalid @enderror" id="interest_rate"
                                           placeholder="Процентная ставка"
                                           value="{{ $oMortgage->interest_rate }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="years">Максимальный срок</label>
                                    <input type="number" name="years"
                                           class="form-control @error('years') is-invalid @enderror" id="years"
                                           placeholder="Максимальный срок"
                                           value="{{ $oMortgage->years }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="min_initial_contribution">Минимальный первоначальный взнос</label>
                                    <input type="number" name="min_initial_contribution"
                                           class="form-control @error('min_initial_contribution') is-invalid @enderror" id="min_initial_contribution"
                                           placeholder="Минимальный первоначальный взнос"
                                           value="{{ $oMortgage->min_initial_contribution }}"
                                    >
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
