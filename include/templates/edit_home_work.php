<?php
@session_start();
if(isset($_SESSION["userid"])){
    $userid = $_SESSION["userid"];
    $school_id =$_SESSION["school_id"];
    $log_year    = $_SESSION["academic_year"];
}

if(isset($_POST['submit_home_work']) && $_POST['submit_home_work'] !=''){
    $userObj -> addHomeWork($mysqli, $userid, $school_id, $log_year);
?>
    <script>location.href='<?php echo $HOSTPATH; ?>edit_home_work&msc=1';</script>
<?php } ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">SM - Home Work</li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
<!--form start-->
<form name="homeWork" method="post" enctype="multipart/form-data"> 
<?php
    $mscid=0;
    if(isset($_GET['msc']))
    {
    $mscid=$_GET['msc'];
    if($mscid==1)
    {?>
    <div class="alert alert-success" role="alert">
        <div class="alert-text">Message Sent Successfully!</div>
    </div> 
    <?php
    }else{?>
    <div class="alert alert-success" role="alert">
        <div class="alert-text">Message Failed!</div>
    </div>
    <?php
    }
    }
?>
<!-- Row start -->
    <div class="row gutters">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group">
                                <label>Comments</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-12">
                            <div class="form-group">
                                <textarea class="form-control" name="home_work_comments" id="home_work_comments"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5 col-12"> </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 col-12">
                            <div class="form-group">
                                <label>Comments Char Count</label>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="hw_char_count" id="hw_char_count" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                            
                <div class="col-md-12">
                    <div class="text-right">
                        <button type="submit" id="submit_home_work" name="submit_home_work" value="Send SMS" class="btn btn-primary">Send SMS</button><br/><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- Main container end -->