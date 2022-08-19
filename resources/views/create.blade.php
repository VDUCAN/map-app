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
      <ul class="steps">
        <li class="is-active">Step 1: Add New Information</li>
        <li>Step 2: Add Condition</li>
        <li>Step 3: Add Action</li>
        <li>Step 4: Extra Details</li>
        <li>Step 5: Add Assignment</li> 
      </ul>
      
      <form class="form-wrapper form" >
      
        <fieldset class="section is-active" id="field1" >
            <h3>Step 1: Add New Information</h3>
            <div class="form-group row">
            <div class="col-md-4">
                    <label for="name"  class="control-label"><span>*</span>Info Name</label>
                    <input id="info_name"  style="width:85% ;" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info_name"  >
                    <span class="error" id="info_name_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Address</label>
                    <input id="info_address"  style="width:85% ;" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="info_address"  >
                    <span class="error" id="info_address_error"></span>                </div>
                <div class="col-md-4">
                    <label for="latitude" class="control-label"><span>*</span>Coordinates</label>
                    <input id="info_coordinates" style="width:85% ;"   type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"  name="info_coordinates"  >
                    <span class="error" id="info_coordinates_error"></span>
                </div>
              
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="latitude" class="control-label"><span>*</span>Latitude</label>
                    <input id="info_latitude" style="width:85% ;" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}"  name="info_lat"  >
                    <span class="error" id="info_latitude_error"></span>                </div>

                <div class="col-md-4">
                    <label for="longitude"  class="control-label" ><span>*</span>Longitude</label>
                    
                    <input id="info_longitude" style="width:85% ;" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}"  name="info_lon"  >
                    <span class="error" id="info_longitude_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="user_id"  class="control-label"><span>*</span>Select User</label>

                    <select  style="width:85% ;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="user_id"  id="user_id" >
                    
                        <option value="0" {{ (app('request')->input('type_of_point') == 0)? 'selected': '' }} >Choose users</option>
                       
                        @foreach($users as $user)
                            <option value="{{$user->user_id}}" {{ (app('request')->input('user_id') == $user->name)? 'selected': '' }} > {{$user->name}}</option>
                        @endforeach
                         
                    </select>
                    </div>
                    <span class="error" id="user_id_error"></span>

                    

            
                
            </div>
            <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Species</label>
                    <select  style="width:85% ;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="species"   id="species">
                   
                    <option value="0" {{ (app('request')->input('species') == 0)? 'selected': '' }} >Choose Species</option>
                       
                        @foreach($species as $specie)
                            <option value="{{$specie->int}}" {{ (app('request')->input('species') == $specie->base_species)? 'selected': '' }} > {{$specie->base_species}}</option>
                        @endforeach
                    </select>
                    <span class="error" id="species_error"></span>
                </div>
           
              
               
                <div class="col-md-4">
                    <label for="name"  class="control-label"><span>*</span>Type of Point</label>
                    <select  style="width:85% ;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="type_of_point"  id="type_of_point" onchange="getDetailsOfpoint(this.value);">
                    
                        <option value="" {{ (app('request')->input('type_of_point') == 0)? 'selected': '' }} >Choose Type of point</option>
                       
                        @foreach($types as $type)
                        
                            <option value="{{$type->type_of_point}}"{{($response && $response->TypeOfPoint==$type->type_of_point)? 'selected' : ''}} > {{$type->type_of_point}}</option>
                        @endforeach
                         
                    </select>
                    <span class="error" id="type_of_point_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Trunk Diameter</label>
                    <select  style="width:85% ;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="trunk_diameter"   id="trunk_diameter" >
                        
                    <option value="">Select Trunk Diameter</option>
                    
                    @if($response)
                        <option value="{{$response->infoOptions['trunk_diameter']}}" selected>{{$response->infoOptions['trunk_diameter']}}</option>
                    @endif
                    </select>
                    <span class="error" id="trunk_diameter_error"></span>
                </div>
                
            </div>
            <div class="form-group row">
               <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Komi Diameter</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" name="komi_diameter"   id="komi_diameter">
                        
                        <option value="">Select Komi Diameter</option>
                        @if($response)
                        <option value="{{$response->infoOptions['komi_diameter']}}" selected>{{$response->infoOptions['komi_diameter']}}</option>
                    @endif
                    </select>
                    <span class="error" id="komi_diameter_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Height</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" style="width:85% ;" name="info_height"   id="height">
                    
                        <option value="" >Select Height</option>
                        @if($response)
                        <option value="{{$response->infoOptions['height']}}" selected>{{$response->infoOptions['height']}}</option>
                    @endif
                        
                    </select>
                    <span class="error" id="height_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Komi Height</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" style="width:85% ;" name="komi_height"   id="komi_height">
                    
                        <option value="" >Select Komi Height</option>
                        @if($response)
                        <option value="{{$response->infoOptions['komi_height']}}" selected>{{$response->infoOptions['komi_height']}}</option>
                    @endif
                        
                    </select>
                    <span class="error" id="komi_height_error"></span>
                </div>
                
                
            </div>
        
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Trunk Slope</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" name="trunk_slope"   id="trunk_slope">
                        
                        <option value="" >Select Trunk Slope</option>
                        @if($response)
                        <option value="{{$response->infoOptions['trunk_slope']}}" selected>{{$response->infoOptions['trunk_slope']}}</option>
                        @endif
                            
                    </select>
                    <span class="error" id="trunk_slope_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Available Growth</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" name="available_growth"   id="available_growth">
                        
                        <option value="" >Select Available Growth</option>
                        @if($response)
                        <option value="{{$response->infoOptions['available_growth']}}" selected>{{$response->infoOptions['available_growth']}}</option>
                    @endif
                            
                    </select>
                    <span class="error" id="available_growth_error"></span>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="control-label"><span>*</span>Image Before</label>
                        <input type="file" id="image_before_id" class="form-control"  style="width:85% ;" name="image_before_id"  =" " accept="image/png, image/jpeg" />  
                        <span class="error" id="image_before_id_error"></span>
                     </div>                        
                </div>
           
               
               
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="control-label"><span>*</span>Image After</label>
                        <input type="file" id="image_after_id" class="form-control"  style="width:85% ;" name="image_after_id"  =" " accept="image/png, image/jpeg" />
                        <span class="error" id="image_after_id_error"></span>
                    </div>
                </div>
            </div>
            
                <div class="col-md-12 row" style="align-items: center;display: block;">
                        <div class="button" id="btnNext1">Next</div>
                </div>
           
          
        </fieldset>
        <fieldset class="section" id="field2">
          <h3>Step 2: Add Condition</h3>
            <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Condition Name</label>
                    <input id="condition_name" style="width:85% ;" type="text" placeholder="Condition Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="condition_name" value="{{ old('name') }}"  >
                    <span class="error" id="condition_name_error"></span>
                </div>

                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Address</label>
                    <input id="condition_address" style="width:85% ;" type="text" placeholder="Address" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="address" value="{{ old('name') }}" >
                    <span class="error" id="condition_address_error"></span>
                </div>

                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Overall Health</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;" name="overall_health"  id="condition_health"  onchange="getDetailsOfCondition(this.value);">
                        
                      <option value="" {{ (app('request')->input('condition_health') == 0)? 'selected': '' }} >Choose Overall health</option>
                       
                       @foreach($conditions as $condition)
                           <option value="{{$condition->id}}" {{ (app('request')->input('condition_health') == $condition->health)? 'selected': '' }} > {{$condition->health}}</option>
                       @endforeach
                   </select>
                            
                    </select>
                    <span class="error" id="condition_health_error"></span>
                </div>
            </div>
            <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Stability</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;" name="stability"  id="condition_stability">
                        
                    <option value="">Select Stability</option>
                    
                    @if($response)
                        <option value="{{$response->conditionOptions['stability']}}" selected>{{$response->conditionOptions['stability']}}</option>
                    @endif
                             
                    </select>
                    <span class="error" id="condition_stability_error"></span>
                </div>
           
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Trunk Status</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;" name="trunk_status"  id="condition_trunk_status">
                       
                    <option value="">Select Trunk Status</option>
                    
                    @if($response)
                        <option value="{{$response->conditionOptions['trunk_condition']}}" selected>{{$response->conditionOptions['trunk_condition']}}</option>
                    @endif
                          
                    </select>
                    <span class="error" id="condition_trunk_status_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Trunk Problems</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;" name="trunk_problems"  id="condition_trunk_problems">
                        
                    <option value="">Select Trunk Problems</option>
                    
                    @if($response)
                        <option value="{{$response->conditionOptions['trunk_condition']}}" selected>{{$response->conditionOptions['trunk_condition']}}</option>
                    @endif
                             
                    </select>
                    <span class="error" id="condition_trunk_problems_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Komi Status</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;" name="komi_status"  id="condition_komi_status">
                        
                    <option value="">Select Komi Status</option>
                    
                    @if($response)
                        <option value="{{$response->conditionOptions['komi_condition']}}" selected>{{$response->conditionOptions['komi_condition']}}</option>
                    @endif
                        
                    </select>
                    <span class="error" id="condition_komi_status_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Komi Problems</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;" name="komi_problems"  id="condition_komi_problems">
                       
                        <option value="">Select Komi Problem</option>
                        
                        @if($response)
                            <option value="{{$response->conditionOptions['komi_condition']}}" selected>{{$response->conditionOptions['komi_condition']}}</option>
                        @endif
                           
                    </select>
                    <span class="error" id="condition_komi_problems_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Diseases</label>
                    <input id="condition_diseases"  style="width:85% ;" placeholder="Diseases" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   name="diseases"   >
                    <span class="error" id="condition_diseases_error"></span>
                </div>
            </div>
            <div class="form-group row">
               
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Recommended</label>
                    <input id="condition_recommended" style="width:85% ;" placeholder="Recommended" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"   name="recommended"  >
                    <span class="error" id="condition_recommended_error"></span>
                </div>
                
            
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Please Select</label>
                        <div class="form-check" id="condition_point_type">
                        
                            <label class="radio-inline" style="padding:5px;"> 
                            <input type="radio"  id="option1" name="status"   checked="checked" value="Point" name="status"  >Point</label>
                            <label class="radio-inline" style="padding:5px;">
                            <input type="radio" id="option2" name="status"  value="Polygon" name="status">Polygon</label>
                        </div>
                        
                </div>
                <div class="col-md-4">
                    <label for="address" class="control-label"><span>*</span>Condition Notes</label>
                    <br>
                    <textarea id="condition_notes" placeholder="Condition Notes" style="width: 85%;margin-left: 7%;" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"   name="condition_notes" rows="6"></textarea>
                    <span class="error" id="condition_notes_error"></span>
                
                </div>

               
                
              
            </div>
            <div class="col-md-12 row" style="align-items: center;display: block;">
                        <div class="button" id="btnNext2">Next</div>
            </div>
        </fieldset>
        <fieldset class="section" id="field3">
          <h3>Step 3: Add Action</h3>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Action Name</label>
                    <input id="action_name"  style="width:85% ;" type="text" placeholder="Action Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="action_name" value="{{ old('name') }}" >
                    <span class="error" id="action_name_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Action Type</label>
                    <input id="action_types" style="width:85% ;"  type="text" placeholder="Action Type" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="action_type"   >
                    <span class="error" id="action_types_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="action_before_id" class="control-label"><span>*</span>Image Before</label>
                    <input type="file"  style="width:85% ;" id="action_before_id" class="form-control" name="action_before_id"  =" " accept="image/png, image/jpeg" />
                    <span class="error" id="action_before_id_error"></span>
                </div>
            </div>
            <div class="form-group row">
                
                <div class="col-md-4">  
                    <label for="action_before_id" class="control-label"><span>*</span>Image After</label>
                    <input type="file" style="width:85% ;"  id="action_after_id" class="form-control" name="action_after_id"  =" " accept="image/png, image/jpeg"/>
                    <span class="error" id="action_after_id_error"></span>
                </div>
           
                <div class="col-md-4">
                    <label for="address" class="control-label"><span>*</span>Action Notes</label>
                
                    <textarea id="action_notes" placeholder="Action Notes..." style="width: 85%;margin-left: 7%;"   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"   name="action_notes" rows="4"></textarea>
                    <span class="error" id="action_notes_error"></span>
                </div>
            </div>
            <div class="col-md-12 row" style="align-items: center;display: block;">
                        <div class="button" id="btnNext3">Next</div>
                </div>
        </fieldset>
        <fieldset class="section" id="field4">
          <h3>Step 4: Add Extra Details</h3>
          <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="name" class="control-label">Extra Name</label>
                    <input id="condition_name" style="width:85% ;"  type="text" placeholder="Extra Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="extra_name" value="{{ old('name') }}"  >
                   
                </div>

                <div class="col-md-4">
                    <label for="name" class="control-label">Class</label>
                    <input id="condition_name"  style="width:85% ;" type="text" placeholder="Class" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="extra_class" value="{{ old('name') }}"  >
                   
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label">Obstacles</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="width:85% ;"  name="obstacles" id="extra_id"   onchange="getDetailsOfExtras(this.value);">
                        
                    <option value="" {{ (app('request')->input('extra_id') == 0)? 'selected': '' }} >Choose extras</option>
                       
                       @foreach($extras as $extra)
                           <option value="{{$extra->id}}" {{ (app('request')->input('extra_id') == $extra->id)? 'selected': '' }} > {{$extra->obstacles}}</option>
                       @endforeach
                    </select>
                </div>
               
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label">Pavement</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" name="pavement" id="extra_pav" >
                        
                    <option value="">Select Pavement</option>
                    
                    @if($response)
                        <option value="{{$response->extraOptions['pavement']}}" selected>{{$response->extraOptions['pavement']}}</option>
                    @endif
                          
                        
                    </select>
                </div>
              
            
                <div class="col-md-4">
                    <label for="name" class="control-label">Nearby</label>
                    <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  style="width:85% ;" name="nearby" id="extra_nearby" >
                        <option value="">Select Nearby</option>
                        
                        @if($response)
                            <option value="{{$response->extraOptions['nearby']}}" selected>{{$response->extraOptions['nearby']}}</option>
                        @endif
                          
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label">Obstacles to Humans</label>
                    <input id="condition_types" style="width:85% ;"  type="text" placeholder="Obstacles to Humans" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="obstacle_to_humans"  >
                   
                </div>
            </div>
            <div class="form-group row">
               
                <div class="col-md-4">
                    <label for="extra_before_id">Image before</label>
                    <input type="file"  style="width:85% ;" id="testddd" class="form-control" name="extra_before_id" accept="image/png, image/jpeg" />
                </div>
                <div class="col-md-4">
                    <label for="address" class="control-label">Extra Notes</label>
                    <textarea id="condition_notes"  style="width: 85%;margin-left: 7%;"  placeholder="Extra Notes..." class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="extra_notes" rows="4"></textarea>
                  
                </div>
            </div>
            <div class="col-md-12 row" style="align-items: center;display: block;">
                        <div class="button" id="btnNext4">Next</div>
                </div>
        </fieldset>
        <fieldset class="section" id="field5">
          <h3>Step 5: Add Assignment </h3>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Invoice</label>
                    <input id="invoice" style="width:85% ;"  type="text" placeholder="Invoice" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="invoice" value="{{ old('name') }}"  >
                    <span class="error" id="invoice_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Assignment Name</label>
                    <input id="assignment_name"  style="width:85% ;" type="text" placeholder="Assignment Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="assignment_name" value="{{ old('name') }}"  >
                    <span class="error" id="assignment_name_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Point Assignment Title</label>
                    <input id="point_assignment_title"  style="width:85% ;" type="text" placeholder="Point Assignment Title" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="point_assignment_title" value="{{ old('name') }}"  >
                    <span class="error" id="point_assignment_title_error"></span>
                </div>
            </div>
            <div class="form-group row">
                
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Point Assignment Category</label>
                    <input id="point_assignment_category"  style="width:85% ;" type="text" placeholder="Point Assignment Category" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="point_assignment_category" value="{{ old('name') }}"  >
                    <span class="error" id="point_assignment_category_error"></span>
                </div>
            
                 <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Unit Point Assignment</label>
                    <input id="unit_point_assignment"  style="width:85% ;" type="text" placeholder="Unit Point Assignment" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="unit_point_assignment"   >
                    <span class="error" id="unit_point_assignment_error"></span>
                </div>
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Point Assignment Quantity</label>
                    <input id="point_assignment_quantity"  style="width:85% ;" type="text" placeholder="Point Assignment Quantity" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="point_assignment_quantity"   >
                    <span class="error" id="point_assignment_quantity_error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name" class="control-label"><span>*</span>Point Assignment Quantity Initial</label>
                    <input id="point_assignment_quantity_initial"  style="width:85% ;" type="text" placeholder="Point Assignment Quantity Initial" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="point_assignment_quantity_initial"   >
                    <span class="error" id="point_assignment_quantity_initial_error"></span>
                </div>
                
                <div class="col-md-4">
                    <label for="assignment_before_id"><span>*</span>Image before</label>
                    <input type="file" id="assignment_before_img"  style="width:85% ;" class="form-control" name="assignment_before_id"   />
                    <span class="error" id="assignment_before_img_error"></span>
                </div>

                <div class="col-md-4">
                    <label for="address" class="control-label"><span>*</span>Image After</label>
                    <input type="file" id="assignment_after_img"  style="width:85% ;" class="form-control" name="assignment_after_id" />
                    <span class="error" id="assignment_after_img_error"></span>
                </div>
            </div>
            <div class="form-group row">
                
               
                <div class="col-md-4">
                    <label for="address" class="control-label"><span>*</span>Assignment Notes</label>
                    <textarea id="assignment_notes"  style="width: 85%;margin-left: 7%;" placeholder="Assignment Notes..."   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="assignment_notes" rows="4">{{ old('address') }}</textarea>
                    <span class="error" id="assignment_notes_error"></span>
                </div>
           
                
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
    //    alert(data_array);
    //    exit;

    var invoice = $("#invoice").val();
    var assignment_name = $("#assignment_name").val();
    var point_assignment_title = $("#point_assignment_title").val();
    var point_assignment_category = $("#point_assignment_category").val();
    var unit_point_assignment = $("#unit_point_assignment").val();
    var point_assignment_quantity = $("#point_assignment_quantity").val();
    var point_assignment_quantity_initial = $("#point_assignment_quantity_initial").val();
    var assignment_before_img = $("#assignment_before_img");
    var assignment_after_img = $("#assignment_after_img");
    var assignment_notes = $("#assignment_notes").val();
    

    var text="Please fill out";
    var select="Please select";
    var choose="Please choose image";
    var count=0;
   
    $("#invoice_error").text('');
    $("#assignment_name_error").text('');
    $("#point_assignment_title_error").text('');
    $("#point_assignment_category_error").text('');
    $("#unit_point_assignment_error").text('');
    $("#point_assignment_quantity_error").text('');
    $("#point_assignment_quantity_initial_error").text('');
    $("#unit_point_assignment_error").text('');
    $("#assignment_before_img_error").text('');
    $("#assignment_after_img_error").text('');
    $("#assignment_notes_error").text('');

    if (invoice.length==0) {
        $("#invoice_error").text(text);
        count++;
       
    }
    if (assignment_name.length==0) {
        $("#assignment_name_error").text(text);
        count++;
    }
    if (point_assignment_title.length==0) {
        $("#point_assignment_title_error").text(text);
        count++;
    }
    if (point_assignment_category.length==0) {
        $("#point_assignment_category_error").text(text);
        count++;
    }
    if (unit_point_assignment.length==0) {
        $("#unit_point_assignment_error").text(text);
        count++;
    }
    if (point_assignment_quantity.length==0) {
        $("#point_assignment_quantity_error").text(text);
        count++;
       
    }
    
    if (point_assignment_quantity_initial.length==0) {
        $("#point_assignment_quantity_initial_error").text(text);
        count++;
       
    }
    if (unit_point_assignment.length==0) {
        $("#unit_point_assignment_error").text(text);
        count++;
       
    }
    if (assignment_before_img[0].files.length==0) {
        $("#assignment_before_img_error").text(choose);
        count++;
       
    }
    if (assignment_after_img[0].files.length==0) {
        $("#assignment_after_img_error").text(choose);
        count++;
    }
    if (assignment_notes.length==0) {
        $("#assignment_notes_error").text(text);
        count++;
       
    }
   
    if(count>0)
    {
        e.preventDefault();
        exit;

    }
    else
    {
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
    }
    });  
   
});

