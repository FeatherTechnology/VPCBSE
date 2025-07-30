<?php
include "../../ajaxconfig.php";

@session_start();
if(isset($_SESSION['school_id'])){
    $school_id = $_SESSION['school_id'];
}

$getstudentDetailsQry = $connect->query("SELECT 
std.standard,
SUM(CASE 
        WHEN stdc.category = 'BC' THEN 1 
        ELSE 0 
    END) AS bc_count,
SUM(CASE 
        WHEN stdc.category = 'BC' AND stdc.gender = 'Male' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS bc_hindu_boys_count,
SUM(CASE 
        WHEN stdc.category = 'BC' AND stdc.gender = 'Female' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS bc_hindu_girls_count,
SUM(CASE 
        WHEN stdc.category = 'BC' AND stdc.gender = 'Male' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS bc_christian_boys_count,
SUM(CASE 
        WHEN stdc.category = 'BC' AND stdc.gender = 'Female' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS bc_christian_girls_count,
SUM(CASE 
        WHEN stdc.category = 'BC' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS bc_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'BC' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS bc_muslim_girls_count,

SUM(CASE 
        WHEN stdc.category = 'MBC' THEN 1 
        ELSE 0 
    END) AS mbc_count,
SUM(CASE 
        WHEN stdc.category = 'MBC' AND stdc.gender = 'Male' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS mbc_hindu_boys_count,
SUM(CASE 
        WHEN stdc.category = 'MBC' AND stdc.gender = 'Female' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS mbc_hindu_girls_count,
SUM(CASE 
        WHEN stdc.category = 'MBC' AND stdc.gender = 'Male' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS mbc_christian_boys_count,
SUM(CASE 
        WHEN stdc.category = 'MBC' AND stdc.gender = 'Female' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS mbc_christian_girls_count,
SUM(CASE 
        WHEN stdc.category = 'MBC' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS mbc_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'MBC' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS mbc_muslim_girls_count,

SUM(CASE 
        WHEN stdc.category = 'SC' THEN 1 
        ELSE 0 
    END) AS sc_count,
SUM(CASE 
        WHEN stdc.category = 'SC' AND stdc.gender = 'Male' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS sc_hindu_boys_count,
SUM(CASE 
        WHEN stdc.category = 'SC' AND stdc.gender = 'Female' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS sc_hindu_girls_count,
SUM(CASE 
        WHEN stdc.category = 'SC' AND stdc.gender = 'Male' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS sc_christian_boys_count,
SUM(CASE 
        WHEN stdc.category = 'SC' AND stdc.gender = 'Female' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS sc_christian_girls_count,
SUM(CASE 
        WHEN stdc.category = 'SC' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS sc_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'SC' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS sc_muslim_girls_count,

SUM(CASE 
        WHEN stdc.category = 'ST' THEN 1 
        ELSE 0 
    END) AS st_count,
SUM(CASE 
        WHEN stdc.category = 'ST' AND stdc.gender = 'Male' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS st_hindu_boys_count,
SUM(CASE 
        WHEN stdc.category = 'ST' AND stdc.gender = 'Female' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS st_hindu_girls_count,
SUM(CASE 
        WHEN stdc.category = 'ST' AND stdc.gender = 'Male' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS st_christian_boys_count,
SUM(CASE 
        WHEN stdc.category = 'ST' AND stdc.gender = 'Female' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS st_christian_girls_count,
SUM(CASE 
        WHEN stdc.category = 'ST' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS st_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'ST' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS st_muslim_girls_count,

SUM(CASE 
        WHEN stdc.category = 'OBC' THEN 1 
        ELSE 0 
    END) AS obc_count,
SUM(CASE 
        WHEN stdc.category = 'OBC' AND stdc.gender = 'Male' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS obc_hindu_boys_count,
SUM(CASE 
        WHEN stdc.category = 'OBC' AND stdc.gender = 'Female' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS obc_hindu_girls_count,
SUM(CASE 
        WHEN stdc.category = 'OBC' AND stdc.gender = 'Male' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS obc_christian_boys_count,
SUM(CASE 
        WHEN stdc.category = 'OBC' AND stdc.gender = 'Female' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS obc_christian_girls_count,
SUM(CASE 
        WHEN stdc.category = 'OBC' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS obc_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'OBC' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS obc_muslim_girls_count,

SUM(CASE 
        WHEN stdc.category = 'DNC' THEN 1 
        ELSE 0 
    END) AS dnc_count,
SUM(CASE 
        WHEN stdc.category = 'DNC' AND stdc.gender = 'Male' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS dnc_hindu_boys_count,
SUM(CASE 
        WHEN stdc.category = 'DNC' AND stdc.gender = 'Female' AND rel_check = 1 THEN 1 
        ELSE 0 
    END) AS dnc_hindu_girls_count,
SUM(CASE 
        WHEN stdc.category = 'DNC' AND stdc.gender = 'Male' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS dnc_christian_boys_count,
SUM(CASE 
        WHEN stdc.category = 'DNC' AND stdc.gender = 'Female' AND rel_check = 2 THEN 1 
        ELSE 0 
    END) AS dnc_christian_girls_count,
SUM(CASE 
        WHEN stdc.category = 'DNC' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS dnc_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'DNC' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS dnc_muslim_girls_count,

SUM(CASE 
        WHEN stdc.category = 'BCM' THEN 1 
        ELSE 0 
    END) AS bcm_count,
SUM(CASE 
        WHEN stdc.category = 'BCM' AND stdc.gender = 'Male' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS bcm_muslim_boys_count,
SUM(CASE 
        WHEN stdc.category = 'BCM' AND stdc.gender = 'Female' AND rel_check = 3 THEN 1 
        ELSE 0 
    END) AS bcm_muslim_girls_count,

COUNT(*) AS total_count
FROM 
standard_creation std
JOIN 
(
    SELECT 
        standard, 
        category, 
        gender, 
        religion,
        CASE 
            WHEN religion NOT IN ('Christian-All', 'Christian-Orthodox', 'Christian-Protestant', 'Christian-Others', 'Muslim-All', 'Muslim-Shia', 'Muslim-Sunni', 'Muslim-Others') THEN 1 
            WHEN religion IN ('Christian-All', 'Christian-Orthodox', 'Christian-Protestant', 'Christian-Others') THEN 2
            WHEN religion IN ('Muslim-All', 'Muslim-Shia', 'Muslim-Sunni', 'Muslim-Others') THEN 3
            ELSE 0 
        END AS rel_check
    FROM 
        student_creation WHERE school_id = '$school_id'
) stdc 
ON std.standard_id = stdc.standard
GROUP BY 
std.standard_id
ORDER BY 
std.standard_id ASC ");
while($getstdcInfo = $getstudentDetailsQry->fetchObject()){
?>
<tr>
    <td><?php echo $getstdcInfo->standard; ?></td>
    <td><?php echo $getstdcInfo->total_count; ?></td>
    <td class="hidebc highlightText"><?php echo $getstdcInfo->bc_count; ?></td>
    <td class="hidebc"><?php echo $getstdcInfo->bc_hindu_boys_count; ?></td>
    <td class="hidebc"><?php echo $getstdcInfo->bc_hindu_girls_count; ?></td>
    <td class="hidebc"><?php echo $getstdcInfo->bc_christian_boys_count; ?></td>
    <td class="hidebc"><?php echo $getstdcInfo->bc_christian_girls_count; ?></td>
    <td class="hidebc"><?php echo $getstdcInfo->bc_muslim_boys_count; ?></td>
    <td class="hidebc"><?php echo $getstdcInfo->bc_muslim_girls_count; ?></td>
    <td class="hidembc highlightText"><?php echo $getstdcInfo->mbc_count; ?></td>
    <td class="hidembc"><?php echo $getstdcInfo->mbc_hindu_boys_count; ?></td>
    <td class="hidembc"><?php echo $getstdcInfo->mbc_hindu_girls_count; ?></td>
    <td class="hidembc"><?php echo $getstdcInfo->mbc_christian_boys_count; ?></td>
    <td class="hidembc"><?php echo $getstdcInfo->mbc_christian_girls_count; ?></td>
    <td class="hidembc"><?php echo $getstdcInfo->mbc_muslim_boys_count; ?></td>
    <td class="hidembc"><?php echo $getstdcInfo->mbc_muslim_girls_count; ?></td>
    <td class="hidesc highlightText"><?php echo $getstdcInfo->sc_count; ?></td>
    <td class="hidesc"><?php echo $getstdcInfo->sc_hindu_boys_count; ?></td>
    <td class="hidesc"><?php echo $getstdcInfo->sc_hindu_girls_count; ?></td>
    <td class="hidesc"><?php echo $getstdcInfo->sc_christian_boys_count; ?></td>
    <td class="hidesc"><?php echo $getstdcInfo->sc_christian_girls_count; ?></td>
    <td class="hidesc"><?php echo $getstdcInfo->sc_muslim_boys_count; ?></td>
    <td class="hidesc"><?php echo $getstdcInfo->sc_muslim_girls_count; ?></td>
    <td class="hidest highlightText"><?php echo $getstdcInfo->st_count; ?></td>
    <td class="hidest"><?php echo $getstdcInfo->st_hindu_boys_count; ?></td>
    <td class="hidest"><?php echo $getstdcInfo->st_hindu_girls_count; ?></td>
    <td class="hidest"><?php echo $getstdcInfo->st_christian_boys_count; ?></td>
    <td class="hidest"><?php echo $getstdcInfo->st_christian_girls_count; ?></td>
    <td class="hidest"><?php echo $getstdcInfo->st_muslim_boys_count; ?></td>
    <td class="hidest"><?php echo $getstdcInfo->st_muslim_girls_count; ?></td>
    <td class="hideobc highlightText"><?php echo $getstdcInfo->obc_count; ?></td>
    <td class="hideobc"><?php echo $getstdcInfo->obc_hindu_boys_count; ?></td>
    <td class="hideobc"><?php echo $getstdcInfo->obc_hindu_girls_count; ?></td>
    <td class="hideobc"><?php echo $getstdcInfo->obc_christian_boys_count; ?></td>
    <td class="hideobc"><?php echo $getstdcInfo->obc_christian_girls_count; ?></td>
    <td class="hideobc"><?php echo $getstdcInfo->obc_muslim_boys_count; ?></td>
    <td class="hideobc"><?php echo $getstdcInfo->obc_muslim_girls_count; ?></td>
    <td class="hidednc highlightText"><?php echo $getstdcInfo->dnc_count; ?></td>
    <td class="hidednc"><?php echo $getstdcInfo->dnc_hindu_boys_count; ?></td>
    <td class="hidednc"><?php echo $getstdcInfo->dnc_hindu_girls_count; ?></td>
    <td class="hidednc"><?php echo $getstdcInfo->dnc_christian_boys_count; ?></td>
    <td class="hidednc"><?php echo $getstdcInfo->dnc_christian_girls_count; ?></td>
    <td class="hidednc"><?php echo $getstdcInfo->dnc_muslim_boys_count; ?></td>
    <td class="hidednc"><?php echo $getstdcInfo->dnc_muslim_girls_count; ?></td>
    <td class="hidebcm highlightText"><?php echo $getstdcInfo->bcm_count; ?></td>
    <td class="hidebcm"><?php echo $getstdcInfo->bcm_muslim_boys_count; ?></td>
    <td class="hidebcm"><?php echo $getstdcInfo->bcm_muslim_girls_count; ?></td>
</tr>
<?php } ?>
