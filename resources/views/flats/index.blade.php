@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список кварир</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список Квартир</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('flats.create') }}" class="btn btn-primary mb-3">Добавить Квартиру</a>
                @if(count($aFlats))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Имя</th>
                                <th>Ежемесячный платежи</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aFlats as $oFlat)
                                <tr>
                                    <td>{{ $oFlat->id }}</td>
                                    <td>{{ $oFlat->name }}</td>
                                    <td>
                                        <ul>
                                            @foreach($oFlat->mortgages as $oMortgage)
                                            <li><b>{{ $oMortgage->name }}:</b> {{ number_format($oMortgage->pivot->monthly_payment, 0, '', ' ' ) }} ₽</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('flats.edit', ['flat' => $oFlat->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1 form-control mb-2">
                                            <p>Редактировать</p>
                                        </a>
                                        <form action="{{ route('flats.destroy', ['flat' => $oFlat->id]) }}"
                                              method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm form-control"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <p>Удалить</p>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Квартир пока нет</p>
                @endif
            </div>
        </div>
    </section>
@endsection