function getNextForFieldset1() {

        var infon = document.getElementById("info_name").value;
        var infoa = document.getElementById("info_address").value;
        var infoc = document.getElementById("info_coordinates").value;
        var infola = document.getElementById("info_latitude").value;
        var infolog = document.getElementById("info_longitude").value;
        var uid = document.getElementById("user_id").value;
        var spec = document.getElementById("species").value;
        var top = document.getElementById("type_of_point").value;
        var td = document.getElementById("trunk_diameter").value;
        var kd = document.getElementById("komi_diameter").value;
        var hei = document.getElementById("height").value;
        var kh = document.getElementById("komi_height").value;
        var ts = document.getElementById("trunk_slope").value;
        var ag = document.getElementById("available_growth").value;
        var imgbef = document.getElementById("image_before_id");
        var imgaft = document.getElementById("image_after_id");

       
        document.getElementById("info_name_error").innerHTML='';
        document.getElementById("info_address_error").innerHTML='';
        document.getElementById("info_coordinates_error").innerHTML='';
        document.getElementById("info_latitude_error").innerHTML='';
        document.getElementById("info_longitude_error").innerHTML='';
        document.getElementById("user_id_error").innerHTML='';
        document.getElementById("species_error").innerHTML='';
        document.getElementById("type_of_point_error").innerHTML='';
        document.getElementById("trunk_diameter_error").innerHTML='';
        document.getElementById("komi_diameter_error").innerHTML='';
        document.getElementById("height_error").innerHTML='';
        document.getElementById("komi_height_error").innerHTML='';
        document.getElementById("trunk_slope_error").innerHTML='';
        document.getElementById("available_growth_error").innerHTML='';
        document.getElementById("image_before_id_error").innerHTML='';
        document.getElementById("image_after_id_error").innerHTML='';


        var text="Please fill out";
        var select="Please select";
        var choose="Please choose image";
        var count=0;

        if (top.length == 0) {
            document.getElementById("type_of_point_error").innerHTML=select;
            count++;
        }
        if (td.length == 0) {
            document.getElementById("trunk_diameter_error").innerHTML= select;
            count++;
        }
        if (kd.length == 0) {
            document.getElementById("komi_diameter_error").innerHTML=select;
            count++;
        }
        if (hei.length == 0) {
            document.getElementById("height_error").innerHTML=select;
            count++;
        }
        if (kh.length == 0) {
            document.getElementById("komi_height_error").innerHTML=select;
            count++;
        }
        if (ts.length == 0) {
            document.getElementById("trunk_slope_error").innerHTML=select;
            count++;
        }
        if (ag.length == 0) {
            document.getElementById("available_growth_error").innerHTML=select;
            count++;
        }
        if (infon.length == 0) {
            document.getElementById("info_name_error").innerHTML=text;
            count++;
        }
        if (infoa.length == 0) {
            document.getElementById("info_address_error").innerHTML=text;
            count++;
        }
        if (infoc.length == 0) {
            document.getElementById("info_coordinates_error").innerHTML=text;
            count++;
        }
        if (infola.length == 0) {
            document.getElementById("info_latitude_error").innerHTML=text;
            count++;
        }
        if (infolog.length == 0) {
            document.getElementById("info_longitude_error").innerHTML=text;
            count++;
        }
        if (uid.length == 0) {
            document.getElementById("user_id_error").innerHTML=text;
            count++;
        }
        if (spec.length == 0) {
            document.getElementById("species_error").innerHTML=text;
            count++;
        }
        if (imgbef.files.length == 0) {

            document.getElementById("image_before_id_error").innerHTML=choose;
            count++;
       
        }
        if (imgaft.files.length == 0) {
            document.getElementById("image_after_id_error").innerHTML=choose;
            count++;
        }

        if(count>0)
        {
            
            // exit;
        }
        else
        {
           

        }
   
        
}

