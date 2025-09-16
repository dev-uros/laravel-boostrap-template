@extends('layouts.main')

@section('content')
    @include('partials.nav', ['title' => 'Create User'])

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('users.store')}}">
            @csrf
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input name="name" value="{{old('name')}}" type="text" class="form-control" id="validationCustom01" placeholder="Uros" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Last name</label>
                <input name="surname" value="{{old('surname')}}" type="text" class="form-control" id="validationCustom02" placeholder="Minic" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustomEmail" class="form-label">Email</label>
                <input name="email" value="{{old('email')}}" type="email" class="form-control" id="validationCustomEmail" placeholder="email@gmail.com"
                       required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="hidden" name="is_admin" value="0">
                    <input type="checkbox" name="is_admin" value="1" class="form-check-input" id="checkChecked" {{ old('is_admin') ? 'checked' : '' }}>
                    <label class="form-check-label" for="checkChecked">Admin</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>

    </div>

    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
