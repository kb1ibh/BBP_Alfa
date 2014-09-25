<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="alert <? echo (isset($type) && $type ? "alert-$type" : "alert-success" ); ?>" role="alert">
				<?php 
				if($message) { 
					echo $message;
				} elseif($key = "validation") {
					//Loop through validation errors
					foreach($this->validationErrors as $table) {
						foreach($table as $row) {
							foreach($row as $validationKey => $validationError) {
								echo $validationError . '<br>';
							}
						}
					}
				}
				?>
			</div>
		</div>
	</div>
</div>