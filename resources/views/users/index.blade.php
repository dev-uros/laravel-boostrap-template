@extends('layouts.main')

@section('content')
    @include('partials.nav', ['title' => 'Users'])

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover caption-top">
            <caption>
                List of users
                <a class="btn btn-success" href="{{route('users.create')}}">
                    <i class="bi bi-plus-lg"></i>
                </a>
            </caption>
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
            @forelse($users as $user)
            <tr>
                <th scope="row">1</th>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>
                <td class="text-center">
                    <a class="btn" href="{{ route('users.show',$user->id) }}">
                        <i class="bi bi-three-dots-vertical"></i>
                    </a>
                </td>

            </tr>

            @empty
                <tr>
                    <td class="text-center" colspan="5">No Users Found</td>
                </tr>
            @endforelse



            </tbody>
        </table>
    </div>
@endsection
