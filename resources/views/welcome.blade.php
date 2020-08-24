@extends('layouts.app')

@section('content')
  <div class="container">

    <section>

      <h3 class="h3 text-center mb-5">Listado Usuarios</h3>

      <!--Grid row-->
      <div class="row wow">

        <!--Grid column-->
        <div class="col-12 px-4">

          <!--First row-->
          <div class="row">
            <table class="table">
              <thead>
              <tr>
                <th scope="col">emp_no</th>
                <th scope="col">birth_date</th>
                <th scope="col">first_name</th>
                <th scope="col">last_name</th>
                <th scope="col">gender</th>
                <th scope="col">hire_date</th>
              </tr>
              </thead>
              <tbody>
              @foreach($employees as $employer)
                <tr>
                  <th scope="row">{{$employer->emp_no}}</th>
                  <td>{{$employer->getBirthDate()}}</td>
                  <td>{{$employer->first_name}}</td>
                  <td>{{$employer->last_name}}</td>
                  <td>{{$employer->gender}}</td>
                  <td>{{$employer->hire_date}}</td>
                </tr>
              @endforeach

              </tbody>
            </table>
            {{ $employees->links() }}
          </div>

        </div>
        <!--/Grid column-->
      </div>
      <!--/Grid row-->

    </section>
    <!--Section: Main features & Quick Start-->

@endsection