<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
     <a data-toggle="tooltip" data-placement="top" title="FullScreen" onClick="window.open(<?php echo "'".base_url()."'" ?>, '', 
'fullscreen=yes, scrollbars=auto')" >
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
<!--     <a href="login_controller/logout_user" data-toggle="tooltip" data-placement="top" title="Logout">
         
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>-->
<?php echo anchor('login_controller/logout_user','<span class="glyphicon glyphicon-off" aria-hidden="true"></span>','data-toggle="tooltip" data-placement="top" title="Logout"') ?>
                    </div>

