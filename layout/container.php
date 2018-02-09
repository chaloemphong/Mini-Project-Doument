<!-- Container -->
<?php
switch ($_GET["page"]) {
case "home":
	include("./pages/home.php");
	break;
case "add_data":
	include("./pages/add_data.php");
	break;
case "data":
	include("./pages/data.php");
	break;
case "setting_system":
	include("./pages/setting_system.php");
	break;
case "setting_user":
	include("./pages/setting_system.php");
	break;
case "site_dep":
	include("./pages/site_dep.php");
	break;
case "edit_data":
	include("./pages/edit_data.php");
	break;
case "settings":
	include("./pages/settings.php");
	break;



default:
	include("./pages/home.php");
}
?>
