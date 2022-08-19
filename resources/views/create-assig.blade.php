@extends('layouts.app')

@section('styles')
<style>
    label
    {
        float: left;
        margin-left: 7%;

    }
    input
    {

        width: 90%;
    }
    h3{
        margin-top: 2%;
    margin-bottom: 6%;
    }
    #field1,#field2,#field3,#field4,#field5
    {
        background:steelblue;
        color: white;
    }
    #btnNext1,#btnNext2,#btnNext3,#btnNext4
    {
        background: lightcoral;
        width: 150px;
        color: aliceblue;
        margin-top: 500px;
        text-align: center;

    }
    span{
        color: red;
        font-size: medium;
    }
    .error{
        float: left;
        margin-left: 0;
        color: darkred;
        font-size: small;
        margin-left:7%;
    }

</style>
@endsection
@section('content')
<div class="container">
    <div class="wrapper col-md-12">
      
      <form class="form-wrapper form" >
      
        <fieldset class="section is-active" id="field1" >
            <h3>Step 1: Add New Information</h3>
            <div class="form-group row">
            <div class="col-md-4">
                    <label for="name"  class="control-label"><span>*</span>TYPES</label>
                    <input id="shapes_types"  style="width:85% ;" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="shapes_types"  required>
                    <span class="error" id="shapes_types_error"></span>
                </div>
            
                <div class="col-md-4">
                    <label for="latitude" class="control-label"><span>*</span>ΣΥΝΤΕΤΑΓΜΕΝΕΣ</label>
                    <input id="map_coordinates" style="width:85% ;"   type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"  name="map_coordinates"  required>
                    <span class="error" id="map_coordinates_error"></span>
                </div>

                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>ID </label><br> <!-- Assignment ID-->
                    <input id="assignment_id"  style="width:85% ;" type="text" placeholder="Assignment ID" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_id" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_id_error"></span>
                </div>
              
            </div>
            <div class="form-group row">
                
                <div class="col-md-4">

                    <label for="name" class="control-label"><span>*</span>ΔΕ</label><!-- invoice geo ID-->
                    <select  style="width:85% ;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_geo_id"   id="invoice_geo_id">
                   
                    <option value="0" {{ (app('request')->input('invoice_geo_id') == 0)? 'selected': '' }} >Choose invoice geo id</option>
                       
                        @foreach($invoice_geo_ids as $id)
                            <option value="{{$id->invoice_geo_id}}" {{ (app('request')->input('invoice_geo_id') == $id->invoice_geo_id)? 'selected': '' }} > {{$id->invoice_geo_id}}</option>
                        @endforeach
                    </select>
                    <span class="error" id="species_error"></span>
                    
                    
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Τίτλος ΔΕ</label><!-- invoice geo title-->
                    <input id="invoice_geo_title" style="width:85% ;"  type="text" placeholder="Invoice geo title" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_geo_title" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_geo_title_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Τίτλος τιμολογίου</label><!-- invoice  title-->
                    <input id="invoice_title" style="width:85% ;"  type="text" placeholder="Invoice title" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_title" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_title_error"></span>
                </div>
            </div>
            <div class="form-group row">
                 <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Id Τιμολογίου</label><!-- invoice  id-->
                    <input id="invoice_id" style="width:85% ;"  type="text" placeholder="Invoice id" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_id" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_id_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Περιγραφή τιμολογίου</label><!-- invoice  desciption-->
                    <input id="invoice_description" style="width:85% ;"  type="text" placeholder="Invoice description" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_description" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_description_error"></span>
                </div>

                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span> Περιγραφή εντολής</label><!-- assignment  desciption-->
                    <input id="assignment_description" style="width:85% ;"  type="text" placeholder="Assignment description" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_description" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_description_error"></span>
                </div>

            </div>
            <div class="form-group row">
               <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Τύπος ποσότηταςς</label><!-- assignment  type quantity-->
                    <input id="assignment_type_qauntity" style="width:85% ;"  type="text" placeholder="Assignment type quantity" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_type_qauntity" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_type_qauntity_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ολική ποσότητα τιμολογίου</label><!-- Assignment total quantity amount-->
                    <input id="invoice_total_quantity_amount" style="width:85% ;"  type="text" placeholder="Assignment total quantity amount" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_total_quantity_amount" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_total_quantity_amount_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ποσότητα τιμολογίου που απομένει</label><!-- Assignment total quantity amount remaining-->
                    <input id="invoice_total_quantity_amount_remaining" style="width:85% ;"  type="text" placeholder="Assignment total quantity amount remaining" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_total_quantity_amount_remaining" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_total_quantity_amount_remaining_error"></span>
                </div>
            </div>

            <div class="form-group row">
               <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Επιθυμητή ποσότητα εντολής</label><!-- Assignment quantity  order amount desired-->
                    <input id="assignment_quantity_order_amount_desired" style="width:85% ;"  type="text" placeholder="Assignment quantity  order amount desired" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_quantity_order_amount_desired" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_quantity_order_amount_desired_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ποσοστό υπολοίπου</label><!-- assignment  type quantity-->
                    <input id="assignment_quantity_remaining_percentage" style="width:85% ;"  type="text" placeholder="Assignment total quantity amount" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_quantity_remaining_percentage" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_quantity_remaining_percentage_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ποσότητα τιμολογίου που απομένει</label><!-- Assignment  quantity remaining percentage-->
                    <input id="invoice_total_quantity_amount_remaining" style="width:85% ;"  type="text" placeholder="Assignment  quantity remaining percentage" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice_total_quantity_amount_remaining" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_total_quantity_amount_remaining_error"></span>
                </div>
            </div>

            <div class="form-group row">
               <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Υπόλοιπο με την εντολή</label><!-- Assignment quantity remaining amount -->
                    <input id="assignment_quantity_remaining_amount" style="width:85% ;"  type="text" placeholder="Assignment quantity remaining amount" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_quantity_remaining_amount" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_quantity_remaining_amount_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Κατηγορία εντολής</label><!-- assignment  catogary-->
                    <input id="assignment_category" style="width:85% ;"  type="text" placeholder="Assignment category" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_category" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_category_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="user_id"  class="control-label"><span>*</span>Select User</label>

                    <select  style="width:85% ;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="user_id"  id="user_id" >
                    
                        <option value="0" {{ (app('request')->input('type_of_point') == 0)? 'selected': '' }} >Choose users</option>
                       
                        @foreach($users as $user)
                            <option value="{{$user->user_id}}" {{ (app('request')->input('user_id') == $user->name)? 'selected': '' }} > {{$user->name}}</option>
                        @endforeach
                         
                    </select>
                
                    <span class="error" id="user_id_error"></span>
                </div>
               
            </div>

            <div class="form-group row">
            
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ημερομηνία δημιουργίας</label><!-- date of creation-->
                    <input id="current_date" style="width:85% ;"  type="date" placeholder="date of creation" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="current_date" value="{{ old('name') }}"  >
                    <span class="error" id="current_date_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ημερομηνία έναρξης</label><!-- Start date-->
                    <input id="start_date" style="width:85% ;"  type="date" placeholder="Start date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="start_date" value="{{ old('name') }}"  >
                    <span class="error" id="start_date_error"></span>
                </div>

                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Ημερομηνία λήξης</label><!-- end date-->
                    <input id="end_date" style="width:85% ;"  type="date" placeholder="End date" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="end_date" value="{{ old('name') }}"  >
                    <span class="error" id="end_date_error"></span>
                </div>
                
                
                
            </div>
        
            
            <div class="form-group row">
                
                <div class="col-md-8 col-md-offset-8">
                 <input type="submit"  value="submit" id="assign_task" style="float: right;width: 30%;margin-top: 10%;background:peru ; color: white;" class="btn">
               
                 </div>
            </div>
        </fieldset>
      
      </form>
    </div>
  </div>

  @endsection


  @section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<!-- <script type="text/javascript" src="jquery.validate.js"></script> -->\
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">
     var interval = undefined;
