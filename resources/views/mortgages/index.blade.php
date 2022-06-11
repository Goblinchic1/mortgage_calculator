@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список Ипотек</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список Ипотек</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('mortgages.create') }}" class="btn btn-primary mb-3">Добавить Ипотеку</a>
                @if(count($aMortgages))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Имя</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aMortgages as $oMortgage)
                                <tr>
                                    <td>{{ $oMortgage->id }}</td>
                                    <td>{{ $oMortgage->name }}</td>
                                    <td>
                                        <a href="{{ route('mortgages.edit', ['mortgage' => $oMortgage->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1 form-control mb-2">
                                            <p>Редактировать</p>
                                        </a>
                                        <form action="{{ route('mortgages.destroy', ['mortgage' => $oMortgage->id]) }}"
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
                    <p>Ипотек пока нет</p>
                @endif
            </div>
        </div>
    </section>
@endsection