function getNextForFieldset2() {

        var condition_name = document.getElementById("condition_name").value;
        var condition_address = document.getElementById("condition_address").value;
        var condition_health = document.getElementById("condition_health").value;
        var condition_sta= document.getElementById("condition_stability").value;
        var condition_ts = document.getElementById("condition_trunk_status").value;
        var condition_tp = document.getElementById("condition_trunk_problems").value;
        var condition_ks = document.getElementById("condition_komi_status").value;
        var condition_kp = document.getElementById("condition_komi_problems").value;
        var condition_dis = document.getElementById("condition_diseases").value;
        var condition_rec = document.getElementById("condition_recommended").value;
        var condition_notes = document.getElementById("condition_notes").value;

        


        document.getElementById("condition_name_error").innerHTML='';
        document.getElementById("condition_address_error").innerHTML='';
        document.getElementById("condition_health_error").innerHTML='';
        document.getElementById("condition_stability_error").innerHTML='';
        document.getElementById("condition_trunk_status_error").innerHTML='';
        document.getElementById("condition_trunk_problems_error").innerHTML='';
        document.getElementById("condition_komi_status_error").innerHTML='';
        document.getElementById("condition_komi_problems_error").innerHTML='';
        document.getElementById("condition_diseases_error").innerHTML='';
        document.getElementById("condition_recommended_error").innerHTML='';
        document.getElementById("condition_notes_error").innerHTML='';

        

        var text="Please fill out";
        var select="Please select";
        var choose="Please choose image";
        
        var count=0;

        if (condition_name.length == 0) {
            document.getElementById("condition_name_error").innerHTML=text;
            count++;
        }
        if (condition_address.length == 0) {
            document.getElementById("condition_address_error").innerHTML= text;
            count++;
        }
        if (condition_health.length == 0) {
            document.getElementById("condition_health_error").innerHTML=select;
            count++;
        }
        if (condition_sta.length == 0) {
            document.getElementById("condition_stability_error").innerHTML=select;
            count++;
        }
        if (condition_ts.length == 0) {
            document.getElementById("condition_trunk_status_error").innerHTML=select;
            count++;
        }
        if (condition_tp.length == 0) {
            document.getElementById("condition_trunk_problems_error").innerHTML=select;
            count++;
        }
        if (condition_ks.length == 0) {
            document.getElementById("condition_komi_status_error").innerHTML=select;
            count++;
        }
        if (condition_kp.length == 0) {
            document.getElementById("condition_komi_problems_error").innerHTML=select;
            count++;
        }
        if (condition_dis.length == 0) {
            document.getElementById("condition_diseases_error").innerHTML=text;
            count++;
        }
        if (condition_rec.length == 0) {
            document.getElementById("condition_recommended_error").innerHTML=text;
            count++;
        }
        if (condition_notes .length == 0) {
            
            document.getElementById("condition_notes_error").innerHTML = text;
            count++;
        }
        
        if(count>0)
        {
            
            // exit;
        }
        else
        {
        

        }


}


