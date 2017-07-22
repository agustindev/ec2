<!DOCTYPE HTML>
<html>
	<?php
		session_start();
		if($_SESSION["loggedinaws"] || (isset($_POST['pass']) && $_POST['pass'] == '123456')){
			  $_SESSION["loggedinaws"] = true;
		}else{
				header("Location: ./index.php");
		}
	?>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script>
		setTimeout(function(){
				location.reload();
		},30000);
	</script>
</head>
	
<body>
	<?php
			// This code is released under a CC-Zero license
			// https://creativecommons.org/publicdomain/zero/1.0/
			// You need the AWS SDK - get the zip file from here: 
			// http://pear.amazonwebservices.com/get/aws.zip
			// And then unpack it to this directory.
			require './../libs-aws/aws-autoloader.php';
			include './credentials.php';
	?>

	<!-- Page Wrapper -->
	<div id="page-wrapper">
		<!-- Content -->
		<section id="wrapper">
			<!-- One -->
			<section id="one" class="wrapper spotlight style1">
				<div class="inner">
						<table>
							<thead>
								<tr>
									<th>NAME</th>
									<th>STATE</th>
									<th>ID</th>
									<th>TYPE</th>
									<th>IP</th>
									<th>OPTIONS</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="./../">..</a></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								
								<?php
								
										$result = $client->describeInstances();
								
										$reservations = $result['Reservations'];
								
										foreach ($reservations as $reservation) {
												$instances = $reservation['Instances'];
												foreach ($instances as $instance) {
														$instanceName = '';
														$stage = '';
														foreach ($instance['Tags'] as $tag) {
																if ($tag['Key'] == 'Name') {
																		$instanceName = $tag['Value'];
																}
																if (@$tag['Key'] == 'Stage') {
																		$stage = $tag['Value'];
																}
														}
													
														?>
								
															<tr>
																<td><?php echo $instanceName; ?></td> 
																<td><?php echo $instance['State']['Name'] ?></td>
																<td><?php echo $instance['InstanceId'] ?></td>
																<td><?php echo $instance['InstanceType'] ?></td>
																<td><?php echo $instance['PublicIpAddress'] ?></td>
																<td><a href="http://develop.agustingandara.com/private/services/aws-ec2/start.php?instance=<?php echo $instance['InstanceId'] ?>">START</a></td>
																<td><a href="http://develop.agustingandara.com/private/services/aws-ec2/restart.php?instance=<?php echo $instance['InstanceId'] ?>">RESTART</a></td>
																<td><a href="http://develop.agustingandara.com/private/services/aws-ec2/stop.php?instance=<?php echo $instance['InstanceId'] ?>">STOP</a></td>
															</tr>
								
														<?php
												}
										}
								
								?>
								
							</tbody>
						</table>
				</div>
			</section>

		</section>
	</div>
</body>

</html>