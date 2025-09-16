@extends('layouts.main')

@section('content')
    @include('partials.nav', ['title' => 'users.index'])

    <div class="container">


        <table class="table table-responsive table-striped table-hover caption-top">
            <caption>List of users</caption>
            <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-center">Detail</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr>
                <th scope="row">1</th>
                <td>Uroš</td>
                <td>Minić</td>
                <td>minic.uros.94@gmail.com</td>
                <td class="text-center">
                    <button class="btn">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Marijana</td>
                <td>Minić</td>
                <td>minic.marijana.95@gmail.com</td>
                <td class="text-center">
                    <button class="btn">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Joca</td>
                <td>Gomboca</td>
                <td>jocika@gmail.com</td>
                <td class="text-center">
                    <button class="btn">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                </td>
            </tr>

            </tbody>
        </table>


    </div>
@endsection
