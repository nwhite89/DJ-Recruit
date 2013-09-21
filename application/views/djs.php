<div class="container">
	<div class="row">
		<div class="span12">
			<h2>DJs</h2>
			<table id="djs-table" class="table list table-condensed table-hover" width="100%;">
				<thead>
					<tr>
						<th>Name</th>
						<th>Age</th>
						<th>Town</th>
						<th class="hide">Equipment</th>
						<th class="hide">Music</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				<?php 

					foreach ($djs as $key => $value) {
						echo '<tr>';
							echo '<td><a href="'.base_url().'djs/views/'.$value->id.'">' . $value->name . '</td>';
							echo '<td>' . $value->age . '</td>';
							echo '<td>' . $value->town . '</td>';
							echo '<td class="hide">';
								$djEquipmentArr = array();
								foreach ($value->equipment as $x => $v) {
									array_push($djEquipmentArr, $v->name);
								}
								echo implode(', ', $djEquipmentArr);
							echo '</td>';
							echo '<td class="hide">';
								$djMusicArr = array();
								foreach ($value->music as $x => $v) {
									array_push($djMusicArr, $v->music);
								}
								echo implode(', ', $djMusicArr);
							echo '</td>';
							?>
							<td>
								<div class="btn-group">
									<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
										Action
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo base_url(); ?>djs/edit/<?php echo $value->id; ?>"><i class="icon-edit"></i> Edit</a></li>
										<li><a href="<?php echo base_url(); ?>djs/views/<?php echo $value->id; ?>"><i class="icon-eye-open"></i> View</a></li>
										<li><a class="dj-delete-check" href="<?php echo base_url(); ?>djs/remove/<?php echo $value->id; ?>"><i class="icon-trash"></i> Delete</a></li>
									</ul>
								</div>
							</td>
							<?php
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
