<?php
 foreach($_POST as  $value)

 {
     $key[] = $value ;
 }
 if(intval($key[0]) && intval($key[1]))
{
    $operator = array('+','-','*','/');
    if(in_array($key[2] , $operator))
       {
         switch ($key[2])
        {
            case '+':
                echo $key[0]+$key[1];
                break;

            case '-':
                echo $key[0]-$key[1];
                break;

            case '*':
                echo $key[0]*$key[1];
                break;

            case '/':
                echo $key[0]/$key[1];
                break;

        }
       }
       else
       {
        echo "failed";
       }

}
else
{
    echo "add integer value";
}


?>