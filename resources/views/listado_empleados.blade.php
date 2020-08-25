@extends('layouts.app')

@section('content')
  <div class="container">
    <section>
      <h3 class="h3 text-center mb-5">Listado Usuarios</h3>
      <!--Grid row-->
      <div class="row wow">
        <!--Grid column-->
        <div class="col-12 px-4">
          @include('includes.employeer_list', $employees)
        </div>
        <!--/Grid column-->
      </div>
      <!--/Grid row-->
      @include('includes.modal-info', array('employer' => $employees, 'data' => $data))
    </section>
    <!--Section: Main features & Quick Start-->
@endsection