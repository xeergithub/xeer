<?php
$bdr = "";
$dpid = 0;
$pageid = 1;
$template_id = 3;
include($bdr."includes/common.php");
include($bdr."includes/page_set.php");
$display_brd_array = "n";
$main_heading = "n";
include($bdr."includes/head.php");
if ($loggedin_member_id == 0){
if (isset($_COOKIE["cookie_user_id"])){ $cook_t1 = $_COOKIE["cookie_user_id"]; }else{ $cook_t1 = ''; }
if (isset($_COOKIE["cookie_user_password"])){ $cook_t2 = $_COOKIE["cookie_user_password"]; }else{ $cook_t2 = ''; }
$enb_guest_login = $cm->normal_guest_user_permission(2);
?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
    <tr>
         <td width="456" valign="top" class="login-left">
             <h1>Returning User</h1>             
             <form id="login_ff" name="m_lgn" action="<?php echo $bdir; ?>loginvalid.php" method="post">
             <table width="320" border="0" cellspacing="0" cellpadding="0">
              <?php if ($_SESSION["fr_postmessage"] != ""){ ?> 
              <tr>
                  <td colspan="2">
                      <span class="mandt_color">Sorry. Invalid username/password</span>
                  </td>
              </tr>
              <?php $_SESSION["fr_postmessage"] = ""; } ?>   
                 
              <tr>
                <td align="left">Email Address</td>
                <td align="right"><span class="input"><input type="text" id="t1" name="t1" value="<?php echo $cook_t1; ?>" /></span></td>
              </tr>
              <tr>
                <td align="left" class="space1">Password</td>
                <td align="right" class="space1"><span class="input"><input type="password" id="t2" name="t2" value="<?php echo $cook_t2; ?>" /></span></td>
              </tr>
              <tr>
                 <td align="left">&nbsp;</td>
                 <td align="left">
                     <div class="forgotpassword"><a class="fpassword" href="javascript:void(0);">Forgot Password?</a></div>
                 </td>
              </tr>
              <tr>
                <td colspan="2">
                    <span class="float-left"><input type="checkbox" value="y" id="log_remember_me" name="log_remember_me" /> &nbsp; Remember me on this computer</span> <input type="submit" class="login" value="" />
                </td>
              </tr>
            </table>
            </form>
             <div class="forgotpassword_info"></div>
         </td>
         <td><img src="<?php echo $bdir; ?>images/login-devider.jpg" alt="" /></td>
         <td width="413" valign="top" class="login-right">
             <h1>Sign Up for XEER</h1>
             <p><a href="<?php echo $bdir; ?>facebook/login-facebook.php"><img src="<?php echo $bdir; ?>images/facebook-signin.jpg" alt="Facebook Sign In" /></a><br /><a href="<?php echo $bdir; ?>twitter/login-twitter.php"><img src="<?php echo $bdir; ?>images/twitter-signin.jpg" alt="Twitter Sign In"  /></a><br /><a href="<?php echo $bdir; ?>googleplus/"><img src="<?php echo $bdir; ?>images/google-signin.jpg" alt="Google Sign In"  /></a></p>

             <p>
             <a href="<?php echo $bdir; ?>add-user.php"><u>I don't have a Facebook, Twitter or Google account.</u></a>
             <?php if ($enb_guest_login == 1){?>
             <br /><br /><a class="guestlogin" href="<?php echo $bdir; ?>loginvalid.php?guest=1">&nbsp;</a>
             <?php } ?>
             </p>
         </td>
    </tr>
</table> 
<?php }else{
  $template_id = 2;
  $recent_claim = 1;
  $recent_doctrine = 1;
  $scroller_pagination = 'y';  
  $frontend->display_opinion_top_tab(1);
  $listingoption = 1;
?>
    <div class="result_sorting">
        <input class="display_consensus_opinion" type="checkbox" id="d_co" name="d_co" value="1" /> Consensus Opinions only&nbsp;&nbsp;&nbsp;
        Category: <select id="display_consensus_opinion_cat" name="display_consensus_opinion_cat" deflisting="<?php echo $listingoption; ?>">
            <option value="0">All</option>
            <?php $frontend->get_category_combo(0, 0); ?>
        </select>
    </div>
    <div class="border-bottom"></div>
    <div class="border-bottom-padding"></div>
<?php
  $frontend->display_opinion_listing($p, $listingoption);
} 
?>       

<?php if (trim($f_pdata) != ""){?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $f_pdata; ?></td>
</table>
<?php } ?>

<?php
include($bdr."includes/foot.php");
?>
