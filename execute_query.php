<?php

function getRow($stmt)
{
    include "connection.php";

    if (!$conn) 
    {
        echo false;
    } 
    else 
    {
        $query = mysqli_query($conn, $stmt);
        if ($query) 
        {
            $row = mysqli_fetch_array($query);
            
            return $row;
        } 
        else 
        {
            return false;
        }
    }

}