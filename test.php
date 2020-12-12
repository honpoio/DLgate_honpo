<?php

$pass = 'ROOT';
//$pass =  chr(mt_rand(65, 87)).chr(mt_rand(65, 87)).chr(mt_rand(65, 87)).chr(mt_rand(65, 87));

for ($i=0; $i<=25;$i++)
{

    $num0 = chr(65 + $i);
    $name = $num0;
    print($name).PHP_EOL;
    if($pass == $name)
    {
        print($name.'<=解析成功').PHP_EOL;
        break;
    }
    else
    {
        for ($k=0; $k<=25;$k++)
        {
            $num1 = chr(65 + $k);
            $name = $num0.$num1;
            print($name).PHP_EOL;
            if($pass == $name)
            {
                print($name.'<=解析成功').PHP_EOL;
                break 2;
            }
            else
            {
                for($l=0; $l<=25; $l++)
                {
                    $num2 = chr(65 + $l);
                    $name = $num0.$num1.$num2;
                    print($name).PHP_EOL;
                    if($pass == $name)
                    {
                        print($name.'<=解析成功').PHP_EOL;
                        break 3;
                    }
                    else
                    {
                        for($m=0; $m<=25; $m++)
                        {
                            $num3 = chr(65 + $m);
                            print($name).PHP_EOL;
                            $name = $num0.$num1.$num2.$num3;
                            if($pass == $name)
                            {
                                print($name.'<=解析成功').PHP_EOL;
                                break 4;
                            }
                        }
                    }
                }
            }
        }
    }
}
