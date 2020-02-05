<style>
calendar {
    border-left:1px solid #999; width: 100%;
}
*html .day, * html .day-np{
    height:80px;
}
.day:hover{
    background:#FFFF00;
}
.day-np{
    background:#8B0000; min-height:80px;
}
.day-head{
    background:#FFD700; color: #DC143C; font-weight: bold; text-align: center; padding: 5px; width: 80px; border-top: 1px solid #636363; border-right: 1px solid #636363;
}
.day-num{
    background:#000000; padding: 5px; color: #000000;font-weight: bold; float: right; margin: -5px -5px 0 0; width: 20px; text-align: center;
}
.day, .day-np{
    padding: 5px; border-bottom: 1px solid #636363; width: 80px; border-right: 1px solid #636363; 
}
.day{
    color: #000000; font-weight: bold;
}
</style>
<?php
function draw_calendar ($month, $year){

    $cal='<table cellpadding="0" cellspacing="0" class="calendar" width="100%">';
    $headings= array ('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
    $cal .= '<tr class="row"><td class="day-head">' .implode('</td><td class="day-head">', $headings).'</td></tr>';

    $running_day=date('w', mktime(0,0,0, $month,1,$year));
    $day_in_month=date('t', mktime(0,0,0, $month,1,$year));
    $day_in_this_week=1;
    $day_counter=0;
    $dates_array=array();

    $cal .='<tr class="row">';

    for($x=0; $x < $running_day; $x++){
        $cal .= '<td class="day-np"></td>';
        $day_in_this_week++;
    }
    
    for($list_day=1; $list_day<=$day_in_month; $list_day++){
        $cal .='<td class="day" align="center">';
        $cal .=$list_day;
        $cal .=str_repeat('<p> </p>', 2);
        $cal .='</td>';
        if($running_day==6){
            $cal .='</tr>';
            if(($day_counter+1)!=$day_in_month){
                $cal .='<tr class="row">';
            }
            $running_day= -1;
            $day_in_this_week=0;
        }
        $day_in_this_week++;
        $running_day++;
        $day_counter++;
    };

    if($day_in_this_week<8){
        for($x=1; $x <= (8-$day_in_this_week); $x++){
            $cal .='<td class ="day-np"></td>';
        }
    }
    $cal .='</tr>';
    $cal .='</table>';

    return $cal;
}
echo draw_calendar(date("m"), date("y"));
?>
