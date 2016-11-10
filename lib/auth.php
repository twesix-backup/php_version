<?php
function cani($action)
{
    global $type;
    if(empty($type))
    {
        return false;
    }
    switch ($action)
    {
        case 'add_user':
        {
            return $type=='admin'||$type='teacher';
            break;
        }
        default :
        {
            return false;
        }
    }
}