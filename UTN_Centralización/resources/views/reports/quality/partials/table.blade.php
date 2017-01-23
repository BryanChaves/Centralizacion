    <?php          
    $cont = 0;  
    $info = "";      
    $numero = 1;

    $abajo = "</tbody>"."\n"."</table>";
    for ($i=0; $i < count($record); $i++) { 

     $parametro = $record[$i]->parameter;
     $unidad = $record[$i]->unit;
     $muestra = $record[$i]->value;
     $maxi = $record[$i]->maximum_allowable;
     $reporte = $record[$i]->report_number;                      
     if($cont == 0)
     {
       $id_muestra = $record[$i]->id;                                            
     }


     if($id_muestra == $record[$i]->id)
     {
       $info = $info. 
       "<tr>"."\n".
       "<td style='border: black 1px solid;'>".$parametro."</td>"."\n".
       "<td style='border: black 1px solid;'>".$unidad."</td>"."\n".
       "<td style='border: black 1px solid;'>".$muestra."</td>"."\n".
       "<td style='border: black 1px solid;'>".$maxi."</td>"."\n".
       "</tr>"; 
                     // var_dump($info);
       $cont = 1;
     }else{
      $arriba = "<h4 style='float:left;'> Muestra #".$numero."</h4>"."\n".
      "<h4 style='float:right'>No.Reporte : ".$reporte."</h4> <br>".
      "<table class='table table-striped table-bordered'>"."\n".
      "<thead>"."\n".
      "<tr>"."\n".
      "<th style='border: black 2px solid;text-align:center;'>Analisis</th>"."\n".
      "<th style='border: black 2px solid;text-align:center;'>Unidad</th>"."\n".
      "<th style='border: black 2px solid;text-align:center;'>Valor</th>"."\n".
      "<th style='border: black 2px solid;text-align:center; width:200px;'>Maxima Cantidad</th>"."\n".
      "</tr>"."\n".
      "</thead>"."\n".
      "<tbody>";
      $numero ++;
      echo ("\n".$arriba."\n".$info."\n".$abajo."\n");
                                         // var_dump($record[$i]->id);
      $info = "<tr>"."\n".
      "<td style='border: black 1px solid;'>".$parametro."</td>"."\n".
      "<td style='border: black 1px solid;'>".$unidad."</td>"."\n".
      "<td style='border: black 1px solid;'>".$muestra."</td>"."\n".
      "<td style='border: black 1px solid;'>".$maxi."</td>"."\n".
      "</tr>"; 
      $cont = 0;
                                    //var_dump($info);
                                    //echo ($info);
    }              
  }    
  if(count($record) > 0){
    $arriba = "<h4 style='float:left;'> Muestra #".$numero."</h4>"."\n".
    "<h4 style='float:right'>No.Reporte : ".$reporte."</h4> <br>".
    "<table class='table table-striped table-bordered'>"."\n".
    "<thead>"."\n".
    "<tr>"."\n".
    "<th style='border: black 1px solid;'>Analisis</th>"."\n".
    "<th style='border: black 1px solid;'>Unidad</th>"."\n".
    "<th style='border: black 1px solid;'>Valor</th>"."\n".
    "<th style='border: black 1px solid;width:200px;'>Maxima Cantidad</th>"."\n".
    "</tr>"."\n".
    "</thead>"."\n".
    "<tbody>";
    echo ("\n".$arriba."\n".$info."\n".$abajo."\n");    
  }         
  ?>  