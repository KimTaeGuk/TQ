<!DOCTYPE HTML>
<HTML>
<HEAD>
  <TITLE></TITLE> 
<script>
  
  var Feb=new Array();
        for(i=0;i<=28;i++){Feb[i]=i+1;}
  var Jun=new Array();
        for(i=0;i<=29;i++){Jun[i]=i+1;}
  var Jan=new Array();
        for(i=0;i<=30;i++){Jan[i]=i+1;}
          
  window.onload=function(){}

  function Months(val){
   var x=document.getElementById('birthDay');

   x.options.length=0;
    if(val==2){
      for(i=0;i<=28;i++){
        var option=document.createElement('option');
        option.text=Feb[i];
        option.value=Feb[i];
        x.add(option,x[i]);
      }
    } else if(val==4||val==6||val==9||val==11){
      for(i=0;i<=29;i++){
        var option=document.createElement('option');        
        option.text=Jun[i];
        option.value=Jun[i];
        x.add(option,x[i]);
      }
    } else {
      for(i=0;i<=30;i++){
        var option=document.createElement('option');    
        option.text=Jan[i];
        option.value=Jan[i];
        x.add(option,x[i]);
      }
    }
  }
</script>
</HEAD>
<BODY>

<?php
  $years=range(date('Y')-100, date('Y')-5);
  $months=range(1,12);
  $days=range(1,31);
  // 2-> 28 4->30 6->30 9->30 11->30
  // echo count($days);

  //년
  echo "<select name='birthYear' id='birthYear'>";
    echo "<option selected='selected'>Year</option>";
  foreach($years as $year){
    echo '<option value="'.$year.'">'.$year.'</option>';
  }
    echo '</select>';
    echo "년 ";

  //월
  echo "<select name='birthMonth' id='birthMonth' onchange='Months(this.value)'>";
  echo "<option selected='selected'>Month</option>";
  foreach($months as $month){
    echo '<option value="'.$month.'">'.$month.'</option>';
  }
  echo '</select>';
  echo "월 ";

  //일
  echo "<select name='birthDay' id='birthDay'>
        <option value='Day' selected='selected'>Day</option>";
  foreach($days as $day){
    echo '<option value="'.$day.'">'.$day.'</option>';
  }
   echo "</select>
        일 ";
?>
</BODY>
</HTML>