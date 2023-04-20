<?php

session_start();

require_once("config.php");

$limit = 4;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM job_post LIMIT $start_from, $limit";
$result = $connect->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $connect->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>

		   <div class="attachment-block clearfix">
              <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                </div>
              </div>
            </div>

		<?php
			}
		}
	}
}

$connect->close();