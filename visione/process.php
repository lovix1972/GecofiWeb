<?php require_once "../controllerUserData.php"; 

$ente=$_SESSION['rep'];
if(!isset($_SESSION['email'])) {
   header("Location: login.php");
} 

switch ($ente) {
    case '5rigel': 
      $rep=1;
      break;
    case '7vega':
      $rep=2;
      break;
    case 'rcst':
      $rep=3;
      break;
    case 'bfriuli':
      $rep=4;
      break;
      case '1antares': 
      $rep=5;
      break;
    case '2sirio':
      $rep=6;
      break;
    case '3aldebaran':
      $rep=7;
      break;
    case '4altair':
      $rep=8;
      break;
        case '21orsa':
      $rep=9;
      break;
    case '28tucano':
      $rep=10;
      break;
    case '34toro':
      $rep=11;
      break;
  }


require_once('../connect.php');
$connect = connectPdo();


//process.php



if(isset($_GET["page"]))
{

	
	$data = array();

	$limit = 15;

	$page = 1;

	if($_GET["page"] > 1)
	{
		$start = (($_GET["page"] - 1) * $limit);
		
		$page = $_GET["page"];
	}
	else
	{
		$start = 0;
	}

	$where = '';

	$search_query = '';

if (isset($_GET["territorio"])) {
	    $territorio = trim($_GET["territorio"]);
	    $where .= 'nazest = "' . $territorio . '" AND reparto = "' . $rep . '" ';
	    
	    $search_query .= '&territorio=' . $territorio;
	}

if (isset($_GET["volo_filter"])) {
	    $volo_array = explode(",", $_GET["volo_filter"]);
	
	    $volo_condition = '';
	    foreach ($volo_array as $volo) {
	        $volo_condition .= 'condizioni = "' . $volo . '" OR ';
	    }
	    $volo_condition = substr($volo_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $volo_condition . ')';
	    } else {
	        $where .= $volo_condition;
	    }
	
	    $search_query .= '&volo_filter=' . $_GET["volo_filter"];
	}
	
	if (isset($_GET["qualifiche_filter"])) {
	    $qualifiche_array = explode(",", $_GET["qualifiche_filter"]);
	
	    $qualifiche_condition = '';
	    foreach ($qualifiche_array as $qualifiche) {
	        $qualifiche_condition .= 'mansionebordo = "' . $qualifiche . '" OR ';
	    }
	    $qualifiche_condition = substr($qualifiche_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $qualifiche_condition . ')';
	    } else {
	        $where .= $qualifiche_condition;
	    }
	
	    $search_query .= '&qualifiche_filter=' . $_GET["qualifiche_filter"];
	}
	
	if (isset($_GET["teil"])) {
	    $targa_array = explode(",", $_GET["teil"]);
	
	    $targa_condition = '';
	    foreach ($targa_array as $teil) {
	        $targa_condition .= 'targa = "' . $teil . '" OR ';
	    }
	    $targa_condition = substr($targa_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $targa_condition . ')';
	    } else {
	        $where .= $targa_condition;
	    }
	    $search_query .= '&teil=' . $_GET["teil"];
	}
	
	if (isset($_GET["utente"])) {
	    $cognome_array = explode(",", $_GET["utente"]);
	
	    $cognome_condition = '';
	    foreach ($cognome_array as $cognome) {
	        $cognome_condition .= 'cognome = "' . $cognome . '" OR ';
	    }
	    $cognome_condition = substr($cognome_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $cognome_condition . ')';
	    } else {
	        $where .= $cognome_condition;
	    }
	    $search_query .= '&utente=' . $_GET["utente"];
	}
	
	if (isset($_GET["qualifiche_tob"])) {
	    $tob_array = explode(",", $_GET["qualifiche_tob"]);
	
	    $tob_condition = '';
	    foreach ($tob_array as $tob) {
	        $tob_condition .= 'tob = "' . $tob . '" OR ';
	    }
	    $tob_condition = substr($tob_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $tob_condition . ')';
	    } else {
	        $where .= $tob_condition;
	    }
	    $search_query .= '&qualifiche_tob=' . $_GET["qualifiche_tob"];
	}
	
	if (isset($_GET["qualifiche_pc"])) {
	    $pc_array = explode(",", $_GET["qualifiche_pc"]);
	
	    $pc_condition = '';
	    foreach ($pc_array as $pc) {
	        $pc_condition .= 'pc = "' . $pc . '" OR ';
	    }
	    $pc_condition = substr($pc_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $pc_condition . ')';
	    } else {
	        $where .= $pc_condition;
	    }
	    $search_query .= '&qualifiche_pc=' . $_GET["qualifiche_pc"];
	}
	
	if (isset($_GET["qualifiche_p_i"])) {
	    $p_i_array = explode(",", $_GET["qualifiche_p_i"]);
	
	    $p_i_condition = '';
	    foreach ($p_i_array as $p_i) {
	        $p_i_condition .= 'p_i = "' . $p_i . '" OR ';
	    }
	    $p_i_condition = substr($p_i_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $p_i_condition . ')';
	    } else {
	        $where .= $p_i_condition;
	    }
	    $search_query .= '&qualifiche_p_i=' . $_GET["qualifiche_p_i"];
	}
	
	if (isset($_GET["qualifiche_pes"])) {
	    $pes_array = explode(",", $_GET["qualifiche_pes"]);
	
	    $pes_condition = '';
	    foreach ($pes_array as $pes) {
	        $pes_condition .= 'pes = "' . $pes . '" OR ';
	    }
	    $pes_condition = substr($pes_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $pes_condition . ')';
	    } else {
	        $where .= $pes_condition;
	    }
	    $search_query .= '&qualifiche_pes=' . $_GET["qualifiche_pes"];
	}
	
	if (isset($_GET["qualifiche_pid"])) {
	    $pid_array = explode(",", $_GET["qualifiche_pid"]);
	
	    $pid_condition = '';
	    foreach ($pid_array as $pid) {
	        $pid_condition .= 'pid = "' . $pid . '" OR ';
	    }
	    $pid_condition = substr($pid_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $pid_condition . ')';
	    } else {
	        $where .= $pid_condition;
	    }
	    $search_query .= '&qualifiche_pid=' . $_GET["qualifiche_pid"];
	}
	
	if (isset($_GET["qualifiche_pa"])) {
	    $pa_array = explode(",", $_GET["qualifiche_pa"]);
	
	    $pa_condition = '';
	    foreach ($pa_array as $pa) {
	        $pa_condition .= 'pa = "' . $pa . '" OR ';
	    }
	    $pa_condition = substr($pa_condition, 0, -4);
	
	    if ($where != '') {
	        $where .= ' AND (' . $pa_condition . ')';
	    } else {
	        $where .= $pa_condition;
	    }
	    $search_query .= '&qualifiche_pa=' . $_GET["qualifiche_pa"];
	}

	if(isset($_GET["qualifiche_elirec_a1"]))
	{
	    $qualifiche_elirec_a1_array = explode(",", $_GET["qualifiche_elirec_a1"]);
	
	    $qualifiche_elirec_a1_condition = '';
	
	    foreach($qualifiche_elirec_a1_array as $qualifiche_elirec_a1)
	    {
	        $qualifiche_elirec_a1_condition .= 'qual_elirec_a1 = "' .$qualifiche_elirec_a1 . '" OR ';
	    }
	
	    $qualifiche_elirec_a1_condition = substr($qualifiche_elirec_a1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qualifiche_elirec_a1_condition.')';
	    }
	    else
	    {
	        $where .= $qualifiche_elirec_a1_condition;
	    }
	    $search_query .= '&qualifiche_elirec_a1='.$_GET["qualifiche_elirec_a1"];
	}
	
	if(isset($_GET["qualifiche_elirec_a2"]))
	{
	    $qualifiche_elirec_a2_array = explode(",", $_GET["qualifiche_elirec_a2"]);
	
	    $qualifiche_elirec_a2_condition = '';
	
	    foreach($qualifiche_elirec_a2_array as $qualifiche_elirec_a2)
	    {
	        $qualifiche_elirec_a2_condition .= 'qual_elirec_a2 = "' .$qualifiche_elirec_a2 . '" OR ';
	    }
	
	    $qualifiche_elirec_a2_condition = substr($qualifiche_elirec_a2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qualifiche_elirec_a2_condition.')';
	    }
	    else
	    {
	        $where .= $qualifiche_elirec_a2_condition;
	    }
	    $search_query .= '&qualifiche_elirec_a2='.$_GET["qualifiche_elirec_a2"];
	}
	
	if(isset($_GET["qualifiche_elirec_b1"]))
	{
	    $qualifiche_elirec_b1_array = explode(",", $_GET["qualifiche_elirec_b1"]);
	
	    $qual_elirec_b1_condition = '';
	
	    foreach($qualifiche_elirec_b1_array as $qual_elirec_b1)
	    {
	        $qual_elirec_b1_condition .= 'qual_elirec_b1 = "' .$qual_elirec_b1 . '" OR ';
	    }
	
	    $qual_elirec_b1_condition = substr($qual_elirec_b1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_elirec_b1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_elirec_b1_condition;
	    }
	    $search_query .= '&qualifiche_elirec_b1='.$_GET["qualifiche_elirec_b1"];
	}
	
	if(isset($_GET["qualifiche_elirec_b2"]))
	{
	    $qualifiche_elirec_b2_array = explode(",", $_GET["qualifiche_elirec_b2"]);
	
	    $qual_elirec_b2_condition = '';
	
	    foreach($qualifiche_elirec_b2_array as $qual_elirec_b2)
	    {
	        $qual_elirec_b2_condition .= 'qual_elirec_b2 = "' .$qual_elirec_b2 . '" OR ';
	    }
	
	    $qual_elirec_b2_condition = substr($qual_elirec_b2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_elirec_b2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_elirec_b2_condition;
	    }
	    $search_query .= '&qualifiche_elirec_b2='.$_GET["qualifiche_elirec_b2"];
	}
	

	if(isset($_GET["qualifiche_cda"]))
{
    $qualifiche_cda_array = explode(",", $_GET["qualifiche_cda"]);

    $qualifiche_cda_condition = '';

    foreach($qualifiche_cda_array as $qual_cda)
    {
        $qualifiche_cda_condition .= 'qual_cda = "' .$qual_cda . '" OR ';
    }

    $qualifiche_cda_condition = substr($qualifiche_cda_condition, 0, -4);

    if($where != '')
    {
        $where .= ' AND ('.$qualifiche_cda_condition.')';
    }
    else
    {
        $where .= $qualifiche_cda_condition;
    }
    $search_query .= '&qualifiche_cda='.$_GET["qualifiche_cda"];
}

if(isset($_GET["qualifiche_t"]))
{
    $qual_t_array = explode(",", $_GET["qualifiche_t"]);

    $qual_t_condition = '';

    foreach($qual_t_array as $qual_t)
    {
        $qual_t_condition .= 'qual_t = "' .$qual_t . '" OR ';
    }

    $qual_t_condition = substr($qual_t_condition, 0, -4);

    if($where != '')
    {
        $where .= ' AND ('.$qual_t_condition.')';
    }
    else
    {
        $where .= $qual_t_condition;
    }
    $search_query .= '&qualifiche_t='.$_GET["qualifiche_t"];
}

if(isset($_GET["qualifiche_ti"]))
{
    $qual_ti_array = explode(",", $_GET["qualifiche_ti"]);

    $qual_ti_condition = '';

    foreach($qual_ti_array as $qual_ti)
    {
        $qual_ti_condition .= 'qual_ti = "' .$qual_ti . '" OR ';
    }

    $qual_ti_condition = substr($qual_ti_condition, 0, -4);

    if($where != '')
    {
        $where .= ' AND ('.$qual_ti_condition.')';
    }
    else
    {
        $where .= $qual_ti_condition;
    }
    $search_query .= '&qualifiche_ti='.$_GET["qualifiche_ti"];
}

if(isset($_GET["qualifiche_etp"]))
{
    $qual_etp_array = explode(",", $_GET["qualifiche_etp"]);

    $qual_etp_condition = '';

    foreach($qual_etp_array as $qual_etp)
    {
        $qual_etp_condition .= 'qual_etp = "' .$qual_etp . '" OR ';
    }

    $qual_etp_condition = substr($qual_etp_condition, 0, -4);

    if($where != '')
    {
        $where .= ' AND ('.$qual_etp_condition.')';
    }
    else
    {
        $where .= $qual_etp_condition;
    }
    $search_query .= '&qualifiche_etp='.$_GET["qualifiche_etp"];
}

if(isset($_GET["qualifiche_tp"]))
{
    $tp_array = explode(",", $_GET["qualifiche_tp"]);

    $tp_condition = '';

    foreach($tp_array as $tp)
    {
        $tp_condition .= 'tp = "' .$tp . '" OR ';
    }

    $tp_condition = substr($tp_condition, 0, -4);

    if($where != '')
    {
        $where .= ' AND ('.$tp_condition.')';
    }
    else
    {
        $where .= $tp_condition;
    }
    $search_query .= '&qualifiche_tp='.$_GET["qualifiche_tp"];
	}
		
	if(isset($_GET["qualifiche_pcp"]))
	{
	    $pcp_array = explode(",", $_GET["qualifiche_pcp"]);
	
	    $pcp_condition = '';
	
	    foreach($pcp_array as $pcp)
	    {
	        $pcp_condition .= 'pcp = "' .$pcp . '" OR ';
	    }
	
	    $pcp_condition = substr($pcp_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$pcp_condition.')';
	    }
	    else
	    {
	        $where .= $pcp_condition;
	    }
	    $search_query .= '&qualifiche_pcp='.$_GET["qualifiche_pcp"];
	}
	
	if(isset($_GET["qualifiche_pcs"]))
	{
	    $qual_pcs_array = explode(",", $_GET["qualifiche_pcs"]);
	
	    $qual_pcs_condition = '';
	
	    foreach($qual_pcs_array as $qual_pcs)
	    {
	        $qual_pcs_condition .= 'qual_pcs = "' .$qual_pcs . '" OR ';
	    }
	
	    $qual_pcs_condition = substr($qual_pcs_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_pcs_condition.')';
	    }
	    else
	    {
	        $where .= $qual_pcs_condition;
	    }
	    $search_query .= '&qualifiche_pcs='.$_GET["qualifiche_pcs"];
	}
	
	if(isset($_GET["qualifiche_ssa1"]))
	{
	    $qual_ssa1_array = explode(",", $_GET["qualifiche_ssa1"]);
	
	    $qual_ssa1_condition = '';
	
	    foreach($qual_ssa1_array as $qual_ssa1)
	    {
	        $qual_ssa1_condition .= 'qual_ssa1 = "' .$qual_ssa1 . '" OR ';
	    }
	
	    $qual_ssa1_condition = substr($qual_ssa1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_ssa1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_ssa1_condition;
	    }
	    $search_query .= '&qualifiche_ssa1='.$_GET["qualifiche_ssa1"];
	}
	
	if(isset($_GET["qualifiche_ssa2"]))
	{
	    $qual_ssa2_array = explode(",", $_GET["qualifiche_ssa2"]);
	
	    $qual_ssa2_condition = '';
	
	    foreach($qual_ssa2_array as $qual_ssa2)
	    {
	        $qual_ssa2_condition .= 'qual_ssa2 = "' .$qual_ssa2 . '" OR ';
	    }
	
	    $qual_ssa2_condition = substr($qual_ssa2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_ssa2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_ssa2_condition;
	    }
	    $search_query .= '&qualifiche_ssa2='.$_GET["qualifiche_ssa2"];
	}
	
	if(isset($_GET["qualifiche_tcs"]))
	{
	    $qual_tcs_array = explode(",", $_GET["qualifiche_tcs"]);
	
	    $qual_tcs_condition = '';
	
	    foreach($qual_tcs_array as $qual_tcs)
	    {
	        $qual_tcs_condition .= 'qual_tcs = "' .$qual_tcs . '" OR ';
	    }
	
	    $qual_tcs_condition = substr($qual_tcs_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_tcs_condition.')';
	    }
	    else
	    {
	        $where .= $qual_tcs_condition;
	    }
	    $search_query .= '&qualifiche_tcs='.$_GET["qualifiche_tcs"];
	}
	
	if(isset($_GET["qualifiche_y"]))
	{
	    $qual_y_array = explode(",", $_GET["qualifiche_y"]);
	
	    $qual_y_condition = '';
	
	    foreach($qual_y_array as $qual_y)
	    {
	        $qual_y_condition .= 'qual_y = "' .$qual_y . '" OR ';
	    }
	
	    $qual_y_condition = substr($qual_y_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_y_condition.')';
	    }
	    else
	    {
	        $where .= $qual_y_condition;
	    }
	    $search_query .= '&qualifiche_y='.$_GET["qualifiche_y"];
	}
	
	if(isset($_GET["qualifiche_g1"]))
	{
	    $qual_g1_array = explode(",", $_GET["qualifiche_g1"]);
	
	    $qual_g1_condition = '';
	
	    foreach($qual_g1_array as $qual_g1)
	    {
	        $qual_g1_condition .= 'qual_g1 = "' .$qual_g1 . '" OR ';
	    }
	
	    $qual_g1_condition = substr($qual_g1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_g1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_g1_condition;
	    }
	    $search_query .= '&qualifiche_g1='.$_GET["qualifiche_g1"];
	}
	
	if(isset($_GET["qualifiche_g2"]))
	{
	    $qual_g2_array = explode(",", $_GET["qualifiche_g2"]);
	
	    $qual_g2_condition = '';
	
	    foreach($qual_g2_array as $qual_g2)
	    {
	        $qual_g2_condition .= 'qual_g2 = "' .$qual_g2 . '" OR ';
	    }
	
	    $qual_g2_condition = substr($qual_g2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_g2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_g2_condition;
	    }
	    $search_query .= '&qualifiche_g2='.$_GET["qualifiche_g2"];
	}
	
	if(isset($_GET["qualifiche_g3"]))
	{
	    $qual_g3_array = explode(",", $_GET["qualifiche_g3"]);
	
	    $qual_g3_condition = '';
	
	    foreach($qual_g3_array as $qual_g3)
	    {
	        $qual_g3_condition .= 'qual_g3 = "' .$qual_g3 . '" OR ';
	    }
	
	    $qual_g3_condition = substr($qual_g3_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_g3_condition.')';
	    }
	    else
	    {
	        $where .= $qual_g3_condition;
	    }
	    $search_query .= '&qualifiche_g3='.$_GET["qualifiche_g3"];
	}
	
	if(isset($_GET["qualifiche_h"]))
	{
	    $qual_h_array = explode(",", $_GET["qualifiche_h"]);
	
	    $qual_h_condition = '';
	
	    foreach($qual_h_array as $qual_h)
	    {
	        $qual_h_condition .= 'qual_h = "' .$qual_h . '" OR ';
	    }
	
	    $qual_h_condition = substr($qual_h_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_h_condition.')';
	    }
	    else
	    {
	        $where .= $qual_h_condition;
	    }
	    $search_query .= '&qualifiche_h='.$_GET["qualifiche_h"];
	}
	
	if(isset($_GET["qualifiche_f1"]))
	{
	    $qual_f1_array = explode(",", $_GET["qualifiche_f1"]);
	
	    $qual_f1_condition = '';
	
	    foreach($qual_f1_array as $qual_f1)
	    {
	        $qual_f1_condition .= 'qual_f1 = "' .$qual_f1 . '" OR ';
	    }
	
	    $qual_f1_condition = substr($qual_f1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_f1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_f1_condition;
	    }
	    $search_query .= '&qualifiche_f1='.$_GET["qualifiche_f1"];
	}
	
	if(isset($_GET["qualifiche_f2"]))
	{
	    $qual_f2_array = explode(",", $_GET["qualifiche_f2"]);
	
	    $qual_f2_condition = '';
	
	    foreach($qual_f2_array as $qual_f2)
	    {
	        $qual_f2_condition .= 'qual_f2 = "' .$qual_f2 . '" OR ';
	    }
	
	    $qual_f2_condition = substr($qual_f2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_f2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_f2_condition;
	    }
	    $search_query .= '&qualifiche_f2='.$_GET["qualifiche_f2"];
	}
	
	if(isset($_GET["qualifiche_f3"]))
	{
	    $qual_f3_array = explode(",", $_GET["qualifiche_f3"]);
	
	    $qual_f3_condition = '';
	
	    foreach($qual_f3_array as $qual_f3)
	    {
	        $qual_f3_condition .= 'qual_f3 = "' .$qual_f3 . '" OR ';
	    }
	
	    $qual_f3_condition = substr($qual_f3_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_f3_condition.')';
	    }
	    else
	    {
	        $where .= $qual_f3_condition;
	    }
	    $search_query .= '&qualifiche_f3='.$_GET["qualifiche_f3"];
	}
	
	if(isset($_GET["qualifiche_i"]))
	{
	    $qual_i_array = explode(",", $_GET["qualifiche_i"]);
	
	    $qual_i_condition = '';
	
	    foreach($qual_i_array as $qual_i)
	    {
	        $qual_i_condition .= 'qual_i = "' .$qual_i . '" OR ';
	    }
	
	    $qual_i_condition = substr($qual_i_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_i_condition.')';
	    }
	    else
	    {
	        $where .= $qual_i_condition;
	    }
	    $search_query .= '&qualifiche_i='.$_GET["qualifiche_i"];
	}

	if(isset($_GET["qualifiche_b1"]))
	{
	    $qual_b1_array = explode(",", $_GET["qualifiche_b1"]);
	
	    $qual_b1_condition = '';
	
	    foreach($qual_b1_array as $qual_b1)
	    {
	        $qual_b1_condition .= 'qual_b1 = "' .$qual_b1 . '" OR ';
	    }
	
	    $qual_b1_condition = substr($qual_b1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_b1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_b1_condition;
	    }
	    $search_query .= '&qualifiche_b1='.$_GET["qualifiche_b1"];
	}
	
	if(isset($_GET["qualifiche_b2"]))
	{
	    $qual_b2_array = explode(",", $_GET["qualifiche_b2"]);
	
	    $qual_b2_condition = '';
	
	    foreach($qual_b2_array as $qual_b)
	    {
	        $qual_b2_condition .= 'qual_b2 = "' .$qual_b2 . '" OR ';
	    }
	
	    $qual_b2_condition = substr($qual_b2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_b2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_b2_condition;
	    }
	    $search_query .= '&qualifiche_b2='.$_GET["qualifiche_b2"];
	}
	
	if(isset($_GET["qualifiche_c1"]))
	{
	    $qual_c1_array = explode(",", $_GET["qualifiche_c1"]);
	
	    $qual_c1_condition = '';
	
	    foreach($qual_c1_array as $qual_c1)
	    {
	        $qual_c1_condition .= 'qual_c1 = "' .$qual_c1 . '" OR ';
	    }
	
	    $qual_c1_condition = substr($qual_c1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_c1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_c1_condition;
	    }
	    $search_query .= '&qualifiche_c1='.$_GET["qualifiche_c1"];
	}
	
	if(isset($_GET["qualifiche_c2"]))
	{
	    $qual_c2_array = explode(",", $_GET["qualifiche_c2"]);
	
	    $qual_c2_condition = '';
	
	    foreach($qual_c2_array as $qual_c2)
	    {
	        $qual_c2_condition .= 'qual_c2 = "' .$qual_c2 . '" OR ';
	    }
	
	    $qual_c2_condition = substr($qual_c2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_c2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_c2_condition;
	    }
	    $search_query .= '&qualifiche_c2='.$_GET["qualifiche_c2"];
	}
	
	if(isset($_GET["qualifiche_v1"]))
	{
	    $qual_v1_array = explode(",", $_GET["qualifiche_v1"]);
	
	    $qual_v1_condition = '';
	
	    foreach($qual_v1_array as $qual_v1)
	    {
	        $qual_v1_condition .= 'qual_v1 = "' .$qual_v1 . '" OR ';
	    }
	
	    $qual_v1_condition = substr($qual_v1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_v1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_v1_condition;
	    }
	    $search_query .= '&qualifiche_v1='.$_GET["qualifiche_v1"];
	}

	if(isset($_GET["qualifiche_v2"]))
	{
	    $qual_v2_array = explode(",", $_GET["qualifiche_v2"]);
	
	    $qual_v2_condition = '';
	
	    foreach($qual_v2_array as $qual_v2)
	    {
	        $qual_v2_condition .= 'qual_v2 = "' .$qual_v2 . '" OR ';
	    }
	
	    $qual_v2_condition = substr($qual_v2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_v2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_v2_condition;
	    }
	    $search_query .= '&qualifiche_v2='.$_GET["qualifiche_v2"];
	}
	
	if(isset($_GET["qualifiche_m"]))
	{
	    $qual_m_array = explode(",", $_GET["qualifiche_m"]);
	
	    $qual_m_condition = '';
	
	    foreach($qual_m_array as $qual_m)
	    {
	        $qual_m_condition .= 'qual_m = "' .$qual_m . '" OR ';
	    }
	
	    $qual_m_condition = substr($qual_m_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_m_condition.')';
	    }
	    else
	    {
	        $where .= $qual_m_condition;
	    }
	    $search_query .= '&qualifiche_m='.$_GET["qualifiche_m"];
	}
	
	if(isset($_GET["qualifiche_a1"]))
	{
	    $qual_a1_array = explode(",", $_GET["qualifiche_a1"]);
	
	    $qual_a1_condition = '';
	
	    foreach($qual_a1_array as $qual_a1)
	    {
	        $qual_a1_condition .= 'qual_a1 = "' .$qual_a1 . '" OR ';
	    }
	
	    $qual_a1_condition = substr($qual_a1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_a1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_a1_condition;
	    }
	    $search_query .= '&qualifiche_a1='.$_GET["qualifiche_a1"];
	}
	
	if(isset($_GET["qualifiche_a2"]))
	{
	    $qual_a2_array = explode(",", $_GET["qualifiche_a2"]);
	
	    $qual_a2_condition = '';
	
	    foreach($qual_a2_array as $qual_a2)
	    {
	        $qual_a2_condition .= 'qual_a2 = "' .$qual_a2 . '" OR ';
	    }
	
	    $qual_a2_condition = substr($qual_a2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_a2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_a2_condition;
	    }
	    $search_query .= '&qualifiche_a2='.$_GET["qualifiche_a2"];
	}
	
	if(isset($_GET["qualifiche_l1"]))
	{
	    $qual_l1_array = explode(",", $_GET["qualifiche_l1"]);
	
	    $qual_l1_condition = '';
	
	    foreach($qual_l1_array as $qual_l1)
	    {
	        $qual_l1_condition .= 'qual_l1 = "' .$qual_l1 . '" OR ';
	    }
	
	    $qual_l1_condition = substr($qual_l1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_l1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_l1_condition;
	    }
	    $search_query .= '&qualifiche_l1='.$_GET["qualifiche_l1"];
	}
	
	if(isset($_GET["qualifiche_l2"]))
	{
	    $qual_l2_array = explode(",", $_GET["qualifiche_l2"]);
	
	    $qual_l2_condition = '';
	
	    foreach($qual_l2_array as $qual_l)
	    {
	        $qual_l2_condition .= 'qual_l1 = "' .$qual_l2 . '" OR ';
	    }
	
	    $qual_l2_condition = substr($qual_l2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_l2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_l2_condition;
	    }
	    $search_query .= '&qualifiche_l2='.$_GET["qualifiche_l2"];
	}
	
	if(isset($_GET["qualifiche_rdr1"]))
	{
	    $qual_rdr1array = explode(",", $_GET["qualifiche_rdr1"]);
	
	    $qual_rdr1_condition = '';
	
	    foreach($qual_rdr1array as $qual_rdr1)
	    {
	        $qual_rdr1_condition .= 'qual_rdr1 = "' .$qual_rdr1 . '" OR ';
	    }
	
	    $qual_rdr1_condition = substr($qual_rdr1_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_rdr1_condition.')';
	    }
	    else
	    {
	        $where .= $qual_rdr1_condition;
	    }
	    $search_query .= '&qualifiche_rdr1='.$_GET["qualifiche_rdr1"];
	}
	
	if(isset($_GET["qualifiche_rdr2"]))
	{
	    $qual_rdr2array = explode(",", $_GET["qualifiche_rdr2"]);
	
	    $qual_rdr2_condition = '';
	
	    foreach($qual_rdr2array as $qual_rdr2)
	    {
	        $qual_rdr2_condition .= 'qual_rdr2 = "' .$qual_rdr2 . '" OR ';
	    }
	
	    $qual_rdr2_condition = substr($qual_rdr2_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_rdr2_condition.')';
	    }
	    else
	    {
	        $where .= $qual_rdr2_condition;
	    }
	    $search_query .= '&qualifiche_rdr2='.$_GET["qualifiche_rdr2"];
	}
	
	if(isset($_GET["qualifiche_ap"]))
	{
	    $qual_ap_array = explode(",", $_GET["qualifiche_ap"]);
	
	    $qual_ap_condition = '';
	
	    foreach($qual_ap_array as $qual_ap)
	    {
	        $qual_ap_condition .= 'qual_ap = "' .$qual_ap . '" OR ';
	    }
	
	    $qual_ap_condition = substr($qual_ap_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$qual_ap_condition.')';
	    }
	    else
	    {
	        $where .= $qual_ap_condition;
	    }
	    $search_query .= '&qualifiche_ap='.$_GET["qualifiche_ap"];
	}
	
	
	if(isset($_GET["data_volo"]))
	{
	    $data_vol_array = explode(",", $_GET["data_volo"]);
	
	    $data_vol_condition = '';
	
	    foreach($data_vol_array as $data_volo)
	    {
	        $data_vol_condition .= 'datavolo = "' .$data_volo . '" OR ';
	    }
	
	    $data_vol_condition = substr($data_vol_condition, 0, -4);
	
	    if($where != '')
	    {
	        $where .= ' AND ('.$data_vol_condition.')';
	    }
	    else
	    {
	        $where .= $data_vol_condition;
	    }
	    $search_query .= '&datavolo='.$_GET["data_volo"];
	}
	
	if(isset($_GET["anno"]))
{
    $anno_array = explode(",", $_GET["anno"]);

    $anno_condition = '';

    foreach($anno_array as $anno)
    {
        $anno_condition .= 'anno = "' .$anno . '" OR ';
    }

    $anno_condition = substr($anno_condition, 0, -4);

    if($where != '')
    {
        $where .= ' AND ('.$anno_condition.')';
    }
    else
    {
        $where .= $anno_condition;
    }
    $search_query .= '&anno='.$_GET["anno"];
}

// Add the following code after the above block

if($where != '')
{
    $where .= ' AND reparto = "' . $rep . '"';
}
else
{
    $where .= 'reparto = "' . $rep . '"';
}

	if(isset($_GET["search_filter"]))
	{
		$search_string = str_replace(" ", "%", $_GET["search_filter"]);

		if($where != '')
		{
			$where .= ' AND ( cognome LIKE "%'.$search_string.'%" )  ';
		}
	
		if($where != '')
		{
			$where .= ' AND ( datavolo LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( targa LIKE "%'.$search_string.'%" )  ';
		}
	
		if($where != '')
		{
			$where .= ' AND ( tipoattivita LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( mansionebordo LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( nazest LIKE "%'.$search_string.'%" )  ';
		}
	
		if($where != '')
		{
			$where .= ' AND ( condizioni LIKE "%'.$search_string.'%" ) ';
		}

		
		if($where != '')
		{
			$where .= ' AND ( tob LIKE "%'.$search_string.'%" ) ';
		}

		
		if($where != '')
		{
			$where .= ' AND ( pc LIKE "%'.$search_string.'%" ) ';
		}


		if($where != '')
		{
			$where .= ' AND ( p_i LIKE "%'.$search_string.'%" ) ';
		}

		
		if($where != '')
		{
			$where .= ' AND ( pes LIKE "%'.$search_string.'%" ) ';
		}

		
		if($where != '')
		{
			$where .= ' AND ( pid LIKE "%'.$search_string.'%" ) ';
		}

		
		if($where != '')
		{
			$where .= ' AND ( pa LIKE "%'.$search_string.'%" ) ';
		}

		
		if($where != '')
		{
			$where .= ' AND ( qual_elirec_a1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_elirec_a2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_elirec_b1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_elirec_b2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_cda LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_t LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_ti LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_etp LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( tp LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( pcp LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_pcs LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_ssa1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_ssa2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_tcs LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_y LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_g1 LIKE "%'.$search_string.'%" ) ';
		}
		if($where != '')
		{
			$where .= ' AND ( qual_g2 LIKE "%'.$search_string.'%" ) ';
		}
		if($where != '')
		{
			$where .= ' AND ( qual_g3 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_h LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_f1 LIKE "%'.$search_string.'%" ) ';
		}
		if($where != '')
		{
			$where .= ' AND ( qual_f2 LIKE "%'.$search_string.'%" ) ';
		}
		if($where != '')
		{
			$where .= ' AND ( qual_f3 LIKE "%'.$search_string.'%" ) ';
		}


		if($where != '')
		{
			$where .= ' AND ( qual_i LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_b1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_b2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_c1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_c2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_v1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_v2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_m LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_a1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_a2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_l1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_l2 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_rdr1 LIKE "%'.$search_string.'%" ) ';
		}

		if($where != '')
		{
			$where .= ' AND ( qual_rdr2 LIKE "%'.$search_string.'%" ) ';
		}

		else
		{
			$where .= 'cognome LIKE "%'.$search_string.'%" OR datavolo LIKE "%'.$search_string.'%" OR targa LIKE "%'.$search_string.'%" OR tipoattivita LIKE "%'.$search_string.'%" OR mansionebordo LIKE "%'.$search_string.'%" OR nazest LIKE "%'.$search_string.'%" OR condizioni LIKE "%'.$search_string.'%" 
			OR tob LIKE "%'.$search_string.'%" OR pc LIKE "%'.$search_string.'%" OR p_i LIKE "%'.$search_string.'%" OR pes LIKE "%'.$search_string.'%" OR pid LIKE "%'.$search_string.'%" OR pa LIKE "%'.$search_string.'%" OR qual_elirec_a1 LIKE "%'.$search_string.'%" OR qual_elirec_a2 LIKE "%'.$search_string.'%"
			OR qual_elirec_b1 LIKE "%'.$search_string.'%" OR qual_elirec_b2 LIKE "%'.$search_string.'%" OR qual_cda LIKE "%'.$search_string.'%" OR qual_t LIKE "%'.$search_string.'%" OR qual_ti LIKE "%'.$search_string.'%" OR qual_etp LIKE "%'.$search_string.'%" OR tp LIKE "%'.$search_string.'%" OR pcp LIKE "%'.$search_string.'%" 
			OR qual_pcs LIKE "%'.$search_string.'%" OR qual_ssa1 LIKE "%'.$search_string.'%" OR qual_ssa2 LIKE "%'.$search_string.'%" OR qual_tcs LIKE "%'.$search_string.'%" OR qual_y LIKE "%'.$search_string.'%" OR qual_g1 LIKE "%'.$search_string.'%" OR qual_g2 LIKE "%'.$search_string.'%" OR qual_g3 LIKE "%'.$search_string.'%"
			OR qual_h LIKE "%'.$search_string.'%" OR qual_f1 LIKE "%'.$search_string.'%" OR qual_f2 LIKE "%'.$search_string.'%" OR qual_f3 LIKE "%'.$search_string.'%" OR qual_i LIKE "%'.$search_string.'%" OR qual_b1 LIKE "%'.$search_string.'%" OR qual_b2 LIKE "%'.$search_string.'%" OR qual_c1 LIKE "%'.$search_string.'%" 
			OR qual_c2 LIKE "%'.$search_string.'%" OR qual_v1 LIKE "%'.$search_string.'%" OR qual_v2 LIKE "%'.$search_string.'%" OR qual_a1 LIKE "%'.$search_string.'%" OR qual_a2 LIKE "%'.$search_string.'%" OR qual_l1 LIKE "%'.$search_string.'%" OR qual_l2 LIKE "%'.$search_string.'%" OR qual_rdr1 LIKE "%'.$search_string.'%" OR qual_rdr2 LIKE "%'.$search_string.'%"';
		}


		$search_query .= '&search_filter='.$_GET["search_filter"].'';
		
	}

	if($where != '')
	{
		$where = 'WHERE '  .$where;
		
	}
	

	$query = "SELECT * FROM rapportovolo INNER JOIN anagraf on anagraf.id=rapportovolo.id_pil INNER JOIN aeromobile on aeromobile.id=rapportovolo.id_amb INNER JOIN reparti on anagraf.reparto=reparti.idrep "
    . $where . "  AND reparto='$rep'  AND tipoaerom != 'SIMULATORE' ORDER BY datavolo ASC";

	$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';

	$statement = $connect->prepare($query);

	$statement->execute();

	$total_data = $statement->rowCount();

	$result = $connect->query($filter_query);
	
	foreach($result as $row)
	{
		$condizioni_array = explode(" ~ ", $row["condizioni"]);

		$data[] = array(
			'id'		 		=>	$row['id_rapporto'],
			'incarico'			=>	$row['id_incarico'],
			'grado'		 		=>	$row['grado'],
			'reparto'		 	=>	$row['nomerep'],
			'cognome'		 	=>	$row['cognome'],
			'targa'		 		=>	$row['targa'],
			'tipoattivita'		=>	$row['tipoattivita'],
			'mansionebordo'		=>	$row['mansionebordo'],
			'datavolo'			=>	$row['datavolo'],
			'tempovolo'			=>	$row['tempovolo'],
			'durata_volo'		=>	$row['durata_volo'],
			'mesevolo'			=>	$row['mesevolo'],
			'anno'				=>	$row['anno'],
			'note'				=>	$row['nota'],
			'nazest'			=>	$row['nazest'],
			'condizioni'		=>	$condizioni_array[0]
		);
	}

	$pagination_html = '
	<nav aria-label="Page navigation example">
  		<ul class="pagination justify-content-center">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array[] = '';

	if($total_links > 4)
	{
		if($page < 5)
		{
			for($count = 1; $count <= 5; $count++)
			{
				$page_array[] = $count;
			}

			$page_array[] = '...';

			$page_array[] = $total_links;
		}
		else
		{
			$end_limit = $total_links - 5;

			if($page > $end_limit)
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $end_limit; $count <= $total_links; $count++)
				{
					$page_array[] = $count;
				}
			}
			else
			{
				$page_array[] = 1;

				$page_array[] = '...';

				for($count = $page - 1; $count <= $page + 1; $count++)
				{
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	}
	else
	{
		for($count = 1; $count <= $total_links; $count++)
		{
			$page_array[] = $count;
		}
	}

	for($count = 0; $count < count($page_array); $count++)
	{
		if($page == $page_array[$count])
		{
			$page_link .= '
				<li class="page-item active">
		      		<a class="page-link" href="#">'.$page_array[$count].'</a>
		    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if($previous_id > 0)
			{
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_product(`'.$previous_id.', '.$search_query.'`)">Previous</a></li>';
			}
			else
			{
				$previous_link = '
					<li class="page-item disabled">
				        <a class="page-link" href="#">Previous</a>
				    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if($next_id > $total_links)
			{
				$next_link = '
					<li class="page-item disabled">
		        		<a class="page-link" href="#">Next</a>
		      		</li>
				';
			}
			else
			{
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_product('.$next_id.', `'.$search_query.'`)">Next</a></li>
				';
			}
		}
		else
		{
			if($page_array[$count] == '...')
			{
				$page_link .= '
					<li class="page-item disabled">
		          		<a class="page-link" href="#">...</a>
		      		</li>
				';
			}
			else
			{
				$page_link .= '
					<li class="page-item ">
						<a class="page-link" href="javascript:load_product('.$page_array[$count].', `'.$search_query.'`)">'.$page_array[$count].'</a>
					</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</nav>
	';

	$output = array(
		'data'		=>	$data,
		'pagination'=>	$pagination_html,
		'total_data'=>	$total_data
	);

	echo json_encode($output);
}

if(isset($_GET["action"]))
{
	$data = array();

	$query = "
	    SELECT reparto, nazest, COUNT(id_rapporto) AS Total 
	    FROM rapportovolo 
	    INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	    WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	    GROUP BY reparto, nazest
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['nazest'];
		$sub_data['total'] = $row['Total'];
		$data['nazest'][] = $sub_data;
	}

	$query = "
	SELECT reparto,targa, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN aeromobile on aeromobile.id=rapportovolo.id_amb 
	INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	    WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY targa
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['targa'];
		$sub_data['total'] = $row['Total'];
		$data['targa'][] = $sub_data;
	}

	$query = "
	SELECT reparto,grado,cognome, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf on anagraf.id=rapportovolo.id_pil
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY cognome
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['grado'] = $row['grado'];
		$sub_data['name'] = $row['cognome'];
		$sub_data['total'] = $row['Total'];
		$data['cognome'][] = $sub_data;
	}

	$query = "
	SELECT reparto,tob, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY tob
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['tob'];
		$sub_data['total'] = $row['Total'];
		$data['tob'][] = $sub_data;
	}

	$query = "
	SELECT reparto,pc, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY pc
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['pc'];
		$sub_data['total'] = $row['Total'];
		$data['pc'][] = $sub_data;
	}

	$query = "
	SELECT reparto,p_i, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY p_i
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['p_i'];
		$sub_data['total'] = $row['Total'];
		$data['p_i'][] = $sub_data;
	}

	$query = "
	SELECT reparto,pes, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY pes
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['pes'];
		$sub_data['total'] = $row['Total'];
		$data['pes'][] = $sub_data;
	}

	$query = "
	SELECT reparto,pid, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY pid
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['pid'];
		$sub_data['total'] = $row['Total'];
		$data['pid'][] = $sub_data;
	}

	$query = "
	SELECT reparto,datavolo, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep'  AND tipoaerom != 'SIMULATORE'
	GROUP BY datavolo
	";
	
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['datavolo'];
		$sub_data['total'] = $row['Total'];
		$data['datavolo'][] = $sub_data;
	}

	$query = "
	SELECT reparto,pa, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY pa
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['pa'];
		$sub_data['total'] = $row['Total'];
		$data['pa'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_elirec_a1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_elirec_a1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_elirec_a1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_elirec_a1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_elirec_a2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_elirec_a2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_elirec_a2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_elirec_a2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_elirec_b1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_elirec_b1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_elirec_b1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_elirec_b1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_elirec_b2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_elirec_b2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_elirec_b2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_elirec_b2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_cda, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_cda
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_cda'];
		$sub_data['total'] = $row['Total'];
		$data['qual_cda'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_t, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_t
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_t'];
		$sub_data['total'] = $row['Total'];
		$data['qual_t'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_ti, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_ti
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_ti'];
		$sub_data['total'] = $row['Total'];
		$data['qual_ti'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_etp, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_etp
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_etp'];
		$sub_data['total'] = $row['Total'];
		$data['qual_etp'][] = $sub_data;
	}

	$query = "
	SELECT reparto,tp, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY tp
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['tp'];
		$sub_data['total'] = $row['Total'];
		$data['tp'][] = $sub_data;
	}

	$query = "
	SELECT reparto,pcp, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY pcp
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['pcp'];
		$sub_data['total'] = $row['Total'];
		$data['pcp'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_pcs, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_pcs
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_pcs'];
		$sub_data['total'] = $row['Total'];
		$data['qual_pcs'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_ssa1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_ssa1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_ssa1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_ssa1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_ssa2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_ssa2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_ssa2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_ssa2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_tcs, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_tcs
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_tcs'];
		$sub_data['total'] = $row['Total'];
		$data['qual_tcs'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_y, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_y
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_y'];
		$sub_data['total'] = $row['Total'];
		$data['qual_y'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_g1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_g1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_g1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_g1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_g2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_g1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_g2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_g2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_g3, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_g3
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_g3'];
		$sub_data['total'] = $row['Total'];
		$data['qual_g3'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_h, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_h
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_h'];
		$sub_data['total'] = $row['Total'];
		$data['qual_h'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_f1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_f1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_f1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_f1'][] = $sub_data;
	}

	
	$query = "
	SELECT reparto,qual_f2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_f2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_f2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_f2'][] = $sub_data;
	}

	
	$query = "
	SELECT reparto,qual_f3, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_f3
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_f3'];
		$sub_data['total'] = $row['Total'];
		$data['qual_f3'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_i, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_i
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_i'];
		$sub_data['total'] = $row['Total'];
		$data['qual_i'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_b1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_b1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_b1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_b1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_b2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_b2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_b2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_b2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_c1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_c1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_c1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_c1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_c2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_c2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_c2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_c2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_v1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_v1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_v1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_v1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_v2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_v2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_v2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_v2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_m, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_m
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_m'];
		$sub_data['total'] = $row['Total'];
		$data['qual_m'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_a1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_a1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_a1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_a1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_a2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_a2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_a2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_a2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_l1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_l1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_l1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_l1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_l2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_l2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_l2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_l2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_rdr1, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_rdr1
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_rdr1'];
		$sub_data['total'] = $row['Total'];
		$data['qual_rdr1'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_rdr2, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_rdr2
	";
		foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_rdr2'];
		$sub_data['total'] = $row['Total'];
		$data['qual_rdr2'][] = $sub_data;
	}

	$query = "
	SELECT reparto,qual_ap, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep'  AND tipoaerom != 'SIMULATORE'
	GROUP BY qual_ap
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['qual_ap'];
		$sub_data['total'] = $row['Total'];
		$data['qual_ap'][] = $sub_data;
	}

	$query = "
	SELECT reparto,anno, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY anno
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['anno'];
		$sub_data['total'] = $row['Total'];
		$data['anno'][] = $sub_data;
	}

	/*$nazest_range = array(
		'naz'	=>	'Nazionali',
		'est'	=>	'Esteri',
	
	);

	foreach($nazest_range as $key => $value)
	{
		$query = "
		SELECT COUNT(id_rapporto) AS Total 
		FROM rapportovolo 
		WHERE ".$key." 
		";

		$sub_data = array();

		foreach($connect->query($query) as $row)
		{
			$sub_data['id_pil'] = $value;
			$sub_data['total'] = $row['Total'];
			$sub_data['condition'] = $key;
		}
		$data['id_pil'][] = $sub_data;
	}*/

	$query = "
	SELECT reparto,condizioni, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep' AND tipoaerom != 'SIMULATORE'
	GROUP BY condizioni
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['condizioni'];
		$sub_data['total'] = $row['Total'];
		$data['condizioni'][] = $sub_data;
	}


	$query = "
	SELECT reparto,mansionebordo, COUNT(id_rapporto) AS Total 
	FROM rapportovolo INNER JOIN anagraf ON anagraf.id = rapportovolo.id_pil 
	WHERE reparto = '$rep'  AND tipoaerom != 'SIMULATORE'
	GROUP BY mansionebordo
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['mansionebordo'];
		$sub_data['total'] = $row['Total'];
		$data['mansionebordo'][] = $sub_data;
	}

	echo json_encode($data);
}

?>