$(document).ready(function () {
    $('#btnNext1').on('click', getNextForFieldset1);
    $('#btnNext2').on('click', getNextForFieldset2);
    $('#btnNext3').on('click', getNextForFieldset3);


    $("form").on("submit", function(e){
       var data_array = $("form").serialize();
   
   
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
            
                $.ajax({
                url:"{{url('/create-assig')}}",
                method: "post",
                //dataType:'json',
                    data:{Data:data_array},
                    error: function (request, error) {
                        console.log(arguments);
                        alert(" Can't do because: " + error);
                    },
                success: function(response){
                    
                    alert(response)

                    //$response=response;
                }
            });
    
    });  
   
});


function getDetailsOfpoint(name){
    //alert(name)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Empty the dropdown
        $('#trunk_diameter').find('option').not(':first').remove();
        $.ajax({
           url:"{{url('/get-info-option')}}",
           method: "post",
           dataType:'json',
            data:{TypeOfPoint:name},
            error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            },
           success: function(response){
              
            //  alert(response)

             $response=response;
                for (var i = 0; i<response.length; i++) {
                 //   var id = response[i].id;
                    var dia = response[i].trunk_diameter;
                    var komi_diameter = response[i].komi_diameter;
                    var height = response[i].height;
                    var komi_height = response[i].komi_height;
                    var trunk_slope = response[i].trunk_slope;
                    var available_growth = response[i].available_growth;

                    var option_dia = "<option value='"+dia+"'>"+dia+"</option>";
                    var option_komi_diameter = "<option value='"+komi_diameter+"'>"+komi_diameter+"</option>";
                    var option_height= "<option value='"+height+"'>"+height+"</option>";
                    var option_komi_height = "<option value='"+komi_height+"'>"+komi_height+"</option>";
                    var option_trunk_slope = "<option value='"+trunk_slope+"'>"+trunk_slope+"</option>";
                    var option_available_growth = "<option value='"+available_growth+"'>"+available_growth+"</option>";
                    $("#trunk_diameter").append(option_dia);
                    $("#komi_diameter").append(option_komi_diameter);
                    $("#height").append(option_height);
                    $("#komi_height").append(option_komi_height);
                    $("#trunk_slope").append(option_trunk_slope);
                    $("#available_growth").append(option_available_growth);

                }
            }
       });
    }


    function getDetailsOfCondition(id){
    //alert(name)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Empty the dropdown
        $('#trunk_diameter').find('option').not(':first').remove();
        $.ajax({
           url:"{{url('/get-condition-option')}}",
           method: "post",
           dataType:'json',
            data:{ConditionOptionId:id},
            error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            },
           success: function(response){
              
             //  alert(response)

             $response=response;
                for (var i = 0; i<response.length; i++) {
                 //   var id = response[i].id;
                    var sta = response[i].stability;
                    var komi_condition = response[i].komi_condition;
                    var trunk_condition = response[i].trunk_condition;

                    var option_sta = "<option value='"+sta+"'>"+sta+"</option>";
                    var option_komi_condition = "<option value='"+komi_condition+"'>"+komi_condition+"</option>";
                    var option_trunk_condition= "<option value='"+trunk_condition+"'>"+trunk_condition+"</option>";
           
                    $("#condition_stability").append(option_sta);
                    $("#condition_trunk_status").append(option_trunk_condition);
                    $("#condition_trunk_problems").append(option_trunk_condition);
                    $("#condition_komi_status").append(option_komi_condition);
                    $("#condition_komi_problems").append(option_komi_condition);

                }
            }
       });
    }

    function getDetailsOfExtras(id){
    //alert(name)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Empty the dropdown
        $('#trunk_diameter').find('option').not(':first').remove();
        $.ajax({
           url:"{{url('/get-extra-option')}}",
           method: "post",
           dataType:'json',
            data:{ExtraOptionId:id},
            error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            },
           success: function(response){
              
             //  alert(response)

             $response=response;
                for (var i = 0; i<response.length; i++) {
                 //   var id = response[i].id;
                    var pav = response[i].pavement;
                    var nearby = response[i].nearby;

                    var option_pav = "<option value='"+pav+"'>"+pav+"</option>";
                    var option_nearby = "<option value='"+nearby+"'>"+nearby+"</option>";
           
                    $("#extra_pav").append(option_pav);
                    $("#extra_nearby").append(option_nearby);

                }
            }
       });
    }
</script>

@endsection
