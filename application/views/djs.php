<div class="container">
	<div class="row">
		<div class="span12">
			<h2>DJs</h2>
			<table id="djs-table" class="table list table-condensed table-hover" width="100%;">
				<thead>
					<tr>
						<th>Name</th>
						<th>DOB</th>
						<th>Mobile</th>
						<th>E-Mail</th>
						<th>Town</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

				<?php 
					foreach ($djs as $key => $value) {
						echo '<tr>';
							echo '<td>' . $value->name . '</td>';
							echo '<td>12/05/1989</td>';
							echo '<td>' . $value->mobile . '</td>';
							echo '<td>' . $value->email . '</td>';
							echo '<td>' . $value->town . '</td>';
							echo '<td><a href="'.base_url().'djs/edit/' . $value->id . '" class="btn btn-warning">Edit</a> '.
								'<a class="btn btn-primary" href="'.base_url().'djs/views/' . $value->id .'">View</a> '.
								'<a class="btn btn-danger" href="'.base_url().'djs/delete/' . $value->id .'">Delete</a>'.
								'</td>';

						echo '</tr>';
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>
