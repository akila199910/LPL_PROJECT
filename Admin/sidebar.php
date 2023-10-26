<!-- Sidebar -->
<div class="sidebar" style="background-color:lightblue;" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

<hr style="border:1px solid; background-color:lightblue; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="/Admin/Addmoderator/indexmodertor.php"  onclick="showModerators()" ><i class="fa fa-users"></i> Moderators</a>
    <a href="/Admin/Addteam/indexteam.php"  onclick="showTeam()" ><i class="fa fa-users"></i> Teams</a>
    <a href="/Admin/Playerlist/batsmanlist.php"   onclick="showBatsman()" ><i class="fa fa-th-large"></i>Batsman List</a>
    <a href="/Admin/Playerlist/bowlerlist.php"   onclick="showBaller()" ><i class="fa fa-th-large"></i> Bowler List</a>
    <a href="/Admin/Playerlist/wicketkeeperlist.php"   onclick="showWicketkeeper()" ><i class="fa fa-th-large"></i> Wicket Keeper List</a>    
    <a href="/Admin/Playerlist/allrounderlist.php"   onclick="showAllrounder()" ><i class="fa fa-th-large"></i> Allrounder List</a>
    <a href="/Admin/Admin_dashboard/logout.php" onclick="logout()"><i class="fa fa-user"></i> Log Out</a>
  
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


