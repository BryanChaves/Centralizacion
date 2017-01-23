
<div class="form-group">
          <label class="control-label">{{trans('validation.attributes.check_points')}}</label>
          <select id="F1" onchange="cargarCombo()" name="F1">
          <option value=" " selected="selected">Seleccione punto de Control</option>
            <option value="watersource">Nacientes</option>
            <option value="sampling_site">Muestreos Aleatorios</option>
          </select>
</div> 
<div class="form-group" id="div">
  <select class="text" name="combo"  id="combo">
  </select>
</div> 
<div class="form-group" id="tabla" name="tabla">
Muestras
<table id="f2" class="table table-striped table-bordered bootstrap-datatable ">
     <tr>
      <th><INPUT type="checkbox" name="checkbox" onclick="checkAll('f2')"  /></th>
        <th>Consecutivo</th>
        <th>{{trans('validation.attributes.label')}}</th>
        <th>{{trans('validation.attributes.level')}}</th>
        <th>{{trans('validation.attributes.name')}}</th>
        <th>{{trans('validation.attributes.date')}}</th>
     </tr>
   </table>
</div>