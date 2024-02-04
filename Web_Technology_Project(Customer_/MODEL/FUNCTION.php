<?php 

//write function 
function write($filename, $data, $mode = 'w')
{
    $fo = fopen($filename, $mode);
    if (empty($data)) 
    {
        $fw = fwrite($fo, $data);
     } 
    else {
        $fw = fwrite($fo, json_encode($data). "\n");
    }
    fclose($fo); 
    return $fw;
}

//Read function 

function read($filename, $mode = 'r')
{
    $fo = fopen($filename, $mode); 
    $fz = filesize($filename); 
    $data = array(); 
    if ($fz > 0) 
    {
        $fr = fread($fo, $fz);
        $data = json_decode($fr);
    }
    fclose($fo); 
    return $data;
}

//create function 

Function create($filename, $arr)
{
    $data =read($filename); 
    if (count($data) > 0)
    {
        $list = $data; 
        $arr['id'] = count($list) + 1;
        array_push($list, $arr); 
    } 
    else {
        $arr['id'] = 1;
         $list[] = $arr;
    }
    write($filename, '', 'w');
    return write($filename, $list);
}

//Get one function
function getone($filename, $key, $value)
{
    $data = read($filename); 
    for ($i = 0; $i < count($data); $i++)
     { 
        if ($data[$i]->$key === $value) 
        {	
            return $data[$i];
        }
    }
    return array();
}

//Get all data function
function getall($filename)
{
return read($filename);
}


//Search function
function search($filename, $key, $value)
{
    $found=false;
    $data = read($filename); 
    if(count($data)> 0 ) {
        for ($i = 0; $i < count($data); $i++)
         { 
            if ($data[$i]->$key === $value) 
        {
            $found=true;
            break;
        }
    }
} 
return $found;
}
//Update Function
function update($filename, $arr, $key, $value)
{
    $data = read($filename);
    if (count($data) > 0) {
        $list = array();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->$key === $value) {
                array_push($list, $arr);
            } else {
                array_push($list, $data[$i]);
            }
        }
        write($filename, '', 'w');
        return write($filename, $list);
    }
    return false;
}

//Delete Function
function delete($filename, $key, $value)
{
    $data = read($filename);
    if (count($data) > 0) {
        $list = array();
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]->$key !== $value) {
                array_push($list, $data[$i]);
            }
        }
        write($filename, '', 'w');
        return write($filename, $list);
    }
    return false;
}

function senitaiz($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
}

?>



<?php

/*

$filename="user_info.json";
$var="MOTOROLA";
$ABB=array('COMPANY'=> $var,'COMPANY'=>$var);write($filename,"");
create($filename, $ABB);
$ar=read($filename);
var_dump($ar);



$fo = fopen($filename,'r' ); 
$fz = filesize($filename); 
$data = array(); 
if ($fz > 0) 
{
$fr = fread($fo, $fz);
$data = json_decode($fr);
}
fclose($fo); 
var_dump($data);

*/

?>