function getNextForFieldset3() {

        var action_name = document.getElementById("action_name").value;
        var action_types = document.getElementById("action_types").value;
        var action_before_id = document.getElementById("action_before_id");
        var action_after_id= document.getElementById("action_after_id");
        var action_notes = document.getElementById("action_notes").value;




        document.getElementById("action_name_error").innerHTML='';
        document.getElementById("action_types_error").innerHTML='';
        document.getElementById("action_before_id_error").innerHTML='';
        document.getElementById("action_after_id_error").innerHTML='';
        document.getElementById("action_notes_error").innerHTML='';



        var text="Please fill out";
        var select="Please select";
        var choose="Please choose image";

        var count=0;

        if (action_name.length == 0) {
            document.getElementById("action_name_error").innerHTML=text;
            count++;
        }
        if (action_types.length == 0) {
            document.getElementById("action_types_error").innerHTML= text;
            count++;
        }
        if (action_before_id.files.length == 0) {
            document.getElementById("action_before_id_error").innerHTML=choose;
            count++;
        }
        if (action_after_id.files.length == 0) {
            document.getElementById("action_after_id_error").innerHTML=choose;
            count++;
        }
        if (action_notes .length == 0) {
            
            document.getElementById("action_notes_error").innerHTML = text;
            count++;
        }

        if(count>0)
        {
            
            // exit;
        }
        else
        {


        }


}


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
