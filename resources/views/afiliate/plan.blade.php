
@extends('layouts.app')
@section('contenido')
        <div class="form-group">
          <label for="Tipo" class="col-sm-2 col-form-label">Plan</label>
            <div class="col-sm-10 mb-4">
                @foreach($plans as $plan)
                  <option disabled selected>Planes</option>
                    <option value="{{$plan->name}}">{{$plan->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
</div>

@endsection