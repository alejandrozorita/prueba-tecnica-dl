@extends('layouts.app')

@section('css')

@endsection

@section('content')
  <div class="container">
    <section>
      <form action="{{route('filterMananager')}}" method="GET">
        @csrf
        <h3 class="h3 text-center mb-5">Buscador</h3>
        <div class="row justify-content-md-center">
          <div class="row mb-3">
            <div class="col-6 px-4"><h4>Seleccionar el manager:</h4><br>
              <select name="manager" id="manager">
                @foreach($managers as $manager)
                  <option value="{{$manager->emp_no}}">{{$manager->first_name}} {{$manager->last_name}}</option>
                @endforeach
              </select></div>
            <div class="col-6 px-4">
              <h4>Selecciona un rango de fechas:</h4>
              <div class=" px-4">
                <label for="from">From</label>
                <input type="date" id="from" name="from"
                       value="1988-01-01">
              </div>
              <div class=" px-4">
                <label for="to">To</label>
                <input type="date" id="to" name="to"
                       value="1993-01-01">
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="row mb-3">
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
          </div>
        </div>
      </form>
    </section>

    @if( ! is_null($employees))
      <section>
        <h3 class="h3 text-center mb-5">Listado Usuarios</h3>
        <!--Grid row-->
        <div class="row wow">
          <!--Grid column-->
          <div class="col-12 px-4">
            @include('includes.employeer_list', array('employer' => $employees, 'data' => $data))
          </div>
          <!--/Grid column-->
        </div>
        <!--/Grid row-->
      </section>
      @include('includes.modal-info')
  @else
      <h5 class="h3 text-center mb-5">No hay usuarios cargados</h5>
  @endif

@endsection