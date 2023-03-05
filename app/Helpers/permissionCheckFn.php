<?php

//  This all function are check for each feature's permission
use App\Helpers\permissionHelpers;


//  permission check function



function checkPermission($feature,$permission){
  return  permissionHelpers::checkPermission($feature,$permission);
};

function createPer($feature)
{
    return  checkPermission($feature, 'create');
}
function viewPer($feature){
    return  checkPermission($feature,'view');
}
function updatePer($feature)
{
    return  checkPermission($feature, 'update');
}
function deletePer($feature)
{
    return  checkPermission($feature, 'delete');
}
function importPer($feature)
{
    return  checkPermission($feature, 'import');
}
function exportPer($feature)
{
    return  checkPermission($feature, 'export');
}
function printPer($feature)
{
    return  checkPermission($feature, 'print');
}


