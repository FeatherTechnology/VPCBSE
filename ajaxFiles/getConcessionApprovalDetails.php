<table class="table table-responsive" id="general_concession_table">
    <thead>
        <tr>
            <th colspan="7"> Student Concession List Pending for Approval</th>
        </tr>
        <tr>
            <th>Admission No</th>
            <th>Name of the student</th>
            <th>Address</th>
            <th>Standard</th>
            <th>Concession On</th>
            <th>Remark</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include '../ajaxconfig.php';
        @session_start();
        if(isset($_SESSION['school_id'])){
            $school_id = $_SESSION['school_id'];
        }
        if(isset($_SESSION['academic_year'])){
            $academic_year = $_SESSION['academic_year'];
        }
        $generalConcessionQry = $connect->query("SELECT sc.student_id, sc.admission_number, sc.student_name, sc.flat_no, sc.street, sc.area_locatlity, sc.district, sc.pincode, stdc.standard, sc.concession_type FROM `student_creation` sc JOIN student_history sh ON sh.student_id = sc.student_id JOIN standard_creation stdc ON sh.standard = stdc.standard_id WHERE sc.concession_type !='' && sc.status = '0' && (sc.approval = '' || sc.approval IS NULL)  && sc.school_id = '$school_id' && sh.academic_year='$academic_year' ");
        while($studentConcession = $generalConcessionQry->fetchobject()){
        ?>
        <tr>
            <td><?php echo $studentConcession->admission_number;?></td>
            <td><?php echo $studentConcession->student_name;?></td>
            <td><?php echo $studentConcession->flat_no,', ', $studentConcession->street,', ', $studentConcession->area_locatlity,', ', $studentConcession->district,', ', $studentConcession->pincode;?></td>
            <td><?php echo $studentConcession->standard;?></td>
            <td><?php echo $studentConcession->concession_type;?></td>
            <td></td>
            <td> 
                <a href="fees_concession&typeid=1">
                <button type="button" class="btn-info" title="Redirect To General concession screen"><i class="icon-arrow-with-circle-right"></i></button> 
                </a>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>
        </br></br>

<table class="table table-responsive" id="referral_concession_table">
    <thead>
        <tr>
            <th colspan="8"> Student Referral List Pending for Approval</th>
        </tr>
        <tr>
            <th>Reference code</th>
            <th>Admission No</th>
            <th>Name of the student</th>
            <th>Standard</th>
            <th>Type</th>
            <th>Remark</th>
            <th>Referred By</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $generalConcessionQry = $connect->query("SELECT 
        sc.student_id, 
        sc.admission_number, 
        sc.student_name, 
        sc.flat_no, 
        sc.street, 
        sc.area_locatlity, 
        sc.district, 
        sc.pincode, 
        stdc.standard, 
        sc.referencecat,
        rd.referred_by,
        rd.ref_code,
        rd.ref_student_id
        FROM 
            student_creation sc 
        JOIN 
            standard_creation stdc ON sc.standard = stdc.standard_id
        LEFT JOIN 
            referral_details rd ON sc.student_id = rd.student_id
        WHERE 
        sc.referencecat != '' AND sc.status = '0' AND (sc.approval = '' || sc.approval IS NULL) && sc.school_id = '$school_id' && sc.year_id='$academic_year' ");
        while($studentConcession = $generalConcessionQry->fetchobject()){
        ?>
        <tr>
            <td><?php echo $studentConcession->ref_code;?></td>
            <td><?php echo $studentConcession->admission_number;?></td>
            <td><?php echo $studentConcession->student_name;?></td>
            <td><?php echo $studentConcession->flat_no,', ', $studentConcession->street,', ', $studentConcession->area_locatlity,', ', $studentConcession->district,', ', $studentConcession->pincode;?></td>
            <td><?php echo $studentConcession->standard;?></td>
            <td><?php echo $studentConcession->referencecat;?></td>
            <td><?php echo $studentConcession->referred_by;?></td>
            <td> 
                <a href="fees_concession&typeid=2">
                <button type="button" class="btn-info" title="Redirect To Referral concession screen"><i class="icon-arrow-with-circle-right"></i></button> 
                </a>
            </td>
        </tr>
            <?php } ?>
    </tbody>
</table>

<script>
    $(function(){
        $('#general_concession_table').DataTable({
            order: [[0, "asc"]],
            lengthMenu: [5, 10, 25, 50, 'All'],
            // paging: false, // Disable paging
            // filter: false,  // Disable Search
        });

        $('#referral_concession_table').DataTable({
            order: [[0, "asc"]],
            lengthMenu: [5, 10, 25, 50, 'All'],
            // paging: false, // Disable paging
            // filter: false,  // Disable Search
        });
    });
</script>