<?php 

if(isset($_POST['n']) && !empty($_POST['n']))
{
    if($_POST['n'] == 1)
    {
        echo 0;
    }
    else
    {        
        $result = "0,1";
        $number1 = 0;
        $number2 = 1;       
        for($i = 3; $i <= $_POST['n']; $i++)
        {
            $number3 = $number1 + $number2;
            $result .= "," . $number3;
            $number1 = $number2;
            $number2 = $number3;
        }
        echo $result;
    }
}

?>