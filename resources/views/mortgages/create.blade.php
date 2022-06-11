@extends('layouts.layout')
@section('content')
    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Добавить Ипотеку</h1>
                        </div>
                        <form method="post" action="{{ route('mortgages.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           placeholder="Название">
                                </div>
                                <div class="form-group">
                                    <label for="interest_rate">Процентная ставка</label>
                                    <input type="number" step="0.1" name="interest_rate"
                                           class="form-control @error('interest_rate') is-invalid @enderror" id="interest_rate"
                                           placeholder="Процентная ставка">
                                </div>
                                <div class="form-group">
                                    <label for="years">Максимальный срок</label>
                                    <input type="number" name="years"
                                           class="form-control @error('years') is-invalid @enderror" id="years"
                                           placeholder="Максимальный срок">
                                </div>
                                <div class="form-group">
                                    <label for="min_initial_contribution">Минимальный первоначальный взнос</label>
                                    <input type="number" name="min_initial_contribution"
                                           class="form-control @error('min_initial_contribution') is-invalid @enderror" id="min_initial_contribution"
                                           placeholder="Минимальный первоначальный взнос">
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
