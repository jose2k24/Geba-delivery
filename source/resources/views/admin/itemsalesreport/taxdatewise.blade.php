@extends('admin.layout.app')
<style>   
.material-icons{
  margin-top:0px !important;
  margin-bottom:0px !important;
}
</style>

@section ('content')
<div class="container-fluid">
 <div class="row">
<div class="col-lg-12">
    @if (session()->has('success'))
   <div class="alert alert-success">
    @if(is_array(session()->get('success')))
            <ul>
                @foreach (session()->get('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
            @else
                {{ session()->get('success') }}
            @endif
        </div>
    @endif
     @if (count($errors) > 0)
      @if($errors->any())
        <div class="alert alert-danger" role="alert">
          {{$errors->first()}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      @endif
    @endif
    </div>

<div class="col-lg-12">
   
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">{{$title}}</h4>
    </div>
    <div class="card-header card-header-secondary">
    <form class="forms-sample" action="{{route('taxdatewise')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                     <div class="row">
                       <div class="col-md-4"><br>
                        <div class="form-group">
                          <label>{{ __('keywords.Date')}}</label><br>
                          <input type="date" name="sel_date" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4"><br>
                        <div class="form-group"><br>
                          <label></label><br>
                          <button type="submit" class="btn btn-primary">{{ __('keywords.Show Tax Report')}}</button>
                        </div>
                      </div>
                    </div>  
            </form>
       </div><hr>
<div class="container"> <br> 
<table id="datatableDefault" class="table text-nowrap w-100">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>{{ __('keywords.Product Name')}}</th>
            <th>{{ __('keywords.Quantity')}}</th>
        </tr>
    </thead>
    <tbody>
           @if(count($ordd)>0)
          @php $i=1; @endphp
          @foreach($ordd as $ords)
        <tr>
            <td class="text-center">{{$i}}</td>
            <td>{{$ords->product_name}}</td>
            
            <td>{{$ords->sumtax}} ({{$ords->avgtx}} %)</td>

            
        </tr>
          @php $i++; @endphp
                 @endforeach
                  @else
                    <tr>
                      <td>{{ __('keywords.No data found')}}</td>
                      @for ($i = 1; $i < 3; $i++)
                        <td style="display:none"></td>    
                      @endfor
                    </tr>
                  @endif
    </tbody>
</table>
</div>  
</div>
</div>
</div>
</div>
<div>
    </div>

    @endsection
    
</div>