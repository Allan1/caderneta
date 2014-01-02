<?php
App::uses('AppHelper','View/Helper');

class PrintHelper extends AppHelper {

  public $month = array(
    "01" => "Janeiro",
    "02" => "Fevereiro",
    "03" => "Março",
    "04" => "Abril",
    "05" => "Maio",
    "06" => "Junho",
    "07" => "Julho",
    "08" => "Agosto",
    "09" => "Setembro",
    "10" => "Outubro",
    "11" => "Novembro",
    "12" => "Dezembro"
  );
  
  public $dateM = array(
    "Jan" => "Jan",
    "Feb" => "Fev",
    "Mar" => "Mar",
    "Apr" => "Abr",
    "May" => "Mai",
    "Jun" => "Jun",
    "Jul" => "Jul",
    "Aug" => "Ago",
    "Sep" => "Set",
    "Oct" => "Out",
    "Nov" => "Nov",
    "Dec" => "Dez"
  );

  public function bool($param) {
    if($param == 1)
      return 'Sim';
    if($param == 0)
      return 'Não';
    return '--';
  }
  
  public function datetime($datetime, $hour = false, $format = 'd/m/Y') {    
    if($hour)
      $format = 'd/m/Y à\s h:m:s';
    if($datetime)
      return date($format,strtotime($datetime));
    return '';
  }

  public function month($value)
  {
    switch ($value) {
      case 'Jan':
        $value = 'Janeiro';
        break;
      case 'Feb':
        $value = 'Fevereiro';
        break;
      case 'Mar':
        $value = 'Março';
        break;
      case 'Apr':
        $value = 'Abril';
        break;
      case 'May':
        $value = 'Maio';
        break;
      case 'Jun':
        $value = 'Junho';
        break;
      case 'Jul':
        $value = 'Julho';
        break;
      case 'Aug':
        $value = 'Agosto';
        break;
      case 'Sep':
        $value = 'Setembro';
        break;
      case 'Oct':
        $value = 'Outubro';
        break;
      case 'Nov':
        $value = 'Novembro';
        break;
      case 'Dec':
        $value = 'Dezembro';
        break;      
      default:
        break;
    }
    return $value;
  }
  
  public function reportDate($date) {
    $splitDate = explode("/",$date);
    return strtoupper($this->month[$splitDate[1]]).' / '.$splitDate[2];
  }

  public function getMonth($value,$format="Y-m-d"){
    $d = date_parse_from_format($format, $value);
    return $d["month"];
  }
}
	
?>
